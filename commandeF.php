<?php
//affichage d'éventuelles erreurs
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//données de connexion
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
//connexion
$pdo=new PDO($dsn);

//on récupère les fournisseurs
$statement=$pdo->prepare("select * from fournisseur");
$statement->execute();
$fournisseurs=$statement->fetchAll(PDO::FETCH_ASSOC);

//on récupère les céréales dont peut avoir besoin pour produire les flocons
$statement=$pdo->prepare("select * from matière_première");
$statement->execute();
$cereales=$statement->fetchAll(PDO::FETCH_ASSOC);


$passerUneCommandePourDesCereales="pageActuelle"; //l'onglet de la page sera affiché en surbrillance

//début du formulaire
$contenu="<h2>passer une commande à un fournisseur</h2>";
$contenu.='<form method="POST" action="ajouterCommandeF.php">

quel fournisseur avez-vous contacté?
<select name="fournisseur">';
foreach($fournisseurs as $fournisseur){
    $contenu.=' <option value="'.$fournisseur['numéro_fournisseur'].'">'.$fournisseur['nom_fournisseur'].'</option>';
}
$contenu.='</select>
<br>

quel type de céréale avez-vous commandé?
<select name="cereale">';
foreach($cereales as $cereale){
    $contenu.=' <option value="'.$cereale['variété_matière_première'].'">'.$cereale['variété_matière_première'].'</option>';
}
$contenu.='</select>
<br>

quantité commandée : <input required type="text" name="quantite" placeholder="xx">tonnes
<br>
<input type="submit" value="enregistrez votre commande" name="envoyer">
</form>
';







require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>