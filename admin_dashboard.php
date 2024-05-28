<?php
   if(!(session_status() === PHP_SESSION_ACTIVE)){
    session_start();
  }
  require_once('rdb_config.php');

  function createDashboard($conn) {
    require_once('rdb_config.php');
    echo "<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Admin panel - Krishi Nayak</title>
            <!--Bootstrap library-->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
            <!--My Own style element-->
            <link rel='stylesheet' href='./style/style.css'>
            <style>
                body {
                margin:0px;
                padding:0px;
                }

                .farmer_box{
                    margin-top: 20px;
                    justify-content: center;
                    align-items:center;
                }
            </style>
        </head>
        <body>
        
            <!--Navigation Bar of the website-->
            <nav class='navbar navbar-expand-lg ' >
            <div class='container-fluid'>
                <a class='navbar-brand' href='./index.php'>कृषि नायक</a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
                </button>
            </div>
            </nav>
            <div class='container-xl'>
                <div class='rshadow r_column farmer_box'>
                    <div>
                    <h2>Find Farmer with farmer id to delete</h2>
                    <select onchange='value_change()' name='select_farmer' id='select_farmer'>
                        <option value=''>Select farmer</option>";
                        
                        $farmerQuery = "SELECT * FROM farmer_info";
                        $farmerResult = mysqli_query($conn, $farmerQuery);
                        if($farmerResult){
                            if(mysqli_num_rows($farmerResult) > 0){
                                while($row = mysqli_fetch_assoc($farmerResult)){
                                    echo "<option value='".$row['farmer_id']."'>".$row['name']."</option>";
                                }
                            }else {
                                echo "<option value=''>An internal error occured</option>";
                            }
                        }else {
                            echo "<option value=''>An internal error occured 2</option>";
                        }

                    echo "</select>
                    <input type='number' min='0' id='farmer_id_input'  placeholder='Enter farmer Id'>
                    <button onclick='find_farmer()'>Search</button>
                    </div>
                    <div id='info_container'></div>
                    <button onclick='delete_farmer()' class='cmnt-btn' id='delete_farmer_btn' disabled>Delete farmer</button>
                </div>

                <div class='rshadow r_column farmer_box'>
                    <div>
                    <h2>Find post with post id to delete</h2>
                    <input type='number' min='0' id='post_id_input' placeholder='Enter post Id'>
                    <button onclick='find_post()'>Search</button>
                    </div>
                    <div id='post_container'></div>
                    <button onclick='delete_post()' class='cmnt-btn' id='delete_post_btn' disabled>Delete post</button>
                </div>
                
                <div class='rshadow r_column farmer_box'>
                    <div>
                    <h2>Enter new plant info</h2>
                    <input type='text' placeholder='Enter plant code' id='plant_code'>
                    <input type='text' placeholder='Enter plant name' id='plant_name'>
                    <input type='text' placeholder='Enter plant scintific name' id='plant_sname'>
                    <input type='text' placeholder='Enter plant other name' id='plant_oname'>
                    </div>
                    <button onclick='enter_plant()' class='cmnt-btn' id='enter_plant'>Enter plant</button>
                </div>

                <div class='rshadow r_column farmer_box'>
                    <div>
                    <h2>Enter new seed info</h2>
                    <div class='r_column'>
                    <div class='r_row'>
                    <select name='plant_name' id='seed_plant_name'>
                        <option value='' >Select plant name</option>";
                        $plantQuery = "SELECT * FROM plant_info";
                        $plantResult = mysqli_query($conn, $plantQuery);
                        if($plantResult)
                            echo "Error in plant info";
                        if(mysqli_num_rows($plantResult) > 0){
                            while($row = mysqli_fetch_assoc($plantResult)){
                                echo "<option value='".$row['plant_id']."' >".$row['plant_name']."</option>";
                            }
                        }
                        
                    echo "</select>
                    <input type='text' placeholder='Enter seed name' id='seed_name'>
                    <input type='text' placeholder='Enter source name' id='seed_source'>
                    </div>
                    <div class='r_row'>
                    <input type='text' placeholder='Enter summary' id='seed_summary'>
                    <input type='text' placeholder='Enter sowing period' id='seed_sowing_period'>
                    <input type='number' placeholder='Enter yeild time' id='seed_yeild_time'>
                    </div>
                    <div class='r_row'>
                    <input type='number' placeholder='Enter seed yeild' id='seed_yeild'>
                    <input type='text' placeholder='Enter seed strengths' id='seed_strengths'>
                    <input type='text' placeholder='Enter seed link' id='seed_link'>
                    </div>
                    </div>
                    </div>
                    <div id='post_container'></div>
                    <button onclick='enter_seed()' class='cmnt-btn' id='delete_post_btn'>Enter Seed</button>
                </div>

                <div class='rshadow r_column farmer_box'>
                    <div>
                    <h2>Enter new blog info</h2>
                    <input type='text' placeholder='Enter title of blog' id='plant_oname'>
                    <input type='text' placeholder='Enter summary of blog' id='plant_oname'>
                    <input type='text' placeholder='Enter url' id='plant_oname'>
                    </div>
                    <div id='post_container'></div>
                    <button onclick='enter_blog()' class='cmnt-btn' id='delete_post_btn' >Enter Blog</button>
                </div>
                <div class='r_notification rshadow' id='r_notification'></div>
            </div>";
    }

  if(($_SERVER["REQUEST_METHOD"] == 'POST') || isset($_SESSION['adminid'])){
    if(isset($_POST['adminid']) && isset($_POST['password'])){
        $query = "SELECT * FROM admin_login WHERE admin_id = ".$_POST['adminid'];
        $result = mysqli_query($conn, $query);
        if($result){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                if($row['password'] == $_POST['password']){

                    $_SESSION['adminid'] = $row['admin_id'];
                    //Show the dashboard for the admin panel 
                    createDashboard($conn);
                }
            }else {
                echo "<p>Incorrect Admin id, enter viled admin id and login again or contact site owner for new admin ID</P>";
                echo "<p>Click here to login <a href='./admin_login.html' > Login </a></P>";
            }
        }

    }else if(isset($_SESSION['adminid'])){
        createDashboard($conn);
    }
  }else {
    echo "Please login to see admin panel <a href='./admin_login.html>Click here </a>'";
}

