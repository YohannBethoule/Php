<?php

/**
 * Created by PhpStorm.
 * user: yoyot
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
        $query='INSERT INTO user VALUES(:pseudo, :mdp, :role)';
        $this->con->executeQuery($query, array(
            ':login'=>array($pseudo, PDO::PARAM_STR),
            ':mdp'=>array($mdp, PDO::PARAM_STR),
            ':role'=>array($role, PDO::PARAM_STR)
        ));
    }

    public function updateMdp($pseudo, $mdp){
        $query = 'UPDATE user SET mdp=:mdp WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_INT),
            ':mdp' => array($mdp, PDO::PARAM_STR),
        ));

    }

    public function updateRole($pseudo, $role){
        $query = 'UPDATE user SET role=:role WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_INT),
            ':role' => array($role, PDO::PARAM_STR),
        ));

    }

    public function delete($pseudo){
        $query= 'DELETE FROM user WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_INT)
        ));
    }

    public function search($pseudo){
        $query='SELECT * FROM user WHERE pseudo=:pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo'=>array($pseudo, PDO::PARAM_INT)
        ));
        $user=$this->con->getResults();
        if(isset($user) && $user!=null)
            $user=$user[0];
        return $user;
    }
}