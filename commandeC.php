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

//on récupère les clients à livrer
$statement=$pdo->prepare("select * from client");
$statement->execute();
$clients=$statement->fetchAll(PDO::FETCH_ASSOC);

//on récupère les flocons qui seront livrés
$statement=$pdo->prepare("select * from produit_fini");
$statement->execute();
$flocons=$statement->fetchAll(PDO::FETCH_ASSOC);


$recevoirUneCommandePourDesFlocons="pageActuelle"; //l'onglet de la page sera affiché en surbrillance
$contenu="<h2>recevoir une commande client</h2>";
$contenu.='<form method="POST" action="ajouterCommandeC.php">

quel client comptez-vous livrer?
<select name="client">';
foreach($clients as $client){
    $contenu.=' <option value="'.$client['numéro_client'].'">'.$client['numéro_client'].'</option>';
}
$contenu.='</select>
<br>

quel type de flocon allez-vous livrer?
<select name="flocon">';
foreach($flocons as $flocon){
    $contenu.=' <option value="'.$flocon['libellé_produit_fini'].'">'.$flocon['libellé_produit_fini'].'</option>';
}
$contenu.='</select>
<br>

quantité à livrer : <input required type="text" name="quantite" placeholder="xx">tonnes
<br>
<input type="submit" value="valider la commande" name="envoyer">
</form>
';






//$contenu="affichage de la table client". "<li>" . $client['numéro_client'] . "</li>";

require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>