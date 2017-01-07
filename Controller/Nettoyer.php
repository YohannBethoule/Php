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
        if(isset($string)) {
            $string = filter_var($string, FILTER_SANITIZE_STRING);
            if(empty($string))
                throw new Exception("Un champs de saisie était vide ou non conforme.");
            return $string;
        }
        throw new Exception("Paramètre passé pour le nettoyage n'est pas initialisé.");
    }

    static function nettoyer_int($int){
        if(isset($int)){
            return filter_var($int,FILTER_SANITIZE_NUMBER_INT);
        }
        throw new Exception("Problème avec le paramètre non initialisé.");
    }



}