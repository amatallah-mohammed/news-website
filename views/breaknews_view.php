<?php
session_start();
include("../controllers/breaknew_controller.php");
include("../design/navbar.php");
$breaking=new BreakingNews_Controller();
$breaking->deleteItem();



?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Management Of Breaking News</h1>
    <p class="mb-4"> </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <i> <h6 class="m-0 font-weight-bold text-primary"> <a href="breaking_new.php"><input type="submit" value="Add Breaking New" class="btn btn-info" id="btn_add"></a></h6></i>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Text</th>

                        <th>Start_Date</th>
                        <th>Create By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Text</th>

                        <th>Start_Date</th>
                        <th>Create By</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <?php
                    foreach ($breaking->allBreakNews() as $breakingnew)
                    {
                        $id= $breakingnew->id;

                        echo "<tr>";
                        echo "<td>"  .$breakingnew->id."</td>";
                        echo "<td>" . $breakingnew->text ."</td>";
                       // echo "<td>" .$breakingnew->state ."</td>";
                        echo "<td>" . $breakingnew->start_date ."</td>";
                        echo "<td>" . $breakingnew->create_by . "</td>";
                        echo "<td>
                                      <a href='?id=$id'><i class='fa fa-trash'id='icon'></i></td>";






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


