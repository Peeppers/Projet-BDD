<?php
//Schwing Lucas
//Porcu Baptiste
include("parametres.php");
session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
try
{
	
	
	$username = htmlspecialchars(trim($_POST['uname']));
	$passwordco = htmlspecialchars(trim($_POST['pswCo']));
	
	
	if(empty($username)) {
		echo "Le champ Pseudo est vide.";
	} 
	else 
	{
		// on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
		if(empty($passwordco)) {
			echo "Le champ Mot de passe est vide.";
		} 
		else 
		{
			// les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
			$Pseudo = htmlentities($username, ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
			$MotDePasse = htmlentities($passwordco, ENT_QUOTES, "ISO-8859-1");
			//on se connecte à la base de données:
			
			$bdd = new PDO('mysql:host='. $host .';dbname='. $base .';charset=utf8', $user, $pass);
			//on vérifie que la connexion s'effectue correctement:
			if(!$bdd){
				echo "Erreur de connexion à la base de données.";
			} 
			else 
			{
				// on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
				$MotDePasse=md5($MotDePasse);
				$request = 'SELECT * FROM abonnes WHERE adresseMail = \''.$Pseudo.'\' AND mdpAbonne = \''.$MotDePasse.'\'';//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
				$compte=$bdd->query($request);
				if($compte=='') {
					echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
				} 
				else 
				{
					// on ouvre la session avec $_SESSION:
					$_SESSION['pseudo'] = $username; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
					echo "Vous êtes à présent connecté !";
					$_SESSION['user'] = $username;
					$username = $_SESSION['user'];			// set session and redirect to index page
						if (isset($_SESSION['user'])) {
							print_r($_SESSION);
							header("Location: user.php");
				
								exit;
            }

				}
            }
        }
	}
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>