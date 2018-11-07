<?php 
include "db.php";
function login()
{
		$username=$_POST['mail'];
	    $password=$_POST['password'];
	    $sql=mysql_query("select * from cittadino where mail='$username' and password='$password'");
	    $numero=mysql_num_rows($sql);
        if($numero!=0){
              while($data=mysql_fetch_array($sql)){
		            $dbidUtente=$data['id'];

 	                $dbpassword=$data['password'];

 	                $nome=$data['nome'];
                    $mail=$data['mail'];

 	                $cognome=$data['cognome'];
	
                    session_start();
                    $_SESSION['nome']=$nome;
		            $_SESSION['cognome']=$cognome;
                    $_SESSION['id']=$dbidUtente;
		            header("Location:homeCittadino.php");
                                                  }
                      }
	     else
        {

					$sql=mysql_query("select * from ente where mail='$username' and password='$password'");
					//$data=mysql_fetch_array($sql);
				    $numero=mysql_num_rows($sql);
                     if($numero!=0){
                        while($data=mysql_fetch_array($sql)){
		                      $dbidUtente=$data['id_ente'];

 	                          $dbpassword=$data['password'];

 	                          $nome=$data['nome'];
                              $mail=$data['mail'];

                              $cognome=$data['cognome'];
	
                              session_start();
                              $_SESSION['nome']=$nome;
		                      $_SESSION['cognome']=$cognome;
                              $_SESSION['id_ente']=$dbidUtente;
		                      header("Location:homeEnte.php");
					
        
                                                            }
                                    }else{$sql=mysql_query("select * from squadra where mail='$username' and password='$password'");
					//$data=mysql_fetch_array($sql);
				    $numero=mysql_num_rows($sql);
                     if($numero!=0){
                        while($data=mysql_fetch_array($sql)){
		                      $dbidUtente=$data['id_squadra'];

 	                          $dbpassword=$data['password'];

 	                          $nome=$data['nome'];
                              $mail=$data['mail'];

                            
	
                              session_start();
                              $_SESSION['nome']=$nome;
		                      
                              $_SESSION['id_squadra']=$dbidUtente;
		                      header("Location:homeSquadra.php");
					
        
                                    }
                                    }else{$sql=mysql_query("select * from manager where mail='$username' and password='$password'");
					//$data=mysql_fetch_array($sql);
				    $numero=mysql_num_rows($sql);
                     if($numero!=0){
                        while($data=mysql_fetch_array($sql)){
		                      $dbidUtente=$data['id_manager'];

 	                          $dbpassword=$data['password'];

 	                          $nome=$data['nome'];
                              $mail=$data['mail'];

                            
	
                              session_start();
                              $_SESSION['nome']=$nome;
		                      
                              $_SESSION['id_manager']=$dbidUtente;
		                      header("Location:homeManager.php");
					
        
                                    }
                                    }
                          }
                          }
                          }
 }
 
 
  function registrazione()
 {
 $nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$email=$_POST['mail'];
    $password=$_POST['password'];
	
if(isset($_POST['Registrati']))
{

	$sql=mysql_query("INSERT INTO Utente(nome,cognome, mail, password) VALUES ('$nome', '$cognome', '$email', '$password')");
	$id=mysql_insert_id();
    session_start();
        $_SESSION['nome']=$nome;
		$_SESSION['cognome']=$cognome;
         $_SESSION['id']=$id;
       
		header("Location:Home.php");
	
}

}
 ?>
