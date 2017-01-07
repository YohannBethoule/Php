<?php

/**
 * Created by PhpStorm.
 * User: samue
 * Date: 06/01/2017
 * Time: 17:53
 */
class ModelAdmin
{
    public static function isAdmin(){
        global $bpassword, $blogin, $base;
        if(isset($_SESSION['login']) && isset ($_SESSION['role'])){
            $login=Nettoyer::nettoyer_string($_SESSION['login']);
            $role=Nettoyer::nettoyer_string($_SESSION['role']);
            $gt = new UserGateway(new Connexion($base, $blogin, $bpassword));
            $user= $gt->search($login);
            if ($login == $user['pseudo'] && $user['role'] == 'admin') {
                return true;
            }
        }
        return false;
    }

    public static function supprimerCommentaire($idAvis)
    {
        global $bpassword, $blogin, $base;
        if(self::isAdmin()){
            $avgt = new AvisGateway(new Connexion($base, $blogin, $bpassword));
            $avgt->delete($idAvis);
            $res = $avgt->searchById($idAvis);
            if ($res == null)
                return true;
        }
        throw new Exception("La suppression du commentaire ne s'est pas déroulée correctement.");
    }

    public static function afficherTitre($idT){
        global $bpassword, $blogin, $base;
        if(self::isAdmin()){
            $avgt = new TitreGateway(new Connexion($base, $blogin, $bpassword));
            $res=$avgt->searchByid($idT);
            return $res;
        }
    }

    public static function modifierTitre($idT,$nomT,$artiste,$nomAlbum,$date_debut,$date_fin,$duree){
        global $bpassword, $blogin, $base;
        if(self::isAdmin()){
            $avgt = new TitreGateway(new Connexion($base, $blogin, $bpassword));
            $avgt->update($idT,$nomT,$artiste,$nomAlbum,$date_debut,$date_fin,$duree);
        }
        else
            throw new Exception("Le compte n'est pas reconnu comme étant un compte utilisateur.");

    }

    public static function supprimerTitre($idTitre){
        global $bpassword, $blogin, $base;
        if(self::isAdmin()){
            $avgt = new TitreGateway(new Connexion($base, $blogin, $bpassword));
            $avgt->delete($idTitre);
            if($avgt->searchByid($idTitre) != null)
                throw new Exception("La suppression du titre ne s'est pas bien terminée.");
        }
        else
            throw new Exception("Le compte n'est pas reconnu comme étant un compte utilisateur.");

    }

    public static function ajouterTitre($nomT,$artiste,$nomAlbum,$date_debut,$date_fin,$duree){
        global $bpassword, $blogin, $base;
        if(self::isAdmin()){
            $avgt = new TitreGateway(new Connexion($base, $blogin, $bpassword));
            $avgt->insert(null,$nomT,$artiste,$nomAlbum,$date_debut,$date_fin,$duree);
            if($avgt->searchByName($nomT) != null){
                throw new Exception("Pour une raison inconnue, l'ajout du titre n'a pas eu lieu.");
            }
        }
        else
            throw new Exception("Le compte n'est pas reconnu comme étant un compte utilisateur.");
    }

}