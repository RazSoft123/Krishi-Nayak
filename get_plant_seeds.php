<?php
    require_once('rdb_config.php');

    $seedInfo = array();
    if(isset($_GET['plantid'])){

        $plantName = "";
        $plantQuery = "SELECT plant_name FROM plant_info WHERE plant_id = ".$_GET['plantid'];
        $plantResult = mysqli_query($conn, $plantQuery);
        if($plantResult){
            if(mysqli_num_rows($plantResult)){
                $plantName = mysqli_fetch_assoc($plantResult)['plant_name'];
            }
        }

        $query = "SELECT * FROM seed_info WHERE plant_id = ".$_GET['plantid'];
        $result = mysqli_query($conn, $query);
        if(!$result)
            echo "Error";

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $seedInfo[] = array("seed_name" => $row['seed_name'],"seed_id" => $row['seed_id'] ,"plant_name" => $plantName, "source" => $row['source'], "yeild" => $row['yeild'], "sowing_period" => $row['sowing_period']);
            }
        }else {
            $seedInfo[] = array("seed_name" => "","seed_id" => "" ,"plant_name" => "", "source" => "", "yeild" => "", "sowing_period" => "");
        }
    }

    echo json_encode($seedInfo);
?>