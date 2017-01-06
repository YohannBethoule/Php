<?php

/**
 * Created by PhpStorm.
 * User: samue
 * Date: 06/01/2017
 * Time: 17:53
 */
class ModelAdmin
{
    public static function supprimerCommentaire($idAvis)
    {
        global $bpassword, $blogin, $base;
        if (isset($_SESSION['login']) && isset ($_SESSION['role'])) {
            $login = Nettoyer::nettoyer_string($_SESSION['login']);
            $role = Nettoyer::nettoyer_string($_SESSION['role']);
            $avgt = new AvisGateway(new Connexion($base, $blogin, $bpassword));
            $avgt->delete($idAvis);
            $res = $avgt->searchById($idAvis);
            var_dump($res);
            if ($res == null)
                return true;
            else
                return false;
        }
    }

}