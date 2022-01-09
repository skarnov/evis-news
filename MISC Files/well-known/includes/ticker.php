<div class="container">
  <!-- <div class="jctkr-label">
    <strong>Newsfeed</strong>
  </div>

  <div class="js-conveyor-1">
    <ul>
      <li>
        <span>I am an <u>innocent</u> text string just passing by</span>
      </li>
      <li>
        <a href="https://duckduckgo.com/">
          <span>I am a <b>hyperlink</b></span>
        </a>
      </li>
      <li>
        <span>Mauris interdum elit non sapien <em>imperdiet</em></span>
      </li>
      <li>
        <span>Cras lorem augue facilisis a commodo</span>
      </li>
    </ul>
  </div> -->



    <div class="d-demo-wrap">
      <div class="jctkr-label"><strong>শিরোনাম</strong></div>
      <div class="js-conveyor-example">
      <ul class="ticker">


        <?php

          $today = date('Y-m-d');
          $yesterday = date('Y-m-d', strtotime("-1 days"));

          $query = "SELECT post_id, post_title FROM posts WHERE post_date = '{$today}' OR post_date = '{$yesterday}' ORDER BY post_id DESC";
          $today_posts = mysqli_query($connection, $query);
          confirmQuery($today_posts);

          while ($row = mysqli_fetch_assoc($today_posts)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];

            echo "<li><a href='post.php?p_id={$post_id}'>{$post_title}</a></li>";
            echo "<li><span class='glyphicon glyphicon-record'></span></li>";
          }

         ?>








      </ul>
    </div>
    </div>


    </div>
