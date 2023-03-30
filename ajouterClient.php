<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//si le client se trouve dans un lieu-dit, le numéro de rue par défaut sera 0
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
$client='client(numéro_client, nom_client, numéro_de_rue_client,nom_rue, ville_client, code_postal_client)';

$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";

$connexion=new PDO($dsn);


$ajouterUnClient="pageActuelle";
$requete=$connexion->prepare('INSERT INTO '.$client.' VALUES('.$values.')');
try{
  $requete->execute(); 
  $requete=$connexion->prepare('SELECT count(*) FROM client');
$requete->execute();
$resultat=$requete->fetchAll();
  $contenu="<h1>Vous avez ajouté le client suivant :</h1>";
  $contenu.="<div><li>client numéro " .$resultat[0][0] . "</li>";
    $contenu.="<li>" . $nom_client . "</li>";
    $contenu.="<li>" . $numéro_de_rue_client . "</li>";
    $contenu.="<li>" . $nom_rue . "</li>";
    $contenu.="<li>" . $ville_client . "</li>";
    $contenu.="<li>" . $code_postal_client . "</li>";
    $contenu.="</div>";
}
catch(Exception $e) {
  $contenu= '<h1>Ajout impossible</h1> 
  Un client du même nom se trouve dans la base de donnée
  <br><br>
  Message d\'erreur :' .$e->getMessage();
}


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



