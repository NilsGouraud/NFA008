<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$contenu="page principale, où seront affichées les colonnes de la base de données ";

require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>