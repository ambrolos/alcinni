<?php
session_start();
include "db.php";

$nome=$_SESSION['nome'];
$cognome=$_SESSION['cognome'];
$idUtente=$_SESSION['id'];

$target_dir = "img/segnalazioni/";


if (isset($_POST['Carica'])){
$descrizione= $_POST['descrizione'];
$settore= $_POST['settore'];
$importanza= $_POST['importanza'];

$comune=$_POST['comune'];
  $query=mysql_query("select * from comune where nome_comune='$comune'");

while($result=mysql_fetch_array($query))
{
   $id_comune=$result['id_comune'];
    }


$target_file = $target_dir  . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$tracking=$_POST['tracking'];
$idUtente=$_SESSION['id'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$data=$_POST['data'];
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)==false) {
       echo "Caricamento fallito";
   } else {
       $sql=mysql_query("INSERT INTO segnalazioni(descrizione,settore,foto,tracking,comune,id,importanza,lat,longi,data,gruppo,stato) VALUES ('$descrizione','$settore','$target_file','$tracking','$id_comune','$idUtente','$importanza','$lat','$lng','$data','non specificato','sospeso')");
 $idSegna=mysql_insert_id();
   session_start();
       $_SESSION['nome']=$nome;
   $_SESSION['cognome']=$cognome;
        $_SESSION['id']=$id;
        $_SESSION['id_segnalazioni']=$idSegna;
         $_SESSION['tracking']=$tracking;
          $_SESSION['stato']=$stato; 
          $idSegnala=$_SESSION['id_segnalazione'];
          

   header("Location:segnalazioniCittadino2.php");
   }
  
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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

</head>

<body>
<header id="header">
  <div class="container">
    <div id="logo" class="pull-left">
      <a href="home.php"><img src="img/logo.png"></a>
    </div>
   <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li><a href="homeCittadino.php">Home</a></li>
        <li><a href="#segnalazione">Inserisci Segnalazioni</a></li>
        <li><a href="#contatti">Contatti</a></li>
        <li><a class="nav-link js-scroll-trigger" href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>
<div class="block bg-primary block-pd-lg block-bg-overlay conteiner text-center" data-bg-img="img/SfondoStellato.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
 <div class="container">
  <h2 class="mb-5">Compila i campi per effettuare una segnalazione, vi sarà rilevata in automatico la tua posizione attuale!</h2>
 </div>
</div>
<div class="portfolio" id="segnalazione"><br>
<center><h2 class="mb-5">Inserisci Segnalazione</h2></center>

<form name ="Carica" method="POST" action="segnalazioniCittadino.php" enctype="multipart/form-data"  >
<!-- FOTO -->
<div class="form-group">
<div class="input-group">
<input type="file" class="form-control" name="fileToUpload" id="fileToUpload"/>
</div>

<input id="lat" type="text" name="lat" hidden="true" />
<input id="lng" type="text" name="lng" hidden="true" />
<?php
$a1= rand(1, 9999);
?>
<input type="text" size="4" name="tracking" value=" <?php echo"$a1"; ?>" hidden="true" />
<br>
</div>

       <div align="center" class="form-group row">
       	<label for="example-text-input" class="col-6 col-form-label">Descrizione</label>
        <div class="col-4">
        	<input class="form-control" type="text"  name="descrizione">
            </div>
        </div>
        
        <div align="center" class="form-group row">
       	<label for="example-text-input" class="col-6 col-form-label">Data</label>
        <div class="col-4">
        	<input class="form-control" type="date"  name="data">
            </div>
        </div>
        
        <div align="center" class="form-group row">
        <label for="example-text-input" class="col-6 col-form-label">Settore</label>
        <div class="col-4">
        	<select name="settore" class="form-control"><option> </option>
    <option value="elettricita">Elettricità</option>
    <option value="gas">Gas</option>
     <option value="telecomunicazione">Telecomunicazione</option>
      <option value="disastro">Disastro Ambientale</option>
       <option value="urbana">Urbano</option>
    <option value="idrica">Idrica</option></select>
     </div>
            </div>
            
              <div align="center" class="form-group row">    
        <label for="example-text-input" class="col-6 col-form-label">Comune</label>
        <div class="col-4">
        	<select class="form-control" placeholder="Comune" name="comune">
                     <?php
                     include"db.php";
                     $query=mysql_query("select * from comune");
                     while($result=mysql_fetch_array($query))
                    {?>


          			<option><?php echo $result['nome_comune'] ?></option>
         			<?php }?>
                                                                  
                    </select>
            </div>
            </div>
        <div align="center" class="form-group row">    
        <label for="example-text-input" class="col-6 col-form-label">Importanza</label>
        <div class="col-4">
        	<select name="importanza" class="form-control"><option value=""></option>
    <option value="bassa">Bassa</option>
    <option value="media">Media</option>
    <option value="alta">Alta</option></select>
            </div>
            </div>
        
        
<div class="modal-footer">
<input type="submit" class="form-control btn btn-primary" name="Carica" value="Carica">
</div>

</form>
<br><br>
</div>


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
<script>
	navigator.geolocation.getCurrentPosition(function (p)
    {
    	var lat = p.coords.latitude;
      	var lng = p.coords.longitude;
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
    });
    
  
</script>

</body>

</html>
