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
	<script src="../unify/assessssssts/vendor/jquery-migrate/jquery-migrate.min.js"></script>
	<script src="../unify/assets/vendor/jquery.easing/js/jquery.easing.js"></script>
	<script src="js/jqueryblockUI.js"></script>
	<script src="js/scripts.js"></script>
	<script src="../unify/assets/vendor/popper.min.js"></script>
	<script src="../unify/assets/vendor/bootstrap/bootstrap.min.js"></script>

<style>
#footer
{
	position:static;
	left:0px;
	bottom:0px;
	height:100px;
	width:100%;
	background:#999;
}

* html #footer
{
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
         <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
         <span class="hamburger hamburger--slider">
         <span class="hamburger-box">
         <span class="hamburger-inner"></span>
         <i class="icon-list"></i>
         </span>
         </span>
         </button>
         <!-- Logo -->
         <a class="navbar-brand" style="opacity: 0.85;" href="index.php"> <img src="img/logo1.png" alt="Image Description"></a>
         <!-- Nawigacja -->
         <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
            <ul id="js-scroll-nav" class="navbar-nav text-uppercase g-font-weight-600 ml-auto">
               <li class="nav-item g-mx-20--lg active">
                  <a href="index.php" class="nav-link px-0">Home<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item g-mx-20--lg">
                  <a href="#about-section" class="nav-link px-0">Repozytorium</a>
               </li>
               <li class="nav-item g-mx-20--lg">
                  <a href="produkty.php" class="nav-link px-0">Pobrane produkty</a>
               </li>
            </ul>
         </div>
   <!-- End Nawigacja -->
   </nav>
   </div>
</header>

   <!-- Gif -->
<section class="g-pt-100 g-mt-30">
   <div class="container text-center">
      <img class="img-fluid g-mb-40 img-b" src="../unify/assets/img-temp/900x535/img12.gif" alt="Image Description">
   </div>
</section>
<!-- Wyszukiwarka -->
<section class="g-bg-gray-light-v5 g-pa-40">
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-sm-12 align-self-center">
            <h2 class="h3 text-uppercase g-font-weight-300 g-mb-20 g-mb-0--md">Przeprowadz proces
               <strong>extract</strong> lub <strong> ETL </strong>
            </h2>
         </div>
         <div class="col-md-5 col-sm-12 align-self-center">
            <form name="form_js"  method="post">
               <div class="input-group g-brd-primary--focus">
                  <div class="input-group-addon g-color-gray-light-v1 g-bg-transparent rounded-0">
                     <i class="fa fa-barcode"></i>
                  </div>
                  <input type="text" id="id_product" class="form-control form-control-sm g-font-size-default g-bg-transparent g-bg-transparent--focus rounded-0 "  pattern="\d*" type="email" placeholder="Wprowadz numer ID produktu" name="id_product" required >
                  <div class="input-group-btn">
                     <button formaction="extract.php" type="submit" class="btn u-btn-primary rounded-0" id="przycisk_js1" style="width: 90px;">Extract</button>
                     <button formaction="etl.php" type="submit" class="btn u-btn-lightred rounded-0" id="przycisk_js" style="width: 90px;">ETL</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- Stopka -->
<footer id="footer" class="g-bg-black-opacity-0_9 g-color-white-opacity-0_8 text-center g-pt-15 g-pb-10">
   <div class="container">
   <a class="d-block g-width-200 g-opacity-0_5 mx-auto g-mb-10" href="index.php">
   <img class="img-fluid" src="img/logo1.png" alt="Logo">
   </a>
   <small class="g-font-size-default">2017 All right reserved. Design and Code by
   <a class="g-color-white" href="http://www.ttomzynski.pl">T.Tomzynski </a> & M. Szarek & R. Gajda 
   </small>
</footer>

</body>
</html>
