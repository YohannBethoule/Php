<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 21:37
 *
 * Classe de gestion des actions pouvant être requises par un administrateur
 */
class ControllerAdmin extends ControllerUser
{
    function __construct($action)
    {
        global $rep,$vues;
        try{
            //switch des actions pouvant être requises. Pour chaque cas, on appelle la méthode associée à l'action requise.
            switch($action){
                //si aucune action particulière n'est requise, on appelle la méthode par défaut, consulterTitres()
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
            $dVueEreur[] =	"Erreur BDD : ".$e->getMessage();
            require ($rep.$vues['erreur']);
        }

        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur : ".$e2->getMessage();
            require ($rep.$vues['erreur']);
        }

        exit(0);
    }

    //nettoyage des données et appel de la methode permettant l'ajout d'un titre à la base de données
    function ajouterTitre() {
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

    //nettoyage des données et appel de la méthode de suppression d'un titre de la base de données
    function supprimerTitre() {
        $idTitre=Nettoyer::nettoyer_int($_GET['idTitre']);
        //appel de la méthode du modele
        ModelAdmin::supprimerTitre($idTitre);
        header("Location:/Php/");
    }

    //nettoyage des données et appel de la méthode d'affichage d'un titre
    function afficherTitre(){
        global $rep,$vues;
        $idTitre=Nettoyer::nettoyer_int($_GET['idTitre']);
        $resTitre=ModelAdmin::afficherTitre($idTitre);
        require_once ($rep.$vues['titre']);
    }

    //nettoyage des données et appel de la methode de modification des informations d'un titre
    function modifierTitre(){
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

    //nettoyage des données et appel de la methode de suppression d'un commentaire
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