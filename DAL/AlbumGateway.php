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
        $query='INSERT INTO Album VALUES(:id,:nomAlbum, :artiste, :parution,:desciption,:couverture)';
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
        $query = 'UPDATE Album SET nomAlbum=:nomAlbum, artiste=:artiste, parution=:parution, description=:description, couverture=:couverture WHERE idAlbum = :id';
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
        $query= 'DELETE FROM Album WHERE idAlbum=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function search($id){
        $query='SELECT * FROM Album WHERE idAlbum=:id';
        $this->con->executeQuery($query, array(
            ':id'=>array($id, PDO::PARAM_INT)
        ));
        $album=$this->con->getResults();
        return $album;
    }

    public function searchByName($nom){
        $query='SELECT * FROM Album WHERE nomAlbum=:nom';
        $this->con->executeQuery($query, array(
            ':nom'=>array($nom, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        foreach ($results as $row){
            $tab_album[]=new Album($row['nom'], $row['artiste'], $row['album'], $row['date_debut'], $row['date_fin']);
        }
        return $results;
    }

    public function searchByArtiste($artiste){
        $query='SELECT * FROM Album WHERE artiste=:artiste';
        $this->con->executeQuery($query, array(
            ':artiste'=>array($artiste, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        foreach ($results as $row){
            $tab_album[]=new Album($row['idAlbum'], $row['nomAlbum'], $row['artiste'], $row['parution'], $row['description'], $row['couverture']);
        }
        return $results;
    }

    public function searchCouvByName($nomAlbum){
        $query='SELECT couverture FROM Album WHERE nomAlbum=:nomAlbum';
        $this->con->executeQuery($query, array(
            ':nomAlbum'=>array($nomAlbum, PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        $results=$results[0][0];
        return $results;
    }

}