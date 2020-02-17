<?php
include("../db/site_db.php");
class Categories
{
    /* variable*/
    private $cat_id;
    private $name;
    private $state;
    private $create_by;
    private $create_date;
    private $update_cat;
    private $parent;

    /* Get database access */
    private $conn;
    public function __construct()
    {
        $this->conn = new Site_DB();
    }
    const AII_CATEGORIES="select * from categories where delete_category=1";
    const ADD_CATEGORY="insert into categories(name,state,	parent,create_date,create_by) values(?,?,?,now(),?)";
    const DELETE_CATEGORY="update categories set delete_category=0 where cat_id=?";
    const ONE_CATEGORY_EDIT="UPDATE categories SET name=?,state=?,parent=?,update_cat=? where cat_id=?";
    const ONE_CATEGORY="select * from categories where cat_id =?";


}
?>
