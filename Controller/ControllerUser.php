<?php

/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 11/12/2016
 * Time: 14:19
 *
 * Classe de gestion des différentes actions pouvant être requises par un utilisateur authentifié
 */
class ControllerUser extends ControllerVisitor
{
    function __construct($action)
    {
        global $rep,$vues;
        $dVueEreur = array ();
        try {
            //switch des différentes actions pouvant être requises par l'utilisateur. Dans chaque cas, on appelle la méthode associée à l'action.
            switch ($action) {
                //par défaut, on appelle la méthode consulterTitres()
                case NULL:
                    $this->consulterTitres();
                    break;

                case "seConnecter":
                    $this->seConnecter();
                    break;

                case "seDeconnecter":
                    $this->seDeconnecter();
                    break;

                default:
                    $dVueEreur = "Erreur d'appel php.";
                    require($rep.$vues['erreur']);
            }
        }
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }

        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
        exit(0);
    }

    //appel de la méthode de connexion au site
    function seConnecter()
    {
        global $rep,$vues;
        $login = $_POST['login'];
        $password = $_POST['password'];
        $co = ModelUser::connexion($login, $password);
        if (is_bool($co)) {
            header("Refresh:0");
        } else {
            require_once($rep.$vues['connexion']);
        }
    }

    //methode de déconnexion au site
    function seDeconnecter(){
        session_unset();
        if(isset($_SESSION['login'])){
            throw new Exception("La déconnexion n'a pas réussie.");
        }
        else
            header("Location:/Php");
    }

}