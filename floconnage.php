<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$connexion=new PDO($dsn);

//on récupère les céréales dont on peut avoir besoin pour produire les flocons
$statement=$connexion->prepare("select * from matière_première");
$statement->execute();
$cereales=$statement->fetchAll(PDO::FETCH_ASSOC);


$contenu="<h2>floconner un lot de céréales</h2>";
$pointerLeFloconnageDesCereales="pageActuelle"; //l'onglet de la page sera affiché en surbrillance
$contenu.='<form method="POST" action="floconnage2.php">


quel type de céréale comptez-vous floconner?
<select name="cereale">';
foreach($cereales as $cereale){
    $contenu.=' <option value="'.$cereale['variété_matière_première'].'">'.$cereale['variété_matière_première'].'</option>';
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