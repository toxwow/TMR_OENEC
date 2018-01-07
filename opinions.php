<?php
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
.invisible {
  display: none;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 15px;
  z-index: 99;
  cursor: pointer;
}
/*
#my_iframe{
	display: none;
  position: fixed;
  bottom: 20px;
  left: 15px;
  z-index: 99;
  cursor: pointer;
}*/


</style>
</head>

<body>
<audio id="myAudio">
  
  <source src="John.mp4" type="audio/mpeg">
  
</audio>
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
$_SESSION['value1'] = $_GET['id'];
$ajdi = $_GET['id'];


$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "Select * From Opinie INNER JOIN Ceneo ON Opinie.ID = Ceneo.ID WHERE Ceneo.ID = '".$_SESSION['value1']."' ORDER BY GWIAZDKI DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$licznik = 1;
    echo "<div class='card g-brd-lightgrey rounded-0 g-mb-30'>
  <h3 class='card-header g-bg-indigo g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0'>
    <i class='icon-education-037 u-line-icon-pro g-mr-5'></i>
    Wyświetlasz opinie dla produktu o ID: <b>".$ajdi."</b>
  </h3>

  <form action='opinions.php?id=".$ajdi."' method='post'>
  <div class='card-block table-responsive g-pa-15'>
    <table class='table table-bordered u-table--v1 mb-0 g-font-size-13'>
      <thead>
        <tr>
          <th>#</th>
          <th class='invisible'>Number</th>
          <th class='invisible'> Autor </th>
          <th class='invisible'> Data </th>
          <th class='invisible'> Polecam </th>
          <th class='text-nowrap invisible'>ID Produktu</th>
          <th>Opinia</th>
          <th>Ilość gwiazdek</th>
          <th>Pomocna</th>
          <th class='text-nowrap'>Niepomocna</th>
          <th>Usuń</th>
          <th><label class='form-check-inline u-check g-pl-25 g-mr-0 g-mb-0'> CSV<input class='g-hidden-xs-up g-pos-abs g-top-0 g-left-0 g-mb-0' type='checkbox' name='select-all' id='select-all' />
      <div class='u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0'>
      <i class='fa' data-check-icon=''></i>
    </div>
    
  </label>
          </th>
        </tr>
      </thead>
       <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>

        <td class='align-middle text-center'>$licznik</td>
        <td class='invisible'>".$row["NUMBER"]."</td>
        <td class='invisible'>".$row["AUTOR"]."</td>
        <td class='invisible'>".$row["DATA"]."</td>
        <td class='invisible'>".$row["POLECAM"]."</td>
        <td class='align-middle text-center invisible'>".$row["ID"]."</td>
        <td class='align-middle text-center'>".$row["OPINIE"]."</td>
        <td class='align-middle text-center'>".$row["GWIAZDKI"]."</td>
        <td class='align-middle text-center'>".$row["POMOCNA"]."</td>
        <td class='align-middle text-center'>".$row["NIEPOMOCNA"]."</td>
		<td class='align-middle text-center'><button class='btn btn-m u-btn-lightred'  type='submit' name='deleteItem1' value='".$row['NUMBER']."'/><i class='fa fa-trash-o'></i></td>
    <td class='align-middle text-center'><label class='form-check-inline u-check '> 
        <input class='g-hidden-xs-up g-pos-abs ' type='checkbox' name='check_list[]' value='".$row["NUMBER"]."'/> <div class='u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0'>
      <i class='fa' data-check-icon=''></i>
    </div>   </label> </td>
				</tr>";
        $licznik++;
    }
echo "
          </tbody>
        </table>
      </div>
  </div>
<div class='container'>
<div class='row'>

<div class='col-sm-12 g-mb-30'>
<input class='btn btn-m float-right u-btn-bluegray g-mb-0 g-mt-0 g-mr-15' type='submit' formmethod='post' name='submit' value='Import CSV' id='my_iframe' onclick=''/>
  
</div>


</div>
</form>
<span onclick='topFunction()' id='myBtn' title='Go to down' class='u-icon-v2 g-color-primary g-rounded-50x g-mr-15 g-mb-15'>
  <i class='fa fa-arrow-down'></i>
</span>

";


if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])){
$a= "Autor;Data;Polecam;Opinia;Liczba Gwiazdek;Pomocna;Niepomocna";
$myfile = fopen("tmp/opinie.csv", "wb") or die("Unable to open file!");
fwrite($myfile, $a);
foreach($_POST['check_list'] as $selected){
$sql2 = "Select * From Opinie WHERE NUMBER=$selected";
$result2 = $conn->query($sql2);
while($row = $result2->fetch_assoc()) {
$b = "\n".$row["AUTOR"].";".$row["DATA"].";".$row["POLECAM"].";".$row["OPINIE"].";".$row["GWIAZDKI"].";".$row["POMOCNA"].";".$row["NIEPOMOCNA"]."";
fwrite($myfile, $b);
}
}
fclose($myfile);
echo "<a href='tmp/opinie.csv' download id='download' hidden></a>";
}
if(empty($_POST['check_list'])){
echo '<script type="text/javascript">alert("Wybierz produkty, które chcesz zaimportować do pliku CSV!");</script>';
}
}
}

if(isset($_POST['deleteItem1']) and is_numeric($_POST['deleteItem1']))
{
  
   $delete = $_POST['deleteItem1'];
	 $sql ="DELETE FROM Opinie where NUMBER ='$delete'";
	 $result = $conn->query($sql);
   echo "<meta http-equiv='refresh' content='0'>";

}
?>

<script>
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
//var x = document.getElementById("myAudio"); 

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 55 ) {
        document.getElementById("myBtn").style.display = "block";
         // document.getElementById("myBtn1").style.display = "block";
    } 
     else {
        document.getElementById("myBtn").style.display = "none";
        // document.getElementById("myBtn1").style.display = "none";
    }

}

function topFunction() {
    document.body.scrollTop = document.body.scrollHeight;

}

// function topFunction1() {
//     document.body.scrollTop = 0;
//     document.documentElement.scrollTop = 0;
// }

</script>

</body>
</html>
