<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8"/>
		<title>Page Title</title>
		<link rel="stylesheet" media="screen" type="text/css" href="style.css"/>
	</head>
	<body>
	<div class="header">
  <h1>Parking résidence Arborea</h1>
  <p>Parking de 20 places</p>
    </div>

<div class="navbar">
  <a href="#">Accueil</a>
  <a onclick="document.getElementById('id01').style.display='block'" checked="checked">Connexion</button></a>
  <a <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">S'inscrire</button></a>
  <a href="information.html">Information</a>
  <a href="Setup.php">Initialisation bases de donnée</a>
</div>

<div class="row">
  <div class="side">
      <h2>Actualité</h2>
      
	  <img src="parkingpsm.jpg" width="100%">
  </div>
</div>

		<!-- Connexion -->
		
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="connexion.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <label for="uname"><b>Nom d'utilisateur</b></label>
      <input type="text" placeholder="Entrez nom d'utilisateur" name="uname" required>

      <label for="psw"><b>Mot de passe</b></label>
      <input type="password" placeholder="Entrez le mot de passe" name="pswCo" required>
        
      <button type="submit">Se connecter</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Se rappeler de moi
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtnCo">Annuler</button>
      <span class="psw">Mot de passe <a href="#">oublié ?</a></span>
    </div>
  </form>
</div>

		<!-- Inscription -->

		
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" action="register.php" method="post">
    <div class="container">
      <h1>Inscription</h1>
      <p>Remplir le formulaire pour vous inscrire.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer Email" name="email" required>

      <label for="psw"><b>Mot de passe</b></label>
      <input type="password" placeholder="Entrer mot de passe" name="psw" required>

      <label for="psw-repeat"><b>Répéter le mot de passe</b></label>
      <input type="password" placeholder="Répéter le mot de passe" name="psw-repeat" required>
      
	  <label for="adresse"><b>Adresse</b></label>
      <input type="text" placeholder="Entrer adresse" name="adresse" required>
	  
	  <label for="codepostal"><b>Code postal</b></label>
      <input type="text" placeholder="Entrer code postal" name="codepostal" required>
	  
	  <label for="nom"><b>Nom</b></label>
      <input type="text" placeholder="Entrer nom" name="nom" required>
	  
	  <label for="prenom"><b>Prénom</b></label>
      <input type="text" placeholder="Entrer prénom" name="prenom" required>
	  
	  <label for="Plaque d'immaticulation"><b>Plaque d'immatriculation</b></label>
      <input type="text" placeholder="Entrer plaque d'immaticulation" name="immatriculationAbonne" required>
	  
	  <label for="Iban"><b>Iban</b></label>
      <input type="text" placeholder="Entrer IBAN" name="iban" required>
	  
	  <label for="telephone"><b>Téléphone</b></label>
      <input type="text" placeholder="Entrer téléphone" name="telephone" required>
	  
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Se rappeler de moi
      </label>

      <p>En créant vôtre compte, vous accepté les <a href="#" style="color:dodgerblue">termes et utilisation</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annuler</button>
        <button type="submit" name="submit" class="signupbtn">S'inscrire</button>
      </div>
    </div>
  </form>
</div>

		<!-- Script Inscription -->

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
		
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