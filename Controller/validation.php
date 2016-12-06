<?php

/**
 * Created by PhpStorm.
 * User: sabussy
 * Date: 23/11/16
 * Time: 13:43
 */


if(!isset($_POST['login']) && !isset($_POST['password']) ) {
    header("Location:erreur.php?err=null");
}

$login = $_POST['login'];
$mdp = $_POST['password'];


$login = filter_var($_POST["login"], FILTER_SANITIZE_STRING);
$mdp = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

$verif_login = filter_var($login, FILTER_VALIDATE_REGEXP,
    array(
        "options" => array("regexp"=> "/[a-zA-Z0-9]*/")
    )
);

$verif_mdp = filter_var($mdp, FILTER_VALIDATE_REGEXP,
    array(
        "options" => array("regexp"=>"/[a-zA-Z0-9&#-_+=]*/")
    )
);
var_dump($verif_login);
var_dump($verif_mdp);

if (empty($verif_login)) {
    //header("Location:erreur.php?err=login");
}
else if (empty($verif_mdp)) {
    //header("Location:erreur.php?err=password");
}
else {
    //header("Location:affichage.html");
}
?>
