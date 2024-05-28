
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
   // echo "Php is working";

    //Establish the connection
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

    //Assigning all the variables with proper data type
    $name = $email = $phone_no = $location = $state = $distric = $block = $pin = $exprienceLevel = $userPass = "";


    //Checking if the data come from the post method
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["username"];
        $email = $_POST["email"];
        $phone_no = $_POST["mobile"];
        $state = $_POST["state"];
        $distric = $_POST["distric"];
        $block = $_POST["block"];
        $address = $_POST["address"];
        $pin = $_POST["pincode"];
        $exprienceLevel = $_POST["experiencelevel"];
        $userPass = $_POST["password"];
    }

    //Checking if mobile no already exist in to the database.
    $query = "SELECT * FROM login_info WHERE phone_no = '".$phone_no."'";
    //echo "Query is ".$query;
    $result = mysqli_query($conn, $query);
    if(!$result){
        //echo "Error in query".$result;
        echo "<h2> There was an internal error. <a href='./signup.html'>Click here...</a></h2>";
    }

    if(mysqli_num_rows($result) > 0){
        echo "<h2>User with this mobile no already exist try <a href='./login.html'>LogIn</a></h2>";
    }else {

        // Generate a unique UUID in MySQL
        $sql = "SELECT UUID() AS unique_id";
        $result = $conn->query($sql);
        $uuid = "";
        if ($result->num_rows > 0) {
            // Fetch the UUID
            $row = $result->fetch_assoc();
            $uuid = $row['unique_id'];
            $uuid = substr($uuid, 0, 8);
        }
        $tempNames = explode(' ', $name);
        $username = $tempNames[0].$uuid."";
        $query = "INSERT INTO farmer_info (farmer_id, username ,name, email, phone_no, address, state, district, block, pin, exprience, join_date) VALUES (NULL,'".$username."','".$name."','".$email."','".$phone_no."','".$address."','".$state."','".$distric."','".$block."','".$pin."','".$exprienceLevel."', current_timestamp())";

       // echo "<br /> Second query ".$query ;

        $result = mysqli_query($conn,$query);
        if(!$result){
           // echo "Some internal error occured".$result;
           echo "<h2>Some internal error occured <a href='./signup.html'>Try again...</a></h2>";
        }else {
            echo "Signup is Successful <a href='./dashboard.php'>Click here... </a>";
            $query = "SELECT farmer_id FROM farmer_info WHERE phone_no = '".$phone_no."'";
            $result = mysqli_query($conn ,$query);
            $farmer_id = 0;
            if(!$result){
                echo "error".$result;
            }else {
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $farmer_id = $row["farmer_id"];
                    }
                }
            }
            $query = "INSERT INTO login_info (farmer_id,phone_no, password) VALUES ('".$farmer_id."','".$phone_no."','".$userPass."')";
            $result = mysqli_query($conn, $query);

            //Creating a session
            $query ="SELECT farmer_id FROM farmer_info WHERE phone_no = '".$phone_no."'";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "Error ".$result;
            }
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    //echo "<br /> Farmer id".$row["farmer_id"];
                    session_start();
                    $_SESSION['farmerid'] = $row["farmer_id"];
                }
            }

                if(!$result){
                    //echo "Error in query".$result;
                }
            }

        }


?>

    </div>
</body>
</html>

<!-- Previous PHP code version 0.1 -->
<?php
/*
    echo "Php is working";

    //Establish the connection
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

    //Assigning all the variables with proper data type
    $name = $email = $phone_no = $location = $state = $distric = $block = $pin = $exprienceLevel = $userPass = "";


    //Checking if the data come from the post method
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["username"];
        $email = $_POST["email"];
        $phone_no = $_POST["mobile"];
        $state = $_POST["state"];
        $distric = $_POST["distric"];
        $block = $_POST["block"];
        $address = $_POST["address"];
        $pin = $_POST["pincode"];
        $exprienceLevel = $_POST["experiencelevel"];
        $userPass = $_POST["password"];
    }

    //Checking if mobile no already exist in to the database.
    $query = "SELECT * FROM login_info WHERE phone_no = ".$phone_no;
    echo "Query is ".$query;
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Error in query".$result;
    }

    if(mysqli_num_rows($result) > 0){
        echo "User with this mobile no already exist try LogIn insted";
    }else {
        $query = "INSERT INTO farmer_info (farmer_id, name, email, phone_number, location, state, distric, block, pin, created_at) VALUES (NULL,'".$name."','".$email."','".$phone_no."','".$address."','".$state."','".$distric."','".$block."','".$pin."', current_timestamp())";

        echo "<br /> Second query ".$query ;

        $result = mysqli_query($conn,$query);
        if(!$result){
            echo "Some internal error occured".$result;
        }else {
            echo "Signup is Successful ";
            $query = "INSERT INTO login_info (phone_no, password) VALUES ('".$phone_no."','".$userPass."')";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "Error in query".$result;
            }
        }

    }

*/
?>