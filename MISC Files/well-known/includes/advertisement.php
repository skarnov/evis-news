

  <div class="advertisement">

    <?php

      $query = "SELECT * FROM advertisements";
      $select_all_ads = mysqli_query($connection, $query);
      confirmQuery($select_all_ads);

      while ($row = mysqli_fetch_assoc($select_all_ads)) {

          $ad_image = $row['ad_image'];
          $ad_url = $row['ad_url'];

          echo "<a target='_blank' href='{$ad_url}'><img src='./images/advertisements/{$ad_image}' class='img img-responsive' alt=></a><br><br>";

      }

     ?>



  </div>
