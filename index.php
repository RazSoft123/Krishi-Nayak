<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <title>Krishi Nayak -- Digital Farming platform</title>

        <!--Bootstrap library-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!--My Own style element-->
        <link rel="stylesheet" href="./style/style.css">
          <script src="./script/script.js" ></script>
      </head>
    <body>
        
        <!--Navigation Bar of the website-->
        <nav class="navbar navbar-expand-lg " >
            <div class="container-fluid">
              <a class="navbar-brand" href="./index.php">कृषि नायक</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./blog.php">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./community.php">Community</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./seedinfo.php">Seeds information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./aboutus.html">About us</a>
                  </li>
                </ul>
                <!--
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                -->
                <?php
                  if(session_status() === PHP_SESSION_ACTIVE){
                    //echo "Session is active for login button";
                    if(isset($_SESSION["farmerid"])){
                      //echo "login button set to none";
                      echo "<a class='loginButton' style='display:none' href='./login.html'>LogIn/SignUP</a>";
                      echo "<div class='r_dropdown_menu' style='display:flex'>";

                    }else {
                      //echo "login button set to flex";
                      echo "<a class='loginButton' style='display:flex' href='./login.html'>LogIn/SignUP</a>";
                      echo "<div class='r_dropdown_menu' style='display:none'>";
                    }
                  } else {
                   session_start();
                   if(isset($_SESSION["farmerid"])){
                    //echo "login button set to none";
                    echo "<a class='loginButton' style='display:none' href='./login.html'>LogIn/SignUP</a>";
                    echo "<div class='r_dropdown_menu' style='display:flex'>";

                  }else {
                    //echo "login button set to flex";
                    echo "<a class='loginButton' style='display:flex' href='./login.html'>LogIn/SignUP</a>";
                    echo "<div class='r_dropdown_menu' style='display:none'>";
                 
                  } 
                }
                  /*
                 <!-- <a class="loginButton" href="./login.html">LogIn/SignUP</a> -->
                  <!--
                  <li class="nav-item">
                    <a class="nav-link dropdown-toggle nav-user-icon" href="#" role="button" aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                -->
                  */
                  /*
                <!-- creating the user icon to click and option to logout -->
                  if(session_status() === PHP_SESSION_ACTIVE){
                    //echo "Session is active for div";
                    if(isset($_SESSION["farmerid"])){
                      //echo "div set to flex";
                      echo "<div class='r_dropdown_menu' style='display:flex'>";
                    }else {
                      //echo "div set to none";
                      echo "<div class='r_dropdown_menu' style='display:none'>";
                    }
                  }else {
                    echo "<div class='r_dropdown_menu' style='display:none'>";
                  }  
                  */  
                  ?>
                <div class="r_dropdown_menu">

                <div class="nav-user-icon-container">
                  <div class="nav-user-icon" id="usericon"></div>
                </div>
                <div class="nav-user-option" id="useroption">
                  <a href="./dashboard.php"> Dashboard </a>
                  <a href="./logout.php"> Logout </a>
                </div>
              </div>
            </div>
          </div>
        </nav>

<!--Navigation bar ends here-->

<!--
      <div>
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
--> 
    <!-- Body of the html page-->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">

      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
    
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./res/img/image_1.jpg" class="d-block w-100" alt="...">
          <!--
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
          -->
        </div>

        <div class="carousel-item">
          <img src="./res/img/image_2.jpg" class="d-block w-100" alt="...">
          <!--
          <div class="carousel-caption d-none d-md-block">
            <h5>second slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
          -->
        </div>

        <div class="carousel-item">
          <img src="./res/img/image_3.jpg" class="d-block w-100" alt="...">
          <!--
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
          -->
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

    </div>

    <!--Code to show the information about live Whether report-->
    <div >

    </div>
    <!--Code to show the live report of Mandi-->
    <div></div>
    <!--Blog information-->
    <div class="container-xl">
      <div class="card_continer"> 

        <a href="./Okra.html" class="r_card_link">
          <div class="card" style="width: 18rem;">
            <img src="./res/img/okra_cover.jpg" class="card-img-top" alt="Coriander blog image">
            <div class="card-body">
              <h5 class="card-title">भिण्डी की खेती</h5>
              <p class="card-text">भिण्डी एक लोकप्रिय सब्जी है। इसे लोग लेडीज फिंगर या ओकरा के नाम से भी जानते हैं। यह मुलतः उतरी अफ्रिका की सब्जी है। इसका वैज्ञानिक नाम है। भिण्डी कि खेती पुरे भारत में कि जाती है।</p>
            </div>
            <div class="card-body">
              <a href="./Okra.html" class="card-link">और पढे...</a>
            </div>
          </div>
        </a>


        <a href="./coriander.html" class="r_card_link">
          <div class="card" style="width: 18rem;">
            <img src="./res/img/Coriander_Image.jpg" class="card-img-top" alt="Coriander blog image">
            <div class="card-body">
              <h5 class="card-title">धनिया की खेती</h5>
              <p class="card-text">धनिया, कोथमीर या कॉरीऐंडर (Coriander) भारतीय रसोई में प्रयोग की जाने वाली एक सुगंधित हरी पत्ती है। धनिया 2 तरह की होती हैं।</p>
            </div>
            <div class="card-body">
              <a href="./coriander.html" class="card-link">और पढे...</a>
            </div>
          </div>
        </a>

        <a href="./tarbooj.html" class="r_card_link">
          <div class="card" style="width: 18rem;">
            <img src="./res/img/watermelon.jpg" class="card-img-top" alt="Coriander blog image">
            <div class="card-body">
              <h5 class="card-title">तरबूज की खेती</h5>
              <p class="card-text">तरबूज की खेती फल के रूप में की जाती है | भारत में इसे व्यापारिक तौर पर उगाया जाता है | जायद के मौसम में तरबूज की खेती मुख्य रूप से की जाती है |</p>
            </div>
            <div class="card-body">
              <a href="./tarbooj.html" class="card-link">और पढे...</a>
            </div>
          </div>
        </a>

        <a href="./bitter_gaurd.html" class="r_card_link">
          <div class="card" style="width: 18rem;">
            <img src="./res/img/bitter_gaurd.jpg" class="card-img-top" alt="Coriander blog image">
            <div class="card-body">
              <h5 class="card-title">करेला की खेती</h5>
              <p class="card-text">करेले का बोटेनीकल नाम मेमोरडिका करेंटिया है और यह कुकुरबिटेशियस परिवार से संबंधित है। इसे इसके औषधीय, पोषक, और अन्य स्वास्थ्य लाभों के कारण जाना जाता है। </p>
            </div>
            <div class="card-body">
              <a href="./bitter_gaurd.html" class="card-link">और पढे...</a>
            </div>
          </div>
        </a>

      </div>
    </div>

    <!--Footer section of the page-->
    <footer class="container-fluid r_footer">
      <div class="footer_container">
        <p>RazSoft all rights reserved @2024</p>
      </div>
    </footer>

    </body>
</html>