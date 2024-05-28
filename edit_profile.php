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

    <!--My Own style element-->
    <link rel="stylesheet" href="./style/style.css">

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
          flex-direction: column;
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
        .crop-list > div:hover {
          background-color: darkgreen;
          color: white;
        }

        .land-list{
          background-color: lightcoral;
        }
        .land-list > div:hover {
          background-color: brown;
          color: white;
        }
        .profile-img-upload{
          display:flex;
          flex-direction:column;
        }

        .r_input_box {
          height: 30px;
          padding: 10px;
          border-radius: 5px;
          font-size: 1.25rem;
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
                <a class="nav-link active" aria-current="page" href="./dashboard.php">dashboard</a>
              </li>
            </ul>
            <!--
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            -->
          </div>
        </div>
    </nav>

    <div class="container-xl">
      <?php

        require_once('rdb_config.php');

        $farmerid = "";
        if(isset($_SESSION["farmerid"])){
          global $farmerid;
          $farmerid = $_SESSION['farmerid'];
        }else {
  
          ini_set('display_errors', 0);
          header('Location: http://localhost/krishi_nayak/index.php');
          exit;

        }

        //Getting all the information form the farmer page
        $query = "SELECT * FROM farmer_info WHERE farmer_id = ".$farmerid;
        $result = mysqli_query($conn, $query);
        if(!$result)
          echo "There was an internal error in featching the mysql file";

        $row = "";
        if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
        }
        $profileImage = "";
        if($row['profile_img'] == null){
          $profileImage = "default.jpg";
          //echo "Profile image is null";
        }else {
          //echo "Profiel image is not null";
          $profileImage = $row['profile_img'];
        }

        //echo "Value of profile image is ".$profileImage;

       echo "<div class='user-info rshadow'>
          <div class='profile-img-upload'>
            <img src='".$profileImage."' width='150px' alt='User profile photo' id='profile_img'>
            <label for='uploadimage' class='post-button'>Upload Image</label>
            <input type='file' onchange='display_image()' name='uploadimage' id='uploadimage' accept='.jpg, .jpeg, .png, .gif' type='file' style='display:none;'>
          </div>
          
          <div class='user-info-display r_column '>
          <input type='text' class='r_input_box' value='".$row['name']."' placeholder='Enter your name' id='farmer_name'>
          <input type='number' class='r_input_box' value='".$row['phone_no']."' placeholder='Enter your name' id='farmer_phone_no'>
          <input type='email' class='r_input_box' value='".$row['email']."' placeholder='Enter your name' id='farmer_email'>
          <select name='farmer_gender'  id='farmer_gender' >
            <option value=''>Select your geneder</option>";
            if($row['gender'] == '' || $row['gender'] == 'None'){
              echo "<option value='M'>Male</option> <option value='F'>Female</option>";
            }else if($row['gender'] == 'M'){
              echo "<option value='M' selected>Male</option> <option value='F'>Female</option>";
            }else {
              echo "<option value='F' selected>Female</option> <option value='F'>Female</option>";
            }

          echo "</select>
          </div>
          <div class='edit-option'>
            <button onclick='update_info(".$farmerid.")' class='post-button' > Save </button>
          </div>
        </div>";
        
        // Address bar of the user
        echo "<div class='farm-stat rshadow'>
          <h1>Address</h1>
          <div class='r_row'>
          <div class='r_column'>
          <label for='farmer_state'>State: </label>
          <select name='farmer_state' id='farmer_state'>";
          
          //Getting states from the state state table
          $stateQuery = "SELECT * FROM states";
          $stateResult = mysqli_query($conn, $stateQuery);
          if(!$stateResult)
            echo "There was an error in state";
          
          if(mysqli_num_rows($stateResult) > 0){
            while($stateRow = mysqli_fetch_assoc($stateResult)){
              if($stateRow['state_code'] == $row['state']){
                echo "<option value ='".$stateRow['state_code']."' selected> ".$stateRow['name']."</option>";
              }else {
                echo "<option value ='".$stateRow['state_code']."' > ".$stateRow['name']."</option>";
              }
            }
          }

          echo "</select></div>
          <div class='r_column'> <label for='farmer_district'>District:</label> <input type='text' class='r_input_box' value='".$row['district']."' placeholder='Enter your district' id='farmer_district'> </div>
          <div class='r_column'> <label for='farmer_block'>Block:</label> <input type='text' class='r_input_box' value='".$row['block']."' placeholder='Enter your block' id='farmer_block'></div>
          <div class='r_column'> <label for='farmer_address'>Street address:</label> <input type='text' class='r_input_box' value='".$row['address']."' placeholder='Enter your address' id='farmer_address'> </div>
          <div class='r_column'> <label for='farmer_pin'>Pin code:</label> <input type='number' class='r_input_box' value='".$row['pin']."' placeholder='Enter your pin' id='farmer_pin'> </div>
          </div>
        </div>";

        echo "<div class='farm-stat rshadow'>
          <h1>Password</h1>
          <div class='r_row'>
            <input type='password'  class='r_input_box' placeholder='Enter old password' id='old_pass'>
            <input type='password'  class='r_input_box' placeholder='Enter new password' id='new_pass'>
            <input type='password'  class='r_input_box' placeholder='Confirm new password' id='con_pass'>
            <button onclick='change_pass(".$farmerid.")' class='post-button'>Update</button>
          </div>
          
        </div>";
        ?>
    </div>
    <div class="r_notification rshadow" id="r_notification"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./script/script.js" ></script>
    <script>
      function display_image() {
        pImage = document.getElementById('profile_img');
        pImage.src= URL.createObjectURL(document.getElementById('uploadimage').files[0]);
        //URL.createObjectURL(pifile.files[0])
      }

      function checkEmptyElement(element){
        if(element.value == undefined || element.value.trim() == ""){
          element.focus();
          notification_show("This field can't be empty");
          return true;
        }
        return false;
      }

      function update_info(farmerId){
        //Getting all the values and checking if the values are correct or not
        upImgElement = document.getElementById('uploadimage');
        fNameElement = document.getElementById('farmer_name');
        fEmailElement = document.getElementById('farmer_email');
        fNumberElement = document.getElementById('farmer_phone_no');
        fGenderElement = document.getElementById('farmer_gender');
        fStateElement = document.getElementById('farmer_state');
        fDistrictElement = document.getElementById('farmer_district');
        fAddressElement = document.getElementById('farmer_address');
        fPinElement = document.getElementById('farmer_pin');
        if(checkEmptyElement(fNameElement)) return;
        if(checkEmptyElement(fEmailElement)) return;
        if(checkEmptyElement(fNumberElement)) return;
        if(checkEmptyElement(fGenderElement)) return;
        if(checkEmptyElement(fStateElement)) return;
        if(checkEmptyElement(fDistrictElement)) return;
        if(checkEmptyElement(fAddressElement)) return;
        if(checkEmptyElement(fPinElement)) return;

        var farmerData = new FormData();
        if(!checkEmptyElement(upImgElement))
          farmerData.append('p_img', $('#uploadimage')[0].files[0]);
        else 
          farmerData.append('p_img', "");

        farmerData.append('farmerid', farmerId);
        farmerData.append('name', fNameElement.value);
        farmerData.append('number', fNumberElement.value);
        farmerData.append('email', fEmailElement.value);
        farmerData.append('gender', fGenderElement.value);
        farmerData.append('state', fStateElement.value);
        farmerData.append('district', fDistrictElement.value);
        farmerData.append('address', fAddressElement.value);
        farmerData.append('pin', fPinElement.value);

        $.ajax({
          url: 'update_farmer.php',
          type: 'POST',
          data: farmerData,
          contentType: false,
          processData: false,
          success: function(responce) {
            console.log(responce);
            window.location.replace("http://localhost/krishi_nayak/dashboard.php");
          },

          error: function(responce) {

          }
        });

      }

      function change_pass(farmerId) {
        oldPassElement = document.getElementById('old_pass');
        newPassElement = document.getElementById('new_pass');
        conPassElement = document.getElementById('con_pass');

        if(newPassElement.value == conPassElement.value){
          $.ajax({
            url: 'update_password.php',
            type: 'POST',
            data: {farmerid: farmerId ,oldpass: oldPassElement.value, newpass: newPassElement.value},
            success: function(responce) {
              console.log(responce);
              if(responce == "updated"){
                notification_show("Password updated");  
                window.location.replace("http://localhost/krishi_nayak/dashboard.php");  
              }else if(responce == "no_match"){
                notification_show("Wrong old password try again...", 3000);      
              }else {
                notification_show("There was an error in updating password.", 3000);
              }
              
            },

            error: function(responce) {

            }
          });
        }else {
          conPassElement.focus();
          notification_show("Confirm password doesn't match with New password", 3000);
        }

      }

    </script>

  </body>
</html>