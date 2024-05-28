<?php
    require_once('rdb_config.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['plant_code']) && isset($_POST['name'])){
            $query = "INSERT INTO plant_info(plant_id, plant_code, plant_name, scientific_name, other_name) VALUES ( null, '".$_POST['plant_code']."', '".$_POST['name']."', '".$_POST['sname']."', '".$_POST['oname']."')";

            $result = mysqli_query($conn, $query);
            if($result){
                echo "Successfully inserted palnt information";
            }
        }
    }
?>