?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./script/script.js" ></script>
        <script>
            function displayFarmerInfo(farmerId) {
                container = document.getElementById('info_container');
                $.ajax({
                    url: 'get_farmer_info.php',
                    type: 'GET',
                    data: {farmerid: farmerId},
                    success: function(res){
                        console.log(res);
                        data = JSON.parse(res);
                        if(data.name == undefined){
                            element = "<h1>No farmer with the farmer id</h1>";
                            document.getElementById('delete_farmer_btn').disabled = true;
                        }else{
                            document.getElementById('delete_farmer_btn').disabled = false;
                            element = "<h1>"+data.name+"</h1><p>Farmer Id: <span id='span_farmer_id'>"+data.farmer_id+"</span></P> <p>State: "+data.state+"</p>";
                        }
                        container.innerHTML = element;
                    },
                    
                    error: function(res){

                    }

                });
            } 

            function value_change(){
                farmerId = document.getElementById('select_farmer').value;
                console.log("Farmer id from select box" + farmerId);
                if(!(farmerId == undefined || farmerId == "")){
                    displayFarmerInfo(farmerId);
                }
            }

            function find_farmer(){
                farmerId = document.getElementById('farmer_id_input').value;
                console.log("Farmer id from text box"+farmerId);
                if(!(farmerId == undefined || farmerId == "")){
                    displayFarmerInfo(farmerId);
                }
            }

            function delete_farmer(){
                spanElement = document.getElementById('span_farmer_id');
                if(spanElement){
                    
                    farmerId = parseInt(spanElement.innerText);
                    console.log("Farmer id from the farmer" + farmerId);
                    $.ajax({
                    url: 'delete_farmer.php',
                    type: 'GET',
                    data: {farmerid: farmerId},
                    success: function(res){
                        console.log(res);
                        location.reload();
                    },
                    
                    error: function(res){
                        location.reload();
                    }

                    });
                }
            }

            function displayPostInfo(postId) {
                container = document.getElementById('post_container');
                $.ajax({
                    url: 'get_post_info.php',
                    type: 'GET',
                    data: {postid: postId},
                    success: function(res){
                        console.log(res);
                        data = JSON.parse(res);
                        if(data.text == undefined){
                            element = "<h1>No post with the post id</h1>";
                            document.getElementById('delete_post_btn').disabled = true;
                        }else{
                            document.getElementById('delete_post_btn').disabled = false;
                            element = "<p>"+data.text+"</p> <img src='"+data.image_url+"' >";
                        }
                        container.innerHTML = element;
                    },
                    
                    error: function(res){

                    }

                });
            } 

            function delete_post(){
                postId = document.getElementById('post_id_input').value;
                if(!(postId == undefined)){
                    
                    postId = parseInt(postId);
                    console.log("post id from the post" + postId);
                    $.ajax({
                    url: 'delete_post.php',
                    type: 'GET',
                    data: {postid: postId},
                    success: function(res){
                        console.log(res);
                        location.reload();
                    },
                    
                    error: function(res){
                        location.reload();
                    }

                    });
                }
            }

            function find_post(){ 
                postId = document.getElementById('post_id_input').value;
                console.log("post id from text box"+postId);
                if(!(postId == undefined || postId == "")){
                    displayPostInfo(postId);
                }
            }

            function checkEmptyElement(element){
                if(element.value == undefined || element.value.trim() == ""){
                element.focus();
                notification_show("This field can't be empty");
                return true;
                }
                return false;
            }

            function enter_plant() {
                plantCodeElement = document.getElementById('plant_code');
                plantNameElement = document.getElementById('plant_name');
                plantSnameElement = document.getElementById('plant_sname');
                plantOnameElement = document.getElementById('plant_oname');

                if(checkEmptyElement(plantCodeElement)) return;
                if(checkEmptyElement(plantNameElement)) return;
                if(checkEmptyElement(plantSnameElement)) return;
                if(checkEmptyElement(plantOnameElement)) return;

                $.ajax({
                    url: 'enter_plant_info.php',
                    type: 'POST',
                    data: {plant_code: plantCodeElement.value, name: plantNameElement.value, sname: plantSnameElement.value, oname: plantOnameElement.value},
                    success: function(res){
                        console.log(res);
                        
                    },
                    
                    error: function(res){

                    }

                });

            }

            function enter_seed() {
                plantNameElement = document.getElementById('seed_plant_name');
                seedNameElement = document.getElementById('seed_name');
                seedSourceElement = document.getElementById('seed_source');
                seedSummaryElement = document.getElementById('seed_summary');
                seedSowingPeriodElement = document.getElementById('seed_sowing_period');
                seedYeildTimeElement = document.getElementById('seed_yeild_time');
                seedYeildElement = document.getElementById('seed_yeild');
                seedStrengthsElement = document.getElementById('seed_strengths');
                seedLinkElement = document.getElementById('seed_link');

                if(checkEmptyElement(plantNameElement)) return;
                if(checkEmptyElement(seedNameElement)) return;
                if(checkEmptyElement(seedSowingPeriodElement)) return;
                if(checkEmptyElement(seedStrengthsElement)) return;
                if(checkEmptyElement(seedLinkElement)) return;

                $.ajax({
                    url: 'enter_seed_info.php',
                    type: 'POST',
                    data: {plantid: plantNameElement.value, seed_name: seedNameElement, seed_source: seedSourceElement.value, seed_summary: seedSummaryElement.value, seed_sowing_period: seedSowingPeriodElement.value, seed_yeild_time: seedYeildTimeElement.value, },
                    success: function(res){
                        console.log(res);
                        
                    },
                    
                    error: function(res){

                    }

                });
            }
        </script>
    </body>
</html>