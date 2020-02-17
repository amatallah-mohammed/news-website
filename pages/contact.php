<?php
session_start();
include("../designs/header.php");
include("../db/connect_db.php");
?>
<body class="body">

<div class="container">

    <div class="row" style="margin-top: 4%;">
        <div>
            <section class="col-xs-12 col-sm-9">
                <div class="col-xs-12">
                    <h1 class="green-border margin-bottom">اهم الاخبار </h1>

                    <div class="box">
                        <div class="pull-right col-sm-4 no-padding">


                            <div class="media" style="background: white;">
                                <img src="images/1575975423.jpg" class="mr-3" alt="...">

                                <div class="media-body">
                                    <h5 class="mt-0">Media heading</h5><br>
                                    <p><i class="fa fa-calendar"> 12/2/2019 </i></p>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
</body>
