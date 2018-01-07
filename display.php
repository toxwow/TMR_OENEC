<?php
@ob_start();
session_start();
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" href="../unify/favicon.ico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="../unify/assets/vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../unify/assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../unify/assets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="../unify/assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="../unify/assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="../unify/assets/vendor/icon-hs/style.css">
  <link rel="stylesheet" href="../unify/assets/vendor/animate.css">
  <link rel="stylesheet" href="../unify/assets/css/unify-core.css">
  <link rel="stylesheet" href="../unify/assets/css/unify-components.css">
  <link rel="stylesheet" href="../unify/assets/css/unify-globals.css">

  <script src="../unify/assets/vendor/jquery/jquery.min.js"></script>
  <script src="../unify/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
  <script src="../unify/assets/vendor/jquery.easing/js/jquery.easing.js"></script>
  <script src="../unify/assets/vendor/popper.min.js"></script>
  <script src="../unify/assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../unify/assets/js/hs.core.js"></script>
  <script  src="../unify/assets/js/components/hs.rating.js"></script>


<style>
  #footer {
   position:fixed;
   left:0px;
   bottom:0px;
   height:100px;
   width:100%;
   background:#999;
}

/* IE 6 */
* html #footer {
   position:fixed;
   top:expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
}
</style>
</head>

<body>
    <header id="js-header" class="u-header u-header--sticky-top u-header--change-appearance" data-header-fix-moment="300">
      <div class="u-header__section u-header__section--dark g-bg-black-opacity-0_7 g-transition-0_3 g-py-10" data-header-fix-moment-exclude="g-py-10" data-header-fix-moment-classes="u-shadow-v18 g-py-0">
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <!-- Responsive Toggle Button -->
            <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </span>
            </button>
            <!-- End Responsive Toggle Button -->
            <!-- Logo -->
            <a class="navbar-brand" style="opacity: 0.85;" href="index.php">
              <img src="img/logo1.png" alt="Image Description">
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
              <ul id="js-scroll-nav" class="navbar-nav text-uppercase g-font-weight-600 ml-auto">
                <li class="nav-item g-mx-20--lg active">
                  <a href="index.php" class="nav-link px-0">Home
                <span class="sr-only">(current)</span>
              </a>
                </li>
                <li class="nav-item g-mx-20--lg">
                  <a href="#about-section" class="nav-link px-0">Repozytorium

              </a>
                </li>
                <li class="nav-item g-mx-20--lg">
                  <a href="produkty.php" class="nav-link px-0">Pobrane produkty

              </a>
                </li>

              </ul>
            <!-- End Navigation -->
          </div>
        </nav>
      </div>
    </header>

   <!-- Hero Info #13 -->

<!-- Hero Info #07 -->



<?php

$servername = "localhost";
$username   = "tommarst_ceneo";
$password   = "szarek";
$dbname     = "tommarst_ceneo";

$id = $_SESSION["IDPRODUCT"];
$Model = $_SESSION["model"];
$Brand = $_SESSION["brand"];
$Warianty = $_SESSION["warianty"];
$Warianty_Extra = $_SESSION["warianty_extra"];
$Kategorie = $_SESSION["category"];
$liczba_opini = $_SESSION["opinie_licza"];

if ($liczba_opini > 11){
$opinie = json_decode($_SESSION['opinie_all'],1);
$gwiazdki = json_decode($_SESSION['gwiazdki_all'],1);
$yes = json_decode($_SESSION['yes_all'],1);
$no = json_decode($_SESSION['no_all'],1);

$autor = json_decode($_SESSION['autor_all'],1);
$time = json_decode($_SESSION['time_all'],1);
$recommended = json_decode($_SESSION['recommended_all'],1);
}

else{
$opinie = json_decode($_SESSION['opinie'],1);
$gwiazdki = json_decode($_SESSION['gwiazdki'],1);
$yes = json_decode($_SESSION['yes'],1);
$no = json_decode($_SESSION['no'],1);

$autor = json_decode($_SESSION['autor'],1);
$time = json_decode($_SESSION['time'],1);
$recommended = json_decode($_SESSION['recommended'],1);
}


