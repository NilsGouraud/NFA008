<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$connexion=new PDO($dsn);

//on récupère les flocons
$statement=$connexion->prepare("select * from produit_fini");
$statement->execute();
$flocons=$statement->fetchAll(PDO::FETCH_ASSOC);

$ChargerUnLotDeFlocons="pageActuelle"; //l'onglet de la page sera affiché en surbrillance
$contenu="<h2>charger un lot de flocons</h2>";



$contenu.='<form method="POST" action="chargement2.php">


quel type de flocon devez-vous charger?
<select name="flocon">';
foreach($flocons as $flocon){
    $contenu.=' <option value="'.$flocon['libellé_produit_fini'].'">'.$flocon['libellé_produit_fini'].'</option>';
}
$contenu.='</select>
<br>

<input type="submit" value="continuer" name="envoyer">
</form>
';







require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>