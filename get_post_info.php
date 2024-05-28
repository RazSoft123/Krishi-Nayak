<?php

    require_once('rdb_config.php');

    $data = "";
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['postid'])){
            $query = "SELECT * FROM posts WHERE post_id = ".$_GET['postid'];
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