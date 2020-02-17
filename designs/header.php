<?php
//session_start();
?>
<!DOCTYPE html>
<html><head lang="ar">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>الأخبار
    </title>

    <link href="../css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">

</head>


<!--<div class="container big-container">-->
    <div class="row">
    <div class="col-lg-12">

        <header>


            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">

                <div class="col-xs-6 no-padding pull-right">
                    <span id="date-holders"></span>
                    <span id="date-holder">الاربعاء 9 نوفمبر 2016 م</span>
                </div>


                <form method="GET" action="" accept-charset="UTF-8" class="col-xs-12 no-padding">
                    <input name="word" placeholder="منطقة البحث" type="text">
                    <div class="search-btn">
                        <i class="fa fa-search"></i>
                        <input value="" title="بحث" type="submit">
                    </div>
                </form>
            </div>
        </header>
    </div>
    </div>
<!--</div>-->

        <!------------------------------------------------------->


        <nav class="navbar" role="navigation">
            <div id="nav-content">
                <div class="navbar-header">
                    <button class="navbar-toggle nav-button" data-target="#navbar-collapse" data-toggle="collapse" type="button">
                        <span class="fa fa-navicon fa-2x"></span>
                    </button>
                </div>


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">

                                <li><a href="../pages/home.php">الرئيسية</a></li>
                                <li><a href="../pages/catogeries.php"> التصنيفات</a></li>
                                <li><a href=""> من نحن</a></li>
                                <li><a href="">اتصل بنا</a></li>
                             <?php
                             //print_r($_SESSION);
                             if(isset( $_SESSION["user_name"])) {
                                 echo '<li><a href="../../dashborad/views/logout.php"> تسجيل خروج</a></li> ';
                             }elseif (!isset($_SESSION["user_name"])){
                                 echo '<li><a href="../../dashborad/views/login.php">تسجيل دخول</a></li>';
                             }
                             ?>



<!--                                <li><a href="">أخبار محلية</a></li>-->
<!--                                <li><a href="">أخبار إقتصادية</a></li>-->
<!--                                <li><a href="">متابعات</a></li>-->


                            </ul>
                        </div>
                    </div>
                    </div>

            </div>
        </nav>
<script src="../js/bootstrap.min.js"></script>
<!--<script src="js/jquery-3.3.1.min.js"></script> <script  src="js/jquery-3.2.1.min.js"></script>-->
<script src="../js/jquery-2.2.3.min.js"></script>

<script src="../js/bootstrap.js"></script>

<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <script src="../js/bootstrap.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-1.js"></script>
        <script src="../js/jquery_002.js"></script>
        <script src="../js/script.js"></script>
