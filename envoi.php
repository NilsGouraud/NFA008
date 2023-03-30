<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
function afficher($string){
    echo '<pre>';
    var_dump($string);
    echo '</pre>';
}
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
afficher($dsn);
$pdo=new PDO($dsn);

afficher($pdo);

$statement=$pdo->prepare("select * from client");
$statement->execute();
$clients=$statement->fetchAll(PDO::FETCH_ASSOC);

$statement=$pdo->prepare("select * from fournisseur");
$statement->execute();
$fournisseurs=$statement->fetchAll(PDO::FETCH_ASSOC);

$ChargerUnLotDeFlocons="pageActuelle"; //l'onglet de la page sera affiché en surbrillance
$contenu="<h2>charger un lot de flocons</h2>";
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



//$contenu="affichage de la table client". "<li>" . $client['numéro_client'] . "</li>";

require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>