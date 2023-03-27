<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

print_r($_POST);

$nom=$_POST['nom'];
$numeroDeVoie=$_POST['numeroDeVoie'];
$rue=$_POST['rue'];
$ville=$_POST['ville'];
$codePostal=$_POST['codePostal'];
$values="'','$nom','$numeroDeVoie','$rue','$ville','$codePostal'";
echo 'connected';

$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
afficher($dsn);
$pdo=new PDO($dsn);
$statement=$pdo->prepare("select * from client");
$statement->execute();
$requete = 'INSERT INTO client(id, nom, numeroDeVoie,rue, ville, codePostal) VALUES($values)';
 // on insère les informations du formulaire dans la table
 $connexion;
 mysqli_query($pdo,$requete);
 mysqli_close($pdo); // on ferme la connexion

 if ($connexion) {
    echo 'connected';
  } else { 
    echo 'not connected';
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
?>



