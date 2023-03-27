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
    echo"<li>" . $client['nom_client'] . "</li>";
}



$contenu='<form method="POST" action="ajouter.php">
<h2>créer client</h2>
<input type="text" name="nom" size="20" value=""  placeholder="nom"><br>
<input type="text" name="numeroDeVoie" size="20" value=""  placeholder="numéro de voie"><br>
<input type="text" name="voie" size="20" value=""  placeholder="voie"><br>
<input type="text" name="ville" size="20" value=""  placeholder="ville"><br>
<input type="text" name="codePostal" size="20" value=""  placeholder="code postal"><br>
<input type="submit" value="ajouter un nouveau client" name="envoyer">
</form>


';

require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>