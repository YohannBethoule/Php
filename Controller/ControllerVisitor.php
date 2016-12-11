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
        session_start();

        $dVueEreur = array ();

        try {

            $action = $_REQUEST['action'];

            switch ($action) {
                case NULL:
                    $this->Reinit();
                    break;

                case "seConnecter":
                    $this->seConnecter();
                    break;

                case "consulterTitre":
                    $this->consulterTitre();
                    break;

                case "lireTitre":
                    $this->lireTitre();
                    break;

                case "afficherCommentaires":
                    $this->afficherCommentaires();
                    break;

                default:
                    $dVueEreur = "Erreur d'appel php.";
                    require($rep . $vues['vuephp1']);
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


    function Reinit() {
        global $rep,$vues;

        $dVue = array (
            'nom' => "",
            'age' => 0,
        );
        require ($rep.$vues['vuephpindex']);
    }

    function seConnecter(){
        global $rep,$vues;
        $login=$_POST['login'];
        $password=$_POST['password'];
        Validation::val_form($login,$password,$dVueEreur);
    }

    function consulterTitre(){
        global $rep,$vues;
    }

    function lireTitre(){
        global $rep,$vues;
    }

    function afficherCommentaires(){
        global $rep,$vues;
    }
}