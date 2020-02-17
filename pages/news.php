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
$sql="select * from posts  where cat_id=?";
$cat_data =$con->prepare($sql);
$cat_data->execute(array($id));
$rows=$cat_data->fetchAll();
foreach ($rows as $row) {
    echo '<div class="media col-lg-8 col-md-12 col-sm-3" style="background: white;    margin-left: 2%;
    width: 96%; ">';
    echo '<h2 class="mt-0">'.$row['title'].'</h2>';
    echo '<h3> <i class="fa fa-calendar"> '.$row['pulish_date'].' </i></h3>';
    echo '<div class="media-body">';
    echo " <center><img src='../../dashborad/images/".$row['post_image']."' height='200' width='800' class='mr-3' alt='...'>";



          echo ' <p id="intro">'.$row['post_intro'].'</p> </div>';
          echo "<a href='new.php?id=".$row['id']."' id='read'> اقرأ المزيد</a>";

    echo ' </div>';
}
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

