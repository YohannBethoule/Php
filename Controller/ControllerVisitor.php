<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 20:54
 */


class ControllerVisitor
{

    function __construct()
    {
        $dVueErreur = array ();

        try {

            $action = $_REQUEST['action'];

            switch ($action) {
                case NULL:
                    $this->Reinit();
                    break;

                case "seConnecter":
                    $this->seConnecter();
                    break;

                case "consulterTitres":
                    $this->consulterTitres();
                    break;

                case "lireTitre":
                    $this->lireTitre();
                    break;

                case "afficherCommentaires":
                    $this->afficherCommentaires();
                    break;

                default:
                    $dVueErreur = "Erreur d'appel php.";
                    require($rep . $vues['erreur']);
            }
        }
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }

        catch (Exception $e2)
	    {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }

        exit(0);
    }


    function Reinit() {
        global $rep,$vues;

        $dVue = array (
            //Initialise tout à zéro.
        );
        require ($rep.$vues['vueindex']);
    }

    function seConnecter(){
        global $rep,$vues;
        $login=$_POST['login'];
        $password=$_POST['password'];
        \Controller\Validation::validUser($login,$password,$dVueErreur);
        //Instancier Model et appeler sa méthode de connexion.

    }

    function consulterTitres(){
        global $rep,$vues;

    }

    function lireTitre(){
        global $rep,$vues;

    }

    function afficherCommentaires(){
        global $rep,$vues;

    }
}