<?php
    require_once('rdb_config.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['newpass']) && isset($_POST['oldpass'])){
            $query = "SELECT * from login_info WHERE farmer_id = ".$_POST['farmerid'];
            $result = mysqli_query($conn, $query);
            if($result){
                $row = mysqli_fetch_assoc($result);
                
                if($row['password'] == $_POST['oldpass']){
                    $updatePass = "UPDATE login_info SET password = '".$_POST['newpass']."' WHERE farmer_id = ".$_POST['farmerid'];
                    $result = mysqli_query($conn, $updatePass);
                    if($result){
                        echo "updated";
                    }
                }else {
                    echo "no_match";
                }
            }
        }else {
            echo "error";
        }
    }
?>