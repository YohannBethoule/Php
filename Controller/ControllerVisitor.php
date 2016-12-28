<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 20:54
 */


class ControllerVisitor
{

    function __construct($action)
    {
        $dVueErreur = array ();

        try {

            switch ($action) {
                case NULL:
                    $this->consulterTitres();
                    break;

                case "seConnecter":
                    $this->seConnecter();
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

    function seConnecter(){
        global $rep,$vues;
        require_once($vues['connexion']);
        $login=$_POST['login'];
        $password=$_POST['password'];
        $tab=Validation::validUser($login,$password);
        if($tab == null){
            ModelUser::connexion($login,$password);
        }
        else
            require_once($vues['erreur']);

    }

    function consulterTitres(){
        global $rep,$vues;
        try{
            $res=ModelVisitor::TousLesTitres();
            usort($res,function($a,$b){
                if($a['avisF']==$b['avisF']) return 0;
                return $a['avisF'] < $b['avisF']?1:-1;
            });
            require_once($vues['recherche']);
        }catch (Exception $e){
            $dVueErreur[]=$e->getMessage();
            require_once($vues['erreur']);
        }
    }

    function lireTitre(){
        global $rep,$vues;

    }

    function afficherCommentaires(){
        global $rep,$vues;

    }
}