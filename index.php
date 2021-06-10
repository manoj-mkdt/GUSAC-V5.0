<!-- Start of header -->

<?php include 'header.php'; ?>

<!-- End of header -->



<!-- Start of body -->



<!--Start of Index Section -->

<section id="intro" class="d-flex justify-content-center mt-3" >

  <div class="container row py-5">

    <div class="col-md-4 my-auto text-center">

      <h1 class="abbr">

        GUSAC

      </h1>     

      <h4 class="full">

        GITAM UNIVERSITY SCIENCE AND ACTIVITY CENTER

      </h4>

    </div>

    <div class="col-md-8 col-sm-12">

        <div class="embed-responsive embed-responsive-16by9">

        	<!-- Start of Youtube Video -->

          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/S-HjFiTxhd0" title="GUSAC Intro" frameborder="0" allow="autoplay; clipboard-write; encrypted-media;" allowfullscreen></iframe>

          <!-- End of Youtube Video -->

        </div>

    </div>

  </div>

</section>

<!--------------- End of Index section ---------------->

<!--Start of Events details -->

<section id="eventHome">

  <?php

  include("ajax_load/connect.php");

  $sql = "SELECT * FROM `eventtable` WHERE 1 ORDER BY event_date";

  $check = mysqli_query($con,$sql);

  ?>

  <div class="mx-5 py-4 my-4">

    <h2 class="text-center font8"><strong>Events</strong></h2>

    <div class="row justify-content-center text-center">

      <?php

      $Com_event_count=0;

      while($row = mysqli_fetch_array($check)){

        $timestamp_SD = strtotime($row["event_date"]);

        $timestamp_LD = strtotime($row["last_date"]);

        $date = date('y-m-d');

        $event = date('y-m-d',$timestamp_SD);

        if($date<=$event){

        $Com_event_count++;

        $id=$row["id"];



       ?>

        <div class="card mx-4 zoom my-3" >

          <!-- <img src="uploads/<?php echo($row["poster"]);?>" class="rounded" alt="<?php echo($row["event_name"]) ?>"/ id="eventImage" /> -->

          <div class="card-body">

            <h5 class="card-title font4"><?php echo $row["event_name"]; ?></h5>

            <p class="card-text font1">

              Event Date: <?php echo date('d-m-y',$timestamp_SD); ?><br>

              <small>Last date to Register
                : <?php echo date('d-m-y',$timestamp_LD); ?></small>

            </p>

            <?php

                  // encryting id

                  $id=$id+1234567891011121;

                  // Store the cipher method

                  $ciphering = "AES-128-CTR";

                    

                  // Use OpenSSl Encryption method

                  $iv_length = openssl_cipher_iv_length($ciphering);

                  $options = 0;

                    

                  // Non-NULL Initialization Vector for encryption

                  $encryption_iv = '1234567891011121';

                    

                  // Store the encryption key

                  $encryption_key = "GusacBangalore";

                    

                  // Use openssl_encrypt() function to encrypt the data

                  $encryption = openssl_encrypt($id, $ciphering,

                              $encryption_key, $options, $encryption_iv);



            ?>

            <a href="event.php?data=<?php echo($encryption) ?>" class="yellow-pill font5">Know More</a>

        </div>

        </div>

        <?php

        }

       }

         if ($Com_event_count==0){

       ?>

            <h4 class="noevent">Hey currently no Events</h4>

       <?php

      }

        ?>

      </div>

    </div>

</section>

<!-- End of event Details -->

<!-- Start of gallery -->

<section id="gallery">

    <div class="container mb-4">

    <h2 class="text-center my-3 font8"><strong>Gallery</strong></h2>

    <div class="owl-carousel owl-theme">

        <div class="item"><img class="img-box" src="images/img1.jpeg"></div>

        <div class="item"><img class="img-box" src="images/img2.jpg"></div>

        <div class="item"><img class="img-box"  src="images/img1.jpeg"></div>

        <div class="item"><img class="img-box"  src="images/img2.jpg"></div>

        <div class="item"><img class="img-box" src="images/img1.jpeg"></div>

    </div>

    <!-- Learn more button-->

    <!-- <div class="center">

    <button type="button" class="btn btn-outline-primary">View more</button>

    </div> -->

    <!-- End of learn more button-->

  </div>

</section>

<!-- End of gallery -->



<!-- Start of contact-->

<section id="contactHome">

  <div class="container my-1 py-4">

    <div class=" row cls">

      <div class="col-lg-8 col-sm-12 col-xs-12">

        <p class="desc justify-text font4"> GUSAC is a platform for all Tech enthusiasts and Entrepreneurs to devolp their skills and bring their ideas to reality.</p>

      </div>
      

       <!--  <div class="col-lg-2 col-sm-6 col-xs-6 text-center my-2"> -->
        <span class="mx-2 ml-4">
          <a href="memberRegister.php"><button type="button" class="yellow-pill font5">Register Now</button></a>
        </span>
        <!-- </div> -->

        <!-- <div class="col-lg-2 col-sm-6 col-xs-6 text-center my-2"> -->
        <span class="mx-2 ml-2">
          <a href="contactUS.php"><button type="button" class="yellow-pill font5">Contact us</button></a>
        </span>
        <!-- </div> -->
      
    </div>

  </div>

</section>

<!-- End of contact -->



<!-- Start of Team section-->

<section id="teams">

<div class="container my-3 main">

   <div class="text-center">

      <h1 class="font8"><strong>Our Team </strong></h1>

      <p class="font9">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>

   </div>

     <div class="row justify-content-center text-center">

       <div class="images col-md-3 col-sm-6 col-6">

         <img src="images/c_team.jfif" alt="content" class="border rounded mx-3 img-fluid">

         <h4 class="font1">Content Team</h4>
         <p class="font6">Lorem ipsum dolor sit amet consectetur adipisicing elit,Perferendis tenetur dolor. </p>

       </div>

       <div class="images col-md-3 col-sm-6 col-6">

         <img src="images/g_team.jfif" alt="graphic" class="border rounded mx-3 img-fluid">

         <h4 class="font1">Graphics Team</h4>
         <p class="font6">Lorem ipsum dolor sit amet consectetur adipisicing elit,Perferendis tenetur dolor.</p>

       </div>

       <div class="images col-md-3 col-sm-6 col-6">

         <img src="images/s_team.jfif" alt="graphic" class="border rounded mx-3 img-fluid">

         <h4 class="font1">PR & Social Team</h4>
         <p class="font6">Lorem ipsum dolor sit amet consectetur adipisicing elit,Perferendis tenetur dolor.</p>

       </div>

       <div class="images col-md-3 col-sm-6 col-6">

         <img src="images/w_team.jfif" alt="web" class="border rounded mx-3 img-fluid">

         <h4 class="font1">Web Team</h4>
         <p class="font6">Lorem ipsum dolor sit amet consectetur adipisicing elit,Perferendis tenetur dolor.</p>

       </div>

      <a href="../teamRegister.php"><button type="button" class="yellow-regular mt-4 font5">Join Team</button></a>

    </div>

    </div>

</section>

<!-- End of Team section-->





<!-- End of body -->



<!-- Start of footer -->

<?php include 'footer.php'; ?>

<!-- End of footer -->

