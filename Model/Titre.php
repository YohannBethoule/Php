<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 20:31
 */
class Titre
{
    private $_nom;
    private $_auteur;
    private $_album;
    private $_date_debut;
    private $_date_fin;

    function __construct($nom,$auteur,$album,$deb,$fin)
    {
        $this->_nom=$nom;
        $this->_auteur=$auteur;
        $this->_album=$album;
        $this->_date_debut=$deb;
        $this->_date_fin=$fin;
    }
}