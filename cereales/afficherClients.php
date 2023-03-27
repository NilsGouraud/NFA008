<?php
//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);


echo 'test';
$hote='localhost';  $utilisateur='root';  $password='a'; 
$connexion = mysqli_connect($hote,$utilisateur,$password);  
mysqli_select_db($connexion,'cereale');
echo 'test';
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
?>