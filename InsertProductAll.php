<?php
/*  *  This to ansert product attributes after validation. 
It contains three functions for three products, each one calls ProductBackendWithMysql for insertion.
more products types can be added here just by introduce the approperiate function */

class InsertProductAll 
{

    Public function insertDVD()
    {
        require_once('ProductBackendWithMysql.php');
        $sc = new ProductBackendWithMysql();
        $sc->setSku($_POST['sku']);
        $sc->setName($_POST['name']);
        $sc->setPrice($_POST['price']);
        $sc->setSize($_POST['size']);
        $sc->insertData();
        
    }

    Public function insertBook()
    {
        require_once('ProductBackendWithMysql.php');
        $sc = new ProductBackendWithMysql();
        $sc->setSku($_POST['sku']);
        $sc->setName($_POST['name']);
        $sc->setPrice($_POST['price']);
        $sc->setWeight($_POST['weight']);
        $sc->insertData();
        
    }

    Public function insertFurniture()
    {
        require_once('ProductBackendWithMysql.php');
        $sc = new ProductBackendWithMysql();
        $sc->setSku($_POST['sku']);
        $sc->setName($_POST['name']);
        $sc->setPrice($_POST['price']);
        $sc->setHeight($_POST['height']);
        $sc->setLength($_POST['length']);
        $sc->setWidth($_POST['width']);
        $sc->insertData();
    }

}

?>