<?php
  //Schwing Lucas
  //Porcu Baptiste
  include("Parametres.php");
  $id=mysqli_connect($host,$user,$pass);
  $resultat=mysqli_query($id, "DROP DATABASE IF EXISTS $base");
  $resultat=mysqli_query($id, "CREATE DATABASE $base");
  mysqli_select_db($id, $base)
  or die("Impossible de sélectionner la base : $base");

  $resultat=mysqli_query($id, "CREATE TABLE IF NOT EXISTS `abonnes` (
  `idAbonnes` int(11) NOT NULL AUTO_INCREMENT,
  `adresseAbonnes` varchar(45) NOT NULL,
  `adresseMail` varchar(45) DEFAULT NULL,
  `codePostalAbonnes` int(11) NOT NULL,
  `immatriculationAbonnes` varchar(45) NOT NULL,
  `nomAbonne` varchar(45) NOT NULL,
  `prenomAbonne` varchar(45) NOT NULL,
  `ibanAbonne` varchar(45) NOT NULL,
  `telephoneAbonne` varchar(45) NOT NULL,
  `mdpAbonne` varchar(45) NOT NULL,
  PRIMARY KEY (`idAbonnes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
  $resultat=mysqli_query($id, "INSERT INTO `abonnes` (`adresseAbonnes`, `adresseMail`,
  `codePostalAbonnes`,`immatriculationAbonnes`,`nomAbonne`,`prenomAbonne`,`ibanAbonne`,`telephoneAbonne`,
  `mdpAbonne`) VALUES 
('Jarville la Malgrange', 'bp@gmail.com','54140','BF451TE','Porcu','Baptiste','982272892872','0699335698','azerty'),
('Vandoeuvre les Nancy', 'qm@gmail.com','54500','TERF42R','Mathieu','Quentin','28373848738','0689786756','ytreza'),
('Vandoeuvre les Nancy', 'ad@gmail.com','54500','FERG456T','Dozas','Arthur','983739928384','0767456563','12345'),
('Vandoeuvre les Nancy', 'ls@gmail.com','54500','PO879TE','Schwing','Lucas','27366474837','0689342167','6789')");
 
  $resultat=mysqli_query($id, "CREATE TABLE IF NOT EXISTS `ticket` (
  `immatriculation` varchar(45) NOT NULL,
  `dateHeureEntree` varchar(45) NOT NULL,
  `dateHeureSortie` varchar(45) NOT NULL,
  `IDEntre` int(11) NOT NULL AUTO_INCREMENT,
  `tarif` int(11) DEFAULT NULL,
  `Abonnes_idAbonnes` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDEntre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
  $resultat=mysqli_query($id, "INSERT INTO `ticket`
  (`immatriculation`, `dateHeureEntree`, `dateHeureSortie`, `tarif`, `Abonnes_idAbonnes`) VALUES 
('BF451TE','06/09/20 22:20:10','06/09/20 23:20:18',15,1),
('TERF42R','18/09/20 21:34,19','19/09/20 11:15:07',60,2),
('FERG456T','16/09/20 10:34:56','16/09/20 22:48:58',40,3),
('PO879TE','29/09/20 08:00:06','29/09/20 18:34:29',2,4)");

header("Location: index.php");
exit();
?>
