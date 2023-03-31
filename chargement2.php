<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$connexion=new PDO($dsn);

$flocons=$_POST['flocon'];


$silos=$connexion->prepare('SELECT * FROM stockageProduitsFinis WHERE libellé_produit_fini="'.$flocons.'"');
$silos->execute();

$ChargerUnLotDeFlocons="pageActuelle"; //l'onglet de la page sera affiché en surbrillance


$contenu="<h2>charger un lot de flocons</h2>";



$contenu.='<form method="POST" action="chargementFinal.php">';


$contenu.='</select>
<br>
<input type="hidden" name="flocon" value="'.$flocons.'"/>
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