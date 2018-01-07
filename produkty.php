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
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/jqueryblockUI.js"></script>
      <script src="js/scripts.js"></script>
      <script src="../unify/assets/vendor/popper.min.js"></script>
      <script src="../unify/assets/vendor/bootstrap/bootstrap.min.js"></script>

        <style>
  #footer {
   position:static;
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

    <section class="g-pt-100 g-mt-30">
  <div class="container text-center">


<?php
$servername = "localhost";
$username = "tommarst_ceneo";
$password = "szarek";
$dbname = "tommarst_ceneo";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "Select * From Ceneo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$licznik = 1;
    echo "<div class='card g-brd-lightgrey rounded-0 g-mb-30'>
  <h3 class='card-header g-bg-primary g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0'>
    <i class='icon-education-037 u-line-icon-pro g-mr-5'></i>
    Pobrane produkty
  </h3>

 
  <div class='card-block table-responsive g-pa-15'>
    <table class='table table-bordered u-table--v1 mb-0'>
      <thead>
        <tr>
          <th>#</th>
          <th class='text-nowrap'>ID Produktu</th>
          <th>Model</th>
          <th>Marka</th>
          <th>Kategorie</th>
          <th class='text-nowrap' >Dodatkowe Informacje</th>
      		<th>Opinie</th>
          <th>Usuń</th>
          <th><label class='form-check-inline u-check g-pl-25 g-mr-0 g-mb-0'> CSV<input class='g-hidden-xs-up g-pos-abs g-top-0 g-left-0 g-mb-0' type='checkbox' name='select-all' id='select-all' />
			<div class='u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0'>
      <i class='fa' data-check-icon=''></i>
    </div>
    
  </label>
          </th>
        </tr>
      </thead>

      <tbody>
      <form action='produkty.php' method='get'>";
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>

        <td class='align-middle text-center'>$licznik</td>
        <td class='align-middle text-center'>".$row["ID"]."</td>
        <td class='align-middle text-center'>".$row["BRAND"]."</td>
        <td class='align-middle text-center'>".$row["MODEL"]."</td>
        <td class='align-middle text-center'>".$row["CATEGORY"]."</td>
        <td class='align-middle text-center'>".$row["EXTRA"]."</td>
        <td class='align-middle text-center'>        
          <button class='btn btn-m u-btn-indigo' type='submit' name='id' value='".$row['ID']."' formaction='opinions.php'/><i class='fa fa-comments'></i>
        </td>
        <td class='align-middle text-center'><button class='btn btn-m u-btn-lightred'  type='submit' name='deleteItem' formmethod='post' value='".$row['ID']."'/><i class='fa fa-trash-o'></i></td>
        <td class='align-middle text-center'><label class='form-check-inline u-check '> 
        <input class='g-hidden-xs-up g-pos-abs ' type='checkbox' name='check_list[]' value='".$row["ID"]."'/> <div class='u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0'>
      <i class='fa' data-check-icon=''></i>
    </div>   </label> </td>
				</tr>";
        $licznik++;
    }
echo "";

    echo "</tbody>
    </table>
  </div>

</div>

<div class='container'>
<div class='row'>
<div class='col-sm-12'>
  
</div> 
<div class='col-sm-12 '>
<a href='' onclick='myAjax()' class='btn btn-m float-right u-btn-lightred g-mb-0 g-mt-0 g-ml-0'>Usuń wszystkie opinie <i class='fa fa-close'></i></a>
<input class='btn btn-m float-right u-btn-bluegray g-mb-0 g-mt-0 g-mr-15' type='submit' formmethod='post' name='submit' value='Import CSV' id='my_iframe' onclick=''/>
  
</div>


</div>

</div>

 </form>";

if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
$a= "ID;MODEL;MARKA;KATEGORIE;DODATKOWE INFORMACJE";
$myfile = fopen("tmp/produkty.csv", "wb") or die("Unable to open file!");
fwrite($myfile, $a);
foreach($_POST['check_list'] as $selected){
$sql2 = "Select * From Ceneo WHERE ID=$selected";
$result2 = $conn->query($sql2);
while($row = $result2->fetch_assoc()) {
$b = "\n".$row["ID"].";".$row["BRAND"].";".$row["MODEL"].";".$row["CATEGORY"].";".$row["EXTRA"]."";
fwrite($myfile, $b);
}
}
fclose($myfile);
echo "<a href='tmp/produkty.csv' download id='download' hidden></a>";
}
if(empty($_POST['check_list'])){
echo '<script type="text/javascript">alert("Wybierz produkty, które chcesz zaimportować do pliku CSV!");</script>';
}
}

}

else {
    echo "  <div class='col-md-6 mx-auto'>
    <!-- Warning Alert -->
    <div class='alert alert-warning' role='alert'>
      <strong>O Cie Panie!</strong> Brak pozycji w bazie danych.
    </div>
    <!-- End Warning Alert -->";
}

if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
{
  // here comes your delete query: use $_POST['deleteItem'] as your id
   $delete = $_POST['deleteItem'];
	 $sql ="DELETE FROM Opinie where ID ='$delete'";
	 $result = $conn->query($sql);
	 $sql1 = "DELETE FROM Ceneo where ID = '$delete'";
	 $result1 = $conn->query($sql1);

   echo "<meta http-equiv='refresh' content='0'>";

}

?>

  </div>
</section>



<script>

function myAjax() {
      $.ajax({
           type: "POST",
           url: 'delete.php',
           data:{action:'call_this'},
           success:function(html) {
             location.reload();
           }

      });
 }


function myAjax1() {
      $.ajax({
           type: "POST",
           url: 'csv.php',
           data:{action:'call_this'},
           success:function(html) {
             location.reload();
           }

      });
 }

$('#select-all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }
});

</script>

<script>

document.getElementById('download').click();
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>



</body>
</html>
