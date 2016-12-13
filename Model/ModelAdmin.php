<?php

/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 13/12/2016
 * Time: 18:50
 */
class ModelAdmin
{
    public function isAdmin(){
        if(isset($_SESSION['login']) && isset ($_SESSION['role'])){
            $login=Nettoyer::nettoyer_string($_SESSION['login']);
            $role=Nettoyer::nettoyer_string($_SESSION['role']);
            return new Admin($login,$role);
        }
        else
            return null;
    }
}