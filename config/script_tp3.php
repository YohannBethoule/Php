<html>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 30/11/2016
 * Time: 14:12
 */

require ('Connexion.php');

$dsn='mysql:host=hina;dbname=dbsabussy';
$user=$_POST['pseudo'];
$password=$_POST['password'];
$co=new Connexion($dsn, $user, $password);

$q1="INSERT INTO Titre VALUES (5,'osef', 'artisteOsef', '11/11/11', '11/11/11', 'osefduchemin')";
$bool=$co->executeQuery($q1,array());
if ($bool==true){
    echo "GG";
}else{
    echo "boloss";
}


?>
</body>
</html>
