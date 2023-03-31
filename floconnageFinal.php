<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$connexion=new PDO($dsn);

$cereale=$_POST['cereale'];

$numeroSiloSource=$_POST['siloSource'];
$numeroSiloCible=$_POST['siloCible'];
$quantite=$_POST['quantite'];
$variete=$_POST['cereale'];




$pointer="pageActuelle"; //l'onglet de la page sera affiché en surbrillance

//les céréales sont déduites du silo d'origine
$requete=$connexion->prepare(
    "UPDATE  stockageMatièresPremières
    SET quantité=quantité-$quantite
    WHERE numéro_silo=$numeroSiloSource"
);
$requete->execute(); 

//les flocons sont pointés dans le silo de destination 
$requete=$connexion->prepare(
    "UPDATE  stockageProduitsFinis
    SET quantité=quantité+$quantite
    WHERE numéro_silo=$numeroSiloCible"
);
$requete->execute(); 


  
$contenu="<h1>Vous avez floconné le lot de céréales suivant :</h1>";
$contenu.="<div><li>du silo numéro " .$numeroSiloSource;
$contenu.=" vers le silo numéro " .$numeroSiloCible . "</li>";
$contenu.="<li>" . $variete . "</li>";
$contenu.="<li> " . $quantite . "tonnes</li>";
$contenu.="</div>";





require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>