$conn = new mysqli($servername, $username, $password, $dbname);
if (is_null($Warianty)) {
		$sql = "INSERT INTO Ceneo (ID, BRAND, MODEL, EXTRA, CATEGORY)
		VALUES ('$id', '$Model', '$Brand', '$Warianty_Extra', '$Kategorie' )";

	}
else{
$sql = "INSERT INTO Ceneo (ID, BRAND, MODEL, EXTRA, CATEGORY)
VALUES ('$id', '$Model', '$Brand', '$Warianty', '$Kategorie' )";
}

if ($conn->query($sql) === TRUE) {
  
  for($i=0; $i<$liczba_opini; $i++){
  $opinie[$i] = mysqli_real_escape_string($conn, $opinie[$i]);
  $sql1 = "INSERT INTO Opinie (ID, OPINIE, GWIAZDKI, POMOCNA, NIEPOMOCNA, AUTOR, DATA, POLECAM)
   VALUES ('$id', '$opinie[$i]', '$gwiazdki[$i]', '$yes[$i]', '$no[$i]', '$autor[$i]','$time[$i]', '$recommended[$i]')";
   $conn->query($sql1);

}
  echo "
  <section class='g-pt-100 g-mt-30'>
  <div class='container text-center'>
  <!-- Hero Info #07 -->
  <section class='g-py-200--md g-py-80'>
     <div class='container text-center'>
        <div class='row'>
           <div class='col-md-8 ml-md-auto mr-md-auto'>
              <div class='u-heading-v7-2 g-mb-30'>
                 <h2 class='display-4 u-heading-v7__title g-mb-20'>PROCES LOAD <br> WYKONANO
                    <span class='g-color-primary'>POMYŚLNIE</span>
                 </h2>
                 <i class='fa fa-star g-color-primary g-font-size-70x'></i>
                 <i class='fa fa-star g-font-size-95x g-color-primary'></i>
                 <i class='fa fa-star g-color-primary'></i>
                 <i class='fa fa-star g-font-size-95x g-color-primary'></i>
                 <i class='fa fa-star g-font-size-70x g-color-primary'></i>
              </div>
              <p class='lead g-mb-60'>Do bazy danych załadowano produkt o ID: $id <br> oraz $liczba_opini rekordów opini.  </p>
              <a class='js-fancybox-media btn btn-xl u-btn-primary' href='produkty.php' data-close-effect='flipOutY' data-open-speed='1000' data-close-speed='1000'>
              Zobacz wszystkie pobrane produkty
              </a>
           </div>
        </div>
     </div>
  </section>
  ";
} 
else {
  echo "
<section class='g-pt-100 g-mt-30'>
<div class='container text-center'>
<!-- Hero Info #07 -->
<section class='g-py-200--md g-py-80'>
   <div class='container text-center'>
      <div class='row'>
         <div class='col-md-8 ml-md-auto mr-md-auto'>
            <div class='u-heading-v7-2 g-mb-30'>
               <h2 class='display-4 u-heading-v7__title g-mb-20'>UPS! PROCES LOAD <br> WYKONANO
                  <span class='g-color-red'>NIEPRAWIDŁOWO</span>
               </h2>
               <i class='fa fa-star g-color-red g-font-size-70x'></i>
               <i class='fa fa-star g-font-size-95x g-color-red'></i>
               <i class='fa fa-star g-color-red'></i>
               <i class='fa fa-star g-font-size-95x g-color-red'></i>
               <i class='fa fa-star g-font-size-70x g-color-red'></i>
            </div>
            <p class='lead g-mb-60'>Upewnij się, że pobrany produkt nie znajduję się w bazie naszych produktów. </p>
            <a class='js-fancybox-media btn btn-xl u-btn-primary' href='produkty.php' data-close-effect='flipOutY' data-open-speed='1000' data-close-speed='1000'>
            Zobacz wszystkie pobrane produkty
            </a>
         </div>
      </div>
   </div>
</section>";
}

$conn->close();
session_destroy();
?>


</div>
</section>
</body>
</html>
