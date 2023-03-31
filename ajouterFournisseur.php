<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//si le fournisseur se trouve dans un lieu-dit, le numéro de rue par défaut sera 0
if($_POST['numéro_de_rue_fournisseur']==""){
  $_POST['numéro_de_rue_fournisseur']=0;
}

//le numéro du fournisseur (id), qui sera incrémenté automatiquement 
$id=0;

//récupération des données du formulaire
$nom_fournisseur=$_POST['nom_fournisseur'];
$numéro_de_rue_fournisseur=$_POST['numéro_de_rue_fournisseur'];
$adresse_fournisseur=$_POST['adresse_fournisseur'];
$ville_fournisseur=$_POST['ville_fournisseur'];
$code_postal_fournisseur=$_POST['code_postal_fournisseur'];
$values="$id,'$nom_fournisseur','$numéro_de_rue_fournisseur','$adresse_fournisseur','$ville_fournisseur','$code_postal_fournisseur'";
$fournisseur='fournisseur(numéro_fournisseur, nom_fournisseur, numéro_de_rue_fournisseur,adresse_fournisseur, ville_fournisseur, code_postal_fournisseur)';

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";

$connexion=new PDO($dsn);


$ajouterUnClient="pageActuelle";
$requete=$connexion->prepare('INSERT INTO '.$fournisseur.' VALUES('.$values.')');
try{
  $requete->execute(); 
  $requete=$connexion->prepare('SELECT count(*) FROM fournisseur');
$requete->execute();
$resultat=$requete->fetchAll();
  $contenu="<h1>Vous avez ajouté le fournisseur suivant :</h1>";
  $contenu.="<div><li>fournisseur numéro " .$resultat[0][0] . "</li>";
    $contenu.="<li>" . $nom_fournisseur . "</li>";
    $contenu.="<li>" . $numéro_de_rue_fournisseur . "</li>";
    $contenu.="<li>" . $adresse_fournisseur . "</li>";
    $contenu.="<li>" . $ville_fournisseur . "</li>";
    $contenu.="<li>" . $code_postal_fournisseur . "</li>";
    $contenu.="</div>";
}
catch(Exception $e) {
  $contenu= '<h1>Ajout impossible</h1> 
  Un fournisseur du même nom se trouve dans la base de donnée
  <br><br>
  Message d\'erreur :' .$e->getMessage();
}







require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>



