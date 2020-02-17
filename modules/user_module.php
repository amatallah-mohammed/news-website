<?php

include("../db/site_db.php");
class User_Data
{
    /* variable*/
    private $id;
    private $name;
    private $image;
    private $phone;
    private $email;
    private $password;
    private $state;
    private $group_id;
    private $register_date;

    /* Get database access */
    private $conn;
    public function __construct()
    {
        $this->conn = new Site_DB();
    }

    const AII_USER="select * from users where delete_user=1";
    const DELETE_USER="update users set delete_user=0 where u_id=?";
   // const USER="select * from users where state=0";
    const ONE_USER="select * from users where u_id =?";
    const ONE_USER_EDIT="UPDATE users SET full_name=?,image=?,	phone=?,email=?,password=? where u_id=?";
    const UPDATE_TO_ACTIVE="update users set state=1 where u_id=?";
    const UPDATE_TO_NOACTIVE="update users set state=0 where u_id=?";
    const CREATE_ACCOUNT="insert into users(full_name,image,phone,email,password,register_date) values(?,?,?,?,?,now())";
    const LOGIN="SELECT * FROM `users` WHERE `full_name`=? and `password`=? limit 1";

}
?>
