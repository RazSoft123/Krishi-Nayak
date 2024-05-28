<?php
    require_once('rdb_config.php');
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_FILES['p_img'])){
            if(!empty($_FILES["p_img"]["name"])){

                $temp = explode(".", $_FILES["p_img"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $target_file = "./res/profileimg/".$_POST['farmerid'].$newfilename;
                $uploadOk = 1;

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
    
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file)) {
                    
                    //making entry into database;
                    $query = "UPDATE farmer_info SET profile_img = '".$target_file."' WHERE farmer_id = ".$_POST['farmerid'];
                    
                    $result = mysqli_query($conn, $query);
                    if(!$result){
                        //echo "Error in query".$result;
                        echo "<h2> There was an internal error. <a href='./signup.html'>Click here...</a></h2>";
                    }
                }
            }
                      
            }
        }
        
        $updateQuery = "UPDATE farmer_info SET name = '".$_POST['name']."', phone_no= '".$_POST['number']."', email = '".$_POST['email']."', gender='".$_POST['gender']."', state= '".$_POST['state']."', district = '".$_POST['district']."', address = '".$_POST['address']."', pin = '".$_POST['pin']."' WHERE farmer_id = ".$_POST['farmerid'];

        $updateResult = mysqli_query($conn, $updateQuery);
        if($updateQuery){
            echo "SUCESS";
        }else {
            echo "FAIELD";
        }

    }
?>