<?php

/**
 * Created by PhpStorm.
 * User: sabussy
 * Date: 30/11/16
 * Time: 15:05
 */
require_once('Connexion.php');

class TitreGateway
{
    private $con;
    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($id,$nomTitre,$artiste,$dateFin){
        $query='INSERT INTO Titre VALUES(:id,:nomTitre,:artiste,sysdate(),:dateFin)';
        $this->con->executeQuery($query, array(
            ':id'=>array($id,PDO::PARAM_STR),
            ':nomTitre'=>array($nomTitre,PDO::PARAM_STR),
            ':artiste'=>array($artiste,PDO::PARAM_STR),
            ':dateFin'=>array($dateFin,PDO::PARAM_STR)
        ));
    }


    public function update($id,$nomTitre,$artiste,$dateFin,$cheminCouv)
    {
        $query = 'UPDATE Titre SET nomTitre=:nomTitre, artiste=:artiste, date_fin=:dateFin WHERE idTitre=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':nomTitre' => array($nomTitre, PDO::PARAM_STR),
            ':artiste' => array($artiste, PDO::PARAM_STR),
            ':dateFin' => array($dateFin, PDO::PARAM_STR),
            ':cheminCouv' => array($cheminCouv, PDO::PARAM_STR)
        ));

    }

    public function delete($id){
        $query= 'DELETE FROM Titre WHERE idTitre=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function search($id){
        $query='SELECT * FROM Titre WHERE idTitre=:id';
        $this->con->executeQuery($query, array(
            ':id'=>array($id, PDO::PARAM_INT)
        ));
        $titre=$this->con->getResults();
        return new Titre($titre['idTitre'], $titre['nomTitre'], $titre['artiste'], $titre['idAlbum'], $titre['date_debut'], $titre['date_fin']);
    }

    public function searchByName($nom){
        $query='SELECT * FROM Titre WHERE nomTitre=:nom';
        $this->con->executeQuery($query, array(
            ':nom'=>array($nom, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        foreach ($results as $row){
            $tab_titre[]=new Titre($row['idTitre'], $row['nomTitre'], $row['artiste'], $row['idAlbum'], $row['date_debut'], $row['date_fin']);
        }
        return $tab_titre;
    }

    public function searchByAlbum($idAlbum){
        $query='SELECT * FROM Titre WHERE idAlbum=:idAlbum';
        $this->con->executeQuery($query, array(
            ':idAlbum'=>array($idAlbum, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        foreach ($results as $row){
            $tab_titre[]=new Titre($row['idTitre'], $row['nomTitre'], $row['artiste'], $row['idAlbum'], $row['date_debut'], $row['date_fin']);
        }
        return $tab_titre;
    }
}