<?php
include "db.php";
$nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$email=$_POST['mail'];
    $password=$_POST['password'];
    
if(isset($_POST['recupera'])){
$mail_recuperata=$_POST['mail_recupera'];
$query=mysql_query("select * from cittadino where mail='$mail_recuperata'");
$numero=mysql_num_rows($query);
if($numero!=0){

while($result=mysql_fetch_array($query))
{
   $password_recuperata=$result['password'];
    }
    invio_mail($mail_recuperata,$password_recuperata);
}else{ 
$query=mysql_query("select * from ente where mail='$mail_recuperata'");
$numero=mysql_num_rows($query);
if($numero!=0){

while($result=mysql_fetch_array($query))
{
   $password_recuperata=$result['password'];
    }
    invio_mail($mail_recuperata,$password_recuperata);
}else{
$query=mysql_query("select * from squadra where mail='$mail_recuperata'");
$numero=mysql_num_rows($query);
if($numero!=0){

while($result=mysql_fetch_array($query))
{
   $password_recuperata=$result['password'];
    }
  invio_mail($mail_recuperata,$password_recuperata);
     }
}
}
}

function invio_mail($mail,$password){

define("EOL", "\r\n");
	$header = "MIME-Version: 1.0" . EOL; 
$header .= "Content-Type: text/html" . EOL; 
$header .= "From: Civic Sense <ambrogioLosito@gmail.com>\n"; 
$header .="X-Priority: 2\r\n"; 
$destinatario = $mail;  
$object = "Recupero password"; 
$message = " 



Ecco la tua password: <br> 
 
<br>Questa la mail: $mail<br> 
<br>Questa la password:$password<br>

  "; 
mail($destinatario, $object,$message, $header); 
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
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <font color="#000000">RECUPERA PASSWORD</font>
      <a class="btn btn_full" href="login.php">X</a>
      </div>
      <div class="modal-body">
     <form name="FormLogin_recupera" method="post" action="login.php">
      <div class="form-group">
      <div class="input-group">
      <input type="text" class="form-control" id="mail" placeholder="Email" name="mail_recupera">
      </div>
      </div>
      <br><br><br><br>
      <div class="modal-footer">
      <input class="form-control btn btn-primary" type="submit" value="Recupera" name="recupera">
      </div>
      </form>
      </div>

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