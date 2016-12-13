<?php

/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 13/12/2016
 * Time: 18:40
 */
class Admin
{
    private $_login;
    private $_mdp;

    function __construct($login,$password)
    {
        $this->_login=$login;
        $this->_mdp=$password;
    }
}