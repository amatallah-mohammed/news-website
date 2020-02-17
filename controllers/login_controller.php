<?php


if($_POST){
    if(isset($_POST['login_btn'])=="Login")
    {
        $user_name=$_POST['username'];
            $passw=$_POST['passw'];
            //echo $user_name;
            //echo $passw;
        if($passw!= "")
           {
               $pw=md5($passw);
           }
        try
        {
          include "../modules/login_module.php" ;
         $login= new Login($user_name,$pw);
         if($login == TRUE)
         {
           session_start();
             $_SESSION["username"]=$user_name;
             header("location:index.php");
         }


        }
        catch (Exception $ex){
            echo $ex->getMessage();
            //header("location:../views/login.php");
        }
    }

}
?>
