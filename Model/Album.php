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
    private $_int;
    private $_description;
    private $_couverture;

    function __construct($id,$nom,$num,$desc,$couv)
    {
        $this->_idAlbum=$id;
        $this->_nomAlbum=$nom;
        $this->_int=$num;
        $this->_description=$desc;
        $this->_couverture=$couv;
    }
}