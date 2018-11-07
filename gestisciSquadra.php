<?php
session_start();

include "db.php";
if(isset($_POST['login']))
login();




if(isset($_POST['Inserisci'])){
$nome_citta_inserito=$_POST['Gruppo_inserito'];
$query=mysql_query("Select * from gruppo where nome_comune='$nome_citta_inserito'");
$numero=mysql_num_rows($query);
if($numero!=0){

  echo"<script type='text/javascript'>alert('Squadra gia esistente!!');</script>";

}else{


$nome= mysql_real_escape_string($_POST['Gruppo_inserito']);
	
 mysql_query("insert into gruppo(nome) values('$nome')");
}
}
$sql = 'SELECT * FROM gruppo';
$query = mysql_query($sql) ;




     

        




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
       <a href="home.php"><img src="img/logo.png" alt=''></a>
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
?>


<div class="block bg-primary block-pd-lg block-bg-overlay conteiner text-center" data-bg-img="img/SfondoStellato.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
 <div class="container">
  <h2 class="mb-5">BENVENUTO <?php echo "$nome $cognome"; ?></h2>
  <br>
  <p>In questa sezione puoi aggiungere una Squadra di risoluzione che lavorerà per te al fine di concludere una segnalazione</p>
 </div>
</div>






<section class="portfolio" id="funzionalita">

      <div class="container">
        <div class="section-heading text-center">
          <h2>Aggiungi una Squadra</h2>
          <p class="text-muted"></p>
          <hr>
        </div>
        <div class="container">
<h3>Inserisci una Suadra </h3>
<form name="FormInserisci" class="form-inline" method="post" action="gestisciSquadra.php ">
  
  <input type="text" class="form-control" placeholder="Nome Squadra" name='Gruppo_inserito'>
  <input type="submit" class="btn btn-ente" name='Inserisci' value="Inserisci">
</form>


</div>
<br><br><br>


      <div class="container">
      	<form name="FormTabella" method="post" action="gestisciSquadra.php ">
      <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nome Squadra</th>
          
       </tr>
    </thead>
      <?php
include"db.php";
$query=mysql_query("select * from gruppo");
while($result=mysql_fetch_array($query))
{

?>
 <tbody>
      <tr>
        <td><?php echo $result['nome']?></td>
        
      </tr>


    </tbody>
   
    <?php }?>
  </table>
  </form>






      </div>
        
      </div>
</section>

<?php
session_start();

include "db.php";

if(isset($_POST['Arruola'])){
$nome=$_POST['nome'];
$mail_capo=$_POST['mail'];
$password=$_POST['password'];
$squadra=$_POST['squadra'];
$query=mysql_query("insert into squadra(nome, mail, password, comune, gruppo) values('$nome','$mail_capo','$password','1','$squadra')");

}
$sql = 'SELECT * FROM squadra';
$query = mysql_query($sql) ;


?>



<section class="portfolio" id="funzionalita">

      <div class="container">
        <div class="section-heading text-center">
          <h2>Aggiungi una Capo Squadra</h2>
          <p class="text-muted"></p>
          <hr>
        </div>
        <div class="container">

<form name="FormInserisci" class="form-inline" method="post" action="gestisciSquadra.php ">
  
  <input type="text" class="form-control" placeholder="CapoSquadra" name='capo'>
  <input type="text" class="form-control" placeholder="mail" name='mail'>
  <input type="text" class="form-control" placeholder="password" name='password'>
  <select class="form-control" style="width:200px" name="squadra">
        <option>Gruppo</option>
         <?php 
include"db.php";
$query=mysql_query("select * from gruppo");
while($result=mysql_fetch_array($query))
{
?>

          <option><?php echo $result['nome'] ?></option>
          <?php }?>
     </select>
  <input type="submit" class="btn btn-ente" name='Arruola' value="Arruola">
</form>


</div>
<br><br><br>


      <div class="container">
      	<form name="FormTabella" method="post" action="gestisciSquadra.php ">
      <table class="table table-condensed">
    <thead>
      <tr>
        <th>CapoSquadra</th>
        <th>Mail</th>
        <th>Password</th>
        <th>Gruppo</th>
     
          
       </tr>
    </thead>
      <?php
include"db.php";
$query=mysql_query("select * from squadra");
while($result=mysql_fetch_array($query))
{

?>
 <tbody>
      <tr>
        <td><?php echo $result['nome']?></td>
         <td><?php echo $result['mail']?></td>
          <td><?php echo $result['password']?></td>
           <td><?php echo $result['gruppo']?></td>
        
      </tr>


    </tbody>
   
    <?php }?>
  </table>
  </form>






      </div>
        
      </div><br><br><br>
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
