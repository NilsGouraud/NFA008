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



$contenu='<form method="POST" action="ajouterClient.php">
<fieldset><legend>créer client</legend>
* : champ obligatoire
<br>
<input type="text" required name="nom_client" size="20" value=""  placeholder="nom*"><br>
<input type="text"  name="numéro_de_rue_client" size="20" value=""  placeholder="numéro de voie"><br>
<input type="text" required  name="nom_rue" size="20" value=""  placeholder="voie/lieu-dit*"><br>
<input type="text" required  name="ville_client" size="20" value=""  placeholder="ville*"><br>
<input type="text" required  name="code_postal_client" size="20" value=""  placeholder="code postal*"><br>
<input type="submit" value="ajouter un nouveau client" name="envoyer">
</fieldset>
</form>

<form method="POST" action="ajouterFournisseur.php">
<fieldset><legend>créer fournisseur</legend>* : champ obligatoire
<br>
<input type="text" required name="nom_fournisseur" size="20" value=""  placeholder="nom*"><br>
<input type="text"  name="numéro_de_rue_fournisseur" size="20" value=""  placeholder="numéro de voie"><br>
<input type="text" required  name="adresse_fournisseur" size="20" value=""  placeholder="voie/lieu-dit*"><br>
<input type="text" required  name="ville_fournisseur" size="20" value=""  placeholder="ville*"><br>
<input type="text" required  name="code_postal_fournisseur" size="20" value=""  placeholder="code postal*"><br>
<input type="submit" value="ajouter un nouveau fournisseur" name="envoyer">
</fieldset>
</form>



';

require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>