<?php
    require_once('rdb_config.php');
    $data = array();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if(!isset($_POST['land_area'])){
                echo "Not getting correct data";
            }
            $insertLand = "INSERT INTO land_info (land_id, farmer_id, land_area, land_stage, crop_id, name, soil_type) VALUES (NULL,".$_POST['farmerid'].",".$_POST['land_area'].",'".$_POST['land_stage']."', NULL,'".$_POST['land_name']."','".$_POST['soil_type']."')";
            $restlt = mysqli_query($conn, $insertLand);
            
            if(!$restlt){
                echo "there was an error in insering data";
            }            
            /*
            if(!$restlt){
                $data[] = array("message" => "An unexpected error is occured "); 
            }
            */
            $landInfo = "SELECT * FROM land_info WHERE farmer_id = ".$_POST['farmerid'];
            $restlt = mysqli_query($conn, $landInfo);

            if(mysqli_num_rows($restlt) > 0){
                while($row = mysqli_fetch_assoc($restlt)){
                    $data[] = array("name" => $row['name'], "stage" => $row['land_stage']);
                }
            }
        }else {
            echo "Server method is not post";
        }

    echo json_encode($data);
?>