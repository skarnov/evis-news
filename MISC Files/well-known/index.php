<?php ob_start(); ?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<!-- Navigation -->
<?php include "includes/navigation.php"; ?>




<?php include 'includes/ticker.php'; ?>

<!-- Blog Sidebar Widgets Column -->
<?php include "includes/slider.php"; ?>





<div class="container-fluid">

    <div class="col-md-9">





        <?php
        // $per_page = 5;
        //
        // if(isset($_GET['page'])) {
        //     $page = $_GET['page'];
        // } else {
        //     $page = "";
        // }
        //
        // if($page == "" || $page == 1) {
        //     $page_no = 0;
        // } else {
        //     $page_no = ($page*$per_page) - $per_page;
        // }



        $query = "SELECT * FROM categories LIMIT 6";

        $select_all_category = mysqli_query($connection, $query);
        $count = $select_all_category->num_rows;

        if ($count < 1) {
            echo "<h1 class='text-center'>No news is available</h1>";
        } else {

            //$count = ceil($count / 5);
            //$query .= " LIMIT {$page_no}, {$per_page}";
            // $select_all_category = mysqli_query($connection, $query);



            while ($row = mysqli_fetch_assoc($select_all_category)) {

                // $post_title = $row['post_title'];
                // $post_id = $row['post_id'];
                // $post_author = $row['post_user'];
                // $post_date = $row['post_date'];
                // $post_image_1 = $row['post_image_1'];
                // $post_content = substr($row['post_content'], 0, 50);
                // $post_title = $row['post_title'];

                $category = $row['cat_title'];
                $cat_id = $row['cat_id'];
                ?>


                <div class="jumbotron news">
                    <div class="row display-flex">




                        <div class="container categoryPost">

                            <a href="category.php?category=<?php echo $cat_id; ?>">

                                <div class="col-md-8 col-xs-8">
                                    <h1 class=""><?php echo $category; ?></h1>
                                </div>

                                <div class="col-md-4 col-xs-4">

                                    <img width="150px" src="images/logos/abirvablogo.png" class="img img-responsive pull-right categoryLogo" alt="">

                                </div>

                            </a>


                        </div>

        <?php
        $query = "SELECT * FROM posts WHERE post_category_id = {$cat_id} ORDER BY post_id DESC LIMIT 8";

        $select_all_posts = mysqli_query($connection, $query);
        confirmQuery($select_all_posts);
        $count = $select_all_posts->num_rows;

        if ($count < 1) {
            echo "<h1 class='text-center'>No news is available</h1>";
        } else {

//$count = ceil($count / 5);
//$query .= " LIMIT {$page_no}, {$per_page}";
// $select_all_posts = mysqli_query($connection, $query);



            while ($row = mysqli_fetch_assoc($select_all_posts)) {

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

                                <br>

            <?php }
        } ?>






                    </div>

                    <span class="pull-right readMore"><a href="category.php?category=<?php echo $cat_id; ?>" class="">আরও সংবাদ</a></span>
                </div>







    <?php }
} ?>




    </div>

    <div class="col-md-3">
<?php include 'includes/advertisement.php'; ?>
    </div>




</div>


<div class="container">

<?php
$query = "SELECT * FROM categories WHERE cat_id BETWEEN 7 AND 10";
$select_category = mysqli_query($connection, $query);
confirmQuery($select_category);

while ($row = mysqli_fetch_assoc($select_category)) {
    $cat_id = $row['cat_id'];
    $category = $row['cat_title'];
    ?>

        <div class="col-md-3">

            <div class="latestNews">

                <a href="category.php?category=<?php echo $cat_id; ?>"><h3 class="latestNewsHeading"><?php echo $category; ?></h3></a>

                <div class="latestNewsScroll">

    <?php
    $query = "SELECT * FROM posts WHERE post_category_id = {$cat_id} LIMIT 10";
    $select_posts = mysqli_query($connection, $query);
    confirmQuery($select_posts);

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_image_1 = $row['post_image_1'];
        ?>


                        <div class="media overflow-auto">
                            <a href="post.php?p_id=<?php echo $post_id; ?>">
                                <div class="media-left media-middle">

                                    <img class="media-object" width="50px" src="<?php echo "images/news/" . imagePlaceholder($post_image_1); ?>" alt="...">

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

<?php } ?>

</div>

<br>

<div class="container">

    <div class="col-md-6">
        <h3 class="latestNewsHeading">ফটো গ্যালারী</h3>
        <div id="carousel-2" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-2" data-slide-to="1"></li>
                <li data-target="#carousel-2" data-slide-to="2"></li>
                <li data-target="#carousel-2" data-slide-to="3"></li>
                <li data-target="#carousel-2" data-slide-to="4"></li>
                <li data-target="#carousel-2" data-slide-to="5"></li>
                <li data-target="#carousel-2" data-slide-to="6"></li>
                <li data-target="#carousel-2" data-slide-to="7"></li>
                <li data-target="#carousel-2" data-slide-to="8"></li>
                <li data-target="#carousel-2" data-slide-to="9"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

<?php
$week = date('Y-m-d', strtotime("-7 days"));

$query = "SELECT post_image_1 FROM posts WHERE post_date >= '{$week}' ORDER BY post_views_count DESC LIMIT 10";
$select_slides_posts = mysqli_query($connection, $query);
confirmQuery($select_slides_posts);

while ($row = mysqli_fetch_assoc($select_slides_posts)) {
    $post_image_1 = $row['post_image_1'];
    ?>


                    <div class="item photoSlider">

                        <img src="images/news/<?php echo imagePlaceholder($post_image_1); ?>" alt="...">

                    </div>

                <?php } ?>




            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-2" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-2" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>



    </div>



    <div class="col-md-6">

        <h3 class="latestNewsHeading">ভিডিও গ্যালারী</h3>
        <div id="carousel-3" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-3" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-3" data-slide-to="1"></li>
                <li data-target="#carousel-3" data-slide-to="2"></li>
                <li data-target="#carousel-3" data-slide-to="3"></li>
                <li data-target="#carousel-3" data-slide-to="4"></li>
                <li data-target="#carousel-3" data-slide-to="5"></li>
                <li data-target="#carousel-3" data-slide-to="6"></li>
                <li data-target="#carousel-3" data-slide-to="7"></li>
                <li data-target="#carousel-3" data-slide-to="8"></li>
                <li data-target="#carousel-3" data-slide-to="9"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

<?php
$query = "SELECT post_video FROM posts WHERE post_video != 'null' AND post_video != '' ORDER BY post_id DESC LIMIT 10";
$select_slides_videos = mysqli_query($connection, $query);
confirmQuery($select_slides_videos);

while ($row = mysqli_fetch_assoc($select_slides_videos)) {
    $post_video = $row['post_video'];
    ?>



                    <div class="item videoSlider">

                        <!-- 4:3 aspect ratio -->
                        <div class="embed-responsive embed-responsive-4by3">
                    <?php echo $post_video; ?>

                        </div>


                    </div>




                <?php } ?>




            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-3" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-3" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>

</div>


<?php include "includes/footer.php"; ?>
