<?php
session_start();
include("../designs/header.php");
include("../db/connect_db.php");

//print_r($_GET);
?>
    <body class="body">

    <div class="container">

        <div class="row cat">
            <div>
                <section class="col-xs-8 col-sm-9">
                    <div class="col-lg-12">
                        <h1 class="green-border margin-bottom">اهم الاخبار </h1>
                    </div>

                    <?php
                    $id=$_GET['id'];
                    if($id){
                        $sql="select posts.id,title,pulish_date,post_image,post_content,name  from posts,categories  where posts.cat_id=categories.cat_id and id=?";
                        $cat_data =$con->prepare($sql);
                        $cat_data->execute(array($id));
                        $rows=$cat_data->fetchAll();
                        foreach ($rows as $row) {
                            echo '<div class="media col-lg-8 col-md-12 col-sm-12" style="background: white;    margin-left: 2%;
    width: 96%; ">';
                            echo '<h2 class="mt-0" id="cat">'.$row['name'].'</h2>';
                            echo '<h2 class="mt-0">'.$row['title'].'</h2>';
                            echo '<h3> '.$row['pulish_date'].' </h3>';
                            echo '<div class="media-body">';
                            echo " <center><img src='../../dashborad/images/".$row['post_image']."' height='200' width='500' class='mr-3' alt='...'>";



                            echo ' <h2>'.$row['post_content'].'</h2> </div>';
                            /* view all comments*/
                            $sql="select * from comments,users  where post_id=? and comments.state=1 and comments.user_id=users.u_id";
                            $cat_data =$con->prepare($sql);
                            $cat_data->execute(array($id));
                            $rows=$cat_data->fetchAll();
                            foreach ($rows as $row) {

                                echo '<div class="media" style="background: white;">';

                                echo ' <img class="img-profile img-circle" src="../../dashborad/images/'. $row['image'].'"     width="20"
    height="20"class="mr-3" alt="...">' ;
                                echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">'. $row['full_name'].'</span>';
                                //echo '<hr>';

                                echo '<div class="media-body">';
                                echo ' <p><i class="fa fa-calendar">'.$row['com_date'].'</i></p>
                                      <p> '.$row['text_comment'].'</p>
                                    </div>';
                                echo ' </div>';
                                echo '<hr>';



                            }
                            if(isset( $_SESSION["user_name"])) {

//                          $user=$_SESSION['user_name'];
//                        $user_img=$_SESSION['user_image'];
                              ?>
                                <form method="post">
                                    <div class="form-group inputmy">
                                        <label for="title">التعليق</label>
                                        <textarea name="content" class="form-control" id="title"
                                                  aria-describedby="emailHelp" placeholder="" required
                                                  autocomplete="off"></textarea>

                                    </div>
                                    <button type="submit" name="add_btn" class="btn btn-success" id="btn">ارسال
                                        التعليق
                                    </button>
                                    <button type="submit" name="cancel" class="btn btn-danger" id="btn">الغاء</button>
                                </form>
                                <?php
                            }
                        }
                    }
                            echo ' </div>';

                    if(isset($_POST['add_btn'])){

                        $text=$_POST['content'];
                        $user_id=$_SESSION['id'];

                        $post_id=$_GET['id'];


                        $sql="insert into comments(text_comment,user_id,post_id,com_date) values (?,?,?,now())";
                        $info=$con->prepare($sql);
                        $info->execute(array($text,$user_id,$post_id));

                    }

                    ?>






            </div>


            <aside class="col-xs-12 col-sm-3" style="">
                <div class="box">
                    <h1 class="green-border">احدث الأخبار </h1>
                    <div class="inner-box">
                        <ul>
                            <?php
                            $sql="select * from posts order by id desc limit 2";
                            $cat_data =$con->prepare($sql);
                            $cat_data->execute(array());
                            $rows=$cat_data->fetchAll();
                            foreach ($rows as $row) {
                                echo '<li><a href="new.php?id='.$row['id'].'">'.$row['title'].'</a></li>';

                            }
                            ?>


                        </ul>
                    </div>
                </div>
                <div class="box">
                    <h1 class="green-border">صفحات الموقع </h1>
                    <div class="inner-box">
                        <ul>
                            <li><a href="home.php">الرئيسية </a></li>
                            <li><a href="catogeries.php">التصنيفات</a></li>
                            <li><a href="">من نحن</a></li>
                            <li><a href="contact.php">اتصل بنا</a></li>

                        </ul>
                    </div>
                </div>
                <div class="box">
                    <h1 class="green-border">التصنيفات</h1>
                    <div class="inner-box">
                        <ul>
                            <?php
                            $sql="select * from categories";
                            $cat_data =$con->prepare($sql);
                            $cat_data->execute();
                            $rows=$cat_data->fetchAll();
                            foreach ($rows as $row){

                                echo '<li><a  href="news.php?id='.$row['cat_id'].'">'.$row['name'].'</a></li>';

                            }?>
                        </ul>

                    </div>
                </div>
            </aside>
        </div>
    </div>
    </section>


    </body>

