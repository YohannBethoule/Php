<?php

/**
 * Created by PhpStorm.
 * User: samue
 * Date: 28/12/2016
 * Time: 14:56
 */

class ModelVisitor
{
    public static function listeTitres(){
        global $vues,$bpassword,$blogin,$base;
        $gt = new TitreGateway(new Connexion($base,$blogin,$bpassword));
        $res= $gt->getAll();
        if($res == null)
            throw new Exception('Aucun titre trouvé.');
        return $res;
    }
}