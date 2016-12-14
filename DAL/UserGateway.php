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

    public function insert($pseudo, $mdp){
        $query='INSERT INTO User VALUES(:pseudo, :mdp)';
        $this->con->executeQuery($query, array(
            ':login'=>array($pseudo, 2),
            ':mdp'=>array($mdp, 2)
        ));
    }

    public function update($pseudo, $mdp){
        $query = 'UPDATE User SET mdp=:mdp WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_INT),
            ':mdp' => array($mdp, PDO::PARAM_STR),
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
        return new User($user['pseudo'], $user['mdp']);
    }
}