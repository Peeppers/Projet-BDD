<?php 
//Schwing Lucas
//Porcu Baptiste
session_start();
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
} 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=parking;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
	
}

$username = $_SESSION['user'];

		$result = $bdd->prepare("SELECT * FROM abonnes WHERE adresseMail='$username'");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			 $nom=$row['nomAbonne'];
			 $prenom=$row['prenomAbonne'];
			 $plaque = $row['immatriculationAbonnes'];
			 $adresse = $row['adresseAbonnes'];
			 $codePostal = $row['codePostalAbonnes'];
			 $iban = $row['ibanAbonne'];
			 $telephone = $row['telephoneAbonne'];
} 	?>
		
		  
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8"/>
		<title>Page Title</title>
		<link rel="stylesheet" media="screen" type="text/css" href="style.css"/>
	</head>
<body>
	<div class="header">
	
		<h1>Bienvenue au parking le Fapt</h1>
		<h2>Bonjour <?php echo $prenom;?> <?php  echo  $nom;?></h2>
		<p>Votre plaque d'imatriculation est : <?php echo $plaque;?></p>
	</div>

	<div class="navbar">
		<div class="navbar">
			<a href="user.php">Accueil</a>
			<a onclick="document.getElementById('id01').style.display='block'" checked="checked">Profil</button></a>
			<a href="abonnement.php">Modification abonnement</a>
			<a href="deconnection.php">Déconnexion</a>
	</div>

	<div class="row">
		<div class="side">
			<h2>Actualité</h2>
			<img src="parkingpsm.jpg" width="100%">
	</div>
	
		
		<!-- Profil -->
		
<div id="id01" class="modal">
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container">
		<h1>Profil</h1>
			<ul>
				<li>Prenom : <?php echo $prenom;?></li>
				<li>Nom : <?php  echo  $nom;?></li>
				<li>Immatriculation : <?php echo $plaque;?></li>
				<li>Adresse : <?php echo $adresse;?></li>
				<li>Code Postal : <?php echo $codePostal;?></li>
				<li>Iban : <?php echo $iban;?></li>
				<li>Telephone : <?php echo $telephone;?></li>
			</ul> 
    </div>
  </form>
</div>
		<!-- Script connexion -->
<script>
	// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>
	
</body>
</html> 

	





	












