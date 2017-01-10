<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 11/12/2016
 * Time: 11:30
 */


$rep=__DIR__.'/../';

//BD

$base="mysql:host=localhost;dbname=musique";
$blogin="root";
$bpassword="root";


//Vues

$vues['erreur']='Vues/404.php';
$vues['connexion']='Vues/Connection.php';
$vues['recherche']='Vues/browse.php';
$vues['detail']='Vues/single.php';
$vues['titre']='Vues/vueTitre.php';
$vues['commentaire']='Vues/vueCommentaire.php';

?>