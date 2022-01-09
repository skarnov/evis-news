<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>


<?php

  if(isset($_POST['submit'])) {
      
    $ad_url = $_POST['ad_url'];

    $ad_image = $_FILES['ad_image']['name'];
    $ad_image_tmp = $_FILES['ad_image']['tmp_name'];
    move_uploaded_file($ad_image_tmp, "../images/advertisements/{$ad_image}");

    $query = "INSERT INTO advertisements(ad_image, ad_url) VALUES('{$ad_image}', '{$ad_url}')";
    $insert_ad = mysqli_query($connection, $query);
    confirmQuery($insert_ad);
  }

  if(isset($_GET['delete'])) {

    $ad_id = $_GET['delete'];
    
    $query = "SELECT ad_image FROM advertisements WHERE ad_id = {$ad_id}";
    $ad_image = mysqli_query($connection, $query);
    confirmQuery($ad_image);
    $row = mysqli_fetch_assoc($ad_image);
    $ad_image = $row['ad_image'];

    $query = "DELETE FROM advertisements WHERE ad_id = {$ad_id}";
    $delete_ad = mysqli_query($connection, $query);
    confirmQuery($delete_ad);

    unlink("../images/advertisements/{$ad_image}");

    redirect("advertisements.php");

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


            <form action="" method="post" enctype="multipart/form-data">
            <h3>Add Advertisement</h3>
            <div class="form-group">
                <label>Add Image</label>
                <input type="file" name="ad_image" class="form-control">
            </div>
            <div class="form-group">
                <label>Add Link</label>
                <input type="url" name="ad_url" class="form-control">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add Image">

            </form>


            </div>

            <div class="col-xs-6">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Ad Image</td>
                        </tr>
                    </thead>
                    <tbody>

                      <?php

                      $query = "SELECT * FROM advertisements";
                      $select_all_ads = mysqli_query($connection, $query);
                      confirmQuery($select_all_ads);

                      while ($row = mysqli_fetch_assoc($select_all_ads)) {
                        $ad_id = $row['ad_id'];
                        $ad_image = $row['ad_image'];

                        echo "<tr>";
                        echo "<td>{$ad_id}</td>";

                        echo "<td><img width='100px' src='../images/advertisements/{$ad_image}' alt=''></td>";

                        echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete?') \"  href='advertisements.php?delete={$ad_id}'>Delete</a></td>";
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
