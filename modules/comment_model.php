<?php
include("../db/site_db.php");
class Comment
{
    /* variable*/
    private $id;
    private $text;
    private $user_id;
    private $post_id;
    private $comm_date;
    private $state;


    /* Get database access */
    private $conn;
    public function __construct()
    {
        $this->conn = new Site_DB();
    }
    const AII_COMMENT="select * from  comments where delete_comment=1";
    const DELETE_COMMENT="update comments set delete_comment=0 where id=?";
    const UPDATE_TO_ACTIVE="update comments set state=1 where id=?";
    const UPDATE_TO_NOACTIVE="update comments set state=0 where id=?";



}
?>
