<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);


print_r($_POST);
var_dump($_POST['client']);

$id=0;
$date=date('Y-m-d');
$numero_client=$_POST['client'];
$flocon=$_POST['flocon'];
$quantite=$_POST['quantite'];
$values="$id,'$date','$numero_client','$flocon','$quantite'";

$commandeClient='commandeClient(numéro_commandeClient, date_commandeClient, numéro_client,libellé_produit_fini,quantité)';

$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
$connexion=new PDO($dsn);


$recevoirUneCommandePourDesFlocons="pageActuelle";
$requete=$connexion->prepare('INSERT INTO '.$commandeClient.' VALUES('.$values.')');
  $requete->execute(); 
  $requete=$connexion->prepare('SELECT count(*) FROM client');
$requete->execute();
$resultat=$requete->fetchAll();
  $contenu="<h1>Vous avez ajouté la commande client suivante :</h1>";
  $contenu.="<div><li>commande client numéro " .$resultat[0][0] . "</li>";
    $contenu.="<li>" . $date . "</li>";
    $contenu.="<li>client numéro " . $numero_client . "</li>";
    $contenu.="<li>" . $flocon . "</li>";
    $contenu.="<li>" . $quantite . "</li>";
    $contenu.="</div>";



require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>



