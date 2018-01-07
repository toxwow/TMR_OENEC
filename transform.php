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

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 15px;
  z-index: 99;
  cursor: pointer;
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
    
include("simple_html_dom.php");

$html = new simple_html_dom();
$html1 = new simple_html_dom();
$html3 = new simple_html_dom();
$html4 = new simple_html_dom();


$html_reviews = $_SESSION["reviews"];
$top_header = $_SESSION["top"];
$top_content = $_SESSION["content"];
$first_opinion = $_SESSION["first"];
$id = $_SESSION["IDPRODUCT"];

$liczba_opini_petla = $_SESSION["opinie_petla"];
$liczba_opini = $_SESSION["opinie_licza"];

$other_opinions = json_decode($_SESSION['first1'], 1);

$temporary_other_opinions = implode(" ", $other_opinions);

$html_opinie2 = str_get_html($temporary_other_opinions);
$html_opinie = str_get_html($first_opinion);


$html -> load($html_reviews);
$html1 -> load($top_content);
$html3 -> load($first_opinion);
$html4 -> load($other_opinions);
$counter = 0;

$name = $html -> find('h1.product-name', 0) -> plaintext;
$_SESSION["model"] = $name;
$ret = $html -> find('meta[property*=brand]');
$value = $ret[0] -> content;
$_SESSION["brand"] = $value;


foreach($html -> find('span.breadcrumb') as $all_cat) {
    $kategorie[] = $all_cat -> find('span[itemprop="title"]', 0) -> plaintext;
    $final_kategorie = end($kategorie);
}
$_SESSION["category"] = $final_kategorie;

$photo = $html -> find('a[class="js_gallery-anchor js_image-preview"]', 0);
$img = $photo -> find('img', 0) -> src;

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

echo "
<div class='row justify-content-center'>
<div class='col-lg-9'>
<!-- Article -->
<article class='u-shadow-v11 rounded g-pa-20 g-mb-30'>
<div class='row align-items-center'>
<!-- Article Image -->
<a class='col-sm-4'>
<img class='img-fluid' src='$img' alt='Image Description'>
</a>
<div class='col-sm-8 g-brd-left--sm g-brd-gray-light-v4'>
<div class='g-pa-10'>
<header class='d-flex justify-content-start g-mb-3'>
   <h4 class='h5 d-inline-block text-uppercase g-mr-10'>
      <a class='g-color-black'>$name</a>
   </h4>
</header>
<p class='g-mb-20'>Gratulacje! Wykonaleś proces <strong>transform</strong>. Poniżej ukazane zostały wszystkie opinie oraz podstawowe informacje na temat wybranego produktu.
   W celu załadowania produktu do bazy danych kliknij w przycisk poniżej.
</p>
<ul class='list-inline g-mx-minus-20 mb-20 g-pl-7'>
   <li class='list-inline-item info-v5-4__action g-brd-right g-brd-gray-light-v3 g-color-gray-dark-v5 g-pr-20 g-pl-15'>
      <i class='align-middle g-font-size-16 g-transition-0_3 g-mr-7 icon-education-139 u-line-icon-pro'></i>
      <a class='g-color-gray-dark-v5 g-color-primary--hover g-text-underline--none--hover'>$value</a>
   </li>
   <li class='list-inline-item info-v5-4__action g-color-gray-dark-v5 g-pr-20 g-pl-15'>
      <i class='align-middle g-font-size-16 g-transition-0_3 g-mr-7 icon-education-048 u-line-icon-pro'></i>
      <a class='g-color-gray-dark-v5 g-color-primary--hover g-text-underline--none--hover'>$final_kategorie</a>
   </li>
</ul>
";

  if ($zliczadlo > 0) {

      $warianty_in = array();
      for ($i = 0; $i < $zliczadlo; $i++) {
          $warianty_out[$i] = $detailsData1[$i]['property'];
          $warianty_in[$i] = array_search($warianty_out[$i], array_column($detailsData, 'property'));
          $send_warianty[$i] = $detailsData[$warianty_in[$i]]['property'].
          ": ".$detailsData[$warianty_in[$i]]['data'];
          if ($warianty_in[$i] == false) {
              $warianty_extra[$i] = array_search('Kolor', array_column($detailsData, 'property'));
              $send_warianty_extra[$i] = $detailsData[$warianty_extra[$i]]['property'].": ".$detailsData[$warianty_extra[$i]]['data'];
              echo "<ul class='list-inline g-mx-minus-40 mb-20 g-mt-15 g-pl-7'> <li class = 'list-inline-item info-v5-4__action g-color-gray-dark-v5 g-pr-0 g-pl-0'>
                  <i class = 'align-left g-font-size-16 g-transition-0_3 g-mr-7 icon-media-051 u-line-icon-pro' > </i> <a id = 'warianty'
              class = 'g-color-gray-dark-v5 g-color-primary--hover g-text-underline--none--hover' > ".$detailsData[$warianty_extra[$i]]['property'].": ".$detailsData[$warianty_extra[$i]]['data']." </a> </li> </ul>
              ";
              $send_warianty_extra_to_array = implode("; ", $send_warianty_extra);
              $_SESSION["warianty_extra"] = $send_warianty_extra_to_array;
          } else {
              echo "<ul class='list-inline g-mx-minus-40 mb-20 g-mt-15 g-pl-7'> <li class = 'list-inline-item info-v5-4__action g-color-gray-dark-v5 g-pr-0 g-pl-0'>
                  <i class = 'align-left g-font-size-16 g-transition-0_3 g-mr-7 icon-media-051 u-line-icon-pro' > </i> <a id = 'warianty'
              class = 'g-color-gray-dark-v5 g-color-primary--hover g-text-underline--none--hover' > ".$detailsData[$warianty_in[$i]]['property'].": ".$detailsData[$warianty_in[$i]]['data']." </a> </li> </ul>
              ";
              $send_warianty_to_array = implode("; ", $send_warianty);
              $_SESSION["warianty"] = $send_warianty_to_array;
          }
      }

  }
      
