<div class="container">



<div class="samecategorynews">

<h3 class="latestNewsHeading">এই বিভাগের আরও খবর</h3>

<div class="row display-flex">



<?php

  $query = "SELECT * FROM posts WHERE post_category_id = {$category_id} ORDER BY post_id DESC LIMIT 12";
  $select_more_posts = mysqli_query($connection, $query);
  confirmQuery($select_more_posts);

  while ($row = mysqli_fetch_assoc($select_more_posts)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_image_1 = $row['post_image_1'];


 ?>




    <div class="col-md-3">

      <a href="post.php?p_id=<?php echo $post_id; ?>">

      <div class="thumbnail">
        <img src="./images/news/<?php echo imagePlaceholder($post_image_1); ?>" alt="...">
        <div class="caption">
          <h3><?php echo $post_title; ?></h3>

        </div>
      </div>

      </a>


    </div>






<?php } ?>

</div>

<span class="pull-right readMore"><a href="category.php?category=<?php echo $category_id; ?>" class="">আরও সংবাদ</a></span>




</div>

</div>
