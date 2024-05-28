<?php
    require_once("rdb_config.php");

    $data = array (
        "liked" => false,
        "tlikes" => 0,
        "text" => ""
    );
    
    if(isset($_POST["postid"]) && isset($_POST["farmerid"]) ){
        
        $query = "SELECT * FROM likes WHERE farmer_id = ".$_POST["farmerid"]." AND post_id = ".$_POST["postid"];
        $result = mysqli_query($conn, $query);

        if(!$result){
            $data["text"] = $data["text"]."Error : Can't featch data from likes table";
        }

        if(mysqli_num_rows($result) == 0){
            $query = "INSERT INTO likes (farmer_id, post_id) VALUES (".$_POST["farmerid"].",".$_POST["postid"].")";
            $result = mysqli_query($conn, $query);
            if(!$result){
                $data["text"] = $data["text"]."Error : Can't add like to likes table";
            }
            $data["liked"] = true;

        }else {
            $query = "DELETE FROM likes WHERE farmer_id = ".$_POST["farmerid"]." AND post_id = ".$_POST["postid"];
            $result = mysqli_query($conn, $query);
            if(!$result){
                $data["text"] = $data["text"]."Error : Can't delete like form likes table";
            }
            $data["liked"] = false;
        }

        //Calculating the total like in the like table
        $query = "SELECT * FROM likes WHERE post_id = ".$_POST['postid'];
        $result = mysqli_query($conn, $query);
        if(!$result){
            $data["text"] = $data["text"]."Error : Can't featch total likes from likes table";
        }
        $data["tlikes"] = mysqli_num_rows($result);

    }else {
        $data["text"] = $data["text"]."Error : There was an error occured during data transfer";
    }

    echo json_encode($data);
?>