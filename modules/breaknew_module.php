<?php
include("../db/site_db.php");
class BreakingNews
{
    /* variable*/
    private $id;
    private $text;
    private $start_date;
    private $end_date;
    private $create_by;


    /* Get database access */
    private $conn;
    public function __construct()
    {
        $this->conn = new Site_DB();
    }
    const AII_BREAKNEW="select * from direct_new where delete_new=1";
    const DELETE_BREAKNEW="update direct_new set delete_new=0 where id=?";
    const ADD_NEW="insert into direct_new(text,start_date) values(?,now())";



}
?>
