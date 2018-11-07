<?php
session_start();

include "controlloDB.php";
if(isset($_POST['login']))
login();

if(isset($_POST['Segnala'])){
session_start();
$nome=$_SESSION['nome'];
$cognome=$_SESSION['cognome'];
$idUtente=$_SESSION['id'];
header("Location:segnalazioniCittadino.php");
}

if(isset($_POST['Sengnalazioni']))
{session_start();
$nome=$_SESSION['nome'];
	$cognome=$_SESSION['cognome'];
    $idUtente=$_SESSION['id'];
 header("Location:tueSegnalazioni.php");
 }
 
 if(isset($_POST['Statistiche'])){
 session_start();
 $nome=$_SESSION['nome'];
	$cognome=$_SESSION['cognome'];
    $idUtente=$_SESSION['id'];
 header("Location:StatisticheCittadino.php");
 }
 
 if(isset($_POST['Profilo'])){
 session_start();
 $nome=$_SESSION['nome'];
	$cognome=$_SESSION['cognome'];
    $idUtente=$_SESSION['id'];
 header("Location:accountCittadino.php");
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

</head>
<body>
<header id="header">
   <div class="container">
     <div id="logo" class="pull-left">
       <a href="home.php"><img src="img/logo.png" alt=""></a>
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

?>

<div class="block bg-primary block-pd-lg block-bg-overlay conteiner text-center" data-bg-img="img/SfondoStellato.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
 <div class="container">
  <h2 class="mb-5">BENVENUTO <?php echo "$nome $cognome"; ?></h2>
  <br>
 
 </div>
</div>
  
<section class="portfolio" id="funzionalita">
    <div class="container text-center">
      <h2>Funzionalità</h2>
      <p>Inizia a collaborare con il tuo comune toccando le immagini per accedere alle funzionalità che CivicSens ti offre</p>
    </div>

    <div class="portfolio-grid">
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a><img alt="" src="img/homecitt/segnal.jpg">
              <div class="portfolio-over">
                <div>
                 <h3 class="card-title">Effettua Segnalazioni</h3>
                 <p class="card-text">
                 Accedi a questa sezione per fare una segnalazione!
                 </p>
                 <br>
                 <form method="POST" action="homeCittadino.php">
                 <input type="submit" name="Segnala" value="Segnala" class="btn btn-ente">
                 </form> 

                </div>
              </div></a>
          </div>
        </div>


                <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a><img alt="" src="img/homeEnte/statistiche1.png">
              <div class="portfolio-over">
                <div>
                 <h3 class="card-title">Visualizza Statistiche</h3>
                 <p class="card-text">
                 Accedi a questa sezione per visualizzare le statistiche!
                 </p>
                 <br>
                 <form method="POST" action="homeCittadino.php">
                 <input type="submit" name="Statistiche" value="Statistiche" class="btn btn-ente">
                 </form> 
                </div>
              </div></a>
          </div>
        </div>

                <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a><img alt="" src="img/homeEnte/visualizza1.jpg">
              <div class="portfolio-over">
                <div>
                 <h3 class="card-title">Visualizza Segnalazioni</h3>
                 <p class="card-text">
                 Accedi a questa sezione per visualizzare le segnalazioni preseni nel tuo comune!
                 </p>
                 <br>
                   <form method="POST" action="homeCittadino.php">
                 <input type="submit" name="Sengnalazioni" value="Segnalazioni" class="btn btn-ente">
                 </form> 
                </div>
              </div></a>

          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a><img alt="" src="img/homecitt/impostazioni1.jpg">
              <div class="portfolio-over">
                <div>
                 <h3 class="card-title">Profilo</h3>
                 <p class="card-text">
                 Accedi a questa sezione per modificare il tuo profilo!
                 </p>
                 <br>
                   <form method="POST" action="homeCittadino.php">
                 <input type="submit" name="Profilo" value="Profilo" class="btn btn-ente">
                 </form> 
                </div>
              </div></a>
          </div>
        </div>

  </div>
 </div>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
</section>


<div id="contatti" class="block bg-primary block-pd-lg block-bg-overlay conteiner text-center" data-bg-img="img/SfondoStellato.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
  <h2>Contatti</h2>
  <br>
<div class="row justify-content-center">
       <div class="col-lg-3 col-md-4">
         <div class="info">
           <div>
             <em class="fa fa-map-marker"></em>
             <p>Campus Università degli Studi di Bari "Aldo Moro", BARI</p>
           </div>

           <div>
             <em class="fa fa-envelope"></em>
             <p>ambrogioLosito@gmail.com</p>
           </div>

           <div>
            <em class="fa fa-envelope"></em>
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
