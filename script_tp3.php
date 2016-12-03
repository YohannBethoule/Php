<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 30/11/2016
 * Time: 14:12
 */

$dsn='mysql:host=hina;dbname=dbsabussy';
$user=$_POST['pseudo'];
$password=$_POST['password'];
$co=new Connexion($dsn, $user, $password);

$q1="INSERT INTO Titre VALUES (1,'osef', 'artisteOsef', '11/11/11', '11/11/11', 'osefduchemin')";
$bool=$co->executeQuery($q1, array());
if ($bool==true){
    echo "GG";
}else if ($bool==false){
    echo "boloss";
}


?>