echo "
<form method='post'>
   <button type='submit' formaction='display.php' name='id_product' value='$id' class='btn btn-md u-btn-primary rounded-0 g-mx-5 g-mt-10'>Load!</button>
</form>
</div>
</div>
</div>
</article>
</div>
</div>
";

$counter = 0;
$out  = "";
$out .= "
<div id='accordion-11' class='u-accordion u-accordion-bg-primary u-accordion-color-white col-lg-9 mx-auto ' role='tablist' aria-multiselectable='false'>
<!-- Card -->
<div class='card g-brd-none rounded-0 g-mb-15'>
<div id='accordion-11-heading-01' class='u-accordion__header g-pa-0' role='tab'>
   <h5 class='mb-0'>
      <a class='collapsed d-block g-color-main g-text-underline--none--hover g-brd-around g-brd-gray-light-v4 g-rounded-5 g-pa-10-15' href='#accordion-11-body-01' data-toggle='collapse' data-parent='#accordion-11' aria-expanded='false' aria-controls='accordion-11-body-01'>
      <span class='u-accordion__control-icon g-mr-10'>
      <i class='fa fa-angle-down'></i>
      <i class='fa fa-angle-up'></i>
      </span>
      Dodatkowe informacje o produkcie
      </a>
   </h5>
</div>
<div id='accordion-11-body-01' class='collapse' role='tabpanel' aria-labelledby='accordion-11-heading-01'>
<div class='u-accordion__body g-color-gray-dark-v5'>
<table class ='table-bordered u-table--v2' style='width: 100%;'>

";
foreach($detailsData as $key => $element) {
    $out .= "<tr>";
    foreach($element as $subkey => $subelement) {
        $out .= "<td class='align-middle'>$subelement</td>";
    }
    $out .= "</tr>";
}
$out .= "</table> </div>";
echo $out;
echo "</div> </div> </div>";

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

$opinie_all_encode = json_encode($all_opinie);
$_SESSION["opinie_all"] = $opinie_all_encode;

$gwiazdki_all_encode = json_encode($all_gwiazdki);
$_SESSION["gwiazdki_all"] = $gwiazdki_all_encode;

$yes_all_encode = json_encode($all_yes);
$_SESSION["yes_all"] = $yes_all_encode;

$no_all_encode = json_encode($all_no);
$_SESSION["no_all"] = $no_all_encode;

$autor_all_encode = json_encode($all_autor);
$_SESSION["autor_all"] = $autor_all_encode;

$time_all_encode = json_encode($all_time);
$_SESSION["time_all"] = $time_all_encode;

$recommended_all_encode = json_encode($all_recommended);
$_SESSION["recommended_all"] = $recommended_all_encode;
}

else{

$opinie_encode = json_encode($opinie);
$_SESSION["opinie"] = $opinie_encode;

$gwiazdki_encode = json_encode($gwiazdki);
$_SESSION["gwiazdki"] = $gwiazdki_encode;

$yes_encode = json_encode($yes);
$_SESSION["yes"] = $yes_encode;

$no_encode = json_encode($no);
$_SESSION["no"] = $no_encode;

$recommended_encode = json_encode($recommended);
$_SESSION["recommended"] = $recommended_encode;

$time_encode = json_encode($time);
$_SESSION["time"] = $time_encode;

$autor_encode = json_encode($autor);
$_SESSION["autor"] = $autor_encode;


}

echo "
</div><!--Basic Table-->
<div class='table-responsive col-sm-12 col-md-10 mx-auto'>
<table class='table table-bordered u-table--v2'>
<thead class='text-uppercase g-letter-spacing-1'>
   <tr>
      <th class='g-font-weight-300 g-color-black text-center'>Autor</th>
      <th class='g-font-weight-300 g-color-black text-center'>Opinia</th>
      <th class='g-font-weight-300 g-color-black text-center'>Zalety</th>
      <th class='g-font-weight-300 g-color-black text-center'>Wady</th>
      <th class='g-font-weight-300 g-color-black text-center'>Pomocna</th>
   </tr>
</thead>
<tbody>

