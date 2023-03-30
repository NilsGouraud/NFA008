<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";

$connexion=new PDO($dsn);

//récupération de la table client
$statement=$connexion->prepare("select * from client");
$statement->execute();
$clients=$statement->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table fournisseur
$statement=$connexion->prepare("select * from fournisseur");
$statement->execute();
$fournisseurs=$statement->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table commandeClient
$statement=$connexion->prepare("select * from commandeClient");
$statement->execute();
$commandesClient=$statement->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table commandeFournisseur
$statement=$connexion->prepare("select * from commandeFournisseur");
$statement->execute();
$commandesFournisseur=$statement->fetchAll(PDO::FETCH_ASSOC);
$pagePrincipale="pageActuelle"; //l'onglet de la page sera affiché en surbrillance


$contenu="<fieldset><legend>affichage de la table client</legend>";
foreach($clients as $client){
    $contenu.="<div><li>client numéro " . $client['numéro_client'] . "</li>";
    $contenu.="<li>" . $client['nom_client'] . "</li>";
    $contenu.="<li>" . $client['numéro_de_rue_client'] . "</li>";
    $contenu.="<li>" . $client['nom_rue'] . "</li>";
    $contenu.="<li>" . $client['ville_client'] . "</li>";
    $contenu.="<li>" . $client['code_postal_client'] . "</li>";
    $contenu.="</div>";
}
$contenu.="</fieldset>";
$contenu.="<fieldset><legend>affichage de la table fournisseur</legend>";
foreach($fournisseurs as $fournisseur){
    $contenu.="<div><li>fournisseur numéro " . $fournisseur['numéro_fournisseur'] . "</li>";
    $contenu.="<li>" . $fournisseur['nom_fournisseur'] . "</li>";
    $contenu.="<li>" . $fournisseur['numéro_de_rue_fournisseur'] . "</li>";
    $contenu.="<li>" . $fournisseur['nom_rue'] . "</li>";
    $contenu.="<li>" . $fournisseur['ville_fournisseur'] . "</li>";
    $contenu.="<li>" . $fournisseur['code_postal_fournisseur'] . "</li>";
    $contenu.="</div>";
}
$contenu.="</fieldset>";

$contenu.="<fieldset><legend>affichage de la table commandeClient</legend>";
foreach($commandesClient as $commandeClient){
    $contenu.="<div><li>commande numéro " . $commandeClient['numéro_commandeClient'] . "</li>";
    $contenu.="<li>" . $commandeClient['date_commandeClient'] . "</li>";
    $contenu.="<li>client numéro " . $commandeClient['numéro_client'] . "</li>";
    $contenu.="<li>" . $commandeClient['libellé_produit_fini'] . "</li>";
    $contenu.="<li>" . $commandeClient['quantité'] . "</li>";
    $contenu.="</div>";
}
$contenu.="</fieldset>";
$contenu.="<fieldset><legend>affichage de la table commandeFournisseur</legend>";
foreach($commandesFournisseur as $commandeFournisseur){
    $contenu.="<div><li>commande numéro " . $commandeFournisseur['numéro_commandeFournisseur'] . "</li>";
    $contenu.="<li>" . $commandeFournisseur['date_commandeFournisseur'] . "</li>";
    $contenu.="<li>fournisseur numéro " . $commandeFournisseur['numéro_fournisseur'] . "</li>";
    $contenu.="<li>" . $commandeFournisseur['variété_matière_première'] . "</li>";
    $contenu.="<li>" . $commandeFournisseur['quantité'] . "</li>";
    $contenu.="</div>";
}
$contenu.="</fieldset>";



require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>