<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

print_r($_POST);
if($_POST['numéro_de_rue_client']==""){
  $_POST['numéro_de_rue_client']=0;
}

$id=0;
$nom_client=$_POST['nom_client'];
$numéro_de_rue_client=$_POST['numéro_de_rue_client'];
$nom_rue=$_POST['nom_rue'];
$ville_client=$_POST['ville_client'];
$code_postal_client=$_POST['code_postal_client'];
$values="$id,'$nom_client','$numéro_de_rue_client','$nom_rue','$ville_client','$code_postal_client'";
echo 'connected';

$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
function afficher($string){
  echo '<pre>';
  var_dump($string);
  echo '</pre>';
}
$pdo=new PDO($dsn);
$client='client(numéro_client, nom_client, numéro_de_rue_client,nom_rue, ville_client, code_postal_client)';


$requete='INSERT INTO '.$client.' VALUES('.$values.')';
$statement=$pdo->prepare('INSERT INTO '.$client.' VALUES('.$values.')');
$statement->execute();

$statement=$pdo->prepare('SELECT count(*) FROM client as numero');
$statement->execute();
$resultat=$statement->fetchAll();
  $contenu="<h1>Vous avez ajouté le client suivant :</h1>";
  $contenu.="<div><li>client numéro " .$resultat[0][0] . "</li>";
    $contenu.="<li>" . $nom_client . "</li>";
    $contenu.="<li>" . $numéro_de_rue_client . "</li>";
    $contenu.="<li>" . $nom_rue . "</li>";
    $contenu.="<li>" . $ville_client . "</li>";
    $contenu.="<li>" . $code_postal_client . "</li>";
    $contenu.="</div>";

/*
$hote='localhost';  $utilisateur='root';  $password='root'; 
  // ouverture de la connexion
$connexion = mysqli_connect($hote,$utilisateur,$password);  
 mysqli_select_db($connexion,'location_voitures',);
$requete='SELECT * FROM clients;';
$res=mysqli_query($connexion,$requete);
echo '<table>\n';
while($row = mysqli_fetch_array($res)) {
 echo '<tr>\n';
 echo
'<td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.
$row[3].'</td>';
 echo '\n</tr>\n'; }
echo '</table>\n';
mysqli_close($connexion);
*/
require 'partials/enTete.php';
require 'partials/contenu.php';
require 'partials/finDePage.php';

?>



