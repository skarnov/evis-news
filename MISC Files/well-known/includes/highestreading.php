<div class="latestNews">
<h3 class="latestNewsHeading">সর্বাধিক পঠিত</h3>

<div class="latestNewsScroll">

<?php

  $week = date('Y-m-d', strtotime("-7 days"));

  $query = "SELECT * FROM posts WHERE post_date >= '{$week}' ORDER by post_views_count DESC LIMIT 20";
  $select_recent_posts = mysqli_query($connection, $query);
  confirmQuery($select_recent_posts);

  while ($row = mysqli_fetch_assoc($select_recent_posts)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_image_1 = $row['post_image_1'];


 ?>


<div class="media overflow-auto">
    <a href="post.php?p_id=<?php echo $post_id; ?>">
<div class="media-left media-middle">

  <img class="media-object" width="50px" src="<?php echo "./images/news/".imagePlaceholder($post_image_1); ?>" alt="...">

</div>
<div class="media-body">
<h4 class="media-heading"><?php echo $post_title; ?></h4>
</div>
</a>
</div>

<?php } ?>






</div>


</div>


</div>
