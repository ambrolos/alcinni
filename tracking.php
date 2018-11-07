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
}


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
         <li><a href="home.php">Home</a></li>
         <li><a href="login.php">Login</a></li>
         <li><a href="registrazione.php">Registrati</a></li>
       </ul>
     </nav>
   </div>
</header>

<section class="portfolio" id="features">
 <div class="container">
 <h3>Cerca una segnalazione </h3>
<form name="FormInserisci" class="form-inline" method="post" action="tracking.php">
  <input type="text" class="form-control" placeholder="Codice di Tracking" name='Codice_inserito'>
   <input type="submit" class="btn btn-ente" name='Cerca' value="Cerca">
</form>
</div><br>

<div class="container">
<?php 
include"db.php";

if(isset ($_POST['Cerca'])){
$codice_Tracking=$_POST['Codice_inserito'];
$query=mysql_query("select * from segnalazioni where tracking='$codice_Tracking'");
}
while($result=mysql_fetch_array($query))
{
$descrizione=$result['descrizione'];
$tracking=$result['tracking'];
$foto=$result['foto'];
$posizione=$result['posizione'];
$gruppo=$result['gruppo'];
$importanza=$result['importanza'];
$data=$result['data'];
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
        <div class="col-md-8">
          
           <!-- <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">-->
          <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $foto ?>" alt="" width=700 height=300>
        
         </div>
         <div class="col-md-4">
         
         <h3>Data</h3>
          <p><?php echo $data ?></p>
          
          <h3>Descrizione</h3>
          <p><?php echo $descrizione ?></p>
        
        <h3>Importanza</h3>
        <span class="<?php echo $colore?>"></span>
        
       <h3>Gruppo</h3>
          <p><?php echo $gruppo ?></p>
          
        <h3>Stato</h3>
        <p ><?php echo $result['stato'] ?></p>
       
        </div>
       
<?php
}?>


</div>

 </div><br>
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
