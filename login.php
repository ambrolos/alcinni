<?php 
include "db.php";
$nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$email=$_POST['mail'];
    $password=$_POST['password'];
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
      <h2><font color="#000000">ACCEDI</font></h2>
      <a class="btn btn_full" href="home.php">X</a>
      </div>
      <div class="modal-body">
     <form name="FormLogin" method="post" action="homeEnte.php" onsubmit="return controlla();">
      <div class="form-group">
      <div class="input-group">
      <input type="text" class="form-control" id="mail" placeholder="Email" name="mail">
      </div>
      </div>
      
      <div class="form-group">
      <div class="input-group">
      <input type="password" class="form-control"  placeholder="Password" name="password" type="password">
      </div>
      <a href="recuperaPass.php">Hai dimenticato la password?</a>
      </div>
      <div class="modal-footer">
      <input class="form-control btn btn-primary" type="submit" value="Login" name="login">
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