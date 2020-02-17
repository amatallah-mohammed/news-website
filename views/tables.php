<?php
include("../design/navbar.php");
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"> Management Of Users</h1>
          <p class="mb-4"> </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
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
                    $sql="select * from users";
                    $info=$con->prepare($sql);
                    $info->execute();
                    $rows=$info->fetchAll();
                    if($info->rowcount()>0) {
                        foreach($rows as $row) {
                            $id= $row['u_id'];
                            echo "<tr>";
                            echo "<td>" . $row['u_id'] ."</td>";
                            echo "<td>" . $row['full_name'] ."</td>";
                            echo "<td><img src='" . $row['image'] ."'width='50' height='30'></td>";
                            echo "<td>" . $row['phone'] ."</td>";
                            echo "<td>" . $row['register_date'] . "</td>";
                            echo "<td><center><a href='?id=$id'><i class='fa fa-edit' style='color: black;'></i></td>";
                            //echo "<button class='btn btn-warning'></a></td>";
                            //echo "<td><center><a href='?id=$id'><button class='btn btn-warning'><i class='fa fa-edit' style='color: black;'> Delete</i></a></td>";
                            echo "</tr>";
                        }
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



</body>

</html>
