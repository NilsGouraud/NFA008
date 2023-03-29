<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

print_r($_POST);
if($_POST['numéro_de_rue_fournisseur']==""){
  $_POST['numéro_de_rue_fournisseur']=0;
}
echo '<br><br>';
echo $_POST['numéro_de_rue_fournisseur'];
echo '<br><br>';

$id=0;
$nom_fournisseur=$_POST['nom_fournisseur'];
$numéro_de_rue_fournisseur=$_POST['numéro_de_rue_fournisseur'];

$adresse_fournisseur=$_POST['adresse_fournisseur'];
$ville_fournisseur=$_POST['ville_fournisseur'];
$code_postal_fournisseur=$_POST['code_postal_fournisseur'];
$values="$id,'$nom_fournisseur','$numéro_de_rue_fournisseur','$adresse_fournisseur','$ville_fournisseur','$code_postal_fournisseur'";
echo 'connected';

$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
function afficher($string){
  echo '<pre>';
  var_dump($string);
  echo '</pre>';
}
afficher($dsn);
afficher($values);

$pdo=new PDO($dsn);
$fournisseur='fournisseur(numéro_fournisseur, nom_fournisseur, numéro_de_rue_fournisseur,adresse_fournisseur, ville_fournisseur, code_postal_fournisseur)';



$statement=$pdo->prepare('INSERT INTO '.$fournisseur.' VALUES('.$values.')');
//$statement=$pdo->prepare('INSERT INTO fournisseur(numéro_fournisseur, nom_fournisseur, numéro_de_rue_fournisseur,nom_rue, ville_fournisseur, code_postal_fournisseur) VALUES(0,$nom_fournisseur,$numéro_de_rue_fournisseur,$nom_rue,$ville_fournisseur,$code_postal_fournisseur)');
afficher($statement);

$statement->execute();

// on insère les informations du formulaire dans la table


/*
$hote='localhost';  $utilisateur='root';  $password='root'; 
  // ouverture de la connexion
$connexion = mysqli_connect($hote,$utilisateur,$password);  
 mysqli_select_db($connexion,'location_voitures',);
$requete='SELECT * FROM fournisseurs;';
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
?>



