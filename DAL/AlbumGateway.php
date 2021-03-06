<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 14/12/2016
 * Time: 10:15
 */
class AlbumGateway
{
    private $con;
    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($id, $nomAlbum, $idArtiste, $parution, $description, $couverture, $artiste){
        $query='INSERT INTO album VALUES(:id,:nomAlbum, :artiste, :parution,:desciption,:couverture)';
        $this->con->executeQuery($query, array(
            ':id'=>array($id,PDO::PARAM_INT),
            ':nomAlbum'=>array($nomAlbum,PDO::PARAM_STR),
            ':artiste'=>array($artiste,PDO::PARAM_STR),
            ':parution'=>array($parution,PDO::PARAM_STR),
            ':description'=>array($description, PDO::PARAM_STR),
            ':couverture'=>array($couverture, PDO::PARAM_STR)
        ));
    }


    public function update($id,$nomAlbum,$artiste,$parution, $description, $couverture){
        $query = 'UPDATE album SET nomAlbum=:nomAlbum, artiste=:artiste, parution=:parution, description=:description, couverture=:couverture WHERE idAlbum = :id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':nomAlbum' => array($nomAlbum, PDO::PARAM_STR),
            ':artiste' => array($artiste, PDO::PARAM_STR),
            ':parution' => array($parution, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':couverture' => array($couverture, PDO::PARAM_STR)
        ));

    }

    public function delete($id){
        $query= 'DELETE FROM album WHERE idAlbum=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function search($id){
        $query='SELECT * FROM album WHERE idAlbum=:id';
        $this->con->executeQuery($query, array(
            ':id'=>array($id, PDO::PARAM_INT)
        ));
        $album=$this->con->getResults();
        return $album;
    }

    public function searchByName($nom){
        $query='SELECT * FROM album WHERE nomAlbum=:nom';
        $this->con->executeQuery($query, array(
            ':nom'=>array($nom, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return $results[0];
    }

    public function searchByArtiste($artiste){
        $query='SELECT * FROM album WHERE artiste=:artiste';
        $this->con->executeQuery($query, array(
            ':artiste'=>array($artiste, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return $results;
    }

    public function searchCouvByName($nomAlbum){
        $query='SELECT couverture FROM album WHERE nomAlbum=:nomAlbum';
        $this->con->executeQuery($query, array(
            ':nomAlbum'=>array($nomAlbum, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        $results=$results[0][0];
        return $results;
    }

}