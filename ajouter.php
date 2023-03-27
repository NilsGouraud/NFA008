<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

print_r($_POST);
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
afficher($dsn);
afficher($values);

$pdo=new PDO($dsn);
$client='client(numéro_client, nom_client, numéro_de_rue_client,nom_rue, ville_client, code_postal_client)';
$statement=$pdo->prepare('INSERT INTO '.$client.' VALUES('.$values.')');
//$statement=$pdo->prepare('INSERT INTO client(numéro_client, nom_client, numéro_de_rue_client,nom_rue, ville_client, code_postal_client) VALUES(0,$nom_client,$numéro_de_rue_client,$nom_rue,$ville_client,$code_postal_client)');
afficher($statement);

$statement->execute();

// on insère les informations du formulaire dans la table


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
?>



