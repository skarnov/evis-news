  <?php ob_start(); ?>
    <?php session_start(); ?>
     <?php  include "admin/functions.php"; ?>

     <div class="container">
       <div class="row">
         <div class="col-md-6">
             <div class="logo">
              <a href="/"><img width="200px" class="img img-responsive" src="./images/logos/abirvablogo.png" alt=""></a>

             </div>

             <!-- <div class="datetime">
               <p id="date"><?php echo date('d F, Y (l)'); ?></p>
               <p id="timeClock"></p>

             </div> -->
             <span id="date"><?php echo date('d F, Y (l)'); ?></span>

              <span id="timeClock"></span>


         </div>


         <div class="col-md-6">


               <div class="socialIcons pull-right">
                <a target="_blank" href="https://www.facebook.com/abirvabnews24"><img class="img img-responsive" src="./images/logos/facebook.png" alt=""></a>
                <a target="_blank" href="https://www.youtube.com/channel/UCh3XEBFwPlU2urWLQKeOjIw"><img class="img img-responsive" src="./images/logos/utube.png" alt=""></a>
                <a target="_blank" href="#"><img class="img img-responsive" src="./images/logos/twitter.png" alt=""></a>
                <!--<a target="_blank" href="https://www.facebook.com/abirvab.org/"><img class="img img-responsive" src="./images/logos/abirvabfoundation.png" alt=""></a>-->

               </div>

           </div>

       </div>

     </div>

<div class="container">

  <nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">হোম</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding: 0px">
      <ul class="nav navbar-nav">
        <li class="navDivider" ><a href="/">হোম</a></li>
        <?php

        $query = "SELECT * FROM categories LIMIT 6";
        $select_all_categories = mysqli_query($connection, $query);


        while($row = mysqli_fetch_assoc($select_all_categories)) {

            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            $active_class = '';
            $pagename = basename($_SERVER['PHP_SELF']);
            $regpage = 'registration.php';
            $contact = 'contact.php';
            $regclass = '';
            $contactclass = '';

            if(isset($_GET['category']) && $_GET['category'] == $cat_id ) {

                $active_class = 'active';
            }
            elseif($pagename == $regpage) {
                $regclass = 'active';

            }
            elseif($pagename == $contact) {
                $contactclass = 'active';

            }

            echo "<li class='{$active_class} navDivider'><a href='../category.php?category={$cat_id}'>{$cat_title}</a></li>";

        }

        ?>

        <li class="dropdown navDivider">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">অন্যান্য <span class="caret"></span></a>
          <ul class="dropdown-menu">
        <?php

            $query = "SELECT * FROM categories WHERE cat_id > 6";
            $select_all_categories = mysqli_query($connection, $query);


            while($row = mysqli_fetch_assoc($select_all_categories)) {

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];


            echo "<li role='separator' class='divider'></li>";
            echo "<li class='navItem'><a  href='../category.php?category={$cat_id}'>{$cat_title}</a></li></li>";
          }
        ?>
          </ul>
        </li>

        <li class="navDivider" ><a href="../archive.php">আর্কাইভ</a></li>
      </ul>



      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" method="GET" action="search.php">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
          </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>
