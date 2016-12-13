<?php

/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 13/12/2016
 * Time: 18:29
 */
class FrontController
{
    function __construct()
    {
        listeAction_Visitor = array('seConnecter','consulterTitre','lireTitre','afficherCommentaires');
        listeAction_User = array('seDeconnecter','donnerAvis');
        listeAction_Admin = array('ajouterTitre','supprimerTitre','modifierTitre','supprimerCommentaire');
        Autoload::charger();
        require('C:\Users\samue\Desktop\ProjetWebMusic\Php\config\config.php');

        try{
            //Admin a;
        }catch (Exception $e){

        }
    }



}