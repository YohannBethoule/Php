<?php

/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 13/12/2016
 * Time: 18:50
 */
class ModelUser
{
    public static function isAdmin(){
        global $bpassword, $blogin, $base;
        if(isset($_SESSION['login']) && isset ($_SESSION['role'])){
            $login=Nettoyer::nettoyer_string($_SESSION['login']);
            $role=Nettoyer::nettoyer_string($_SESSION['role']);
            $gt = new UserGateway(new Connexion($base, $blogin, $bpassword));
            $user= $gt->search($login);
            if ($login == $user['pseudo'] && $user['role'] == 'admin') {
                return $user;
            }
        }
        return null;
    }

    public static function isUser(){
        global $bpassword, $blogin, $base;
        if(isset($_SESSION['login']) && isset ($_SESSION['role'])){
            $login=Nettoyer::nettoyer_string($_SESSION['login']);
            $role=Nettoyer::nettoyer_string($_SESSION['role']);
            $gt = new UserGateway(new Connexion($base, $blogin, $bpassword));
            $user= $gt->search($login);
            if($login==$user['pseudo'] && $user['role']=='user'){
                return $user;
            }
            else{
                return null;
            }
        }
        else
            return null;
    }

    public static function connexion($login,$mdp){
        global $blogin,$bpassword,$base;
        $login=Nettoyer::nettoyer_string($login);
        $mdp=Nettoyer::nettoyer_string($mdp);
        $ugt=new UserGateway(new Connexion($base,$blogin,$bpassword));
        $user= $ugt->search($login);
        if(empty($user)) {
            $pb="Ce pseudo n'est pas reconnu.";
            return $pb;
        }
        else{
            if($login != $user['pseudo']) {
                $pb="Le pseudo n'est pas reconnu.";
                return $pb;
            }
            else if($mdp != $user['mdp']) {
                $pb="Le mot de passe est incorrect.";
                return $pb;
            }
            else {
                $_SESSION['role']=$user['role'];
                $_SESSION['login']=$user['pseudo'];
                return true;
            }
        }
    }

    static public function deconnexion(){
        session_unset();
    }

}