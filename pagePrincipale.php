<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";

$connexion=new PDO($dsn);

//récupération de la table client
$requete=$connexion->prepare("select * from client");
$requete->execute();
$clients=$requete->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table fournisseur
$requete=$connexion->prepare("select * from fournisseur");
$requete->execute();
$fournisseurs=$requete->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table commandeClient
$requete=$connexion->prepare("select * from commandeClient");
$requete->execute();
$commandesClient=$requete->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table commandeFournisseur
$requete=$connexion->prepare("select * from commandeFournisseur");
$requete->execute();
$commandesFournisseur=$requete->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table stockageMatièresPremières
$requete=$connexion->prepare("select * from stockageMatièresPremières");
$requete->execute();
$MPs=$requete->fetchAll(PDO::FETCH_ASSOC);
//récupération de la table stockageProduitsFinis
$requete=$connexion->prepare("select * from stockageProduitsFinis");
$requete->execute();
$PFs=$requete->fetchAll(PDO::FETCH_ASSOC);
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
    $contenu.="<li>" . $fournisseur['adresse_fournisseur'] . "</li>";
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
    $contenu.="<li>" . $commandeClient['quantité'] . "t</li>";
    $contenu.="</div>";
}
$contenu.="</fieldset>";
$contenu.="<fieldset><legend>affichage de la table commandeFournisseur</legend>";
foreach($commandesFournisseur as $commandeFournisseur){
    $contenu.="<div><li>commande numéro " . $commandeFournisseur['numéro_commandeFournisseur'] . "</li>";
    $contenu.="<li>" . $commandeFournisseur['date_commandeFournisseur'] . "</li>";
    $contenu.="<li>fournisseur numéro " . $commandeFournisseur['numéro_fournisseur'] . "</li>";
    $contenu.="<li>" . $commandeFournisseur['variété_matière_première'] . "</li>";
    $contenu.="<li>" . $commandeFournisseur['quantité'] . "t</li>";
    $contenu.="</div>";
}
$contenu.="</fieldset>";

$contenu.="</fieldset>";
$contenu.="<fieldset><legend>affichage du contenu des silos de matières premières</legend>";
foreach($MPs as $MP){
    $contenu.="<div><li>silo numéro " . $MP['numéro_silo'] . "</li>";
    $contenu.="<li>" . $MP['variété_matière_première'] . "</li>";
    $contenu.="<li>" . $MP['quantité'] . "t</li>";
    $contenu.="</div>";
}
$contenu.="</fieldset>";
$contenu.="<fieldset><legend>affichage du contenu des silos de produits finis</legend>";
foreach($PFs as $PF){
    $contenu.="<div><li>silo numéro " . $PF['numéro_silo'] . "</li>";
    $contenu.="<li>" . $PF['libellé_produit_fini'] . "</li>";
    $contenu.="<li>" . $PF['quantité'] . "t</li>";
    $contenu.="</div>";
}
$contenu.="</fieldset>";


require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>