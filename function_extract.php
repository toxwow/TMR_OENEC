<?php
@ob_start();
session_start();
ini_set('memory_limit', '1024M');
include("simple_html_dom.php");

$id = $_POST["id_product"];
$_SESSION["IDPRODUCT"] = $id;

$html = file_get_html('https://www.ceneo.pl/'.$id.'#tab=reviews');
$html_review = $html -> outertext;
$_SESSION["reviews"] = $html_review;
$html1 = file_get_html('https://www.ceneo.pl/'.$id.'#tab=spec');
$name = $html -> find('h1.product-name', 0) -> plaintext;
// Parse liczba opini
foreach($html -> find('span[class="prod-review"]') as $number_review) {
    $liczba_opini = $number_review -> find('span[itemprop="reviewCount"]', 0) -> plaintext; 
}

$_SESSION["opinie_licza"] = $liczba_opini;
// dzielenie opini przez 10
$liczba_opini_dziel = $liczba_opini / 10;
// zaokroąglanie liczby powyzej w gore = liczba stron opini art. 
$liczba_stron = ceil($liczba_opini_dziel); 
// zmienna potrzebna do zliczania opini ze stron /opinie-2++
$liczba_opini_petla = $liczba_opini - 10;
$_SESSION["opinie_petla"] = $liczba_opini_petla;
// parse Top'a produktu
$extract_top = $html1 -> find('article.product-top',0) -> outertext;
$_SESSION["top"] = $extract_top;
// parse Content'u produktu
$extract_content = $html1 -> find('div.product-full-description',0) -> outertext;
$_SESSION["content"] = $extract_content;
// parse opini z pierwszej strony 
$firstElement = $html -> find('ol[class="product-reviews js_product-reviews js_reviews-hook"]',0) -> outertext;
$_SESSION["first"] = $firstElement;
//pętla parsująca opinii z pozostałych stron
for ($numer_strony = 2; $numer_strony <= $liczba_stron; $numer_strony++) {
    $strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');
    $firstElement1[] = $strona[$numer_strony] -> find('ol[class="product-reviews"]', 0) -> outertext;
}
// encodowanie tablicy dla pozostałych opinni 
$myJSON = json_encode($firstElement1);
$_SESSION["first1"] = $myJSON;

echo "
<section>
   <div class='container text-center g-py-50--md g-py-20'>
      <h2 class='h2 text-uppercase g-font-weight-300'>Dobra robota!</h2>
      <p class='lead g-px-100--md g-mb-20'>Dzięki operacji <strong> extract </strong> pozyskaliśmy informacje na temat produktu <br><strong> $name </strong> (nr. id: $id )<br>
         Poniżej znajduję się wszystkie informacje, niezbędne do przeprowadznie procesu Transform. <br>
      <p class='g-mb-25'style='font-size: 1rem';> Liczba wczytanych opini: <strong>$liczba_opini</strong> Liczba wczytanych stron z opiniami: <strong> $liczba_stron</strong></p>
      </p>
      <form method='post'>
      <button type='submit' formaction='transform.php' name='id_product' value='$id' class='btn btn-md u-btn-primary rounded-0'>Transform!</button>
   </div>
</section>
";

echo "
<div id='accordion-11' class='u-accordion u-accordion-bg-primary u-accordion-color-white' role='tablist' aria-multiselectable='false'>
<div class='card g-brd-none rounded-0 g-mb-15'>
<div id='accordion-11-heading-01' class='u-accordion__header g-pa-0' role='tab'>
   <h5 class='mb-0'>
      <a class='collapsed d-block g-color-main g-text-underline--none--hover g-brd-around g-brd-gray-light-v4 g-rounded-5 g-pa-10-15' href='#accordion-11-body-01' data-toggle='collapse' data-parent='#accordion-11' aria-expanded='false' aria-controls='accordion-11-body-01'>
      <span class='u-accordion__control-icon g-mr-10'>
      <i class='fa fa-angle-down'></i>
      <i class='fa fa-angle-up'></i>
      </span>
      Informacje o produkcie
      </a>
   </h5>
</div>

   <div id='accordion-11-body-01' class='collapse' role='tabpanel' aria-labelledby='accordion-11-heading-01'>
   <div class='u-accordion__body g-color-gray-dark-v5'>
      ".htmlspecialchars($extract_top)."
      ".htmlspecialchars($extract_content)."
   </div>
</div>
</div>
";

if ($liczba_stron>0){
echo "
<div class='card g-brd-none rounded-0 g-mb-15'>
   <div id='accordion-12-heading-02' class='u-accordion__header g-pa-0' role='tab'>
      <h5 class='mb-0'>
         <a class='collapsed d-block g-color-main g-text-underline--none--hover g-brd-around g-brd-gray-light-v4 g-rounded-5 g-pa-10-15' href='#accordion-12-body-02' data-toggle='collapse' data-parent='#accordion-12' aria-expanded='false' aria-controls='accordion-12-body-02'>
         <span class='u-accordion__control-icon g-mr-10'>
         <i class='fa fa-angle-down'></i>
         <i class='fa fa-angle-up'></i>
         </span>
         Opinie o produkcie strona (1)
         </a>
      </h5>
   </div>
   <div id='accordion-12-body-02' class='collapse' role='tabpanel' aria-labelledby='accordion-12-heading-02'>
      <div class='u-accordion__body g-color-gray-dark-v5'>
         ".htmlspecialchars($firstElement)."
      </div>
   </div>
</div>
";

for ($i=0; $i<$liczba_stron-1 ; $i++){
echo "
<div class='card g-brd-none rounded-0 g-mb-15'>
   <div id='accordion-1".$i."-heading-0".$i."' class='u-accordion__header g-pa-0' role='tab'>
      <h5 class='mb-0'>
         <a class='collapsed d-block g-color-main g-text-underline--none--hover g-brd-around g-brd-gray-light-v4 g-rounded-5 g-pa-10-15' href='#accordion-1".$i."-body-0".$i."' data-toggle='collapse' data-parent='#accordion-1".$i."' aria-expanded='false' aria-controls='accordion-1".$i."-body-0".$i."'>
         <span class='u-accordion__control-icon g-mr-10'>
         <i class='fa fa-angle-down'></i>
         <i class='fa fa-angle-up'></i>
         </span>
         Opinie o produkcie strona (" .($i+2). ")
         </a>
      </h5>
   </div>
   <div id='accordion-1".$i."-body-0".$i."' class='collapse' role='tabpanel' aria-labelledby='accordion-1".$i."-heading-0".$i."'>
      <div class='u-accordion__body g-color-gray-dark-v5'>
         ".htmlspecialchars($firstElement1[$i])."
      </div>
   </div>
</div>
";
}

echo "</div>";
}

else{
echo "</div>";
}

?>
