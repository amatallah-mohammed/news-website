<?php

class Site_DB
{
    private $dsn;
    const DB_USER="root";
    const DB_PASS="";
    public $pdo_object;

    public function __construct()
    {
        $this->dsn="mysql:host=localhost;dbname=newsdatabase";
        $this->pdo_object=new PDO($this->dsn,Site_DB::DB_USER,Site_DB::DB_PASS);
        $this->pdo_object->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $this->pdo_object->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo_object->exec("SET NAMES utf8");


    }
    }
//    /* Get data user */
//    public function getData($sql,$args=array())
//    {
//        $stm=$this->pdo_object->prepare($sql) ;
//        $stm->execute($args);
//        return $stm->fetchAll();
//
//    }


?>
