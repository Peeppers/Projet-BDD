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
	include("Parametres.php");
	$bdd = new PDO('mysql:host='. $host .';dbname='. $base .';charset=utf8', $user, $pass);
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
			 $parking = $row['id_parking'];
		} 
	$link=mysqli_connect($host,$user,$pass,$base);
	$req=mysqli_query($link,'SELECT nom_parking FROM parking_type WHERE id_parking=' . $parking);
	$nomparking=mysqli_fetch_row($req);

?>
		
		  
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8"/>
		<title>Page Title</title>
		<link rel="stylesheet" media="screen" type="text/css" href="style.css"/>
	</head>
<body>
	<div class="header">
	
		<h2>Bonjour <?php echo $prenom;?> <?php  echo  $nom;?></h2>
		<p>Votre plaque d'imatriculation est : <?php echo $plaque;?></p>
		<p>Vous êtes actuellement enregistré au parking : <?php echo $nomparking[0]; ?> </p>
	</div>

	<div class="navbar">
		<div class="navbar">
			<a href="user.php">Accueil</a>
			<a onclick="document.getElementById('id01').style.display='block'" checked="checked">Profil</button></a>
			<a <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Choix du parking</button></a>
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
				<li>Parking : <?php echo $nomparking[0];?></li>
			</ul> 
			<div class="container" style="background-color:#f1f1f1">
			<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtnCo">Annuler</button>
			</div>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="choix_parking.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
	<?php 
	include("parametres.php");
	$link=mysqli_connect($host,$user,$pass,$base);
	$id1=mysqli_query($link,'SELECT nombre_de_place FROM parking_type WHERE id_parking=1');
	$id2=mysqli_query($link,'SELECT nombre_de_place FROM parking_type WHERE id_parking=2');
	$id3=mysqli_query($link,'SELECT nombre_de_place FROM parking_type WHERE id_parking=3');
	$id4=mysqli_query($link,'SELECT nombre_de_place FROM parking_type WHERE id_parking=4');
	$nbr1=mysqli_fetch_row($id1);
	$nbr2=mysqli_fetch_row($id2);
	$nbr3=mysqli_fetch_row($id3);
	$nbr4=mysqli_fetch_row($id4);
	?>
		<select name="Parking" size="1">
		<option value="1"> <?php echo("Indigo Nancy Carnot, nombre de place restante : " . $nbr1[0] );?>
		<option value="2"> <?php echo("Parking Gare Nancy, nombre de place restante : " . $nbr2[0] );?>
		<option value="3"> <?php echo("Parking Dom Calmet, nombre de place restante : " . $nbr3[0] );?>
		<option value="4"> <?php echo("Parking Vaudémont, nombre de place restante : " . $nbr4[0] );?>
		</select>
      <button type="submit">Choisir ce parking</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtnCo">Annuler</button>
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

	





	












