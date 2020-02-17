<?php
include("../modules/breaknew_module.php");
class BreakingNews_Controller
{
    private $break_module;
    private $con;

    // private $user;
    public function __construct()
    {
        $this->con = new Site_DB();
        $this->break_module=new BreakingNews();

    }

    public function allBreakNews()
    {
        $cat_data = $this->con->pdo_object->prepare(BreakingNews::AII_BREAKNEW);
        $cat_data->execute();
        return $cat_data->fetchAll();
    }
    function removeCategory($id)
    {

        $data=$this->con->pdo_object->prepare(BreakingNews::DELETE_BREAKNEW);
        $data->execute(array($id));

    }
    function  deleteItem(){
        @$id=$_GET['id'];
        $this->removeCategory($id);
    }
    public function insertToBreakNew($args=array())
    {
        $data = $this->con->pdo_object->prepare(BreakingNews::ADD_NEW);
        $data->execute($args);
    }
    public function addNew()
    {
        if(isset($_POST['add_btn']))
        {
            $name=$_POST['name'];

            $this->insertToBreakNew(array($name));
        }

    }
}
    ?>
