<!DOCTYPE html>
<html lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <title>Posts - Krishi Nayak</title>

        <!--Bootstrap library-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!--My Own style element-->
        <link rel="stylesheet" href="./style/style.css">
        <style>
          .lbluploadimg{
            width:48px;
            height:48px;
            background-repeat:no-repeat;
            cursor: pointer;
            border-radius:5px;
            background-image: url('./res/img/icons8-image-48.png');
          }

        </style>
        
    </head>
<body>
           <!--Navigation Bar of the website-->
        <nav class="navbar navbar-expand-lg " >
            <div class="container-fluid">
              <a class="navbar-brand" href="./index.php">कृषि नायक</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./blog.php">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./community.php">Community</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./seedinfo.php">Seeds information</a>
                  </li>
                </ul>
                <?php
                  if(session_status() === PHP_SESSION_ACTIVE){
                    //echo "Session is active for login button";
                    if(isset($_SESSION["farmerid"])){
                      //echo "login button set to none";
                      echo "<a class='loginButton' style='display:none' href='./login.html'>LogIn/SignUP</a>";
                      echo "<div class='r_dropdown_menu' style='display:flex'>";

                    }else {
                      //echo "login button set to flex";
                      echo "<a class='loginButton' style='display:flex' href='./login.html'>LogIn/SignUP</a>";
                      echo "<div class='r_dropdown_menu' style='display:none'>";
                    }
                  } else {
                   session_start();
                   if(isset($_SESSION["farmerid"])){
                    //echo "login button set to none";
                    echo "<a class='loginButton' style='display:none' href='./login.html'>LogIn/SignUP</a>";
                    echo "<div class='r_dropdown_menu' style='display:flex'>";

                  }else {
                    //echo "login button set to flex";
                    echo "<a class='loginButton' style='display:flex' href='./login.html'>LogIn/SignUP</a>";
                    echo "<div class='r_dropdown_menu' style='display:none'>";
                 
                  } 
                }  
                  ?>
                <div class="r_dropdown_menu">

                <div class="nav-user-icon-container">
                  <div class="nav-user-icon" id="usericon"></div>
                </div>
                <div class="nav-user-option" id="useroption">
                  <a href="./dashboard.php"> Dashboard </a>
                  <a href="./logout.php"> Logout </a>
                </div>
              </div>
            </div>
          </div>
        </nav>

<!--Navigation bar ends here-->
    
<div class="main-container">

<?php 
if(!(session_status() === PHP_SESSION_ACTIVE)){
  session_start();
}

$farmerid = "";
if(isset($_SESSION["farmerid"])){
  global $farmerid;
  $farmerid = $_SESSION['farmerid'];
  
}

//Sending data to the server
require_once('rdb_config.php');
//getting famer id

