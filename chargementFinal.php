<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$connexion=new PDO($dsn);

$flocons=$_POST['flocon'];

$numeroSilo=$_POST['silo'];
$quantite=$_POST['quantite'];
$variete=$_POST['flocons'];



$receptionnerUnLotDeCereales="pageActuelle"; //l'onglet de la page sera affiché en surbrillance

//les flocons sont déduits des stocks
$requete=$connexion->prepare(
    "UPDATE  stockageProduitsFinis
    SET quantité=quantité-$quantite
    WHERE numéro_silo=$numeroSilo"
);

$requete->execute(); 

  
$contenu="<h1>Vous avez chargé le lot de flocons suivant :</h1>";
$contenu.="<div><li>silo numéro " .$numeroSilo . "</li>";
$contenu.="<li>" . $variete . "</li>";
$contenu.="<li> " . $quantite . "tonnes</li>";
$contenu.="</div>";










require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>