";
if ($liczba_opini <= 10) {
    for ($i = 0; $i < $liczba_opini; $i++) {
      echo"
        <tr>
           <td class='align-middle text-nowrap text-center' style='width: 5%;'>
              <h5 class='h6 align-self-center g-font-weight-600 g-color-purple mb-0'>$autor[$i]</h5>
              <span class='g-font-size-12'>$time[$i]</span> 
              <hr class='w-20 g-mb-10 g-mt-10'>
              <div class='js-rating g-font-size-12 g-color-primary' data-rating='".str_replace(',','.',$gwiazdki[$i])."'></div>
              <span class = 'h6 align-self-center g-font-weight-200 g-color-lightgrey g-mt-10'>$recommended[$i]</span>
           </td>
           <td class='align-middle small' style='width: 50%;'>$opinie[$i]</td>
           <td class='align-top small text-left' style='width: 20%;'>
              $zalety[$i]
           </td>
           <td class='align-top small text-left' style='width: 20%;'>
              $wady[$i]
           </td>
           <td class='align-middle text-center' style='width: 5%;'>
              <i class='fa fa-thumbs-o-up g-color-primary'></i><strong class =' g-color-primary' >$yes[$i]</strong>  
              <i class=' g-ml-5 fa fa-thumbs-o-down g-color-lightred'></i><strong class ='g-color-lightred'>$no[$i]</strong>
           </td>
        </tr>";
    }
}

else {
    for ($i = 0; $i < 10; $i++) {
        echo"
          <tr>
             <td class='align-middle text-nowrap text-center' style='width: 5%;'>
                <h5 class='h6 align-self-center g-font-weight-600 g-color-purple mb-0'>$autor[$i]</h5>
                <span class='g-font-size-12'>$time[$i]</span> 
                <hr class='w-20 g-mb-10 g-mt-10'>
                <div class='js-rating g-font-size-12 g-color-primary' data-rating='".str_replace(',','.',$gwiazdki[$i])."'></div>
                <span class = 'h6 align-self-center g-font-weight-200 g-color-lightgrey g-mt-10'>$recommended[$i]</span>
             </td>
             <td class='align-middle small' style='width: 50%;'>$opinie[$i]</td>
             <td class='align-middle small  text-left' style='width: 20%;'>
                $zalety[$i]
             </td>
             <td class='align-middle small text-left' style='width: 20%;'>
                $wady[$i]
             </td>
             <td class='align-middle text-center' style='width: 5%;'>
                <i class='fa fa-thumbs-o-up g-color-primary'></i><strong class =' g-color-primary' >$yes[$i]</strong>  
                <i class=' g-ml-5 fa fa-thumbs-o-down g-color-lightred'></i><strong class ='g-color-lightred' >$no[$i]</strong>
             </td>
          </tr>";
    }
    for ($i = 0; $i < $liczba_opini_petla; $i++) {
    echo"
      <tr>
         <td class='align-middle text-nowrap text-center' style='width: 5%;'>
            <h5 class='h6 align-self-center g-font-weight-600 g-color-purple mb-0'>$autor1[$i]</h5>
            <span class='g-font-size-12'>$time1[$i]</span> 
            <hr class='w-20 g-mb-10 g-mt-10'>
            <div class='js-rating g-font-size-12 g-color-primary' data-rating='".str_replace(',','.',$gwiazdki1[$i])."'></div>
            <span class = 'h6 align-self-center g-font-weight-200 g-color-lightgrey g-mt-10'>$recommended1[$i]</span>
         </td>
         <td class='align-middle small' style='width: 50%;'>$opinie1[$i]</td>
         <td class='align-middle small text-left' style='width: 20%;'>
            $zalety1[$i]
         </td>
         <td class='align-middle small text-left' style='width: 20%;'>
            $wady1[$i]
         </td>
         <td class='align-middle text-center' style='width: 5%;'>
            <i class='fa fa-thumbs-o-up g-color-primary'></i><strong class =' g-color-primary' >$yes1[$i]</strong>  
            <i class=' g-ml-5 fa fa-thumbs-o-down g-color-lightred'></i><strong class ='g-color-lightred' >$no1[$i]</strong>
         </td>
      </tr>";
    }
}

echo"
</tbody>
</table>
</div>
<span onclick='topFunction()' id='myBtn' title='Go to up' class='u-icon-v2 g-color-primary g-rounded-50x g-mr-15 g-mb-15'>
<i class='fa fa-arrow-up'></i>
</span>";
    
?>

</div>
</section>
</body>
</html>

<script >
   $(document).ready(function () {
     $.HSCore.components.HSRating.init($('.js-rating'), {
       spacing: 2
     });
   });
   
   window.onscroll = function() {scrollFunction()};
   function scrollFunction() {
     if (document.body.scrollTop >= 30 || document.documentElement.scrollTop >= 30) {
         document.getElementById("myBtn").style.display = "block";
     } else {
         document.getElementById("myBtn").style.display = "none";
     }
   }
   
   
   function topFunction() {
     document.body.scrollTop = 0;
    
   } 
   
</script>