<!-- Start of header -->



<?php include 'header.php'; ?>



<!-- End of header -->



<!-- Displays error message that occured while uploading event data -->



<?php



if(isset($_SESSION['errorMessage'])){



    echo "<script type='text/javascript'>



            alert('" . $_SESSION['errorMessage'] . "');



          </script>";



    //to not make the error message appear again after refresh:



    unset($_SESSION['errorMessage']);   



}



?>



<!--End of Error Message -->



<!--Start of Event Form -->



<section id="eventform">



  <div class="container border rounded">



    <h1 class="center font3"> Event</h1>



    <form action="ajax_load/eventform_upload.php" Method="POST" enctype="multipart/form-data" class="form1">



      <div class="form-group">



        <label for="eventname" class="font5">Event Name:<span class="req">*</span></label>



        <input type="text" class="form-control font2" id="eventname" name="eventname" required>



      </div>



      <div class="form-group">



        <label for="eventdate" class="font5">Event Date:<span class="req">*</span></label>



        <input type="date" class="form-control font2" id="eventdate" name="eventdate" required>



      </div>



      <div class="form-group">



        <label for="lastdate" class="font5">Last Date to Register:<span class="req">*</span></label>



        <input type="date" class="form-control font2" id="lastdate" name="lastdate" required>



      </div>



   

      <div class="form-group">

    <label for="eventtime" class="font5">Event Time:<span class="req">*</span></label>

    <div class="row">

  <div class="col col-lg-8">

    <select class="custom-select font2" name="time" aria-label="Default select example" required>

    <option disabled selected value> -- select an option -- </option>

    <option value="1:00">1.00 </option>

    <option value="1:30">1.30 </option>

    <option value="2:00">2.00 </option>

    <option value="2:30">2.30 </option>

    <option value="3:00">3.00 </option>

    <option value="3:30">3.30 </option>

    <option value="4:00">4.00 </option>

    <option value="4:30">4.30 </option>

    <option value="5:00">5.00 </option>

    <option value="5:30">5.30 </option>

    <option value="6:00">6.00 </option>

    <option value="6:30">6.30 </option>

    <option value="7:00">7.00 </option>

    <option value="7:30">7.30 </option>

    <option value="8:00">8.00 </option>

    <option value="8:30">8.30 </option>

    <option value="9:00">9.00 </option>

    <option value="9:30">9.30 </option>

    <option value="10:00">10.00 </option>

    <option value="10:30">10.30 </option>

    <option value="11:00">11.00 </option>

    <option value="11:30">11.30 </option>

    <option value="00:00">12.00 </option>

    <option value="00:30">12.30 </option>

</select></div>

<div class="col col-lg-4">

<select class="custom-select font2" name="meridian" aria-label="Default select example" required>

<option disabled selected value> -- select an option -- </option>

  <option value="AM">AM </option>

  <option value="PM">PM </option>

  </select>

  </div>

  </div>

      </div>



      <div class="form-group">



        <label for="posterimg" class="font5">Event Poster:<span class="req">*</span></label>



        <input  type="file" class="form-control font2" id="posterimg" name="posterimg" required>



      </div>



      <div class="form-group">



        <label for="ggform" class="font5">Event Google Form:<span class="req">*</span></label>



        <input  type="url" class="form-control font2" id="ggform" name="ggform" required>



      </div>



      <div class="form-group">



        <label for="eventdescription" class="font5">Event Description:<span class="req">*</span></label>



        <textarea  class="form-control font2" id="eventdescription" name="eventdescription" required></textarea>



      </div>



      <div class="text-center">



      <button type="submit" class="yellow-regular font5" name="submit" > Submit </button>



      </div>



    </form>



  </div>



</section>



<!-- End of event form-->



<!-- Start of footer -->



<?php include 'footer.php'; ?>



<!-- End of footer -->



