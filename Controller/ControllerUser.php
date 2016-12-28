<?php

/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 11/12/2016
 * Time: 14:19
 */
class ControllerUser extends ControllerVisitor
{

    function __construct()
    {
        $dVueEreur = array ();

        try {

            $action = $_REQUEST['action'];

            switch ($action) {
                case NULL:
                    $this->consulterTitres();
                    break;

                case "seDeconnecter":
                    $this->seDeconnecter();
                    break;

                case "donnerAvis":
                    $this->donnerAvis();
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

    function seDeconnecter(){


    }

    function donnerAvis(){


    }
}