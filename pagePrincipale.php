<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";

$pdo=new PDO($dsn);

//récupération de la table client
$statement=$pdo->prepare("select * from client");
$statement->execute();
$clients=$statement->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table fournisseur
$statement=$pdo->prepare("select * from fournisseur");
$statement->execute();
$fournisseurs=$statement->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table commandeClient
$statement=$pdo->prepare("select * from commandeClient");
$statement->execute();
$commandesClient=$statement->fetchAll(PDO::FETCH_ASSOC);

$pagePrincipale="pageActuelle"; //l'onglet de la page sera affiché en surbrillance


$contenu="<h2>affichage de la table client</h2>";
foreach($clients as $client){
    $contenu.="<div><li>client numéro " . $client['numéro_client'] . "</li>";
    $contenu.="<li>" . $client['nom_client'] . "</li>";
    $contenu.="<li>" . $client['numéro_de_rue_client'] . "</li>";
    $contenu.="<li>" . $client['nom_rue'] . "</li>";
    $contenu.="<li>" . $client['ville_client'] . "</li>";
    $contenu.="<li>" . $client['code_postal_client'] . "</li>";
    $contenu.="</div>";
}
$contenu.="<h2>affichage de la table fournisseur</h2>";
foreach($fournisseurs as $fournisseur){
    $contenu.="<div><li>fournisseur numéro " . $fournisseur['numéro_fournisseur'] . "</li>";
    $contenu.="<li>" . $fournisseur['nom_fournisseur'] . "</li>";
    $contenu.="<li>" . $fournisseur['numéro_de_rue_fournisseur'] . "</li>";
    $contenu.="<li>" . $fournisseur['nom_rue'] . "</li>";
    $contenu.="<li>" . $fournisseur['ville_fournisseur'] . "</li>";
    $contenu.="<li>" . $fournisseur['code_postal_fournisseur'] . "</li>";
    $contenu.="</div>";
}

$contenu.="<h2>affichage de la table commandeClient</h2>";
foreach($commandesClient as $commandeClient){
    $contenu.="<div><li>fournisseur numéro " . $commandeClient['numéro_commandeClient'] . "</li>";
    $contenu.="<li>" . $commandeClient['date_commandeClient'] . "</li>";
    $contenu.="<li>" . $commandeClient['numéro_client'] . "</li>";
    $contenu.="<li>" . $commandeClient['libellé_produit_fini'] . "</li>";
    $contenu.="<li>" . $commandeClient['quantité'] . "</li>";
    $contenu.="</div>";
}



//$contenu="affichage de la table client". "<li>" . $client['numéro_client'] . "</li>";

require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>