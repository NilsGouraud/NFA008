<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$contenu="phrase permettant de tester l'affichage de la variable contenu";

require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>