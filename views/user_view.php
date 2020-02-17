<?php
session_start();
include("../controllers/user_controller.php");
include("../design/navbar.php");
$users=new User_Controller();
$users->deleteUser();

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Management Of Users</h1>
    <p class="mb-4"> </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <a href="signup.php"><input type="submit" value="Add User" class="btn btn-info" id="btn_add"></a></h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>phone</th>
                        <th> Date Of Registration</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>phone</th>
                        <th> Date Of Registration</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <?php
                   foreach ($users->allUsers() as $user)
                          {
                            $id= $user->u_id;

                            echo "<tr>";
                            echo "<td>"  .$user->u_id."</td>";
                            echo "<td>" . $user->full_name ."</td>";
                            echo "<td><img src='" .$user->image ."'width='50' height='30'></td>";
                            echo "<td>" . $user->phone ."</td>";
                            echo "<td>" . $user->email . "</td>";
                            echo "<td>
                                      <a href='edit.php?id=$id'><i class='fa fa-edit'id='icon'></i>
                                      <a href='?id=$id'><i class='fa fa-trash'id='icon'></i>";
                            if($user->state =='0')
                            {
                                echo " <a href='feedback.php?state=0&id=$id' id='active'>UnActive</a>";
                            }
                            if($user->state=='1')
                            {
                                echo "<a href='feedback.php?state=1&id=$id' id='active'>Active</a> 
                                </td>";
                            }



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


