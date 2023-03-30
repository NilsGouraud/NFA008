<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);


$id=0;
$date=date('Y-m-d');
$numero_fournisseur=$_POST['fournisseur'];
$cereale=$_POST['cereale'];
$quantite=$_POST['quantite'];
$values="$id,'$date','$numero_fournisseur','$cereale','$quantite'";

$commandefournisseur='commandeFournisseur(numéro_commandeFournisseur, date_commandeFournisseur, numéro_fournisseur,variété_matière_première,quantité)';

$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
$connexion=new PDO($dsn);


$passerUneCommandePourDesCereales="pageActuelle";
$requete=$connexion->prepare('INSERT INTO '.$commandefournisseur.' VALUES('.$values.')');
  $requete->execute(); 
  $requete=$connexion->prepare('SELECT count(*) FROM fournisseur');
$requete->execute();
$resultat=$requete->fetchAll();
  $contenu="<h1>Vous avez ajouté la commande fournisseur suivante :</h1>";
  $contenu.="<div><li>commande fournisseur numéro " .$resultat[0][0] . "</li>";
    $contenu.="<li>" . $date . "</li>";
    $contenu.="<li>fournisseur numéro " . $numero_fournisseur . "</li>";
    $contenu.="<li>" . $cereale . "</li>";
    $contenu.="<li>" . $quantite . "</li>";
    $contenu.="</div>";



require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>



