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
         <li><a href="homeEnte.php">Home</a></li>
         <li><a href="gestisciSquadra.php">Gestisci Squadra</a></li>
         <li><a href="#contatti">Contatti</a></li>
         <li><a class="nav-link js-scroll-trigger" href="logout.php">Logout</a></li>
       </ul>
     </nav>
   </div>


 </header>

<section class="portfolio" id="features">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Visualizza Segnalazioni di <?php echo "$comune"; ?></h2>
          
          <hr>
        </div>
       
 <div class="row">
<form method='post' action=" tueSegnalazioniEnte.php  ">
  <div class="form-inline align-items-center">
  
    	 <div class="col-md-4">
         <select class="form-control" style="width:200px" name="importanza">
          
          <option>Tutte</option>
          <option>Alta</option>
          <option>Media</option>
          <option>Bassa</option>
     </select>
    
      </div>         
<div class="col-md-1"></div>
     <div class="col-md-4">
       
          <select class="form-control" style="width:200px" name="stato">
          <option>Tutte</option>
          <option>approvata</option>
          <option>sospeso</option>
          <option>rifiutata</option>
     	</select>
     </div>
     
    
    <div class="col-md-1"></div>
     <div class="col-md-2">
    <input name="Cerca" type="submit" class="btn btn-ente" value="Cerca">
  
  </div>
 </div> 
</form>
</div>
</div>  



<hr>
    <div class="container">
  <?php 
include"db.php";


if(!isset ($_POST['Cerca'])){

$query=mysql_query("select * from segnalazioni where comune = 1 ");
}else if(isset ($_POST['Cerca'])){
                      $stato=$_POST['stato'];
                      $importanza=$_POST['importanza'];
                      
                      
                      
   
                      
                      
                      
                      if($_POST['importanza']=='Tutte' && $_POST['stato']=='Tutte'){
                      $query=mysql_query("select * from segnalazioni where comune = 1 ");
                      }else
                      if($_POST['importanza']=='Tutte' && $_POST['stato']!='Tutte'){
                       $query=mysql_query("select * from segnalazioni where stato='$stato' and comune = 1 ");}
                      else if($_POST['importanza']!='Tutte' && $_POST['stato']=='Tutte'){
                      $query=mysql_query("select * from segnalazioni where importanza='$importanza' and comune = 1 ");
                      }else if($_POST['importanza']!='Tutte' && $_POST['stato']!='Tutte'){
                      $query=mysql_query("select * from segnalazioni where  stato='$stato'and importanza='$importanza' and comune = 1 " );
                      }
                      }
                      



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
          
          
         
        <a href="VisualizzaInformazioniEnte.php?tracking=<?php echo $tracking ?>" class="btn btn-link" >Visualizza informazioni</a>
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
