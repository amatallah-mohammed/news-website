<?php
$dsn="mysql:host=localhost;dbname=newsdatabase;charset=utf8";
$db_user="root";
$db_pass="";
$option=array(
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
);
$con=new PDO($dsn,$db_user,$db_pass,$option);


?>


