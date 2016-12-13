<?php

/**
 * Created by PhpStorm.
 * User: samue
 * Date: 13/12/2016
 * Time: 19:02
 */
class Nettoyer
{
    static function nettoyer_string($string){
        if(isset($string)){
            return filter_var($string,FILTER_SANITIZE_STRING);
        }
        throw new Exception("Paramètre passé pour le nettoyage n'est pas initialisé.");
}

}