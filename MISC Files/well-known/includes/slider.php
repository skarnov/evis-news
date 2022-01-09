<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="carousel-1" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                    <li data-target="#carousel-1" data-slide-to="3"></li>
                    <li data-target="#carousel-1" data-slide-to="4"></li>
                    <li data-target="#carousel-1" data-slide-to="5"></li>
                    <li data-target="#carousel-1" data-slide-to="6"></li>
                    <li data-target="#carousel-1" data-slide-to="7"></li>
                    <li data-target="#carousel-1" data-slide-to="8"></li>
                    <li data-target="#carousel-1" data-slide-to="9"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <?php
                    $today = date('Y-m-d');
                    $yesterday = date('Y-m-d', strtotime("-1 days"));

                    $query = "SELECT * FROM posts WHERE post_date = '{$today}' OR post_date = '{$yesterday}' ORDER BY post_views_count DESC LIMIT 10";
                    $select_slides_posts = mysqli_query($connection, $query);
                    confirmQuery($select_slides_posts);

                    while ($row = mysqli_fetch_assoc($select_slides_posts)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_image_1 = $row['post_image_1'];
                        ?>


                        <div class="item">
                            <a href="post.php?p_id=<?php echo $post_id; ?>">
                                <div class="carousel-caption pull-top">
                                    <h3><?php echo $post_title; ?></h43>
                                </div>
                                <img src="./images/news/<?php echo imagePlaceholder($post_image_1); ?>" alt="...">
                            </a>
                        </div>

                    <?php } ?>




                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>



        </div>



        <div class="col-md-3">

            <?php include 'includes/latestnews.php'; ?>


        </div>

        <div class="col-md-3">


            <?php include 'includes/highestreading.php'; ?>


        </div>

    </div>

    <br>
