<?php
session_start();
include("../designs/header.php");
include("../db/connect_db.php");
?>
<body class="body">

<div class="container">

    <div class="row cat">
        <div>
            <section class="col-xs-8 col-sm-9">
                <div class="col-lg-12">
                    <h1 class="green-border margin-bottom">التصنيفات </h1>
                </div>

<!--                        <div class="col-xs-3 cat_div">hhhhhhhhhh</div>-->
<!--                        <div class="col-xs-3 cat_div">hhhhhhhhhh</div>-->
<!--                        <div class="col-xs-3 cat_div">hhhhhhhh</div>-->


                            <?php
                            $sql="select * from categories";
                            $cat_data =$con->prepare($sql);
                            $cat_data->execute();
                            $rows=$cat_data->fetchAll();
                            foreach ($rows as $row){
echo '<div class="col-lg-3 col-sm-12 col-md-12 cat_div"><a  id="link_cat"href="news.php?id='.$row['cat_id'].'">'.$row['name'].'</a></div>';


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
