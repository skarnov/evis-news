
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php include 'includes/ticker.php'; ?>

<?php

  if(isset($_GET['category'])) {
    $cat_id = $_GET['category'];
  } else {
    redirect('index.php');
  }

  $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
  $select_category = mysqli_query($connection, $query);
  confirmQuery($select_category);

  $row = mysqli_fetch_assoc($select_category);

  $cat_id = $row['cat_id'];
  $category = $row['cat_title'];

  $per_page = 20;

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

   <a href="category.php?category=<?php echo $cat_id; ?>">

   <div class="col-md-8 col-xs-8">
       <h1 class="bold catTitle"><?php echo $category; ?></h1>
   </div>

   <div class="col-md-4 col-xs-4">

     <img width="150px" src="images/logos/abirvablogo.png" class="img img-responsive pull-right categoryLogo" alt="">

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

            $query = "SELECT * FROM posts WHERE post_category_id = {$cat_id} ORDER BY post_id DESC";

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
                        <img src="../images/news/<?php echo imagePlaceholder($post_image_1); ?>" alt="...">
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
              echo "<li ><a class='active' href='category.php?category={$cat_id}&page={$i}'>{$i}</a></li>";
            } else {
              echo "<li><a href='category.php?category={$cat_id}&page={$i}'>{$i}</a></li>";
            }


          }


           ?>

      </ul>



<?php include "includes/footer.php"; ?>
