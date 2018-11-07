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

</head>
<body>
<header id="header">
   <div class="container">
     <div id="logo" class="pull-left">
       <a href="home.php"><img src="img/logo.png"></a>
     </div>    
            
     <nav id="nav-menu-container">
       <ul class="nav-menu">
         <li><a href="homeCittadino.php">Home</a></li>
         <li><a href="#funzionalita">Funzionalità</a></li>
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
$idUtente=$_SESSION['id'];

$sql=mysql_query("select nome_comune from comune inner join ente where comune.id_comune=ente.comune");  
 while($result=mysql_fetch_array($sql))
     {
    $comune=$result['nome_comune'];
																
      }
?>

<div class="block bg-primary block-pd-lg block-bg-overlay conteiner text-center" data-bg-img="img/SfondoStellato.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
 <div class="container">
  <h2 class="mb-5">BENVENUTO <?php echo "$nome $cognome"; ?></h2>
  <br>
  
  
 </div>
</div>

<section class="about" id="about">
    <div class="container text-center">
      <h2>Statistiche</h2><p>Descrivono lo stato globale delle segnalazioni</p>
<?php
session_start();
include "db.php";
$query = "SELECT COUNT(stato) FROM segnalazioni"; 
$result = mysql_query($query); 
$TOTALE_A = mysql_result($result,0,0); 

$query = "SELECT COUNT(stato) FROM segnalazioni where  stato='sospeso' "; 
$result = mysql_query($query); 
$TOTALE_B = mysql_result($result,0,0); 

$query = "SELECT COUNT(stato) FROM segnalazioni where  stato='approvata' "; 
$result = mysql_query($query); 
$TOTALE_C = mysql_result($result,0,0); 

$query = "SELECT COUNT(stato) FROM segnalazioni where  stato='conclusa' "; 
$result = mysql_query($query); 
$TOTALE_D = mysql_result($result,0,0); 
?>
  <div class="row stats-row">
        <div class="stats-col text-center col-md-3 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up"><?php echo $TOTALE_A; ?></span> Segnalazioni Effettuate
          </div>
        </div>

        <div class="stats-col text-center col-md-3 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up"><?php echo $TOTALE_B; ?></span>Segnalazioni in sospeso
          </div>
        </div>

        <div class="stats-col text-center col-md-3 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up"><?php echo $TOTALE_C; ?></span>Segnalazioni accettate
          </div>
        </div>

        <div class="stats-col text-center col-md-3 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up"><?php echo $TOTALE_D; ?></span> Segnalazioni concluse
          </div>
        </div>
      </div>
    </div>
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
