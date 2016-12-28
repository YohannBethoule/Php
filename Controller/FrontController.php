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
        $listeAction_Visitor = array('seConnecter','consulterTitre','lireTitre','afficherCommentaires');
        $listeAction_User = array('seDeconnecter','donnerAvis');
        $listeAction_Admin = array('ajouterTitre','supprimerTitre','modifierTitre','supprimerCommentaire');

        try{
            $user = ModelUser::isAdmin();
            $action = $_REQUEST['action'];

            if(in_array($action,$listeAction_Admin)){
                if($user == null || $user['role']=='user')
                    require_once(vues['connexion']);
                else
                    new ControllerAdmin();
            }
            else if(in_array($action,$listeAction_User)){
                if($user == null)
                    require_once (vues['connexion']);
                else
                    new ControllerUser();
            }
            else{
                new ControllerVisitor($action);
            }

        }catch (Exception $e){

        }
    }



}