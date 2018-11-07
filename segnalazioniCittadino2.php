<?php
session_start();
include"db.php";
 $idSegnala=$_SESSION['id_segnalazione'];

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
<?php
session_start();
$nome=$_SESSION['nome'];
$cognome=$_SESSION['cognome'];
$idUtente=$_SESSION['id'];
?>
  <section class="hero">
    <div class="container text-center">
     <div class="row">
     </div>
      <div class="col-md-12">
        <div class="container">
  <h1 class="mb-5">Congratulazioni <?php echo "$nome $cognome";?>! </h1>
   <h2 class="mb-5">ora cosa desideri fare? </h2>
 
 </div>
        <br>
        <a class="btn btn_full" href="homeCittadino.php">Home</a>
        <br>
        <br>
        <a class="btn btn_full" href="tueSegnalazioni.php">Visualizza Segnalazioni</a>
        <br>
        <br>
        <a class="btn btn_full" href="segnalazioniCittadino.php">Nuova Segnalazione</a>
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
