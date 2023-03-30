<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$pdo=new PDO($dsn);

//on récupère les fournisseurs
$statement=$pdo->prepare("select * from fournisseur");
$statement->execute();
$fournisseurs=$statement->fetchAll(PDO::FETCH_ASSOC);

//on récupère les flocons
$statement=$pdo->prepare("select * from produit_fini");
$statement->execute();
$cereales=$statement->fetchAll(PDO::FETCH_ASSOC);

$ChargerUnLotDeFlocons="pageActuelle"; //l'onglet de la page sera affiché en surbrillance
$contenu="<h2>charger un lot de flocons</h2>";



$contenu.='<form method="POST" action="validerChargement.php">


quel type de flocon devez-vous charger?
<select name="flocon">';
foreach($cereales as $flocon){
    $contenu.=' <option value="'.$flocon['libellé_produit_fini'].'">'.$flocon['libellé_produit_fini'].'</option>';
}
$contenu.='</select>
<br>

Depuis quel silo allez-vous effectuer le chargement?
<select name="silo">';
foreach($silos as $silo){
    $contenu.=' <option value="'.$silo['numéro_silo'].'">'.$silo['numéro_silo'].'</option>';
}
$contenu.='</select>
<br>

quantité à charger : <input required type="text" name="quantite" placeholder="xx">tonnes
<br>
<input type="submit" value="valider le chargement" name="envoyer">
</form>
';







require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>