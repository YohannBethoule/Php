<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 20:54
 *
 * Classe de gestion des actions pouvant être requises par un visiteur
 */


class ControllerVisitor
{

    function __construct($action)
    {
        global $rep,$vues;
        $dVueErreur = array ();

        try {
            //switch des différentes actions pouvant être requises par le visiteur. Dans chaque cas, on appelle la méthode associée à l'action.
            switch ($action) {
                case NULL:
                    $this->consulterTitres();
                    break;

                case "detailTitre":
                    $this->detailTitre();
                    break;

                case "afficherCommentaires":
                    $this->afficherCommentaires();
                    break;

                case "nouveauCommentaire":
                    $this->nouveauCommentaire();
                    break;

                case "ajouterCommentaire":
                    $this->ajouterCommentaire();
                    break;

                default:
                    $dVueErreur = "Erreur d'appel php.";
                    require($rep.$vues['erreur']);
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

    //methode par défaut, permettant de consulter la liste des titres proposés par le site
    function consulterTitres(){
        global $rep,$vues;
        try{
            $res=ModelVisitor::TousLesTitres();
            usort($res,function($a,$b){
                if($a['avisF']==$b['avisF']) return 0;
                return $a['avisF'] < $b['avisF']?1:-1;
            });
            require_once($rep.$vues['recherche']);
        }catch (Exception $e){
            $dVueErreur[]=$e->getMessage();
            require_once($rep.$vues['erreur']);
        }
    }

    function detailTitre(){
        global $rep,$vues;
        try {
            $idTitre = $_GET['idT'];
            $idTitre = Nettoyer::nettoyer_int($idTitre);
            $resSingle = ModelVisitor::detailTitre($idTitre);
            require_once($rep.$vues['detail']);
        } catch (Exception $e){
            $dVueErreur= $e->getMessage();
            require_once($rep.$vues['erreur']);
        }
    }

    function afficherCommentaires(){
        global $rep,$vues;

    }

    function nouveauCommentaire(){
        global $rep,$vues;
        require_once($rep.$vues['commentaire']);
    }

    function ajouterCommentaire(){
        global $rep,$vues;
        $idTitre=$_POST['idTitre'];
        settype($idTitre,'integer');
        $login=Nettoyer::nettoyer_string($_POST['pseudo']);
        $note=Validation::validNote($_POST['note']);
        $commentaire=Nettoyer::nettoyer_string($_POST['commentaire']);
        ModelVisitor::insererCommentaire($note,$commentaire,$login,$idTitre);
        header("Location:/Php/");
    }

}