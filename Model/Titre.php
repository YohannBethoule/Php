<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 20:31
 */
class Titre
{
    private $_idTitre;
    private $_nom;
    private $_artiste;
    private $_idAlbum;
    private $_date_debut;
    private $_date_fin;

    function __construct($id, $nom,$artiste,$idAlbum,$deb,$fin)
    {
        $this->_idTitre=$id;
        $this->_nom=$nom;
        $this->_artiste=$artiste;
        $this->_idAlbum=$idAlbum;
        $this->_date_debut=$deb;
        $this->_date_fin=$fin;
    }
}