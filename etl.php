<?php

include("simple_html_dom.php");
$id = $_POST["id_product"];

$html = file_get_html('https://www.ceneo.pl/'.$id.'#tab=reviews');
$html1 = file_get_html('https://www.ceneo.pl/'.$id.'#tab=spec');

$ret = $html -> find('meta[property*=brand]');
$value = $ret[0] -> content;

$name = $html -> find('h1.product-name', 0) -> plaintext;
// Parse liczba opini
foreach($html -> find('span[class="prod-review"]') as $number_review) {
    $liczba_opini = $number_review -> find('span[itemprop="reviewCount"]', 0) -> plaintext; 
}

$liczba_opini_dziel = $liczba_opini / 10;

$liczba_stron = ceil($liczba_opini_dziel); 

$liczba_opini_petla = $liczba_opini - 10;

$extract_top = $html1 -> find('article.product-top',0) -> outertext;

$extract_content = $html1 -> find('div.product-full-description',0) -> outertext;

$first_opinion = $html -> find('ol[class="product-reviews js_product-reviews js_reviews-hook"]',0) -> outertext;
$html_opinie = str_get_html($first_opinion);

for ($numer_strony = 2; $numer_strony <= $liczba_stron; $numer_strony++) {
    $strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');
    $firstElement1[] = $strona[$numer_strony] -> find('ol[class="product-reviews"]', 0) -> outertext;
}

$temporary_other_opinions = implode(" ", $firstElement1);
$html_opinie2 = str_get_html($temporary_other_opinions);

foreach($html -> find('span.breadcrumb') as $all_cat) {
    $kategorie[] = $all_cat -> find('span[itemprop="title"]', 0) -> plaintext;
    $final_kategorie = end($kategorie);
}
$counter = 0;
foreach($html -> find('section[id="productTechSpecs"] table tr') as $item) {
    $detailsData[$counter]['property'] = trim($item -> find('th', 0) -> plaintext);
    $detailsData[$counter]['data'] = trim($item -> find('td', 0) -> plaintext);
    $counter++;
}

$counter1 = 0;
foreach($html -> find('div[id="js_params-wrapper"] dl') as $item1) {
    $detailsData1[$counter1]['property'] = trim($item1 -> find('dt span', 0) -> plaintext);
    $detailsData1[$counter1]['data'] = trim($item1 -> find('dd ul', 0) -> plaintext);
    $counter1++;
}

$zliczadlo = count($detailsData1);

 if ($zliczadlo > 0) {

      $warianty_in = array();
      for ($i = 0; $i < $zliczadlo; $i++) {
          $warianty_out[$i] = $detailsData1[$i]['property'];
          $warianty_in[$i] = array_search($warianty_out[$i], array_column($detailsData, 'property'));
          $send_warianty[$i] = $detailsData[$warianty_in[$i]]['property'].": ".$detailsData[$warianty_in[$i]]['data'];
          if ($warianty_in[$i] == false) {
              $warianty_extra[$i] = array_search('Kolor', array_column($detailsData, 'property'));
              $send_warianty_extra[$i] = $detailsData[$warianty_extra[$i]]['property'].": ".$detailsData[$warianty_extra[$i]]['data'];
              $send_warianty_extra_to_array = implode("; ", $send_warianty_extra);
          } else {
              $send_warianty_to_array = implode("; ", $send_warianty);
        
          }
      }

 }

//opinie 1-10
foreach($html_opinie->find('div[class="show-review-content content-wide"]') as $firstElement) {
    $opinie[] = $firstElement->find('p[class="product-review-body"]',0)->plaintext; 
} 
// Parse czasu i przypisanie jej do tabeli time
foreach($html_opinie->find('div[class="show-review-content content-wide"]') as $Time_p) {
    $time[] = $Time_p->find('time',0)->plaintext; 
}
// Parse gwiazd i przypisanie jej do tabeli gwiazdki
foreach($html_opinie->find('div[class="show-review-content content-wide"]') as $gwiazdy) {
    $gwiazdki[] = explode("/",$gwiazdy->find('span[class="review-score-count"]',0)->plaintext)[0]; 
}
// Parse autora i przypisanie jej do tabeli autor
foreach($html_opinie->find('header[class="review-box-header user-box-container"]') as $first) {
    $autor[] = $first->find('div[class="reviewer-name-line"]',0)->plaintext; 
}
// Parse polecenia i przypisanie jej do tabeli recommended
foreach($html_opinie->find('header[class="review-box-header user-box-container"]') as $yes_no) {
    $recommended[] = $yes_no->find('em[class*="product"]',0)->plaintext; 
}
 // Parse zalet i przypisanie jej do tabeli zalety
