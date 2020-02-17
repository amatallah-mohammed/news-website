<?php

include("../modules/user_module.php");

class User_Controller
{
    private $user_module;
    private $con;

    // private $user;
    public function __construct()
    {
        $this->con = new Site_DB();
        $this->user_module = new User_Data();

    }

    public function allUsers()
    {
        $user_data = $this->con->pdo_object->prepare(User_Data::AII_USER);
        $user_data->execute();
        return $user_data->fetchAll();
    }

    public function oneUsers($id)
    {
        $user_data = $this->con->pdo_object->prepare(User_Data::ONE_USER);
        $user_data->execute(array($id));
        return $user_data->fetchAll();
    }

    /* update data */
    public function updateDataUser($args=array())
    {
        $user_data = $this->con->pdo_object->prepare(User_Data::ONE_USER_EDIT);
        $user_data->execute($args);
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
    /* ACTIVE*/
    public function activeUSER($id){
        $user_data = $this->con->pdo_object->prepare(User_Data::UPDATE_TO_ACTIVE);
        $user_data->execute(array($id));

    }

    public function noactiveUSER($id){
        $user_data = $this->con->pdo_object->prepare(User_Data::UPDATE_TO_NOACTIVE);
        $user_data->execute(array($id));

    }
    /* SIGNUP*/
    public function insertToUser($args=array())
    {
        $data = $this->con->pdo_object->prepare(User_Data::CREATE_ACCOUNT);
        $data->execute($args);
    }
    public function signUp(){
        if(isset($_POST['add_btn'])){

            $img=$this->addFile();
            if($img==""){
                $img="images/defaultuser.png";
            }

            $user_name=$_POST['username'];
            $phone_no=$_POST['phone'];
            $email=$_POST['email'];
            $passw=$_POST['passw'];
            // print_r($_POST);
            if($passw!= ""){
                $pw=md5($passw);
            }
            $this->insertToUser(array(
                $user_name,
                $img,
                $phone_no,
                $email,
                $pw
            ));
            }
            }
        /* LOGIN*/

    public function selectLogin($usrname,$password){
        $login_data= $this->con->pdo_object->prepare(User_Data::LOGIN);
        $login_data->execute(array($usrname,$password));

        return $login_data->fetchAll();

    }
    public function login()
    {
        if($_POST){
            if(isset($_POST['login_btn'])=="Login")
            {

               session_start();
                $user_name=$_POST['username'];
                $passw=$_POST['passw'];

            if($passw!= "")
            {
                $pw=md5($passw);
            }
            $user=new User_Controller();

                foreach ($user->selectLogin($user_name,$pw) as $user){
                    $_SESSION["user_name"]=$user->full_name;
                    $_SESSION["password"]=$user->password;
                    $_SESSION["user_image"]= $user->image;
                    $_SESSION["group_id"]= $user->group_id;
                    $_SESSION["id"]= $user->u_id;

                }

//print_r($_SESSION);
        }
        }
    }

/* DELETE USER*/
    function removeUser($id)
    {

        $data=$this->con->pdo_object->prepare(User_Data::DELETE_USER);
        $data->execute(array($id));

    }
    function  deleteUser(){
        @$id=$_GET['id'];
        $this->removeUser($id);
    }
/* END DELETE USER*/







}



?>