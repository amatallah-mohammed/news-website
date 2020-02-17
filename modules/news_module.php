<?php
include("../db/site_db.php");
class Post
{
    /* variable*/
    private $id;
    private $title;
    private $post_intro;
    private $post_content;
    private $post_image;
    private $create_by;
    private $create_date;
    private $cat_id;
    private $update_post;
    private $pulish_date;



    /* Get database access */
    private $conn;
    public function __construct()
    {
        $this->conn = new Site_DB();
    }
    const AII_POST="select * from posts where delete_data=1";
    const ONE_POST="select * from posts where id=?";
    const DELETE_POST="update posts set delete_data=0 where id=?";
    const AII_CATEGORIES="select * from categories";
    const ONE_POST_EDIT="UPDATE posts SET title=?,post_intro=?,post_content=?,post_image=?,pulish_date=? where id=?";
    const INSERTPOST="insert into posts(title,post_intro,post_content,post_image,create_by,create_date,cat_id,pulish_date) values(?,?,?,?,?,now(),?,?)";



}
?>
