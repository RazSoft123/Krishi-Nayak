<?php

    require_once('rdb_config.php');

    $cmntData = array();

    function sendComments($postid, $conn){
        $data = array();
        $query = "SELECT * FROM comments WHERE post_id =".$postid." ORDER BY comment_date DESC";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "There was an erro in featching comments";
        }

        $farmerName = "";
        if( ($tcmnt = mysqli_num_rows($result))>0){
            $data[] = array("tcmnt" => $tcmnt);             //tcmnt is for total comment on the post
            while($row = mysqli_fetch_assoc($result)){
                $query2 = "SELECT name FROM farmer_info WHERE farmer_id=".$row["farmer_id"];
                $result2 = mysqli_query($conn, $query2);
                if(!$result2){
                    echo "There was an error";
                }
                if(mysqli_num_rows($result2) > 0){
                    $fname = mysqli_fetch_assoc($result2);
                // echo $fname["name"];
                    $farmerName = $fname["name"];
                    //echo "Farmer name is ".$farmerName;
                // echo print_r($keys = array_keys($fname));

                }else {
                    $farmerName = "Farmer Name";
                }

                $text = $row["text"];

                $data[] = array("name" => $farmerName, "text" => $text);

            }
        }

        return $data;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST["postid"]) && isset($_POST["farmerid"]) && isset($_POST["text"]) ){

            $query = "INSERT INTO comments (comment_id, post_id, farmer_id, text, comment_date) VALUES (NULL, ".$_POST["postid"].", ".$_POST["farmerid"].",'".$_POST["text"]."', CURRENT_TIMESTAMP())";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "Error in comment inserting";
            }
            $cmntData = sendComments($_POST['postid'], $conn);
        }    
    }


    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['postid']) ){
            $cmntData = sendComments($_GET['postid'], $conn);
        }
    }
    
    $json = json_encode($cmntData);
    echo $json;
?>