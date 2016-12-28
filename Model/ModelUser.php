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
        if(isset($_SESSION['login']) && isset ($_SESSION['role'])){
            $login=Nettoyer::nettoyer_string($_SESSION['login']);
            $role=Nettoyer::nettoyer_string($_SESSION['role']);
            $gt = new UserGateway();
            $user= $gt->search($login);
            if($login==$user['login'] && $user['role']=='admin'){
                return $user;
            }
            else{
                return null;
            }
        }
        else
            return null;
    }

    public static function isUser(){
        if(isset($_SESSION['login']) && isset ($_SESSION['role'])){
            $login=Nettoyer::nettoyer_string($_SESSION['login']);
            $role=Nettoyer::nettoyer_string($_SESSION['role']);
            $gt = new UserGateway();
            $user= $gt->search($login);
            if($login==$user['login'] && $user['role']=='user'){
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
        $login=Nettoyer::nettoyer_string($login);
        $mdp=Nettoyer::nettoyer_string($mdp);
        $ugt=new UserGateway(new Connexion());
        $user= $ugt->search($login);
        if($login == $user['login']){
            $_SESSION['role']=user['role'];
            $_SESSION['login']=$login;
        }
        else
            throw new Exception("Le pseudo n'est pas reconnu.");
    }

    static public function deconnexion(){
        session_unset();
    }

}