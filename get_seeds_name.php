<?php
    require_once('rdb_config.php');

    $seedInfo = array();
    if(isset($_GET['plantid'])){
        $query = "SELECT seed_name, seed_id FROM seed_info WHERE plant_id = ".$_GET['plantid'];
        $result = mysqli_query($conn, $query);
        if(!$result)
            echo "Error";

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $seedInfo[] = array("name" => $row['seed_name'], "id" => $row['seed_id']);
            }
        }else {
            $seedInfo[] = array("name" => "", "id" => "");
        }
    }

    echo json_encode($seedInfo);
?>