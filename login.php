<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Krishi Nayak</title>
    <!--Bootstrap library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--My Own style element-->
    <link rel="stylesheet" href="./style/style.css">
    <style>
        body {
            background-color: lightgreen;
            color: black; 
        }

        .login-form {
            max-width: 450px;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 60px;
            padding-right: 60px;
            margin: 0 auto;
            border: 2px solid lightgreen; 
            border-radius: 5px;
            background-color: white;
        }
        .login-form > h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-label {
            color: #888; 
        }
        
        .container {
            height: 80vh;
            display: flex;
            align-items: center;
        }
        .btn-primary{
            background-color: lightgreen;
            color: black;
            border: 1px solid lightgreen ;
        }
        .btn-primary:hover{
            background-color: black;
            color: lightgreen;
        }
        .extraOptions{
            font-size: smaller;
            margin-top: 10px;
        }
        .extraOptions a {
            text-decoration: none;
        }
    </style>
</head>
<body>

      <!--Navigation Bar of the website-->
      <nav class="navbar navbar-expand-lg " >
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.html">कृषि नायक</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./blog.html">Blog</a>
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
session_start();
    //echo "THis is working";
    // Establishing connection with the mysql database to list the all database tables. 
    
    require_once('rdb_config.php');

    // Function to sanitize user input (prevent SQL injection)
    /*
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    */

    $mobile = $pass = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $mobile = $_POST["mobile"];
        $pass = $_POST["password"];

       // echo "User name ".$mobile."<br/> "."Password ".$pass;
    }
    //echo "Connected successfully <br/>";

    $query ="select * from login_info where phone_no = ".$mobile;
    $result = mysqli_query($conn, $query);

    if(!$result){
        //echo "Error ".$result;
        echo "<h2> An internal error occured </h2>";
    }

    $userFound = FALSE;
    $passwordMatched = False;

    //Showing the number of rows
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
         // echo $row["phone_no"];
         // echo "<br/>";
         // echo $row["password"];

          if($mobile == $row["phone_no"]){
           // echo "<br /> User found";
            $userFound = TRUE;
          }else {
            echo "<h2> User not found with this mobile no <a href='./login.html'>Try again </a> </h2> <p> Try to <a href='./signup.html'>SignUP</a>";
          }
          if($pass == $row["password"]){
           // echo "<br/> password matched";
            $passwordMatched = TRUE;
          }else {
            echo "<h2>Incorrect password <a href='./login.html'>Try again </a> </h2>";
          }
        }
      } else {
        echo "<h2>We don't have an account with this mobile no. Try to <a href='./signup.html'>signUP</a></h2>";
      }

      if($userFound && $passwordMatched){
        echo "<h2>Login Successful click ok for dashboard </h2><a class='loginButton' href='./dashboard.php'>OK</a>";
        
        $query ="SELECT farmer_id FROM farmer_info WHERE phone_no = '".$mobile."'";
        $result = mysqli_query($conn, $query);
    
        if(!$result){
            echo "Error ".$result;
        }

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<br /> Farmer id".$row["farmer_id"];
                if(session_status() === PHP_SESSION_ACTIVE){
                  echo "session is already active";
                }else {
                  echo "session is not active";
                  session_start();
                  echo "session is started";  
                }
                //session_start();
                $_SESSION['farmerid'] = $row["farmer_id"];

                /*
                echo "<br /> Farmer name".$row["name"];
                echo "<br /> Farmer email".$row["email"];
                echo "<br /> Farmer phone Numeber".$row["phone_number"];
                echo "<br /> Farmer  location".$row["location"];
                echo "<br /> Farmer state".$row["state"];
                echo "<br /> Farmer distric".$row["distric"];
                echo "<br /> Farmer block".$row["block"];
                echo "<br /> Farmer pin".$row["pin"];
                echo "<br /> Farmer signup date".$row["created_at"];
                */
            }
        }
      }

    // Close connection (example)
    mysqli_close($conn);
?>
    </div>
</body>
</html>


<?php
/*
    echo "THis is working";

    // Establishing connection with the mysql database to list the all database tables. 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "krishi_nayak";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Function to sanitize user input (prevent SQL injection)
    /*
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    */
/*
    $mobile = $pass = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $mobile = $_POST["mobile"];
        $pass = $_POST["password"];

        echo "User name ".$mobile."<br/> "."Password ".$pass;
    }
    echo "Connected successfully <br/>";

    $query ="select * from login_info where phone_no = ".$mobile;
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "Error ".$result;
    }

    $userFound = FALSE;
    $passwordMatched = False;

    //Showing the number of rows
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo $row["phone_no"];
          echo "<br/>";
          echo $row["password"];

          if($mobile == $row["phone_no"]){
            echo "<br /> User found";
            $userFound = TRUE;
          }
          if($pass == $row["password"]){
            echo "<br/> password matched";
            $passwordMatched = TRUE;
          }else {
            echo "<br/>Incorrect password";
          }
        }
      } else {
        echo "We don't have an account with this mobile no. <br/> Try to signUP";
      }

      if($userFound && $passwordMatched){
        $query ="SELECT * FROM farmer_info WHERE phone_number = ".$mobile;
        $result = mysqli_query($conn, $query);
    
        if(!$result){
            echo "Error ".$result;
        }

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<br /> Farmer id".$row["farmer_id"];
                echo "<br /> Farmer name".$row["name"];
                echo "<br /> Farmer email".$row["email"];
                echo "<br /> Farmer phone Numeber".$row["phone_number"];
                echo "<br /> Farmer  location".$row["location"];
                echo "<br /> Farmer state".$row["state"];
                echo "<br /> Farmer distric".$row["distric"];
                echo "<br /> Farmer block".$row["block"];
                echo "<br /> Farmer pin".$row["pin"];
                echo "<br /> Farmer signup date".$row["created_at"];
            }
        }
    
      }



    // Close connection (example)
    mysqli_close($conn);
  */
?>