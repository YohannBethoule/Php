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
            return false;
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
            $dVueErreur = "Login incorrect.";
        }
        else if (empty($verif_mdp)) {
            $dVueErreur[] = "Mot de passe incorrect.";
        }
        else
            return true;
        return $dVueErreur;
    }

    static function validNote($note){
        $listeNotes = array("favorable","indifférent","défavorable");
        if(isset($note)) {
            if (in_array($note, $listeNotes))
                return $note;
            else
                throw new Exception("La note saisie n'est pas correcte.");
        }
    }

}