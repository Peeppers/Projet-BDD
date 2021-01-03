<?php
	//Schwing Lucas
	//Porcu Baptiste
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=parking;charset=utf8', 'root', '');
	$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
	$email = htmlspecialchars(trim($_POST['email']));
	$password = htmlspecialchars(trim($_POST['psw']));
	$repeatpassword = htmlspecialchars(trim($_POST['psw-repeat']));
	$adresse = htmlspecialchars(trim($_POST['adresse']));
	$codePostal = htmlspecialchars(trim($_POST['codepostal']));
	$Nom = htmlspecialchars(trim($_POST['nom']));
	$Prenom = htmlspecialchars(trim($_POST['prenom']));
	$immatriculationAbonne = htmlspecialchars(trim($_POST['immatriculationAbonne']));
	$iban = htmlspecialchars(trim($_POST['iban']));
	$telephone = htmlspecialchars(trim($_POST['telephone']));
	
   /* on test si les champ sont bien remplis */
    if($Nom&&$Prenom&&$email&&$password&&$repeatpassword)
    {
        /* on test si le mdp contient bien au moins 6 caractère */
        if (strlen($password)>=6)
        {
            /* on test si les deux mdp sont bien identique */
            if ($password==$repeatpassword)
            {
                // On crypte le mot de passe
                $password= md5($password);
                // on se connecte à MySQL et on sélectionne la base
                $bdd = new PDO('mysql:host=localhost;dbname=parking;charset=utf8', 'root', '');
                //On créé la requête
                $requete = "INSERT INTO abonnes (adresseAbonnes, adresseMail, codePostalAbonnes, immatriculationAbonnes, nomAbonne, prenomAbonne, ibanAbonne, telephoneAbonne, mdpAbonne) 
									VALUES ('$adresse', '$email', '$codePostal', '$immatriculationAbonne', '$Nom', '$Prenom', '$iban', '$telephone', '$password');";
                
				/* execute et affiche l'erreur mysql si elle se produit */
				if(($bdd->query($requete))==TRUE)
				{
					echo "Creer";
				}
				else {
					echo "Error: <br>" . $bdd->error;
				}
            //$bdd->close();
            }
            else echo "Les mots de passe ne sont pas identiques";
        }
        else echo "Le mot de passe est trop court !";
    }
    else echo "Veuillez saisir tous les champs !";
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>
