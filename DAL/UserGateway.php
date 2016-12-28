<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 14/12/2016
 * Time: 10:17
 */
class UserGateway
{
    private $con;
    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($pseudo, $mdp, $role){
        $query='INSERT INTO User VALUES(:pseudo, :mdp, :role)';
        $this->con->executeQuery($query, array(
            ':login'=>array($pseudo, PDO::PARAM_STR),
            ':mdp'=>array($mdp, PDO::PARAM_STR),
            ':role'=>array($role, PDO::PARAM_STR)
        ));
    }

    public function updateMdp($pseudo, $mdp){
        $query = 'UPDATE User SET mdp=:mdp WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_INT),
            ':mdp' => array($mdp, PDO::PARAM_STR),
        ));

    }

    public function updateRole($pseudo, $role){
        $query = 'UPDATE User SET role=:role WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_INT),
            ':role' => array($role, PDO::PARAM_STR),
        ));

    }

    public function delete($pseudo){
        $query= 'DELETE FROM User WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_INT)
        ));
    }

    public function search($pseudo){
        $query='SELECT * FROM User WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo'=>array($pseudo, PDO::PARAM_INT)
        ));
        $user=$this->con->getResults();
        return $user;
    }
}