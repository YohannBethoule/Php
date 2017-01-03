<?php

/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 11/12/2016
 * Time: 14:19
 */
class ControllerUser extends ControllerVisitor
{
    function __construct($action)
    {
        global $vues;
        $dVueEreur = array ();

        try {
            switch ($action) {
                case NULL:
                    $this->consulterTitres();
                    break;

                case "seConnecter":
                    $this->seConnecter();
                    break;

                case "seDeconnecter":
                    $this->seDeconnecter();
                    break;

                case "donnerAvis":
                    $this->donnerAvis();
                    break;

                default:
                    $dVueEreur = "Erreur d'appel php.";
                    require($vues['erreur']);
            }
        }
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($vues['erreur']);
        }

        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($vues['erreur']);
        }
        exit(0);
    }

    function seConnecter()
    {
        global $vues;
        //require_once($vues['connexion']);
        $login = $_POST['login'];
        $password = $_POST['password'];
        $res = ModelUser::connexion($login, $password);
        if (is_bool($res)) {
            header("Refresh:0");
        } else {
            require_once($vues['connexion']);
        }
    }

    function seDeconnecter(){


    }

    function donnerAvis(){


    }
}