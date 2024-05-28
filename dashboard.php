<?php
  if(!(session_status() === PHP_SESSION_ACTIVE)){
    session_start();
  }
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard - krishi nayak</title>

     <!--Bootstrap library-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--My Own style element-->
     <link rel="stylesheet" href="./style/style.css">

    <!-- My Own scripts -->
    <script src="./script/script.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <style>
         .user-info{
          display: flex;
          flex-direction: row;
          flex-wrap: wrap;
          border: solid black 2px;
          border-radius: 20px;
          margin-top: 20px;
          padding: 20px;
          gap: 20px;
        }

        .user-info > img {
          width: 196px;
          height: 196px;
        }

        .edit-option{
          text-align: end;
          flex-grow: 1;
        }

        .edit-option > a {
          text-decoration: none;
          cursor: pointer;
        }
        
        .user-info-display{
          margin-left: 10px;
          padding: 15px;
          display: flex;
          flex-direction: column;
          flex-wrap: nowrap;
        }
        .user-info-display > * {
          margin: 0;
          padding: 0;
        }

        .user-info-display > h2 {
          font-size: 3.5rem;
          font-weight: bold;
          margin-bottom: 10px;
        }

        .user-info-display > p{
          padding-left: 10px;
          font-size: 1.25rem;
        }

        .farm-stat{
          margin-top: 20px;
          display: flex;
          flex-direction: row;
          flex-wrap: wrap;
          border: solid black 2px;
          border-radius: 20px;
          padding: 30px;
          gap: 20px;

        }

        .cl-info-box{
          display: flex;
          flex-direction: column;
          padding: 15px;
          border: soild black 1px;
          font-size: 1.25rem;
          border-radius: 10px;
        }

        .crop-list{
          background-color: lightgreen;
        }
        .crop-list  tr:hover {
          background-color: darkgreen;
          color: white;
        }

        .land-list{
          background-color: lightcoral;
        }
        .land-list  tr:hover {
          background-color: brown;
          color: white;
        }
        th, td {
          padding-top: 0px;
          padding-bottom: 0px;
          padding-left: 5px;
          padding-right: 5px;
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
                  <div class="nav-user-icon" id="usericon">
                    
                  </div>
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




      <div class="container-xl"> 
        <?php
          require_once('rdb_config.php');

            //Getting value from the session.
            if(!session_status() === PHP_SESSION_ACTIVE){
              session_start();
            }

            if(!isset($_SESSION['farmerid'])){
              echo "<div class='r_overlay'>
              <div class='r_popup'>
                <h2>Login to see dashboard</h2>
                <div class='r_row'>
                  <a href='./login.html' class='post-button'> Login </a>
                  <a href='./index.php' class='post-button'> Home </a>
                  <a href='./blog.php' class='post-button'> Blog </a>
                <div>
                </div>
            </div>";
            }else {
              $farmerId = $_SESSION["farmerid"];
              echo "Your farmer Id is ".$farmerId;

              $query ="SELECT * FROM farmer_info WHERE farmer_id = ".$farmerId;
              $result = mysqli_query($conn, $query);
      
              if(!$result){
                  echo "Error ".$result;
              }

              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    
                    /*
                    echo "<br /> Farmer id".$row["farmer_id"];
                    echo "<br /> Farmer name".$row["name"];
                    echo "<br /> Farmer email".$row["email"];
                    echo "<br /> Farmer phone Numeber".$row["phone_no"];
                    echo "<br /> Farmer  location".$row["address"];
                    echo "<br /> Farmer state".$row["state"];
                    echo "<br /> Farmer distric".$row["district"];
                    echo "<br /> Farmer block".$row["block"];
                    echo "<br /> Farmer pin".$row["pin"];
                    echo "<br /> Farmer signup date".$row["join_date"];
                    */

                    $totalPost = 0;
                    //Calculating total post by the farmer
                    $postQuery = "SELECT count(*) FROM posts WHERE farmer_id = ".$row['farmer_id'];
                    $result = mysqli_query($conn, $postQuery);
                    if(!$result)
                      echo "There was an error in getting total posts.";
                    $totalPost = mysqli_fetch_assoc($result)['count(*)'];

                    //Getting state name
                    $stateName = "";
                    $stateQuery = "SELECT name FROM states WHERE state_code = '".$row['state']."'";
                    $stateResult = mysqli_query($conn, $stateQuery);
                    if($stateQuery){
                      $stateName = mysqli_fetch_assoc($stateResult)['name'];
                    }
                    
                    echo "<div class='user-info rshadow'>
                      <img src='".$row['profile_img']."' alt='User profile photo'>
                      <div class='user-info-display'>
                        <h2>".$row['name']."</h2>
                        <p>Farming exprience : ".$row['exprience']." year's</p>
                        <p>Location : ".$stateName."</p>
                        <p>Total Posts :".$totalPost."</p>
                        </div>
                      <div class='edit-option'>
                        <a class='post-button' href='edit_profile.php'>Edit profile</a>
                      </div>
                    </div>";
                  }
                }

                //Showing list for the added crop
                $cropQuery = "SELECT * FROM crop_info WHERE farmer_id =". $farmerId;
                $result = mysqli_query($conn, $cropQuery);
                $seedName = "";
                $plantName = "";
                $currentStage = "";

                echo "<div class='farm-stat rshadow'>
                <div class='rshadow cl-info-box'>
                <button onclick='showAddCropPopup()' class='post-button'>Add new crop</button>
                <div class='crop-list r_list'>
                <table>
                    <caption>
                      List of your crops
                    </caption>
                    <thead>
                      <tr>
                        <th scope='col'>Plant name</th>
                        <th scope='col'>Seed Name</th>
                        <th scope='col'>Crop stage</th>
                      </tr>
                    </thead>
                    <tbody id='crop_list'>";

                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    $seedQuery = "SELECT seed_name, plant_id FROM seed_info WHERE seed_id =".$row['seed_id'];
                    $seedResult = mysqli_query($conn, $seedQuery);

                    $currentStage = $row['current_stage'];

                    if(mysqli_num_rows($seedResult) > 0){
                      $seedRow = mysqli_fetch_assoc($seedResult);
                      
                      $seedName = $seedRow['seed_name'];
                      
                      $plantQuery = "SELECT plant_name FROM plant_info WHERE plant_id=".$seedRow['plant_id'];
                      $plantResult = mysqli_query($conn, $plantQuery);

                      if(mysqli_num_rows($plantResult) > 0){
                        $plantName = mysqli_fetch_assoc($plantResult)['plant_name'];
                      }
                    }

                    $cropStage = "";
                    if($currentStage === "SHOW"){
                      $cropStage = "Showing";
                    }else if($currentStage === "BPLN"){
                      $cropStage = "Baby plant";
                    }else if($currentStage === "APLN"){
                      $cropStage = "Adult plant";
                    }else if($currentStage === "FLOW"){
                      $cropStage = "Flowring";
                    }else if($currentStage === "FRUI"){
                      $cropStage = "Fruiting";
                    }else if($currentStage === "HARV"){
                      $cropStage = "Haevesting";
                    }


                    echo "<tr><td>".$plantName."</td><td>".$seedName."</td><td>".$cropStage."</td></tr>";
                    
                  }
                } 
                echo "</tbody>
                </table>
                </div>
                </div>";
                  
                //Showing the list for added lands
                $landQuery = "SELECT * FROM land_info WHERE farmer_id =". $farmerId;
                $landresult = mysqli_query($conn, $landQuery);

                echo "<div class='rshadow cl-info-box'>
                  <button onclick='showAddLandPopup()'  class='post-button'>Add new Land</button>
                  <div class='land-list r_list'>
                  <table>
                    <caption>
                      List of your Land
                    </caption>
                    <thead>
                      <tr>
                        <th scope='col'>Land Name</th>
                        <th scope='col'>Land stage</th>
                      </tr>
                    </thead>
                    <tbody id='land_list'>";
                  if(mysqli_num_rows($landresult) > 0){
                    while($row = mysqli_fetch_assoc($landresult)){
                      $landStage = "";
                      if($row["land_stage"] === "BRAN"){
                        $landStage = "Baren land";
                      }else if($row["land_stage"] == "PLOD"){
                        $landStage = "Plodded";
                      }else if($row["land_stage"] == "CROP"){
                        $landStage = "Crop planted";
                      }
                      echo "<tr><td>".$row["name"]."</td><td>".$landStage."</td></tr>";
                      }
                    } 
                 echo"
                 </tbody>
                 </table>
                 </div>
                </div>
              </div>
              </div>"; 
            }
          
        ?>
        <!-- option box to add new crop -->
        <div class="r_overlay" id="crop_overlay">
            <div class="r_popup">
                <span onclick="hideAddCropPopup()" class="close-btn">&times;</span>
                <div>
                  <label for="plantname" class="form-label">Select plant name</label>
                  <select class="form-select" id="plantname" name="plantname" required>
                    <option value="">----</option>
                    <option value="1">Okra</option>
                    <option value="3">Coriender</option>
                    <option value="4">Bottle gaurd</option>
                    <option value="2">Brinjal</option>
                  </select>
                </div>
                
                <div>
                  <label for="seedname" class="form-label">Select seed name</label>
                  <select class="form-select" id="seedname" name="seedname" required>
                    <option value="">----</option>
                  </select>
                </div>
            
                <div class ="r_column">
                  <label for="plantationdate" class="form-label">Select date of plantation</label>
                  <input type="date" name="plantationdate" id="plantationdate">
                </div>
        
                <div>
                  <label for="landid" class="form-label">Select land name</label>
                  <select class="form-select" id="landid" name="landid" required>
                    <option value="">----</option>
                    <?php
                      if(!session_status() === PHP_SESSION_ACTIVE){
                        session_start();
                      }
          
                      if(isset($_SESSION['farmerid'])){
                        $landQuery = "SELECT * FROM land_info WHERE farmer_id =". $farmerId;
                        $landresult = mysqli_query($conn, $landQuery);
                        if(mysqli_num_rows($landresult) > 0){
                          while($row = mysqli_fetch_assoc($landresult)){
                            echo "<option value='".$row['land_id']."'>".$row['name']."</option>";
                            }
                          } 
                      }else {
                        echo "<option value=''>There was an error please logout and login again...</option>";
                      }

                  echo "</select>
                </div>

                <div>
                  <label for='currentstage' class='form-label'>Select current stage</label>
                  <select class='form-select' id='currentstage' name='currentstage' required>
                    <option value=''>----</option>
                    <option value='SHOW'>Showing</option>
                    <option value='BPLN'>Baby plant</option>
                    <option value='APLN'>Adult plant</option>
                    <option value='FLOW'>Flowring</option>
                    <option value='FRUI'>Fruiting</option>
                    <option value='HARV'>Harvesting</option>
                  </select>
                </div>
                <button onclick='add_crop(".$_SESSION['farmerid'].")' class='post-button'>Add Crop</button>
            </div>
            <div class='r_notification rshadow' id='r_notification'></div>
        </div>

        <!-- Option box to add land records -->
        <div class='r_overlay' id='land_overlay'>
            <div class='r_popup'>
                <span onclick='hideAddLandPopup()' class='close-btn'>&times;</span>
                <div class='r_column'>
                  <label for='landname' class='form-label'>Enter land name</label>
                  <input type='text' id='landname' placeholder='Land near pokhar'>
                </div>
                
                <div class='r_column'>
                  <label for='landarea' class='form-label'>Enter land area</label>
                  <input type='number' placeholder='4.5' id='landarea'>
                </div>
            
                <div class ='r_column'>
                  <label for='landstage' class='form-label'>Select land stage</label>
                  <select class='form-select' id='landstage' name='landstage' required>
                    <option value=''>----</option>
                    <option value='BRAN'>Baren land</option>
                    <option value='PLOD'>Plodded</option>
                    <option value='CROP'>Crop planted</option>
                  </select>
                </div>
        
                <div>
                  <label for='soiltype' class='form-label'>Select Soil type</label>
                  <select class='form-select' id='soiltype' name='soiltype' required>
                    <option value=''>----</option>
                    <option value='SAND'>Sandy</option>
                    <option value='SLIT'>Slit</option>
                    <option value='CLAY'>Clay</option>
                    <option value='LOAM'>Loam</option>
                  </select>
                </div>

                <button onclick='add_land(".$_SESSION['farmerid'].")' class='post-button'>Add Land</button>

            </div>
        </div>";
        ?>
      </div>
      
                
    <script>

      console.log("Dashboard file get executed");
      plantNameSelect = document.getElementById('plantname');
      plantNameSelect.addEventListener('change', plantNameSelected);

      function showAddCropPopup(){
        document.getElementById('crop_overlay').style.display = 'flex';
      }

      function hideAddCropPopup(){
        document.getElementById('crop_overlay').style.display = 'none';
      }

      function showAddLandPopup() {
        document.getElementById('land_overlay').style.display = 'flex';
      }

      function hideAddLandPopup(){
        document.getElementById('land_overlay').style.display = 'none';
      }

      function plantNameSelected(event){
        //alert("Value get changed" + event.target.value);
        selectedValue = event.target.value;
        if(selectedValue == undefined){
          
          return;
        }
          
        $.ajax({
          url: 'get_seeds_name.php',
          type: 'GET',
          data: {plantid: selectedValue},
          success: function(responce) {
            console.log(responce);
            seedsElement = document.getElementById('seedname')
            seedsInfo = JSON.parse(responce);

            options = "";
            seedsInfo.forEach(function(seed){
              options = options + "<option value="+seed.id+">"+seed.name+"</option>"
            });
            
            seedsElement.innerHTML = options;
          },

          error: function(responce) {

          }
        });
      }

      function add_crop(farmerId) {
        
        plantId = document.getElementById('plantname').value;
        seedId = document.getElementById('seedname').value;
        showingDate = document.getElementById('plantationdate').value;
        landId = document.getElementById('landid').value;
        currentStage = document.getElementById('currentstage').value;
        console.log("Plant name: "+plantId +" seed Name " + seedId + "Showing date " + showingDate + "Land name "+ landId + " Current Stage" + currentStage);

        if(plantId == ""){
          notification_show("Select plant name ");
          return;
        }

        if(seedId == ""){
          notification_show("Select seed name ");
          return;
        }

        if(showingDate == ""){
          notification_show("Select date of plantation");
          return;
        }

        if(landId == ""){
          notification_show("Select land name");
          return;
        }

        if(currentStage == ""){
          notification_show("Select plant stage");
          return;
        }

        console.log("Plant Id: " + plantId + "Seed Id " + seedId + "Showing Date: "+ showingDate + " Land Id: " + landId + "Current stage: " + currentStage);
        $.ajax({
          url:'add_new_crop.php',
          type: 'POST',
          data: {farmerid:farmerId, plant_id: plantId, seed_id: seedId, showing_date: showingDate, land_id: landId, current_stage: currentStage},
          success: function(responce) {
            console.log("responce is inside the function" + responce);
            crops = JSON.parse(responce);
            elements = "";
            crops.forEach(function(crop){
              if(!(crop.pname == undefined && crop.sname == undefined == crop.cstage == undefined)){
                cropStage = "";
                if(crop.cstage == "SHOW")
                  cropStage = "Showing";
                else if(crop.cstage == "BPLN")
                  cropStage = "Baby plant";
                else if(crop.cstage == "APLN")
                  cropStage = "Adult plant";
                else if(crop.cstage == "FLOW")
                  cropStage = "Flowring";
                else if(crop.cstage == "FRUI")
                  cropStage = "Fruiting";
                else if(crop.cstage == "HARV")
                  cropStage = "Harvesting";

                elements = elements + "<tr><td>"+crop.pname+"</td><td>"+crop.sname+"</td><td>"+cropStage+"</td></tr>";
              }
            });
            cropList = document.getElementById('crop_list');
            cropList.innerHTML = elements;
          },

          error: function(responce) {

          }
        });
        
        hideAddCropPopup();
      }

      function add_land(farmerId) {
        console.log("Add land method get called");
        landName = document.getElementById('landname').value;
        landArea = document.getElementById('landarea').value;
        landStage = document.getElementById('landstage').value;
        soilType = document.getElementById('soiltype').value;
        
        if(landName.trim() === ""){
          alert("String is empty");
          return;
        }

        if(landArea === "" || Number(landArea) <= 0){
          alert("Enter viled land value");
          return;
        }

        if(landStage == ""){
          alert("Select land stage");
          return;
        }

        if(soilType == ""){
          alert("Select a soil type")
          return;
        }
        console.log("Name: " + landName + "Stage " + landStage + "Area: "+ landArea + " SoilType: " + soilType);
        $.ajax({
          url:'add_new_land.php',
          type: 'POST',
          data: {farmerid:farmerId, land_name: landName, land_area: landArea, land_stage: landStage, soil_type: soilType},
          success: function(responce) {
            console.log("responce is inside the function" + responce);
            lands = JSON.parse(responce);
            elements = "";
            lands.forEach(function(land){
              if(!(land.stage == undefined && land.name == undefined)){

                landStage = "";
                if(land.stage == "BRAN")
                  landStage = "Baren land";
                else if(land.stage == "PLOD")
                  landStage = "Plodded";
                else if(land.stage == "CROP")
                  landStage = "Crop Planted";

                elements = elements + "<tr><td>"+land.name+"</td><td>"+landStage+"</td></tr>";
              }
              });
            landList = document.getElementById('land_list');
            landList.innerHTML = elements;
          },

          error: function(responce) {

          }
        });
        hideAddLandPopup();

        console.log("returning from the function " + landname);
      }

      function list_clicked() {
        alert('List clicked');
      }
    </script>
 </body>
 </html>