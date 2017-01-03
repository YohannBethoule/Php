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
        global $vues;
        $listeAction_Visitor = array('consulterTitre','lireTitre','afficherCommentaires');
        $listeAction_User = array('seConnecter','seDeconnecter','donnerAvis');
        $listeAction_Admin = array('ajouterTitre','supprimerTitre','modifierTitre','supprimerCommentaire');

        try{
            $user = ModelUser::isAdmin();
            if(isset($_REQUEST['action']))
                //Nettoyage ?
                $action = $_REQUEST['action'];
            else
                $action=null;

            if(in_array($action,$listeAction_Admin)){
                if($user == null || $user['role']=='user')
                    new ControllerUser($action);
                else
                    new ControllerAdmin($action);
            }
            else if(in_array($action,$listeAction_User)){
                if($user == null)
                    new ControllerUser($action);
                else
                    new ControllerUser($action);
            }
            else{
                new ControllerVisitor($action);
            }

        }catch (Exception $e){

        }
    }



}