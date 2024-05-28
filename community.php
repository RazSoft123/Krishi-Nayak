<!DOCTYPE html>
<html lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Community - Krishi Nayak</title>

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
                    <a class="nav-link active" href="./community.php">Community</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./seedinfo.php">Seeds information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./aboutus.html">About us</a>
                  </li>
                </ul>
                <!--
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                -->
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
                  /*
                 <!-- <a class="loginButton" href="./login.html">LogIn/SignUP</a> -->
                  <!--
                  <li class="nav-item">
                    <a class="nav-link dropdown-toggle nav-user-icon" href="#" role="button" aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                -->
                  */
                  /*
                <!-- creating the user icon to click and option to logout -->
                  if(session_status() === PHP_SESSION_ACTIVE){
                    //echo "Session is active for div";
                    if(isset($_SESSION["farmerid"])){
                      //echo "div set to flex";
                      echo "<div class='r_dropdown_menu' style='display:flex'>";
                    }else {
                      //echo "div set to none";
                      echo "<div class='r_dropdown_menu' style='display:none'>";
                    }
                  }else {
                    echo "<div class='r_dropdown_menu' style='display:none'>";
                  }  
                  */  
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


<!-- Main page starts here -->

    <div class="main-container">

        <?php 
        if(!(session_status() === PHP_SESSION_ACTIVE)){
          session_start();
        }

        $farmerid = "";
        if(isset($_SESSION["farmerid"])){
          global $farmerid;
          $farmerid = $_SESSION['farmerid'];
          //echo "Farmer id inside the session : ".$farmerid;
          echo " <div class='post-container mt-3 p-3 shadow rounded'>
          <form action='community.php' method='post' enctype='multipart/form-data'>
              <div class='post-container'>
                  <textarea class='post-textarea shadow' name='posttext' style='width=100%' id='posttext' cols='50' rows='3' placeholder='Enter post here ' required></textarea>
                  <div>
                    <img src='' alt='' width=496; id='postimgdisplay' />
                  </div>
                  <div class='post-upload'>
                      <label for='postimgfile' class='lbluploadimg'></label>
                      <input class='image-button' style='display:none' accept='.jpg, .jpeg, .png, .gif' type='file' name='postimgfile' id='postimgfile' />
                      <input class='post-button' type='submit' value='Post' name='submit'>
                  </div>
              </div>
              </form>
              </div>";
        }else {
          echo "<div class='info-box'>
                <h2>Log in to write a post</h2>
                <a href='./login.html' class='login_button'>Login</a>
                </div>";
        }

        //Sending data to the server
        require_once('rdb_config.php');
        //getting famer id

        $target_dir = "";
        $uploadOk = 1;
        $postText = "";
        if(isset($_POST['posttext'])){
          $postText = $_POST['posttext'];
        }
        // Check if file is uploaded
        if(isset($_POST["submit"])) {

            if(!empty($_FILES["postimgfile"]["name"])){
              $temp = explode(".", $_FILES["postimgfile"]["name"]);
              $newfilename = round(microtime(true)) . '.' . end($temp);
              $target_file = "./res/postimg/".$farmerid.$newfilename;

              // Check if file already exists
              if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
              }

              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["postimgfile"]["tmp_name"], $target_file)) {
                  
                  //making entry into database;
                  $query = "INSERT INTO posts (post_id, farmer_id, text, image_url, post_date) VALUES (NULL,'".$farmerid."','".$postText."','".$target_file."', current_timestamp())";
                  
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                    //echo "Error in query".$result;
                    echo "<h2> There was an internal error. <a href='./signup.html'>Click here...</a></h2>";
                }

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
          }else {
            //making entry into database;
            $query = "INSERT INTO posts (post_id, farmer_id, text, image_url, post_date) VALUES (NULL,'".$farmerid."','".$postText."','', current_timestamp())";
                    
            $result = mysqli_query($conn, $query);
            if(!$result){
              //echo "Error in query".$result;
              echo "<h2> There was an internal error. <a href='./signup.html'>Click here...</a></h2>";
          } 
        }
      }

     //   echo "THis is a test for farmer id : ".$farmerid;

        //Making all post avilable by assending order
        $query = "SELECT * FROM posts ORDER BY post_date DESC";
        $result = mysqli_query($conn, $query);
        if(!$result){
          echo "Some internal error happned";
        }

        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){

            $result2 = mysqli_query($conn, "SELECT name, profile_img FROM farmer_info WHERE farmer_id = '".$row["farmer_id"]."'");
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
           // echo $likeicon;
            $one = 1;
            $zero = 0;

            echo "<div class='post-display shadow rounded' id='post".$row['post_id']."'>
                    <span style='display:none;' id='pliid".$row['post_id']."' >".$liked."</span>
                    <div class='post-header'>
                        <img src='".$row2["profile_img"]."' width='50px'>
                        <span>".$row2["name"]."</span>
                    </div>
                    <div>
                    <p class='post-text'>".$row["text"]."</p>
                    <img src='".$row["image_url"]."' width=464;>
                    </div>

                    <div class='post-interaction'>
                        <button onclick='likepost(".$row['post_id'].",".$farmerid.")' onmouseover='like_icon_hover(".$row['post_id'].",".$liked.",".$one.")' onmouseout='like_icon_hover(".$row['post_id'].",".$liked.",".$zero.")'  > <div class='rlike-icon' id='piid".$row['post_id']."' style='background-image: url(".$likeicon.");' ></div> like <span id='plid".$row['post_id']."'>".$totalLike."</span></button>
                        <button onclick='display_cmnt(".$row['post_id'].")'> <div class='rcomment-icon'></div> comment <span id='pcid".$row['post_id']."' >".$totalCmnt."</span> </button>
                        <button onclick='share_post(".$row['post_id'].")' > <div class='rshare-icon'></div><span>Share</span></button>
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
        }

        ?>
            <!-- Box to write post -->
            <!--
            <form action="community.php">
                <div class="post-container">
                    <textarea class="post-textarea shadow" name="posttext" style="width=100%" id="posttext" cols="50" rows="3" placeholder="Enter post here " required></textarea>
                    <div>
                      <img src="" alt="" width=496; id="postimgdisplay" />
                    </div>
                    <div class="post-upload">
                        <label for="postimgfile" class="lbluploadimg"></label>
                        <input class="image-button" style="display:none" accept=".jpg, .jpeg, .png, .gif" type="file" name="postimg" id="postimgfile" />
                        <input class="post-button" type="submit" value="Post" name="post">
                    </div>
                </div>
            </form>
            -->
            <!--
             Show log in dialog box 
            <div class="info-box">
              <h2>Log in to write a post</h2>
              <a href="./login.html" class="login_button">Login</a>
            </div>
            -->
