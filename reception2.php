<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$connexion=new PDO($dsn);

$typeCereale=$_POST['cereale'];


$silos=$connexion->prepare('SELECT * FROM stockageMatièresPremières WHERE variété_matière_première='.$typeCereale);
$silos->execute();

$contenu="<h2>réceptionner un lot de céréales</h2>";
$receptionnerUnLotDeCereales="pageActuelle"; //l'onglet de la page sera affiché en surbrillance
$contenu.='<form method="POST" action="reception3.php">


Avec quel silo allez-vous réceptionner les céréales?
<select name="silo">';
foreach($silos as $silo){
    $contenu.=' <option value="'.$silo['numéro_silo'].'">'.$silo['numéro_silo'].'</option>';
}
$contenu.='</select>
<br>

quantité à réceptionner : <input required type="text" name="quantite" placeholder="xx">tonnes
<br>
<input type="submit" value="valider la réception" name="envoyer">
</form>
';







require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>