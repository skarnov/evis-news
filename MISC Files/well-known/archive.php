
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php include 'includes/ticker.php'; ?>

<?php

  $per_page = 50;

  if(isset($_GET['page'])) {
      $page = $_GET['page'];
  } else {
      $page = "";
  }

  if($page == "" || $page == 1) {
      $page_no = 0;
  } else {
      $page_no = ($page*$per_page) - $per_page;
  }

 ?>

 <div class="container categoryPost catTitle">

   <a href="archive.php">

   <div class="col-md-8 col-xs-8">
       <h1 class="bold catTitle">আর্কাইভ</h1>
   </div>

   <div class="col-md-4 col-xs-4">

     <img width="150px" src="images/abirvablogo.png" class="img img-responsive pull-right categoryLogo" alt="">

   </div>

   </a>


 </div>

    <!-- Page Content -->
    <div class="container-fluid">


        <div class="row">



            <!-- Blog Entries Column -->
            <div class="col-md-9">



              <div class="jumbotron">
                <div class="row display-flex">




            <?php

            $query = "SELECT * FROM posts ORDER BY post_date DESC";

            $select_all_posts = mysqli_query($connection, $query);
            confirmQuery($select_all_posts);
            $count = $select_all_posts->num_rows;

            if($count < 1) {
                echo "<h1 class='text-center'>No news is available</h1>";

            } else {

            $count = ceil($count / $per_page);

            $query .= " LIMIT {$page_no}, {$per_page}";
            $select_all_posts = mysqli_query($connection, $query);



            while($row = mysqli_fetch_assoc($select_all_posts)) {

            $post_title = $row['post_title'];
            $post_id = $row['post_id'];
            $post_author = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image_1 = $row['post_image_1'];
            $post_content = substr($row['post_content'], 0, 50);
            $post_title = $row['post_title'];


             ?>


                    <div class="col-sm-6 col-md-3 categoryPosts">

                      <a href="post.php?p_id=<?php echo $post_id; ?>">

                      <div class="thumbnail">
                        <img src="images/news/<?php echo imagePlaceholder($post_image_1); ?>" alt="...">
                        <div class="caption">
                          <h3><?php echo $post_title; ?></h3>

                        </div>
                      </div>

                      </a>


                    </div>

            <?php } } ?>






                </div>


              </div>




            </div>


            <div class="col-md-3">

              <?php include 'includes/advertisement.php'; ?>
              <br>
              <br>
              <br>

              <?php include 'includes/latestnews.php'; ?>

              <br>
              <br>
              <br>
              <br>

              <?php include 'includes/highestreading.php'; ?>

            </div>


        </div>
        <!-- /.row -->

        <hr>

      </div>

      <ul class="pager">

          <?php

          for($i=1; $i<=$count; $i++) {

            if($i == $page) {
              echo "<li ><a class='active' href='archive.php?page={$i}'>{$i}</a></li>";
            } else {
              echo "<li><a href='archive.php?page={$i}'>{$i}</a></li>";
            }


          }


           ?>

      </ul>



<?php include "includes/footer.php"; ?>
