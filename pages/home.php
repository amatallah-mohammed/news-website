<?php
session_start();
include("../designs/header.php");
include("../db/connect_db.php");
?>
<body class="body">
<div class="row">
    <div class="marquee">
        <div class="col-xs-4 col-sm-2 pull-right no-padding">
            <h1>أخبار عاجلة</h1>
        </div>
        <div class="vticker col-xs-12 col-sm-10 no-padding" >
            <marquee    onmouseover="this.stop();" onmouseout="this.start();">
                <?php
                //
                $sql="select * from direct_new where delete_new=1";
                $cat_data =$con->prepare($sql);
                $cat_data->execute();
                $rows=$cat_data->fetchAll();
                foreach ($rows as $row) {
                    if(date("yy-m-d")!= $row['end_date']){
                        echo '<span>'.$row['text'].'</span>   *** ';
                    }

                }
                ?>
            </marquee>
        </div>
<!--        <div class="marquee-control">-->
<!--            <button class="pull-left down"><span class="fa fa-angle-left"></span></button>-->
<!--            <button class="up"><span class="fa fa-angle-right"></span></button>-->
<!--        </div>-->
    </div>
</div>


<div class="container">

    <div class="row cat">
        <div>
            <section class="col-xs-8 col-sm-9">
                <div class="col-lg-12">
                    <h1 class="green-border margin-bottom">اهم الاخبار </h1>
                </div>

                <?php

                    $sql="select posts.id,title,pulish_date,post_intro,post_image,post_content,name  from posts,categories  where posts.cat_id=categories.cat_id order by id desc limit 5";
                    $cat_data =$con->prepare($sql);
                    $cat_data->execute();
                    $rows=$cat_data->fetchAll();
                    foreach ($rows as $row) {
                        echo '<div class="media col-lg-8 col-md-12 col-sm-3" style="background: white;    margin-left: 2%; width: 96%; ">';
                        echo '<h2 class="mt-0">'.$row['title'].'</h2>';
                        echo '<h3> '.$row['pulish_date'].' </h3>';
                        echo '<div class="media-body">';
                        echo " <center><img src='../../dashborad/images/".$row['post_image']."' height='200' width='800' class='mr-3' alt='...'>";



                        echo ' <p id="intro">'.$row['post_intro'].'</p> </div>';
                        echo "<a href='new.php?id=".$row['id']."' id='read'> اقرأ المزيد</a>";
//echo date("yy-m-d");
                        echo ' </div>';
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