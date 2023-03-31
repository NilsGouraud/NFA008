<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$connexion=new PDO($dsn);

$cereale=$_POST['cereale'];

//on sélectionne les silos de même type
$silosSource=$connexion->prepare('SELECT * FROM stockageMatièresPremières WHERE variété_matière_première="'.$cereale.'"');
$silosSource->execute();
$silosCible=$connexion->prepare('SELECT * FROM stockageProduitsFinis WHERE libellé_produit_fini like "%'.$cereale.'%"');
$silosCible->execute();

$contenu="<h2>floconner un lot de céréales</h2>";
$pointerLeFloconnageDesCereales="pageActuelle"; //l'onglet de la page sera affiché en surbrillance
$contenu.='<form method="POST" action="floconnageFinal.php">

<input type="hidden" name="cereale" value="'.$cereale.'">

De quel silo comptez-vous floconner les céréales?
<select name="siloSource">';
foreach($silosSource as $siloSource){
    $contenu.=' <option value="'.$siloSource['numéro_silo'].'">'.$siloSource['numéro_silo'].'</option>';
}
$contenu.='</select>
<br>

Vers quel silo?
<select name="siloCible">';
foreach($silosCible as $siloCible){
    $contenu.=' <option value="'.$siloCible['numéro_silo'].'">'.$siloCible['numéro_silo'].'</option>';
}
$contenu.='</select>
<br>


quantité à floconner : <input required type="text" name="quantite" placeholder="xx">tonnes
<br>
<input type="submit" value="valider la réception" name="envoyer">
</form>
';







require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>