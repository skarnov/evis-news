<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>


<?php

  if(isset($_POST['submit'])) {
    $slide_id = $_POST['slide_id'];
    $query = "INSERT INTO slides(slide_post_id) VALUES({$slide_id})";
    $insert_slide = mysqli_query($connection, $query);
    confirmQuery($insert_slide);
  }

  if(isset($_GET['delete'])) {

    $slide_id = $_GET['delete'];
    $query = "DELETE FROM slides WHERE slide_id = {$slide_id}";
    $delete_slide = mysqli_query($connection, $query);
    confirmQuery($delete_slide);

  }



 ?>














        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                 <div class="col-lg-12">
                    <h1 class="page-header">
                    Welcome to Admin
                    <small><?php //echo $_SESSION['username']; ?></small>
                    </h1>

            <div class="col-xs-6">


            <form action="" method="post">
            <div class="form-group">
                <label>Add To Slide</label>
                <input type="number" name="slide_id" class="form-control">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add Slide">

            </form>


            </div>

            <div class="col-xs-6">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>News Title</td>
                        </tr>
                    </thead>
                    <tbody>

                      <?php

                      $query = "SELECT * FROM slides";
                      $select_all_slides = mysqli_query($connection, $query);
                      confirmQuery($select_all_slides);

                      while ($row = mysqli_fetch_assoc($select_all_slides)) {
                        $slide_id = $row['slide_id'];
                        $slide_post_id = $row['slide_post_id'];

                        echo "<tr>";
                        echo "<td>{$slide_id}</td>";

                        $query = "SELECT post_title FROM posts WHERE post_id = {$slide_post_id}";
                        $select_all_slides_posts = mysqli_query($connection, $query);
                        confirmQuery($select_all_slides_posts);

                        while ($row = mysqli_fetch_assoc($select_all_slides_posts)) {
                          $post_title = $row['post_title'];

                        echo "<td>{$post_title}</td>";
                      }
                        echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete?') \"  href='slides.php?delete={$slide_id}'>Delete</a></td>";
                        echo "</tr>";

                    } ?>

                    </tbody>
                </table>

            </div>




            </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
