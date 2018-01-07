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
   position:absolute;
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
   <section class="g-pt-100 g-mt-30">
   <div class="container text-center">
    
    <?php
    include ("function_extract.php");
    ?>

  </div>
  </section>

</body>
</html>
