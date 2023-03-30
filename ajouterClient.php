<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//si le client se trouve dans un lieu-dit, le numéro de rue par défaut sera 0
if($_POST['numéro_de_rue_client']==""){
  $_POST['numéro_de_rue_client']=0;
}

//le numéro du client (id), qui sera incrémenté automatiquement 
$id=0;

//récupération des données du formulaire
$nom_client=$_POST['nom_client'];
$numéro_de_rue_client=$_POST['numéro_de_rue_client'];
$nom_rue=$_POST['nom_rue'];
$ville_client=$_POST['ville_client'];
$code_postal_client=$_POST['code_postal_client'];
$values="$id,'$nom_client','$numéro_de_rue_client','$nom_rue','$ville_client','$code_postal_client'";
$client='client(numéro_client, nom_client, numéro_de_rue_client,nom_rue, ville_client, code_postal_client)';

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
$connexion=new PDO($dsn);

$ajouterUnClient="pageActuelle"; //l'onglet de la page sera affiché en surbrillance

//insertion des données dans la table
$requete=$connexion->prepare('INSERT INTO '.$client.' VALUES('.$values.')');
try{
  $requete->execute(); 
  $requete=$connexion->prepare('SELECT count(*) FROM client');
  $requete->execute();
  $resultat=$requete->fetchAll();
  $contenu="<h1>Vous avez ajouté le client suivant :</h1>";
  $contenu.="<div><li>client numéro " .$resultat[0][0] . "</li>";
  $contenu.="<li>" . $nom_client . "</li>";
  $contenu.="<li>" . $numéro_de_rue_client . "</li>";
  $contenu.="<li>" . $nom_rue . "</li>";
  $contenu.="<li>" . $ville_client . "</li>";
  $contenu.="<li>" . $code_postal_client . "</li>";
  $contenu.="</div>";
}
catch(Exception $e) {
  //le nom du client doit être unique
  $contenu= '<h1>Ajout impossible</h1> 
  Un client du même nom se trouve dans la base de donnée
  <br><br>
  Message d\'erreur :' .$e->getMessage();
}


require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>



