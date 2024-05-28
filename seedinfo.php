<!DOCTYPE html>
<html lang="en">
<head>
<head>
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <title>Seeds information - Krishi Nayak</title>

        <!--Bootstrap library-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!--My Own style element-->
        <link rel="stylesheet" href="./style/style.css">
        <style>
          .seed_card_list{
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 15px;
          }
          .seed_card{
            display:flex;
            flex-direction: column;
            width: 300px;
            padding: 30px;
            border-radius: 15px;
            transition: transform 0.2s;
          }

          .seed_card:hover {
            background-color: lightgreen;
            transform: scale(1.05);
          }

          .seed_card *{
            margin:0px;
            padding-top:5px;
          }

          select {
            font-size: 2.5rem;
          }

          .seed_info_popup{
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 20px;
          }

          .seed_info_popup * {
            margin: 0px;
            padding: 0px;
          }


        </style>

        <!-- My Own scripts -->
        <script src="./script/script.js" ></script>
    </head>
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
              <a class="nav-link active" href="./seedinfo.php">Seeds information</a>
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

  <div class="container-fluid r_header">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./res/img/coriander_seed.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./res/img/wheat_seed.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </div>

  <div class="container-xl">
    <div class="seed_search_container">
      <?php
        require_once('rdb_config.php');
          
        //Creating view to work 
        //echo "<div class='mb-3 mt-3'>";
        /*
        echo "<select class='form-select' id='state' name='state'>";
        echo " <option value=''>Select your States</option>";
          
        //Code to construct the state option box
        $query = "SELECT * FROM states";
        $result = mysqli_query($conn, $query);
        if(!$result){
          echo "There was an error";
        }else {
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value='".$row["state_code"]."'>".$row["name"]."</option>";
          }
        }

        echo "</select> </div>";
        */
        //Creating view to work 
        echo "<div class='mb-3 mt-3'>";
        echo "<select onchange='show_plant_seed()' class='form-select' id='plant_name' name='plant_name'>";
        echo " <option value=''>Select plant </option>";
        
        //Code to construct the state option box
        $query = "SELECT * FROM plant_info";
        $result = mysqli_query($conn, $query);
        if(!$result){
          echo "There was an error";
        }else {
          while($row = mysqli_fetch_assoc($result)){
              echo "<option value='".$row["plant_id"]."'>".$row["plant_name"]."</option>";
          }
        }
        echo "</select> </div>";
      
      ?>
    </div>
    
    <div class="seed_card_list" id="seed_card_list">
      <?php
        require_once('rdb_config.php');
        $query = "SELECT * FROM seed_info";
        $result = mysqli_query($conn, $query);
        if(!$result)
          echo "There was an error";
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            //Plant query
            $plantQuery = "SELECT plant_name FROM plant_info WHERE plant_id =".$row['plant_id'];
            $plantResult = mysqli_query($conn, $plantQuery);
            if(!$plantResult){
              echo "There was an error in getting plant name";
            }
            $plantName = mysqli_fetch_assoc($plantResult)['plant_name'];

            echo "<div onclick='show_seed_info(".$row['seed_id'].",\"".$plantName."\")' class='seed_card rshadow'>
            <h2><b>".$row['seed_name']."</b></h2>
            <h3>".$plantName."</h3>
            <span><b>Source:</b> ".$row['source']."</span>
            <span><b>Yeild:</b> ".$row['yeild']."q/ha (Quintal per hectare)</span>
            <span><b>Sowing period:</b> ".$row['sowing_period']."</span>
          </div>";
          }
        }
        /*
        <div class="seed_card rshadow">
          <h2>Seed name</h2>
          <h3>Plant Name</h3>
          <span>Source</span>
          <span>Yeild</span>
          <span>Showing period</span>
        </div>
        */
      ?>
    </div>

  </div>
  
  <div class="r_overlay" id="seed_info_overlay">
    <div class="r_popup">
      <span onclick="hideSeedInfoPopup()" class="close-btn">&times;</span>
      <div class="seed_info_popup" id="seed_info_popup">

      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function show_seed_info(seed_id, plantName){
      showSeedInfoPopup();

      $.ajax({
        url: 'get_seed_details.php',
        type: 'GET',
        data: {seed_id: seed_id},
        success: function(res){
          console.log("data from the table" + res);
          data = JSON.parse(res);
          elements = "<span onclick='hideSeedInfoPopup()' class='close-btn'>&times;</span>";
          elements = elements + "<h2><b>Verity/Hybrid name:</b> "+data.seed_name+"</h2><h3><b>Plant name:</b> "+plantName+"</h3><span><b>Source:</b>"+data.source+"</span><p><b>Summary:</b>"+data.summary+"</p><span><b>Showing period:</b>"+data.sowing_period+"</span><span><b>Seed per hectare:</b>"+data.seed_rate+"</span><span><b>Harvest in:</b> "+data.yeild_in_days+"</span><span><b>Yeild:</b> "+data.yeild+"</span><span><b>Strengths:</b>"+data.srengths+"</span><span><b>Buy seed:</b> "+data.seed_link+"</span>";

          document.getElementById('seed_info_popup').innerHTML = elements;
        }, 
        error: function(res){
          
        }
      });

    }

    function hideSeedInfoPopup(){
      document.getElementById('seed_info_overlay').style.display= 'none';
    }

    function showSeedInfoPopup(){
      document.getElementById('seed_info_overlay').style.display= 'flex';
    }

    function show_plant_seed() {
      plantId = document.getElementById('plant_name').value;
      if(plantId == undefined || plantId == ''){
        location.reload();
      }else {
        $.ajax({
        url: 'get_plant_seeds.php',
        type: 'GET',
        data: {plantid: plantId},
        success: function(res){
          console.log("data from the table" + res);
          data = JSON.parse(res);
          elements = "";
          data.forEach( function(seed_info){
            elements = elements + "<div onclick='show_seed_info("+seed_info.seed_id+",\""+seed_info.plant_name+"\")' class='seed_card rshadow'><h2><b>"+seed_info.seed_name+"</b></h2><h3>"+seed_info.plant_name+"</h3><span><b>Source:</b> "+seed_info.source+"</span><span><b>Yeild:</b> "+seed_info.yeild+"q/ha (Quintal per hectare)</span><span><b>Sowing period:</b> "+seed_info.sowing_period+"</span></div>";
          });
          document.getElementById('seed_card_list').innerHTML = elements;
        }, 
        error: function(res){
          
        }
      });
      }
    }
  </script>

</body>
</html>