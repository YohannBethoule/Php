<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 21:37
 */
class ControllerAdmin extends ControllerUser
{
    function __construct($action)
    {

        try{
            switch($action){
                case null:
                    $this->consulterTitres();
                    break;

                case "ajouterTitre":
                    $this->ajouterTitre();
                    break;

                case "supprimerTitre":
                    $this->supprimerTitre();
                    break;

                case "modifierTitre":
                    $this->modifierTitre();
                    break;

                case "supprimerCommentaire":
                    $this->supprimerCommentaire();
                    break;
            }
        }catch (PDOException $e)
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

    function ajouterTitre() {

    }

    function supprimerTitre() {

    }

    function modifierTitre(){

    }

    function supprimerCommentaire(){

    }


}