<?php
session_start();
include("../design/navbar.php");
include("../controllers/news_controller.php");

$posts=new Post_Controller();
$posts->deleteItem();



?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Management Of Post</h1>
    <p class="mb-4"> </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <i> <h6 class="m-0 font-weight-bold text-primary"><a href="add_post.php"><input type="submit" value="Add Post" class="btn btn-info" id="btn_add"></a></h6></i>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Post Intro</th>
                        <th>Start_Date</th>
                        <th>Create_By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Post Intro</th>
                        <th>Start_Date</th>
                        <th>Create_By</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <?php
                    foreach ($posts->allNew() as $post)
                    {
                        $id= $post->id;

                        echo "<tr>";
                        echo "<td>"  .$post->id."</td>";
                        echo "<td>" . $post->title ."</td>";
                         echo "<td>" .$post->post_intro ."</td>";
                        echo "<td><img src='" . $post->post_image ."'width='50' height='30'></td>";
                        echo "<td>" . $post->create_by . "</td>";
                        echo "<td>
                                       <a href='edit_news.php?id=$id'><i class='fa fa-edit'id='icon'></i>
                                      <a href='?id=$id'><i class='fa fa-trash'id='icon'></i>
                                      
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


