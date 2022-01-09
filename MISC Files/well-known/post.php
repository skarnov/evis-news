<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php include "includes/ticker.php"; ?>



<!-- Page Content -->
<div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">



        <?php

        if(isset($_GET['p_id']))  {

            $post_id = $_GET['p_id'];

            $query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = {$post_id}";
            $post_view_query = $connection->query($query);
            if(!$post_view_query) {
                die("QUERY FAILED ".$connection->error);
            }

            if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {

                $query = "SELECT * FROM posts WHERE post_id = {$post_id}";

            } else {
                $query = "SELECT * FROM posts WHERE post_id = {$post_id} AND post_status = 'published'";
            }

            $select_all_posts = mysqli_query($connection, $query);

            if($select_all_posts->num_rows < 1) {
                        echo "<h1 class='text-center'>No news is available</h1>";
            } else {

        while($row = mysqli_fetch_assoc($select_all_posts)) {

            $post_title = $row['post_title'];
            $caption = $row['caption'] == 'NULL' ? '' : $row['caption'] ;
            $post_author = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image_1 = $row['post_image_1'];
            $post_image_2 = $row['post_image_2'];
            $post_image_3 = $row['post_image_3'];
            $post_content = $row['post_content'];
            $post_title = $row['post_title'];
            $category_id = $row['post_category_id'];
            $post_video = $row['post_video'];

            ?>





        <!-- First Blog Post -->
        <h1>
             <?php echo $post_title; ?>
        </h1>

        <p><span class="glyphicon glyphicon-time"></span> প্রকাশিতঃ <?php echo date("d-m-Y", strtotime($post_date)); ?></p>
        <hr>
        <img class="img-responsive" src= "images/news/<?php echo imagePlaceholder($post_image_1); ?>" alt="">
        <p class="text-center bold"><?php echo $caption; ?></p>
        <hr>
        <div class="newsContent">
          <?php
          setlocale(LC_ALL, 'en_US.utf8');
          $words = mb_split(' ', $post_content);
          $half = (int)ceil(count($words)/2);
          // echo $half = (int)ceil(count($words = str_word_count($post_content, 1)) / 2);
          $string1 = implode(' ', array_slice($words, 0, $half));
          $string2 = implode(' ', array_slice($words, $half));
          echo $string1;
  
          if($post_image_2 != NULL)
            echo "<img style='margin-top:20px' class='img-responsive' src= 'images/news/{$post_image_2}' alt=''><br>";
          echo $string2;
           ?>
        </div>

        <hr>
          <?php if($post_image_3 != NULL) { ?>
          <img class="img-responsive" src= "images/news/<?php echo $post_image_3; ?>" alt="">
        <?php } ?>
        <hr>


        <?php

          if($post_video != 'NULL') {
            echo "<div class='embed-responsive embed-responsive-4by3'>{$post_video}</div>";
          }
         ?>




        <hr>

    <?php } ?>

        <!-- Comments Form -->

<?php


    if(isset($_POST['create_comment'])) {

        $post_id = $_GET['p_id'];

        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";

        $query .= "VALUES ({$post_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Approved', now())";

        $create_comment_query = $connection->query($query);
        if(!$create_comment_query) {
            die("QUERY FAILED " . $connection->error);
        }

        //echo "<h4 class='bg-info'>Your comment will be appeard after approving</h4>";


    } else {

        echo "<script> alert('Fields cannot be empty'); </script>";
    }
}


?>

  <!-- Side Widget Well -->
    <div class="well">
        <h4>Social Media</h4>

        
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            

    </div>

        <div class="well">
            <h4>মন্তব্য করুন:</h4>
            <form role="form" action="" method="post">
                 <div class="form-group">
                    <label for="comment_author">নাম</label>
                    <input type="text" name="comment_author" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="comment_email">ইমেইল</label>
                    <input type="text" name="comment_email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="comment_content">আপনার মন্তব্য</label>
                    <textarea class="form-control" rows="3" name="comment_content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
            </form>
        </div>

        <hr>


    <?php

     $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} AND comment_status = 'approved'";
     $query .= "ORDER BY comment_id DESC";
        $select_post_comment = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_post_comment)) {
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];

     ?>

    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">

            <h4 class="media-heading"><?php echo $comment_author; ?>
                <small><?php echo $comment_date; ?></small>
            </h4>
            <?php echo $comment_content; ?>
        </div>
    </div>


 <?php } } } else {
    header("Location: index.php");
 } ?>



    </div>

    <div class="col-md-4">

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


</div>

<br>
<br>



    <?php include 'includes/samecategorynews.php'; ?>




<hr>



  <?php include "includes/footer.php"; ?>
