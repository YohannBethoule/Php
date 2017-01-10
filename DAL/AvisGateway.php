<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 14/12/2016
 * Time: 10:15
 */



class avisGateway
{
    private $con;
    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($note, $commentaire, $user, $idTitre){
        $query='INSERT INTO avis VALUES(null,:note,:commentaire,:user,:idTitre)';
        $this->con->executeQuery($query, array(
            ':note'=>array($note,PDO::PARAM_STR),
            ':commentaire'=>array($commentaire,PDO::PARAM_STR),
            ':user'=>array($user,PDO::PARAM_STR),
            ':idTitre'=>array($idTitre, PDO::PARAM_STR)
        ));
    }

    public function delete($idAvis){
        $query= 'DELETE FROM avis WHERE idAvis=:idAvis';
        $this->con->executeQuery($query, array(
            ':idAvis' => array($idAvis, PDO::PARAM_INT)
        ));
    }

    public function deleteAllByIdTitre($idTitre){
        $query= 'DELETE FROM avis WHERE idTitre=:idTitre';
        $this->con->executeQuery($query, array(
            ':idTitre' => array($idTitre, PDO::PARAM_INT)
        ));
    }

    public function search($idTitre){
        $query='SELECT * FROM avis WHERE idTitre=:idTitre';
        $this->con->executeQuery($query, array(
            ':idTitre'=>array($idTitre, PDO::PARAM_INT)
        ));
        $avis=$this->con->getResults();
        return $avis;
    }

    public function searchById($idAvis){
        $query='SELECT * FROM avis WHERE idAvis=:idAvis';
        $this->con->executeQuery($query, array(
            ':idAvis'=>array($idAvis, PDO::PARAM_INT)
        ));
        $avis=$this->con->getResults();
        return $avis;
    }

    public function searchByUser($user){
        $query='SELECT * FROM avis WHERE user=:user';
        $this->con->executeQuery($query, array(
            ':user'=>array($user, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return $results;
    }

    public function countByTitreByavis($idTitre,$note){
        $query='SELECT * FROM avis WHERE idTitre=:idTitre AND note=:note';
        $this->con->executeQuery($query, array(
            ':idTitre'=>array($idTitre, PDO::PARAM_STR),
            ':note'=>array($note,PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return count($results);
    }

    public function countByTitre($idTitre){
        $query='SELECT * FROM avis WHERE idTitre=:idTitre';
        $this->con->executeQuery($query, array(
            ':idTitre'=>array($idTitre, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return count($results);
    }

    public function searchAncienByTitre($idTitre){
        $query='SELECT MIN(idAvis) FROM avis WHERE idTitre=:idTitre';
        $this->con->executeQuery($query, array(
            ':idTitre'=>array($idTitre, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return $results[0][0];
    }

}