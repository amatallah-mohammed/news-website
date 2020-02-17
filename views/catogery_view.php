<?php
session_start();
include("../controllers/catogery_controller.php");
include("../design/navbar.php");
$categories=new Category_Controller();
$categories->deleteItem();



?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Management Of Categories</h1>
    <p class="mb-4"> </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <i> <h6 class="m-0 font-weight-bold text-primary"> <a href="add_category.php"><input type="submit" value="Add Category" class="btn btn-info" id="btn_add"></a></h6></i>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Parent</th>
                        <th>Create_Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Parent</th>
                        <th>Create_Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <?php
                    foreach ($categories->allCategories() as $category)
                    {
                        $id= $category->cat_id;
                        $create_by= $category->create_by;


                        echo "<tr>";
                        echo "<td>"  .$category->cat_id."</td>";
                        echo "<td>" . $category->name ."</td>";
                        echo "<td>" .$category->state ."</td>";
                        echo "<td>" . $category->parent ."</td>";
                        echo "<td>" . $category->create_date . "</td>";
                        echo "<td>
                                      <a href='?id=$id'><i class='fa fa-trash'id='icon'></i>
                                      <a href='edit_category.php?id=$id'><i class='fa fa-edit'id='icon' ></i>
                                      <a href='?id=$id && create_by= $create_by' data-toggle=\"modal\" data-target=\"#Modal\"><i class='fa fa-sticky-note'id='icon' ></i>
                                      </td>";






                        //echo "<button class='btn btn-warning'></a></td>";
                        //echo "<td><center><a href='?id=$id'><button class='btn btn-warning'><i class='fa fa-edit' style='color: black;'> Delete</i></a></td>";
                        echo "</tr>";


                    }


                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- info Modal-->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                @$id=$_GET['id'];
                @$create_by=$_GET['create_by'];
                print_r($_GET);




                   echo "تم انشاء التصنيف بواسطة".$create_by;

                ?>
               </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



</body>

</html>


