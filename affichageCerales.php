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

foreach($clients as $client){
    echo"<li>" . $client['numéro_client'] . "</li>";
    echo"<li>" . $client['numéro_de_rue_client'] . "</li>";
    echo"<li>" . $client['nom_rue'] . "</li>";
    echo"<li>" . $client['ville_client'] . "</li>";
    echo"<li>" . $client['code_postal_client'] . "</li>";
}



$contenu="page principale, où seront affichées les colonnes de la base de données ";

require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>