foreach($html_opinie->find('div[class="show-review-content content-wide"]') as $pros) {
    $zalety[] = $pros->find('div[class="product-review-pros-cons"] div.pros-cell ul',0)->innertext; 
}
// Parse wad i przypisanie jej do tabeli wady
foreach($html_opinie->find('div[class="show-review-content content-wide"]') as $cons) {
    $wady[] = $cons->find('div[class="product-review-pros-cons"] div.cons-cell ul',0)->innertext; 
}
// Parse wad i przypisanie jej do tabeli wady
foreach($html_opinie->find('div[class="show-review-content content-wide"]') as $vote_yes) {
    $yes[] = $vote_yes->find('span[id*="votes-yes"]',0)->innertext;
}
// Parse wad i przypisanie jej do tabeli wady
foreach($html_opinie->find('div[class="show-review-content content-wide"]') as $vote_no) {
    $no[] = $vote_no->find('span[id*="votes-no"]',0)->innertext;   
}



if ($liczba_opini>11) {

  //opinie 11 ++
  foreach($html_opinie2->find('div[class="show-review-content content-wide"]') as $firstElement1) {
      $opinie1[] = $firstElement1->find('p[class="product-review-body"]',0)->plaintext; 
  } 
  // Parse czasu i przypisanie jej do tabeli time
  foreach($html_opinie2->find('div[class="show-review-content content-wide"]') as $Time_p1) {
      $time1[] = $Time_p1->find('time',0)->plaintext; 
  }
  // Parse gwiazd i przypisanie jej do tabeli gwiazdki
  foreach($html_opinie2->find('div[class="show-review-content content-wide"]') as $gwiazdy1) {
      $gwiazdki1[] = explode("/",$gwiazdy1->find('span[class="review-score-count"]',0)->plaintext)[0]; 
  }
  // Parse autora i przypisanie jej do tabeli autor
  foreach($html_opinie2->find('header[class="review-box-header user-box-container"]') as $first1) {
      $autor1[] = $first1->find('div[class="reviewer-name-line"]',0)->plaintext;
  }
  // Parse polecenia i przypisanie jej do tabeli recommended
  foreach($html_opinie2->find('header[class="review-box-header user-box-container"]') as $yes_no1) {
      $recommended1[] = $yes_no1->find('em[class*="product"]',0)->plaintext; 
  }
  // Parse zalet i przypisanie jej do tabeli zalety
  foreach($html_opinie2->find('div[class="show-review-content content-wide"]') as $pros1) {
      $zalety1[] = $pros1->find('div[class="product-review-pros-cons"] div.pros-cell ul',0)->innertext; 
  }
  // Parse wad i przypisanie jej do tabeli wady
  foreach($html_opinie2->find('div[class="show-review-content content-wide"]') as $cons1) {
      $wady1[] = $cons1->find('div[class="product-review-pros-cons"] div.cons-cell ul',0)->innertext; 
  }
  // Parse wad i przypisanie jej do tabeli wady
  foreach($html_opinie2->find('div[class="show-review-content content-wide"]') as $vote_yes1) {
      $yes1[] = $vote_yes1->find('span[id*="votes-yes"]',0)->innertext; 
  }
  // Parse wad i przypisanie jej do tabeli wady
  foreach($html_opinie2->find('div[class="show-review-content content-wide"]') as $vote_no1) {
      $no1[] = $vote_no1->find('span[id*="votes-no"]',0)->innertext; 
  }

}

if ($liczba_opini>11){
$all_opinie      = array_merge($opinie, $opinie1);
$all_gwiazdki    = array_merge($gwiazdki, $gwiazdki1);
$all_yes         = array_merge($yes, $yes1);
$all_no          = array_merge($no, $no1);
$all_autor       = array_merge($autor, $autor1);
$all_time        = array_merge($time, $time1);
$all_recommended = array_merge($recommended, $recommended1);
}

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



<?php

$servername = "localhost";
$username   = "tommarst_ceneo";
$password   = "szarek";
$dbname     = "tommarst_ceneo";


$Model = $name;
$Brand = $value;
$Warianty = $send_warianty_to_array;
$Warianty_Extra = $send_warianty_extra_to_array;
$Kategorie = $final_kategorie;

if ($liczba_opini > 11){
$opinie = $all_opinie;
$gwiazdki = $all_gwiazdki;
$yes = $all_yes;
$no = $all_no;

$autor = $all_autor;
$time = $all_time;
$recommended = $all_recommended;
}

// else{
// $opinie = $opinie;
// $gwiazdki = json_decode($_SESSION['gwiazdki'],1);
// $yes = json_decode($_SESSION['yes'],1);
// $no = json_decode($_SESSION['no'],1);

// $autor = json_decode($_SESSION['autor'],1);
// $time = json_decode($_SESSION['time'],1);
// $recommended = json_decode($_SESSION['recommended'],1);
// }


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
   VALUES ('$id','$opinie[$i]', '$gwiazdki[$i]', '$yes[$i]', '$no[$i]', '$autor[$i]','$time[$i]', '$recommended[$i]')";

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
