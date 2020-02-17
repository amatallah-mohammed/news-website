<?php
include("../modules/catogery_model.php");
class Category_Controller
{
    private $category_module;
    private $con;

    // private $user;
    public function __construct()
    {
        $this->con = new Site_DB();
        $this->category_module=new Categories();

    }

    public function allCategories()
    {
        $cat_data = $this->con->pdo_object->prepare(Categories::AII_CATEGORIES);
        $cat_data->execute();
        return $cat_data->fetchAll();
    }

    public function insertToCategory($args=array())
    {
        $data = $this->con->pdo_object->prepare(Categories::ADD_CATEGORY);
        $data->execute($args);
    }
    public function addCategory()
    {
        if(isset($_POST['add_btn']))
        {
            session_start();
            //print_r($_SESSION);
            $name=$_POST['name'];
            $category_state=$_POST['category_state'];
            $category_parent=$_POST['category_parent'];
            $create_by=$_SESSION['id'];
            $this->insertToCategory(array($name,$category_state,$category_parent, $create_by));
        }

    }
    function removeCategory($id)
    {

        $data=$this->con->pdo_object->prepare(Categories::DELETE_CATEGORY);
        $data->execute(array($id));

    }
    function  deleteItem(){
        @$id=$_GET['id'];
        $this->removeCategory($id);
    }
    /* edit category*/
    public function oneCategory($id)
    {
        $user_data = $this->con->pdo_object->prepare(Categories::ONE_CATEGORY);
        $user_data->execute(array($id));
        return $user_data->fetchAll();
    }
    public function updateData($args=array())
{
    $user_data = $this->con->pdo_object->prepare(Categories::ONE_CATEGORY_EDIT);
    $user_data->execute($args);
}
public function editCategory(){
    if(isset($_POST['add_btn']))
    {
        session_start();
        //print_r($_SESSION);
        $id=$_POST['id'];
        $name=$_POST['name'];
        $category_state=$_POST['category_state'];
        $category_parent=$_POST['category_parent'];
        $id_user=$_SESSION['id'];
        $user_name=$_SESSION['user_name'];
        $udate_cat=json_encode(array("id"=>$id_user,"name"=>$user_name));
        $this->updateData(array($name,$category_state,$category_parent, $udate_cat,$id));
    }
}

    }
?>
