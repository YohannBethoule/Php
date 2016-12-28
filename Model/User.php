<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 19:29
 */

//Classe représentant un utilisateur
class User
{
    private $_login;
    private $_mdp;
    private $_role;

    function __construct($login, $password,$role)
    {
        $this->_login=$login;
        $this->_mdp=$password;
        $this->_role=$role;
    }
}