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

$vues['erreur']=$rep.'Vues/404.php';
$vues['connexion']=$rep.'Vues/Connection.php';
$vues['recherche']=$rep.'Vues/browse.php';


?>