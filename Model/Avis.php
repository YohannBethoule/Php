<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 20:45
 */
class Avis
{
    private $_user;
    private $_titre;
    private $_note;
    private $_commentaire;

    function __construct($user,$titre,$note,$com)
    {
        $this->_user=$user;
        $this->_titre=$titre;
        $this->_note=$note;
        $this->_commentaire=$com;
    }
}