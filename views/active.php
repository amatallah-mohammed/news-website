<?php
include("../controllers/comment_controller.php");
$comments=new Comment_Controller();
@$id=$_GET['id'];
@$state=$_GET['state'];
IF($state =='0') {
    $comments->active($id);
}
IF($state =='1') {
    $comments->noactive($id);
}
header("location:comment.php");
?>
