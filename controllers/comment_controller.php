<?php
include("../modules/comment_model.php");

class Comment_Controller
{
private $comment_module;
private $con;

// private $user;
public function __construct()
{
$this->con = new Site_DB();
$this->comment_module = new Comment();

}

public function allComment()
{
$data = $this->con->pdo_object->prepare(Comment::AII_COMMENT);
$data->execute();
return $data->fetchAll();
}
    function removeComment($id)
    {

        $data=$this->con->pdo_object->prepare(Comment::DELETE_COMMENT);
        $data->execute(array($id));

    }
    function  deleteItem(){
        @$id=$_GET['id'];
        $this->removeComment($id);
    }
    /* ACTIVE*/
    public function active($id){
        $user_data = $this->con->pdo_object->prepare(Comment::UPDATE_TO_ACTIVE);
        $user_data->execute(array($id));

    }

    public function noactive($id){
        $user_data = $this->con->pdo_object->prepare(Comment::UPDATE_TO_NOACTIVE);
        $user_data->execute(array($id));

    }
}
?>