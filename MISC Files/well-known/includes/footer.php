
        <!-- Footer -->
        <footer>
          <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 text-center footerClass">
                
                  <h3 class="bold" style="color: #269407">সম্পাদক- মোঃ তৌফিকুল হক</h3>
                  <p>মোবাইলঃ 01917269580</p>
                  <a style="display: table;" class="contact center-block" href="http://www.facebook.com/abirvabnews24" target="_blank">আমাদের ফেসবুক পেজ</a>
                  
                  


                  <div class="col-md-6">
                    <h4 class="bold" style="color: red">প্রধান কার্যালয়</h4>
                    <hr>
                    <p>সেকশন - ০২, ব্লক - এইচ<br>
রোড -০৮, বাসা নং - ২১,২৩,২৫(আপন নিবাস)<br>মিরপুর ঢাকা-১২১৬</p>
                  </div>
                  
                  <div class="col-md-6 contactDiv">
                    <a class="contact" href="./contact.php">আমাদের সাথে যোগাযোগ</a>
                    <br>
                    <br>
  <span class="bold">ইমেইল :</span> <a href="mailto:abirvabnews24bd@gmail.com?subject=feedback">abirvabnews24bd@gmail.com</a>
                  </div>
                  
           


                    <p class="text-center">Copyright &copy; abirvabnews24.com <?php echo Date("Y"); ?></p>
                    <p>Developed by <a target='_blank' href="http://www.jobayedsumon.tech">Jobayed Sumon</a></p>
                </div>

            </div>
            <!-- /.row -->
          </div>

        </footer>

    </div>
    <!-- /.container -->

    <?php

    $query = "SELECT * FROM advertisements ORDER BY RAND() LIMIT 1";
    $select_ad = mysqli_query($connection, $query);
    confirmQuery($select_ad);

    $row = mysqli_fetch_assoc($select_ad);

    $ad_url = $row['ad_url'];
    $ad_image = $row['ad_image'];

     ?>

     <div id="spopup" style="display: none;">
    <!--close button-->
    <a style="position:absolute;top:14px;right:10px;color:#555;font-size:10px;font-weight:bold;" href="javascript:void(0);" onclick="return closeSPopup();">
        <img src="/includes/ico-x.png" width="18px" height="18px">
    </a>
    <!--insert popup content here-->
    <a target='_blank' href='<?php echo $ad_url; ?>'><img src='./images/advertisements/<?php echo $ad_image; ?>' class='img img-responsive' alt=></a>
  </div>

     <!-- Modal -->
     <div class="modal fade bottom" id="myModal" role="dialog" displayed="false">
       <div class="modal-dialog modal-frame modal-bottom">

         <!-- Modal content-->
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <!-- <h4 class="modal-title">Modal Header</h4> -->
           </div>
           <div class="modal-body">
             <a target='_blank' href='<?php echo $ad_url; ?>'><img src='./images/advertisements/<?php echo $ad_image; ?>' class='img img-responsive' alt=></a>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
         </div>

       </div>
     </div>






    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bb1ea84df52eabf"></script>


    <script type="text/javascript" src="../js/scripts.js">

    </script>

</body>

</html>
