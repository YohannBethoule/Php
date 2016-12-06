<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 20:54
 */
class ControllerUser
{
    function __construct()
    {
        //on démarre ou reprend la session
        session_start();

        try{
            $action=$_REQUEST['action'];
            switch($action){
                case "connecter":

                    break;

                case "consulter titre":

                    break;

                case "lire titre":

                    break;

                case "consulter commentaires":

                    break;

                case "donner avis":

                    break;

                case "laisser commentaire":

                    break;

                case "deconnecter":

                    break;
            }
        }catch(PDOException $e){
            //gérer l'exception
        }
    }


    function Reinit(){

    }
}