//Making all post avilable by assending order
$query = "";
if( isset($_REQUEST['postid']) && $_REQUEST['postid'] !== ""){
    $query = "SELECT * FROM posts WHERE post_id = ".$_REQUEST['postid'];
}else {
    $query = "SELECT * FROM posts";
}
$result = mysqli_query($conn, $query);
if(!$result){
  echo "Some internal error happned";
}

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){

    $result2 = mysqli_query($conn, "SELECT name FROM farmer_info WHERE farmer_id = '".$row["farmer_id"]."'");
    if(!$result2){
      echo "result2 has an error";
    }
    $row2 = mysqli_fetch_assoc($result2);

    //Calculating number if likes.
    $query = "SELECT * FROM likes WHERE post_id = ".$row['post_id'];
    $likesResult = mysqli_query($conn, $query);
    if(!$likesResult){
      echo "There was an error in featiching likes";
    }
    $totalLike = mysqli_num_rows($likesResult);
    
    //Calculating if user is likes post or not
    $likeicon = "./res/img/like_white.png";
    $liked = 0;
    
    if($farmerid){
      $qulikes = "SELECT * FROM likes WHERE post_id = ".$row["post_id"]." AND farmer_id = ".$farmerid;
    $quresult = mysqli_query($conn, $qulikes);
    if(!$quresult){
      echo "Can't know who liked the post";
    }
    if(mysqli_num_rows($quresult) > 0){
      $likeicon = "./res/img/like_black.png";
      $liked = 1;
    }
    }
    

    //Calculating total comment on a post 
    $cmntQuery = "SELECT COUNT(*) AS total_count FROM comments WHERE post_id = ".$row['post_id'];
    $cmntQResult = mysqli_query($conn, $cmntQuery);
    if(!$cmntQResult){
      echo "There was an error occured ";
    } 
    $totalCmnt = mysqli_fetch_assoc($cmntQResult)["total_count"];
    $rid=$row["post_id"];
    $one = 1;
    $zero = 0;

    echo "<div class='post-display shadow rounded' id='post".$row['post_id']."'>
    <span style='display:none;' id='pliid".$row['post_id']."' >".$liked."</span>
      <div class='post-header'>
          <img src='./res/img/default_boy_profile.jpg' width='50px'>
          <span>".$row2["name"]."</span>
      </div>
      <div>
      <p class='post-text'>".$row["text"]."</p>
      <img src='".$row["image_url"]."' width=464;>
      </div>

      <div class='post-interaction'>
          <button onclick='likepost(".$row['post_id'].",".$farmerid.")' onmouseover='like_icon_hover(".$row['post_id'].",".$liked.",".$one.")' onmouseout='like_icon_hover(".$row['post_id'].",".$liked.",".$zero.")'  > <div class='rlike-icon' id='piid".$row['post_id']."' style='background-image: url(".$likeicon.");' ></div> like <span id='plid".$row['post_id']."'>".$totalLike."</span></button>
          <button onclick='display_cmnt(".$row['post_id'].")'> <div class='rcomment-icon'></div> comment <span id='pcid".$row['post_id']."' >".$totalCmnt."</span> </button>
          <button> <div class='rshare-icon'></div><a href='posts.php?postid=".$rid."'> share</a></button>
      </div>

      <div class='cmnt-container' id='cid".$row['post_id']."' >
      <div class='post-comment-container rshadow'>
        <textarea class='post-comment-box' name='postcomment' id='cmnt".$row['post_id']."' col='2' placeholder='Write your comment'></textarea>
        <button onclick='post_cmnt(".$row['post_id'].",".$farmerid.")' class='post-button cmnt-btn'>Comment</button>
      </div>

      <div class='display-cmnt-container rshadow' id='d_cmnt".$row['post_id']."'>
      <div class='display-cmnt'>
        <div class='post-header'>
            <img src='./res/img/default_girl_profile.jpg' width='50px'>
            <span>Farmer name</span>
        </div>
        <p class='cmnt-text' >
            This is a sample comment that display how a comment should be displayed when you click on the variable.
        </p>
      </div>
    </div>
    </div>

        <div class='share-option-container rshadow' id='pshr".$row['post_id']."'>
            <input type='textbox'> </input>
            <div class='share-option'>
                <button onclick='shr_facebook(".$row['post_id'].")' >Facebook</button>
                <button onclick='shr_twitter(".$row['post_id'].")' >Twitter</button>
                <button onclick='shr_linkedin(".$row['post_id'].")' >Linkedin</button>
                <button onclick='shr_copy_link(".$row['post_id'].")' >Copy link</button>
            </div>
        </div>
    </div>";
  }
}else {
    echo "No post to show with this link. <a href='./community.php'>Click here.. </a> to on community page.";
}

?>
</div>

<div class="r_notification rshadow" id="r_notification"></div>

