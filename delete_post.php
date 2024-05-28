<?php
    require_once('rdb_config.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['postid'])){
            echo $_GET['postid'];
            $query = "DELETE FROM posts WHERE post_id = ".$_GET['postid'];
            $result = mysqli_query($conn, $query);
            if($result){
                echo "post deleted";
            }
        }
    }
?>