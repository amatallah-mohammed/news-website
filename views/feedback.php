<?php
include("../controllers/user_controller.php");
$users=new User_Controller();
$id=$_GET['id'];
IF($_GET['state'] =='0') {
    $users->activeUSER($id);
}
IF($_GET['state'] =='1') {
    $users->noactiveUSER($id);
}
header("location:user_view.php");
?>
