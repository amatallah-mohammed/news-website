R<?php
include("../controllers/catogery_controller.php");
$categories=new Category_Controller();
if(isset($_POST['add_btn'])){
    $categories->addCategory();
    //echo "<script> alert('create account successful') </script>";
    header("location:catogery_view.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
  <div class="row">
  <div class="col-lg-12 col-sm-6 col-md-6">



      <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                  <h1 id="title1"> Add Category </h1></br></br>
                  <div class="form-group inputmy">
                      <label for="title">Category Name</label>
                      <input type="text" name="name" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Name" required autocomplete="off">

                  </div>
                  <div class="form-group inputmy">
                      <label>State</label>
                      <select name="category_state" class="form-control" >
                          <option value='1'>active</option>
                          <option value='0'>no_active</option>

                      </select>
                  </div>
                  <div class="form-group inputmy">
                      <label>Parent</label>
                      <select name="category_parent" class="form-control" >
                          <option value='0'>رئيسي</option>
                          <?php

                          foreach ($categories->allCategories() as $category)
                          {
                              echo "<option value='.$category->cat_id.'>$category->name</option>";
                          }

                          ?>



                      </select>
                  </div>

                  <button type="submit" name="add_btn" class="btn btn-primary" id="btn">Save</button>
              </form>



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
