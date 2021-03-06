<?php

/**
 * Created by PhpStorm.
 * User: sabussy
 * Date: 30/11/16
 * Time: 15:05
 */

class TitreGateway
{
    private $con;
    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($id,$nomTitre,$artiste,$dateFin,$duree){
        $query='INSERT INTO titre VALUES(:id,:nomTitre,:artiste,sysdate(),:dateFin,:duree)';
        $this->con->executeQuery($query, array(
            ':id'=>array($id,PDO::PARAM_STR),
            ':nomTitre'=>array($nomTitre,PDO::PARAM_STR),
            ':artiste'=>array($artiste,PDO::PARAM_STR),
            ':dateFin'=>array($dateFin,PDO::PARAM_STR),
            ':duree'=>array($duree,PDO::PARAM_STR)
        ));
    }


    public function update($id,$nomTitre,$artiste,$nomAlbum,$dateDebut,$dateFin,$duree)
    {
        $query = 'UPDATE titre SET nomTitre=:nomTitre, artiste=:artiste, nomAlbum=:nomAlbum, date_debut=:dateDebut, date_fin=:dateFin, duree=:duree WHERE idTitre=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':nomTitre' => array($nomTitre, PDO::PARAM_STR),
            ':artiste' => array($artiste, PDO::PARAM_STR),
            ':nomAlbum' => array($nomAlbum, PDO::PARAM_STR),
            ':dateDebut' => array($dateDebut, PDO::PARAM_STR),
            ':dateFin' => array($dateFin, PDO::PARAM_STR),
            ':duree' => array($duree,PDO::PARAM_STR)
        ));
    }

    public function delete($id){
        $query= 'DELETE FROM titre WHERE idTitre=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function searchByid($id){
        $query='SELECT * FROM titre WHERE idTitre=:id';
        $this->con->executeQuery($query, array(
            ':id'=>array($id, PDO::PARAM_INT)
        ));
        $titre=$this->con->getResults();
        $titre = $titre[0];
        return $titre;
    }

    public function searchByName($nom){
        $query='SELECT * FROM titre WHERE nomTitre=:nom';
        $this->con->executeQuery($query, array(
            ':nom'=>array($nom, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return $results;
    }

    public function searchByAlbum($nomAlbum){
        $query='SELECT * FROM titre WHERE nomAlbum=:nomAlbum';
        $this->con->executeQuery($query, array(
            ':nomAlbum'=>array($nomAlbum, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return $results;
    }

    public function getAll(){
        $query='SELECT * FROM titre';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        return $results;
    }
}