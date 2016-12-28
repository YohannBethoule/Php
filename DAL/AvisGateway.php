<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 14/12/2016
 * Time: 10:15
 */



class AvisGateway
{
    private $con;
    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($id, $titre, $user, $note, $commentaire){
        $query='INSERT INTO Avis VALUES(:id,:titre,:user,:note,:commentaire)';
        $this->con->executeQuery($query, array(
            ':id'=>array($id,PDO::PARAM_STR),
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':user'=>array($user,PDO::PARAM_STR),
            ':note'=>array($note,PDO::PARAM_STR),
            ':commentaire'=>array($commentaire, PDO::PARAM_STR)
        ));
    }

    public function delete($id){
        $query= 'DELETE FROM Avis WHERE idAvis=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function search($id){
        $query='SELECT * FROM Avis WHERE idAvis=:id';
        $this->con->executeQuery($query, array(
            ':id'=>array($id, PDO::PARAM_INT)
        ));
        $avis=$this->con->getResults();
        return $avis;
    }

    public function searchByUser($user){
        $query='SELECT * FROM Avis WHERE user=:user';
        $this->con->executeQuery($query, array(
            ':user'=>array($user, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        foreach ($results as $row){
            $tab_avis[]=new Avis($row['idAvis'], $row['user'], $row['idTitre'], $row['note'], $row['commentaire']);
        }
        return $results;
    }

    public function searchByTitre($idTitre){
        $query='SELECT * FROM Avis WHERE idTitre=:idTitre';
        $this->con->executeQuery($query, array(
            ':idTitre'=>array($idTitre, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        /*foreach ($results as $row){
            $tab_avis[]=new Avis($row['idAvis'], $row['user'], $row['idTitre'], $row['note'], $row['commentaire']);
        }*/
        return $results;
    }

    public function countByTitreByAvis($idTitre,$avis){
        $query='SELECT * FROM Avis WHERE idTitre=:idTitre AND note=:avis';
        $this->con->executeQuery($query, array(
            ':idTitre'=>array($idTitre, PDO::PARAM_STR),
            ':avis'=>array($avis,PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return count($results);
    }
}