<!--
        </div>
        
        
        <div class="post-display shadow rounded">
            <div class="post-header">
                <img src="./res/img/default_boy_profile.jpg" width="50px" alt="">
                <span>Farmer name</span>
            </div>
            <div>
            <p class="post-text">
                This is sample text for the post that a farmer will upload when he write his own post. 
            </p>
            <img src="" alt="">
            </div>

            <div class="post-interaction">
                <button> <img src="./res/img/like_white.png" width="32px" alt=""> like <span>6</span></button>
                <button> <img src="./res/img/comment_white.png" width="32px" alt=""> comment <span>2</span> </button>
                <button> <img src="./res/img/share_white.png" width="32px" alt=""> share <span>1</span></button>
            </div>
        </div>

        <div class="post-display shadow rounded">
            <div class="post-header">
                <img src="./res/img/default_girl_profile.jpg" width="50px" alt="">
                <span>Farmer name</span>
            </div>
            <div>
            <p class="post-text">
                This is sample text for the post that a farmer will upload when he write his own post. 
            </p>
            <img src="" alt="">
            </div>

            <div class="post-interaction">
                <button> <img src="./res/img/like_white.png" width="32px" alt=""> like <span>6</span></button>
                <button> <img src="./res/img/comment_white.png" width="32px" alt=""> comment <span>2</span> </button>
                <button> <img src="./res/img/share_white.png" width="32px" alt=""> share <span>1</span></button>
            </div>

            <div class="cmnt-container" >
              <div class="post-comment-container rshadow">
                <textarea class="post-comment-box" name="postcomment" id="cmnt_postid" col="2" placeholder="Write your comment"></textarea>
                <button class="post-button cmnt-btn">Comment</button>
              </div>

              <div class="display-cmnt-container rshadow">
              <div class="display-cmnt">
                <div class="post-header">
                    <img src="./res/img/default_girl_profile.jpg" width="50px" alt="">
                    <span>Farmer name</span>
                </div>
                <p class="cmnt-text" >
                    This is a sample comment that display how a comment should be displayed when you click on the variable.
                </p>
              </div>
            </div>

            </div>
            
        </div>
      -->
    </div>
    <div class="r_notification rshadow" id="r_notification"></div>
        <!-- My Own scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./script/script.js" ></script>
        <script>
          var pidisplay, pifile;

          function displayimg() {
            pidisplay.src = URL.createObjectURL(pifile.files[0]);
          }

          function share_post(postid){
            shareContainer = document.getElementById('pshr'+postid);
            textBox = shareContainer.querySelector('input');
            if(textBox){
              textBox.value = "http://localhost/krishi_nayak/posts.php?postid="+postid;
            }
            console.log("Callign for share box");
            if(shareContainer.style.display == "flex"){
              console.log("Hiding the share box");
              shareContainer.style.display = "none";
            }else{
              console.log("Showin the shrea box");
              shareContainer.style.display = "flex";
            }

          }

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
                    notification_show("You commented on a post");
                  },
                  error: function(res){
                    console.log("there was an error in commenting", res);
                    notification_show("An error occured during commenting on the post.", 3000);
                  }
                });

            }else {
              console.log("Login to comment or there was an error to comment");
              notification_show("Login to add comment on the post", 3000);
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
                notification_show("An error occured during liking the post. ", 3000);
              }
            });
            }else {
              console.log("Login to like or postid is inviled");
              notification_show("Login to like the post", 3000);
            }
          }

          onload = function() {
            pidisplay = document.getElementById("postimgdisplay");
            pifile = document.getElementById("postimgfile");
            pifile.onchange = displayimg;
            
            userOptions = document.getElementById("useroption");
            usericon = document.getElementById("usericon");
            usericon.onclick = showOptions;
          }

          function hideComment(event){
            commentBoxs = document.getElementsByClassName("cmnt-container");
            postContainer = document.getElementsByClassName("post-display");

            //Getting refrences for the share continer
            shareContainer = document.getElementsByClassName("share-option-container");
            for(var i=0; i < commentBoxs.length; i++){
              if(!postContainer[i].contains(event.target)){
                commentBoxs[i].style.display = "none";
                shareContainer[i].style.display = "none";
                console.log("hiding the element at " + i);
              }
            }

            console.log("hiding the console log");
          }
          document.addEventListener('click', hideComment);
        </script>
</body>
</html>