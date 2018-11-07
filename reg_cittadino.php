<?php
include "db.php";
$nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$mail=$_POST['mail'];
    $password=$_POST['password'];


if(isset($_POST['registrati_cittadino'])){
    $query=mysql_query("Select * from cittadino where mail='$mail'");
     $numero=mysql_num_rows($query);
     if($numero!=0){
       echo"<script type='text/javascript'>
       alert('mail non valida perchè gia presente!!');

       </script>";

     }else{


   
	$sql=mysql_query("INSERT INTO cittadino(nome,cognome, mail, password) VALUES ('$nome', '$cognome', '$mail', '$password')");
	$id=mysql_insert_id();
    session_start();
        $_SESSION['nome']=$nome;
		$_SESSION['cognome']=$cognome;
         $_SESSION['id']=$id;

		header("Location:homeCittadino.php");
	}
}

?>
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
<section class="hero">
 <div class="container text-center" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <font color="#000000">REGISTRATI</font>
  <a class="btn btn_full" href="home.php">X</a>
  </div>
 <div class="modal-body">
 <form  name="formRegistrazione_cit"role="form" method="POST" action="reg_cittadino.php" onsubmit="return controlla_registrazione_cit();" >

  <div class="form-group">
  <div class="input-group">
  <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
  </div>
  </div>

  <div class="form-group">
  <div class="input-group">
  <input type="text" class="form-control" id="cognome" placeholder="Cognome" name="cognome">
  </div>
  </div>

 <div class="form-group">
 <div class="input-group">
 <input type="text" class="form-control" id="mail" placeholder="Email" name="mail">
 </div>
 </div>

 <div class="form-group">
 <div class="input-group">
 <input type="password" class="form-control" id="pasword" placeholder="Password" name="password">
 </div>
 </div>


  <div class="modal-footer">
  <input type="submit" class="form-control btn btn-primary" name="registrati_cittadino" value="Registrati">
 </div>
 </form>
 </div>

 </div>
 </div>
 </div>
 </section>

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