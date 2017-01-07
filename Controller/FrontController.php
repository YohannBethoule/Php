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
        $listeAction_Visitor = array('consulterTitres','detailTitre','afficherCommentaires','nouveauCommentaire','ajouterCommentaire');
        $listeAction_User = array('seConnecter','seDeconnecter');
        $listeAction_Admin = array('ajouterTitre','afficherTitre','nouveauTitre','supprimerTitre','modifierTitre','supprimerCommentaire');

       // var_dump($_REQUEST['action']);

        try{
            if(isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
                $action = Nettoyer::nettoyer_string($action);
            }
            else
                $action=null;

            if(in_array($action,$listeAction_Admin)){
                if(!ModelAdmin::isAdmin())
                    new ControllerUser("seConnecter");
                else
                    new ControllerAdmin($action);
            }
            else if(in_array($action,$listeAction_User)){
                if(!ModelUser::isUser() && !ModelAdmin::isAdmin())
                    new ControllerUser("seConnecter");
                else
                    new ControllerUser($action);
            }
            else{
                new ControllerVisitor($action);
            }

        }catch (Exception $e){
            $dVueErreur = $e->getMessage();
            require_once($vues['erreur']);
        }
    }



}