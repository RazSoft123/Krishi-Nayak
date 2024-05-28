<?php

    require_once('rdb_config.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['farmerid'])){
            echo $_GET['farmerid'];
            $query = "DELETE FROM farmer_info WHERE farmer_id = ".$_GET['farmerid'];
            $result = mysqli_query($conn, $query);
            if($result){
                echo "Farmer deleted";
            }
        }
    }
    
?>