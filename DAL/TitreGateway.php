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

    public function insert($id,$nomTitre,$nomArtiste,$dateDebut,$dateFin,$cheminCouv){
        $query='INSERT INTO Titre VALUES(:id,:nomTitre,:nomAuteur,:dateDebut,:dateFin,:cheminCouv)';
        $this->con->executeQuery($query, array(
            ':id'=>array($id,PDO::PARAM_STR),
            ':nomTitre'=>array($nomTitre,PDO::PARAM_STR),
            ':nomArtiste'=>array($nomArtiste,PDO::PARAM_STR),
            ':dateDebut'=>array($dateDebut,PDO::PARAM_STR),
            ':dateFin'=>array($dateFin,PDO::PARAM_STR),
            ':cheminCouv'=>array($cheminCouv,PDO::PARAM_STR)
        ));
    }


    public function update($id,$nomTitre,$nomArtiste,$dateFin,$cheminCouv)
    {
        $query = 'UPDATE Titre SET nomTitre= :nomTitre,nomArtiste=:nomArtiste,dateFin=:dateFin,cheminCouv= :cheminCouv WHERE id = :id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR),
            ':nomTitre' => array($nomTitre, PDO::PARAM_STR),
            ':nomArtiste' => array($nomArtiste, PDO::PARAM_STR),
            ':dateFin' => array($dateFin, PDO::PARAM_STR),
            ':cheminCouv' => array($cheminCouv, PDO::PARAM_STR)
        ));

    }

    public function delete($id){
        $query= 'DELETE FROM Titre WHERE id=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)
        ));
    }
    
}