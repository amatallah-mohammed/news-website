<?php
include("../db/site_db.php");
class Login
{

    private $username;
    private $password;
    private $con;

    // private $user;
    public function __construct($username,$password)
    {
        $this->con = new Site_DB();
        $this->setData($username,$password);
        $this->getData();


    }
    public function setData($username,$password)
    {
        $this->username=$username;
        $this->password=$password;
    }
    public function getData()
    {
        $login_data= $this->con->pdo_object->prepare("select * from users where full_name=' $this->username'&& password='  $this->password'");
        $login_data->execute();
        return $login_data->fetchAll();
        if ($login_data->rowcount() > 0)
        {
            return true;
        }else{
            throw new Exception("Errror");
        }

    }
    /* LOGIN*/
//    public $login_data;
//    public $row;
//    public function selectLogin($usrname,$password){
//        $login_data= $this->con->pdo_object->prepare(User_Data::LOGIN);
//        $login_data->execute(array($usrname,$password));
//
//          $row= $login_data->fetchAll();
//        return $row;
//     // echo $this->row['full_name'];
//
//
//
//
//    }
//    public function login()
//    {
//        if(isset($_POST['login_btn']))
//        {
//            $user_name=$_POST['username'];
//            $passw=$_POST['passw'];
//            //print_r($_POST);
//            if($passw!= "")
//            {
//                $pw=md5($passw);
//            }
//            $this->selectLogin(array($user_name,$pw));
//            if ($this->login_data->rowcount() > 0)
//            {
////                $_SESSION["user_name"]=$this->row['full_name'];
////                $_SESSION["user_image"]=$this->row['image'];
////                $_SESSION["group_id"]=$this->row['group_id'];
//
//            }
//        }
//    }
}

?>
