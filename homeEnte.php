<?php
session_start();

include "controlloDB.php";
if(isset($_POST['login']))
login();

 if(isset($_POST['segnalazioni']))
{session_start();
$nome=$_SESSION['nome'];
	$cognome=$_SESSION['cognome'];
    $idUtente=$_SESSION['id_ente'];
    $id_comune=$_SESSION['id_comune'];
 header("Location:tueSegnalazioniEnte.php");
 }
 
  if(isset($_POST['Gestisci']))
{session_start();
$nome=$_SESSION['nome'];
	$cognome=$_SESSION['cognome'];
    $idUtente=$_SESSION['id_ente'];
 header("Location: gestisciSquadra.php");
 }
 
 if(isset($_POST['Statistiche'])){
 session_start();
 $nome=$_SESSION['nome'];
	$cognome=$_SESSION['cognome'];
    $idUtente=$_SESSION['id_ente'];
 header("Location:visualizzaStatisticheEnte.php");
 }
  if(isset($_POST['Profilo'])){
 session_start();
 $nome=$_SESSION['nome'];
	$cognome=$_SESSION['cognome'];
    $idUtente=$_SESSION['id_ente'];
 header("Location:accountEnte.php");
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
       <a href="home.php"><img src="img/logo.png" alt=""></a>
     </div>    
            
     <nav id="nav-menu-container">
       <ul class="nav-menu">
         <li><a href="homeEnte.php">Home</a></li>
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
$idUtente=$_SESSION['id_ente'];

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
  
  <p>Ente appartenente al comune di <?php echo "$comune"; ?></p>
 </div>
</div>

<section class="portfolio" id="funzionalita">
    <div class="container text-center">
      <h2>Funzionalità</h2>
      <p>Tieni sempre sotto controllo il tuo lavoro...</p>
    </div>

    <div class="portfolio-grid">
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a><img alt="" src="img/homeEnte/visualizza1.jpg">
              <div class="portfolio-over">
                <div>
                 <h3 class="card-title">Visualizza Segnalazioni</h3>
                 <p class="card-text">
                 Accedi a questa sezione per visualizzare le segnalazioni presenti nel tuo comune!
                 </p>
                 <br>
                 <form method="POST" action="homeEnte.php">
                   <input type="submit" name="segnalazioni" value="Segnalazioni" class="btn btn-ente">
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
                 <form method="POST" action="homeEnte.php">
                   <input type="submit" name="Statistiche" value="Statistiche" class="btn btn-ente">
                   </form>
                </div>
              </div></a>
          </div>
        </div>
        
                <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a><img alt="" src="img/homeEnte/squadre1.jpg">
              <div class="portfolio-over">
                <div>
                 <h3 class="card-title">Gestione Squadre</h3>
                 <p class="card-text">
                 Accedi a questa sezione per gestire le squadre di risoluzione!
                 </p>
                 <br>
                   <form method="POST" action="homeEnte.php">
                 <input type="submit" name="Gestisci" value="Gestisci" class="btn btn-ente">
                 </form> 
                </div>
              </div></a>
             
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a><img alt="" src="img/homeEnte/impostazioni1.jpg">
              <div class="portfolio-over">
                <div>
                 <h3 class="card-title">Profilo</h3>
                 <p class="card-text">
                 Accedi a questa sezione per modificare il tuo profilo!
                 </p>
                 <br>
                   <form method="POST" action="homeEnte.php">
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
<?php
session_start();
include "db.php";
$nome=$_SESSION['nome'];
$cognome=$_SESSION['cognome'];
$idUtente=$_SESSION['id_ente'];
$id_comune=$_SESSION['id_comune'];

$sql=mysql_query("select nome_comune from comune inner join ente where comune.id_comune=ente.comune");  
 while($result=mysql_fetch_array($sql))
     {
    $comune=$result['nome_comune'];
																
      }
      
   
?>
<section class="about" id="features">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Notifiche Segnalazioni concluse di <?php echo "$comune"; ?></h2>
          <hr>
        </div>
        
        <div class="row">
        <?php
        if(isset($_POST['Cancella'])){

mysql_query("DELETE FROM segnalazioni WHERE comune = 1 and stato = 'conclusa' ");
header("Location:homeEnte.php");
}
        ?>
         <form name="FormCancellazione" method="post" action="homeEnte.php">
           
           <h3>Clicca su  <input class="btn btn-primary" type="submit" value="Cancella" name="Cancella"> per eliminare le segnalazioni concluse del tuo comune</h3>
        </form>
        </div>
</div>  



<hr>
    <div class="container">
  <?php 
include"db.php";


$query=mysql_query("select * from segnalazioni where comune = 1 and stato = 'conclusa'");



while($result=mysql_fetch_array($query))
{
$descrizione=$result['descrizione'];
$tracking=$result['tracking'];
$foto=$result['foto'];
$gruppo=$result['gruppo'];
$data=$result['data'];
$importanza=$result['importanza'];
$stato=$result['stato'];

if($importanza=='alta'){
$colore="red";
}else if($importanza=='media'){
$colore="yellow";
}else if ($importanza=='bassa'){
$colore="green";
}



?>

     <h1 class="my-4">Codice Tracking
        <small> <?php echo $tracking ?></small>
      </h1>

      <!-- Project One -->
      <div class="row">
        <div class="col-lg-8 col-sm-6 col-xs-12">
          
           <!-- <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">-->
          <img class="card card-block" src="<?php echo $foto ?>" alt="" width=700 height=300>
        
         </div>
         <div class="col-md-4">
          <h3>Descrizione</h3>
          <p><?php echo $descrizione ?></p>
          
            <h3>Data</h3>
          <p><?php echo $data ?> </p>
            <h3>Gruppo</h3>
          <p><?php echo $gruppo ?> </p>
         
       
        <!--<div class="col-md-4">-->
        <h3>Importanza</h3>
        <span class="<?php echo $colore?>"></span>
        <h3>Stato</h3>
        <p ><?php echo $result['stato'] ?></p>
        
        </div>


<?php
}?>


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
