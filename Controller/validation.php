<?php

/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 11/12/2016
 * Time: 14:13
 */
class Validation
{

    static function validUser($login,$password){
        if(!isset($login) && !isset($password) ) {
            $dVueErreur[] = "Aucune informations.";
        }

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

        if (empty($verif_login)) {
            $dVueErreur[] = "Login incorrect.";
        }
        else if (empty($verif_mdp)) {
            $dVueErreur[] = "Mot de passe incorrect.";
        }
        else
            $dVueErreur[] = null;
        return $dVueErreur;
    }

    static function validAction($action){
        if (!isset($action)) {
            throw new Exception("Aucune action trouvé.");
        }
    }

}