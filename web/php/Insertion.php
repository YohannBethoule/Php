<html>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: sabussy
 * Date: 30/11/16
 * Time: 14:23
 */
    require ('Connexion.php');

    $id=45;
    $nomTitre="CeciEstUnTitre";
    $nomArtiste="NomdArtiste";
    $dateDebut="2016-11-23";
    $dateFin="2016-11-26";
    $cheminCouv="chemin";

    $user=$_POST['pseudo'];
    $pass=$_POST['password'];
    $con=new Connexion('mysql:host=hina;dbname=dbsabussy',$user,$pass);

    $query= 'INSERT INTO Titre VALUES(:id,:nomTitre,:nomArtiste,:dateDebut,:dateFin,:cheminCouv)';

    $bool=$con->executeQuery($query, array(
        ':id'=>array($id,PDO::PARAM_STR),
        ':nomTitre'=>array($nomTitre,PDO::PARAM_STR),
        ':nomArtiste'=>array($nomArtiste,PDO::PARAM_STR),
        ':dateDebut'=>array($dateDebut,PDO::PARAM_STR),
        ':dateFin'=>array($dateFin,PDO::PARAM_STR),
        ':cheminCouv'=>array($cheminCouv,PDO::PARAM_STR)
    ));

    if ($bool==true){
        echo "GG";
    }else{
        echo "boloss";
    }

?>

</body>
</html>
