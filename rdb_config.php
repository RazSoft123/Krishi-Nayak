<?php
    //This page will configiure the database to accsible thorugh php codes
    //echo "THis is working";
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
        echo "<h2> Can't connect to server </h2>";
    }
?>