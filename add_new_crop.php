<?php
    require_once('rdb_config.php');
    $data = array();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if(!isset($_POST['farmerid'])){
                echo "Not getting correct data";
            }
            $insertCrop = "INSERT INTO crop_info (crop_id, plantation_date, current_stage, land_id, seed_id, farmer_id) VALUES (NULL, '".$_POST['showing_date']."', '".$_POST['current_stage']."', ".$_POST['land_id'].", ".$_POST['seed_id'].", ".$_POST['farmerid'].")";
            $restlt = mysqli_query($conn, $insertCrop);
            
            if(!$restlt){
                echo "there was an error in insering data";
            }            
            /*
            if(!$restlt){
                $data[] = array("message" => "An unexpected error is occured "); 
            }
            */
            $cropInfo = "SELECT * FROM crop_info WHERE farmer_id = ".$_POST['farmerid'];
            $restlt = mysqli_query($conn, $cropInfo);

            $seedName = "";
            $plantName = "";
            $cropStage = "";

            if(mysqli_num_rows($restlt) > 0){
                while($row = mysqli_fetch_assoc($restlt)){

                    $cropStage = $row['current_stage'];
                    //Getting seed info 
                    $seedQuery = "SELECT seed_name,plant_id FROM seed_info WHERE seed_id=".$row['seed_id'];
                    $seedResult = mysqli_query($conn, $seedQuery);
                    if(mysqli_num_rows($seedResult) > 0){
                        $seedRow = mysqli_fetch_assoc($seedResult);
                        $seedName = $seedRow['seed_name'];
                        $plantQuery = "SELECT plant_name FROM plant_info WHERE plant_id =".$seedRow['plant_id'];
                        $plantResult = mysqli_query($conn, $plantQuery);

                        if(mysqli_num_rows($plantResult) > 0){
                            $plantName = mysqli_fetch_assoc($plantResult)['plant_name'];
                        }
                    }

                    $data[] = array("pname" => $plantName, "sname" => $seedName, "cstage" => $cropStage);
                }
            }
        }else {
            echo "Server method is not post";
        }

    echo json_encode($data);
?>