<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$contenu="<h2>réceptionner un lot de céréales</h2>";
$receptionnerUnLotDeCereales="pageActuelle"; //l'onglet de la page sera affiché en surbrillance
require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>