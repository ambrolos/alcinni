<?php
include"db.php";
session_start();

if(isset($_GET['tracking']))
{
$codice_di_tracking=$_GET['tracking'];
}

$squadra=$_POST['squadra'];

if(isset($_POST['Conclusa'])){
$squadra=$_POST['squadra'];
mysql_query("UPDATE segnalazioni SET stato='conclusa' WHERE tracking='$codice_di_tracking'");
header("Location:homeSquadra.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CivicSense</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">
  <!-- Boodstrap -->
  <link href="librerie/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS -->
  <link href="librerie/font/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/style.css" rel="stylesheet">
  <script src="js/MEscript.js" type="text/javascript"></script>
  <style>
 
    .yellow {
    height: 50px;
    width: 50px;
    background-color:  yellow;
    border-radius: 50%;
    display: inline-block;
    }
    
    .red {
    height: 50px;
    width: 50px;
    background-color:  red;
    border-radius: 50%;
    display: inline-block;
}

.green {
    height: 50px;
    width: 50px;
    background-color:  green;
    border-radius: 50%;
    display: inline-block;
]
}
  </style>
  </head>

  <body>
<header id="header">
   <div class="container">
     <div id="logo" class="pull-left">
       <a href="home.php"><img src="img/logo.png"></a>
     </div>

     <nav id="nav-menu-container">
       <ul class="nav-menu">
         <li><a href="homeSquadra.php">Home</a></li>
         <li><a href="#contatti">Contatti</a></li>
         <li><a class="nav-link js-scroll-trigger" href="logout.php">Logout</a></li>
       </ul>
     </nav>
   </div>
   </header>
<?php 
session_start();
$nome=$_SESSION['nome'];
$cognome=$_SESSION['cognome'];
$idUtente=$_SESSION['id_ente'];

?>

 
<section class="portfolio" id="features">
      <div class="container">
       <?php 
         include"db.php";
     $query=mysql_query("select * from segnalazioni where tracking='$codice_di_tracking'");
     while($result=mysql_fetch_array($query))
     {
    $lat=$result['lat'];
    $longi=$result['longi'];
	$stato=$_POST['stato'];	
    $comune=$_POST['comune'];
      }?>
    

<div id="googleMap" style="height:400px;width:100%;"></div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(<? echo $lat?> , <? echo $longi?>);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBigtdZmyJyuCBLxk6tHDxiu3bZLbcVies&callback=myMap"></script>



  <?php 
include"db.php";
$query=mysql_query("select * from segnalazioni where tracking= '$codice_di_tracking'");
while($result=mysql_fetch_array($query))
{
$descrizione=$result['descrizione'];
$tracking=$result['tracking'];
$foto=$result['foto'];
$stato=$result['stato'];
$gruppo=$result['gruppo'];
$data=$result['data'];
$posizione=$result['posizione'];
$importanza=$result['importanza'];

if($importanza=='alta'){
$colore="red";
}else if($importanza=='media'){
$colore="yellow";
}else if ($importanza=='bassa'){
$colore="green";
}
}
?>
        
      </div>
    <div class="container">


      <h1 class="my-4">Codice Tracking
        <small><?php echo $codice_di_tracking ?></small>
      </h1>

      <div class="row">
        <div class="col-md-8">
         
          <img class="col-lg-8 col-sm-6 col-xs-12" src="<?php echo $foto ?>" alt="" width=700 height=300>
        </div>
        <div class="col-md-4">
          <h3>Descrizione</h3>
          <p><?php echo $descrizione ?> </p>
          
          <h3>Data Segnalazione</h3>
          <p><?php echo $data ?> </p>
          
          <h3>Importanza</h3>
        <span class="<?php echo $colore?>"></span>
        
        <h3>Gruppo</h3>
          <p><?php echo $gruppo ?> </p>
 <form name="FormApprovazione" method="post" action=" gestisciSegnalazioniSquadra.php?tracking=<?php echo $codice_di_tracking?>">
           <h3>Stato</h3>
            <input class="btn btn-primary" type="submit" value="Conclusa" name="Conclusa">
</form>
</div>
</div></div><br>
</section>




  
 

 <div id="contatti" class="block bg-primary block-pd-lg block-bg-overlay conteiner text-center" data-bg-img="img/SfondoStellato.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
  <h2>Contatti</h2>
  <br>
<div class="row justify-content-center">
       <div class="col-lg-3 col-md-4">
         <div class="info">
           <div>
             <i class="fa fa-map-marker"></i>
             <p>Campus Università degli Studi di Bari "Aldo Moro", BARI</p>
           </div>

           <div>
             <i class="fa fa-envelope"></i>
             <p>ambrogioLosito@gmail.com</p>
           </div>

           <div>
            <i class="fa fa-envelope"></i>
             <p>marcopiccinni93@gmail.com</p>
           </div>

         </div>
       </div>



     </div>
   </div>










 <footer class="site-footer">
   <div class="bottom">
     <div class="container">
       <div class="row">

         <div class="col-lg-6 col-xs-12 text-lg-left text-center">
           <p class="copyright-text">
             © Civic Sense
           </p>
           <div class="credits">
            Ambrogio Losito, Marco Giuseppe Piccinni
           </div>
         </div>

        

       </div>
     </div>
   </div>
 </footer>

 <script src="librerie/jquery.min.js"></script>
 <script src="librerie/jquery-migrate.min.js"></script>
 <script src="librerie/hoverIntent.js"></script>
 <script src="librerie/superfish.min.js"></script>
 <script src="librerie/tether/js/tether.min.js"></script>
 <script src="librerie/stellar.min.js"></script>
 <script src="librerie/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="librerie/counterup.min.js"></script>
 <script src="librerie/waypoints.min.js"></script>
 <script src="librerie/easing.js"></script>
 <script src="librerie/sticky.js"></script>
 <script src="librerie/parallax.js"></script>
 <script src="librerie/lockfixed.min.js"></script>
 <script src="js/custom.js"></script>
  </body>

</html>
