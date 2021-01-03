<?php
//Schwing Lucas
//Porcu Baptiste
session_start();
	try {
	include("parametres.php");
	$bdd = new PDO('mysql:host='. $host .';dbname='. $base .';charset=utf8', $user, $pass);
	$bdd->query("UPDATE parking_type SET nombre_de_place= nombre_de_place-1 WHERE id_parking=" . $_POST['Parking']); //Il y a une place en moins dans le parking choisi
	$req=$bdd->prepare('UPDATE parking_type SET nombre_de_place= nombre_de_place+1 WHERE id_parking IN (SELECT id_parking FROM abonnes WHERE adresseMail= ? )'); //Il y a une place en plus dans le parking où l'abonnes était
	$req->execute(array($_SESSION['user']));
	$abonnes = $bdd->prepare('UPDATE abonnes SET id_parking=? WHERE adresseMail=?');
	$abonnes->execute(array($_POST['Parking'], $_SESSION['user']));
	header("Location: user.php");
	}
	catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>