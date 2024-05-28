<?php

    require_once('rdb_config.php');

    $data = "";
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['seed_id'])){
            $query = "SELECT * FROM seed_info WHERE seed_id = ".$_GET['seed_id'];
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