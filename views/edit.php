<?php
include("../controllers/user_controller.php");
$users=new User_Controller();

$id=$_GET['id'];

foreach ($users->oneUsers($id) as $user)
{
$id= $user->u_id;

$name=$user->full_name;
$image=$user->image;
$mobile=$user->phone;
$email=$user->email;
$password=$user->password;
$register_date=$user->register_date;


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Edit</title>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"><?php //echo "<img class='thumb-circle' src='../images/".$image."'>"; ?></div>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" enctype="multipart/form-data" action="edit.php">
                                <input  type="hidden" id="id" name="id" value="<?php if(isset($id)) echo $id; ?>" readonly>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user"
                                           id="exampleFirstName" placeholder="First Name"
                                           value="<?php if (isset($name)) echo $name; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control form-control-user"
                                           id="exampleFirstName" placeholder="Number Phone"
                                           value="<?php if (isset($mobile)) echo $mobile; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="p_img">load image</label>
                                    <input type="file" class="form-control-file" name="mig" id="p_img">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                           name="email" placeholder="Email Address"
                                           value="<?php if (isset($email)) echo $email; ?>" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                               id="exampleInputPassword" name="passw" placeholder="Password"
                                               value="<?php if (isset($password)) echo $password; ?>" required>
                                    </div>

                                </div>
                                <input type="submit" name="add_btn" value="Save Change"
                                       class="btn btn-primary btn-user btn-block">
                                <!--<a href="login.php" class="btn btn-primary btn-user btn-block">
                                  Register Account
                                </a>-->

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    </body>

    </html>
    <?php
}

/* update data*/

if(isset($_POST['add_btn']))
{
    $id=$_POST['id'];
    $name=$_POST['username'];
    $mobile=$_POST['phone'];
    $img=$users->addFile();
    if($img=="")
    {
        $img="../images/defaultuser.png";
    }


    $email=$_POST['email'];
    $passw =$_POST['passw'];
    if($passw != "")
    {
        $pw=md5($passw);
    }
    $info=$users->updateDataUser(array($name,$img,$mobile,$email,$pw,$id));
    header("location:user_view.php");
}
?>
