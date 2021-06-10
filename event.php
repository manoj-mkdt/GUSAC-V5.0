<!-- Start of header --> 

<?php include 'header.php'; ?>

<!-- End of header -->

<!----Start of Event Page---->

<section id="eventPage">

  <div class="container my-5">

    <div class="row">

      <!-- Event Image -->

        <?php 
        if(!empty($_GET['data'])){
          include 'ajax_load/connect.php';



          $decryption_iv = '1234567891011121';

      

          // Store the decryption key

          $decryption_key = "GusacBangalore";



          // Store the cipher method

          $ciphering = "AES-128-CTR";

          $options = 0;  

          // Use openssl_decrypt() function to decrypt the data

          $id=openssl_decrypt ($_GET['data'], $ciphering, 

          $decryption_key, $options, $decryption_iv);

          // dencryting  id

          $id=$id-1234567891011121;



          if (isset($id)) {

            // $id=@$_GET['id'];

            $sql="SELECT * FROM `eventtable` WHERE id=$id ";

            $check=mysqli_query($con,$sql);

            $eventAvailvablity=0;

            while($row = mysqli_fetch_array($check)){

              $eventAvailvablity=1;

              $timestamp_SD = strtotime($row["event_date"]);

              $timestamp_LD = strtotime($row["last_date"]);

              $timestamp_TIME = strtotime($row["event_time"]);

        ?>

              <div class="col-md-6 col-sm-12" id="Image">

                <img id="myImg1" src="uploads/eventposters/<?php echo $row['poster'] ?>" class="rounded img-fluid" alt="

                <?php echo $row['event_name'].' poster'; ?>">

              </div>

              <div class="col-md-6 col-sm-12 text-center my-auto" id="detials">

                <!-- Event name -->

                <h2 class="font8"><?php echo $row['event_name']; ?></h2>

                <!-- Event Description -->

                <p class="font9"><?php echo $row['event_description']; ?></p>

  <!-- 

                 <p class="text-justify">Do you want to start-up? But Have no idead where to start or about the schemes are rules? 

            Then Join us today at 11:30Am for Interaction with Krishna Prasad CEO of EasySolve Startup 

            and know everything about the start-up . Its an open mic Session , so you can ask your doudts 

            and get a clear idea about the <strong>#STARTUPINDIA schemes</strong>, and various other aspects . 

            Thank you! Hope You all will have Fun and gain some Knowledge.</p> -->

                  <!-- Event date and tme -->

                <p class="font9"><b>Date: </b> <?php echo date('d-m-y l',$timestamp_SD); ?> </p>

                <p class="font9"><b>Time: </b> <?php echo date("h:i A", $timestamp_TIME); ?> </p>

                <!-- Event register button -->

               <?php

                    $today=date('d-m-Y');

                    $eventDate=date('d-m-Y',$timestamp_LD);echo "<br>";



                    // Converting $today $eventDate of object type to string type us diff accept only string tpyr

                    $today = new DateTime($today);

                    $eventDate   = new DateTime($eventDate);

                    

                    // diff return positive value if event is not overss

                    $interval = $today->diff($eventDate);



                    if($interval->format('%R%a')>=0){

                       ?>

                      <!-- Event register button -->

                      <a href="<?php echo $row['ggform']?>"><button type="button" class="btn rounded-0 font5" id="event_reg_btn">REGISTER NOW</button></a>

                      <?php

                    }else{

                      ?>

                        <div  class="d-flex justify-content-center"> 
                          <span id="reg_custombox">
                            <b>Registration Closed</b>
                          </span>
                        </div>

                      <?php

                    }

                    ?>

                <p class="font2"><small><b>Last date to Register: </b><?php echo date('d-m-y l',$timestamp_LD); ?></small></p>       

            </div>

        <?php 

              }

              // Closing of While Loop

               if($eventAvailvablity==0){

                ?>

                <div>

                  No Data available

                </div>

                <?php

              }

          }

          // End of If condidtion

          else{

            echo "<script>alert('Data not available')></script>";
          
          }
          }
        else{
           echo "<div><h5>Data not available</h5></div>";
        }

         ?>



    </div>

  <div>

  <!-- <div class="text-center mt-5">



    <iframe align="center" src= "https://docs.google.com/forms/d/e/1FAIpQLSeqQvCxRu315-92NmrAA9-eA2Yi9k7zRTsjS9NWk3uzFR8eEQ/viewform?embedded=true" id="gForm" frameborder="0">Loading…</iframe>



   </div> -->

</section>

<!----End of Event Page---->



<!-- Start of footer -->



<?php include 'footer.php'; ?>



<!-- End of footer