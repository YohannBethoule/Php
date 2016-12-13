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

    function __construct($login, $password)
    {
        $this->_login=$login;
        $this->_mdp=$password;
    }
}