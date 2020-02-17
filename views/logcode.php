<?php
//session_start();
include("../db/connect_db.php");


if(isset($_POST['login_btn'])){



    $user_name=$_POST['username'];
    $passw=$_POST['passw'];
    //print_r($_POST);
    if($passw!= ""){
        $pw=md5($passw);
    }
    $sql="select full_name,image,password,group_id from users where full_name=:uname && password=:pw ";
    $info=$con->prepare($sql);
    $info->execute(array("uname"=>$user_name,"pw"=>$pw));
    $rows=$info->fetch();
    if($info->rowCount() > 0) {
//        $_SESSION["user_name"]=$rows['full_name'];
//        $_SESSION["user_image"]=$rows['image'];
//        $_SESSION["group_id"]=$rows['group_id'];
        header("location:home.php");
//        if($rows['group_id']==1)
//        //header("location:users.php");
//
//    }
//    else{
//        echo "<script>alert('not found account');</script> ";
//        header("location:signup.php");
//
//    }
}
    else{
      //echo "<script>alert('not found account');</script> ";
       header("location:signup.php");
   }
}


?>
