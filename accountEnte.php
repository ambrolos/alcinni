<?php 
include "db.php";
session_start();

$nome_update=$_POST['nome'];
$cognome_update=$_POST['cognome'];
$mail_update=$_POST['mail'];
$password_update=$_POST['password'];
if(isset($_POST['Modifica'])){


mysql_query("update ente set nome='$nome_update',cognome='$cognome_update', mail='$mail_update',password='$password_update' where id=".$_SESSION['id_ente']);
session_start();
       $nome=$_SESSION['nome'];
	$cognome=$_SESSION['cognome'];
    $idUtente=$_SESSION['id_ente'];



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
         <li><a href="homeEnte.php">Home</a></li>
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

<div class="block bg-primary block-pd-lg block-bg-overlay conteiner text-center" data-bg-img="img/SfondoStellato.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
 <div class="container">
  <h2 class="mb-5">BENVENUTO <?php echo "$nome $cognome"; ?></h2>
 </div>
 <div class="screen">
  <p class="md-5">In questa sezione è possibile modificare il proprio profilo e modificare la password</p> 
 </div>
</div>

<div class="portfolio">
<br>
    <div class="container text-center">
      <h2>Profilo</h2>
    </div>
    
       
<?php
include "db.php";
    $query=mysql_query("select * from ente where id_ente=$idUtente");

         
while($result=mysql_fetch_array($query))
{
$nome=$result['nome'];
$cognome=$result['cognome'];
$mail=$result['mail'];
$password=$result['password'];
}?>
    
      
        <form method="POST" action="accountEnte.php">
       <div align="center" class="form-group row">
       	<label for="example-text-input" class="col-6 col-form-label">Nome</label>
        <div class="col-4">
        	<input class="form-control" type="text" value="<?php echo $nome?>" name="nome">
            </div>
        </div>
        <div align="center" class="form-group row">
        <label for="example-text-input" class="col-6 col-form-label">Cognome</label>
        <div class="col-4">
        	<input class="form-control" type="text" value="<?php echo $cognome?>" name="cognome">
            </div>
            </div>
        <div align="center" class="form-group row">    
        <label for="example-text-input" class="col-6 col-form-label">Email</label>
        <div class="col-4">
        	<input class="form-control" type="text" value="<?php echo $mail?>" name="mail">
            </div>
            </div>
        <div align="center" class="form-group row">    
        <label for="example-text-input" class="col-6 col-form-label">Password</label>
        <div class="col-4">
        	<input class="form-control" type="text" value="<? echo $password?>" name="password">
            </div>
            </div>
        <div class="form-group row" >   
       <div class="col-7"></div>
      
       <div class="col-3" >
       <input type="submit" class="btn btn-ente"  name="Modifica" value="Salva">

       </div>
       <div class="col-2"></div>
       </div>
       </form>
       
       <br>
       <br>
       </div>



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