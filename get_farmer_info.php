<?php

    require_once('rdb_config.php');

    $data = "";
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['farmerid'])){
            $query = "SELECT * FROM farmer_info WHERE farmer_id = ".$_GET['farmerid'];
            $result = mysqli_query($conn, $query);
            if($result){
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $data = $row;
                }
            }
        }
    }

    echo json_encode($data);
?>