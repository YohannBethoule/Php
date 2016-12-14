<?php

/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 06/12/2016
 * Time: 21:21
 */
class Album
{
    private $_idAlbum;
    private $_nomAlbum;
    private $_artiste;
    private $_parution;
    private $_description;
    private $_couverture;

    function __construct($id,$nomAlbum, $artiste, $parution,$desc,$couv)
    {
        $this->_idAlbum=$id;
        $this->_nomAlbum=$nomAlbum;
        $this->_artiste=$artiste;
        $this->_parution=$parution;
        $this->_description=$desc;
        $this->_couverture=$couv;
    }
}