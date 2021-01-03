<?php
  //Schwing Lucas
  //Porcu Baptiste
  include("Parametres.php");
 
  // Connexion au serveur MySQL
  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base)
or include("Setup.php"); 
?>