<!-- My Own scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./script/script.js" ></script>
<script>

  //Function to display the like button if hover
  function like_icon_hover(postid, liked, ishover){
    //alert("mouse is hovered over post with postid : "+ postid);
    var likeDiv = document.getElementById("piid"+postid);
    var likeSpan = document.getElementById("pliid"+postid);
    liked = parseInt(likeSpan.innerText);
    console.log("Post icon id is ", "Piid" + postid );
    if(liked == true){
      if(ishover)
        likeDiv.style.backgroundImage = "url('res/img/like_black_fill.png')";
      else 
      likeDiv.style.backgroundImage = "url('res/img/like_black.png')";
    }else {
      if(ishover)
        likeDiv.style.backgroundImage = "url('res/img/like_white_fill.png')";
      else 
        likeDiv.style.backgroundImage = "url('res/img/like_white.png')";
    }
  }

  //Function to display data in the comments.
  function comment_data(postid, data){
    console.log("Comment data method with data "+data+"post id "+ postid);

    console.log(data);
    cmntData = JSON.parse(data);

    console.log(cmntData);

    //Getting the elements to display all the comments
    dc_cmnt = document.getElementById("d_cmnt"+postid);
    dc_cmnt.innerHTML = "";

    elements = "";
    cmntData.forEach(function(cmnt){
      if(!(cmnt.text == undefined && cmnt.name == undefined))
        elements = elements + "<div class='display-cmnt'><div class='post-header'><img src='./res/img/default_girl_profile.jpg' width='50px'><span>"+cmnt.name+"</span></div><p class='cmnt-text'>"+cmnt.text+"</p></div>";
    });
    dc_cmnt.innerHTML = elements;

    //Updating total number of comment on the post
    cmntSpan = document.getElementById("pcid"+postid);
    cmntSpan.innerText = cmntData[0].tcmnt;

  }

  //Function to display the comment box and containers
  function display_cmnt(postid){
    cmntContainer = document.getElementById("cid"+postid);
    style = window.getComputedStyle(cmntContainer);
    display =  style.getPropertyValue('display');
    if(display == "flex"){
      cmntContainer.style.display = "none";
    }else {
      cmntContainer.style.display = "flex";

      $.ajax({
        url: 'comment.php',
        type: 'GET',
        data: {postid: postid},
        success: function(responce) {
          console.log(responce);
          comment_data(postid, responce);
        },

        error: function(responce) {

        }
      });

    }

    console.log("displaying the comment box");

  }

  //Posting a comment on the web
  function post_cmnt(postid, farmerid){
    if(!(farmerid == undefined || postid == undefined)){
        textarea = document.getElementById("cmnt"+postid);
        comment = textarea.value;
        textarea.value = "";
        console.log("Posting a comment on postid " + postid);

        $.ajax({
          url: 'comment.php',
          type: 'POST',
          data: {postid: postid, farmerid:farmerid, text:comment},
          success: function(res){
            console.log("Comment added successfully", res);
            comment_data(postid, res);
            notification_show("You commented on post.");
          },
          error: function(res){
            console.log("there was an error in commenting", res);
            notification_show("An error occured during commenting on the post.");
          }
        });

    }else {
      console.log("Login to comment or there was an error to comment");
      notification_show("Please, Login to comment on the post");
    }
  }

  //Function to set image back if mouse is not hover over the like button

  function likepost(postid, farmerid){
    console.log("The post with post id " + postid + "Get likes"+ farmerid + "farmer id of the liker.");
    if(!(farmerid == undefined || postid == undefined)){
      $.ajax({
      url: 'like.php',
      type: 'POST',
      data: {postid: postid, farmerid: farmerid},
      success: function(res){
        console.log("Successfully liked post",res);
        data = JSON.parse(res);
        console.log(data.tlikes);
        console.log(data.liked);
        var likeDiv = document.getElementById("piid"+postid);
        var likeSpan = document.getElementById("pliid"+postid);
        if(data.liked == true){
          likeDiv.style.backgroundImage = "url('res/img/like_black.png')";
          likeSpan.innerText = 1;
          
        }else{
          likeDiv.style.backgroundImage = "url('res/img/like_white.png')";
          likeSpan.innerText = 0;
        } 

        var likeSpan = document.getElementById("plid"+postid);
        likeSpan.innerText = data.tlikes;
      }, 
      error: function(res){
        console.log('there was an error in liking post', res);
        notification_show("An error occured during liking the post", 3000);  
      }
    });
    }else {
      notification_show("Please, Login to like the post");
    }
  }

  onload = function() {
    userOptions = document.getElementById("useroption");
    usericon = document.getElementById("usericon");
    usericon.onclick = showOptions;
  }

  function hideComment(event){
    commentBoxs = document.getElementsByClassName("cmnt-container");
    postContainer = document.getElementsByClassName("post-display");
    for(var i=0; i < commentBoxs.length; i++){
      if(!postContainer[i].contains(event.target)){
        commentBoxs[i].style.display = "none";
        console.log("hiding the element at " + i);
      }
    }

    console.log("hiding the console log");
  }

  document.addEventListener('click', hideComment);
</script>
</body>
</html>