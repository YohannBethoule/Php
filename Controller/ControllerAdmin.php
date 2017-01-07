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
        global $rep,$vues;
        try{
            switch($action){
                case null:
                    $this->consulterTitres();
                    break;

                case "ajouterTitre":
                    $this->ajouterTitre();
                    break;

                case "nouveauTitre":
                    $this->nouveauTitre();
                    break;

                case "supprimerTitre":
                    $this->supprimerTitre();
                    break;

                case "afficherTitre":
                    $this->afficherTitre();
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
        global $rep,$vues;
        $nomTitre = Nettoyer::nettoyer_string($_POST['nomTitre']);
        $artiste = Nettoyer::nettoyer_string($_POST['artiste']);
        $nomAlbum = Nettoyer::nettoyer_string($_POST['nomAlbum']);
        $date_debut = Nettoyer::nettoyer_string($_POST['date_debut']);
        $date_fin = Nettoyer::nettoyer_string($_POST['date_fin']);
        $duree = Nettoyer::nettoyer_int($_POST['duree']);
        ModelAdmin::ajouterTitre($nomTitre,$artiste,$nomAlbum,$date_debut,$date_fin,$duree);
        header("Location:/Php/");
    }

    function nouveauTitre(){
        global $rep,$vues;
        require_once ($rep.$vues['titre']);
    }

    function supprimerTitre() {
        global $rep,$vues;
        $idTitre=Nettoyer::nettoyer_int($_GET['idTitre']);
        ModelAdmin::supprimerTitre($idTitre);
        header("Location:/Php/");
    }

    function afficherTitre(){
        global $rep,$vues;
        $idTitre=Nettoyer::nettoyer_int($_GET['idTitre']);
        $resTitre=ModelAdmin::afficherTitre($idTitre);
        require_once ($rep.$vues['titre']);
    }

    function modifierTitre(){
        global $rep,$vues;
            $idTitre = Nettoyer::nettoyer_int($_POST['idTitre']);
            $nomTitre = Nettoyer::nettoyer_string($_POST['nomTitre']);
            $artiste = Nettoyer::nettoyer_string($_POST['artiste']);
            $nomAlbum = Nettoyer::nettoyer_string($_POST['nomAlbum']);
            $date_debut = Nettoyer::nettoyer_string($_POST['date_debut']);
            $date_fin = Nettoyer::nettoyer_string($_POST['date_fin']);
            $duree = Nettoyer::nettoyer_int($_POST['duree']);

            ModelAdmin::modifierTitre($idTitre,$nomTitre,$artiste,$nomAlbum,$date_debut,$date_fin,$duree);
        header("Location:/Php/");

    }

    function supprimerCommentaire(){
        global $vues;
        $idAvis = $_POST['idAvis'];
        $idAvis=Nettoyer::nettoyer_int($idAvis);
        if(ModelAdmin::supprimerCommentaire($idAvis))
            header("Refresh:0");
        else
            throw new Exception("Le commentaire n'a pas pu être supprimé.");

    }


}