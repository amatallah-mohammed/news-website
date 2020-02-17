<?php
include("../modules/news_module.php");
class Post_Controller
{
    private $post_module;
    private $con;

    // private $user;
    public function __construct()
    {
        $this->con = new Site_DB();
        $this->post_module=new Post();

    }

    public function allNew()
    {
        $cat_data = $this->con->pdo_object->prepare(Post::AII_POST);
        $cat_data->execute();
        return $cat_data->fetchAll();
    }
    public function oneNew($id)
    {
        $user_data = $this->con->pdo_object->prepare(Post::ONE_POST);
        $user_data->execute(array($id));
        return $user_data->fetchAll();
    }
    function removePost($id)
    {

        $data=$this->con->pdo_object->prepare(Post::DELETE_POST);
        $data->execute(array($id));

    }
    function  deleteItem(){
        @$id=$_GET['id'];
        $this->removePost($id);
    }
    public function allCategories()
    {
        $cat_data = $this->con->pdo_object->prepare(Post::AII_CATEGORIES);
        $cat_data->execute();
        return $cat_data->fetchAll();
    }
    function addFile()
    {
        $info = explode(".", $_FILES["mig"]["name"]);
        $extension = array("png", "jpg", "jpeg", "gif");
        // echo end($info);
        if (in_array(end($info), $extension))
        {
            $path = "../images/" . time() . "." . end($info);
            if (move_uploaded_file($_FILES["mig"]["tmp_name"], $path))
                return $path;
            return "";
        } else
        {
            echo "<script>alert('type file is not allowed');</script> ";
        }

    }
    public function insertToPost($args=array())
    {
        $data = $this->con->pdo_object->prepare(Post::INSERTPOST);
        $data->execute($args);
    }
    public function addPost(){
        if(isset($_POST['add_btn'])){

            $img=$this->addFile();
            if($img==""){
                $img="images/defaultuser.png";
            }
session_start();
            $title=$_POST['title'];
            $intro=$_POST['intro'];
            $content=$_POST['content'];
            $p_date=$_POST['p_date'];
            $category=$_POST['category'];
            $user_name=$_SESSION['id'];
            // print_r($_POST);

            $this->insertToPost(array(
                $title,
                $intro,
                $content,
                $img,
                $user_name,
                $category,
                $p_date




            ));
        }
    }
    public function updateData($args=array())
    {
        $user_data = $this->con->pdo_object->prepare(Post::ONE_POST_EDIT);
        $user_data->execute($args);
    }
    public function editPost(){
        if(isset($_POST['add_btn']))
        {
            session_start();
            //print_r($_SESSION);
            $id=$_POST['id'];
            $title=$_POST['title'];
            $intro=$_POST['intro'];
            $content=$_POST['content'];
            $p_date=$_POST['p_date'];
            $mig=$_POST['mig'];
//            $id_user=$_SESSION['id'];
//            $user_name=$_SESSION['user_name'];
          //  $udate_cat=json_encode(array("id"=>$id_user,"name"=>$user_name));
          //  $this->updateData(array($name,$category_state,$category_parent, $udate_cat,$id));
        }
    }

    }
    ?>
