  <!-- Start of header -->

<?php include 'header.php'; ?>

<!-- End of header -->
<section id="addTeam">

<?php



if(isset($_SESSION['errorMessage'])){



    echo "<script type='text/javascript'>



            alert('" . $_SESSION['errorMessage'] . "');



          </script>";



    //to not make the error message appear again after refresh:



    session_unset();



}



?>




<?php

        include("ajax_load/connect.php");

        $sql = "SELECT * FROM `teams` WHERE 1";

        $check = mysqli_query($con,$sql);

        ?>

  <!----START ADD TEAM ----->

  <div class="container">

   <h2 class="text-center my-4 font3"><b>GUSAC HIERARCHY</b></h2>


    <!---START OF ADD TEAM TABLE------>
    <div class="table-responsive">

      <table class="table table-bordered table-striped table-hover">

        <thead>
          
          <tr class=" text-black font1">

            <th scope="col">Team Name </th>

            <th scope="col">Team Description</th>

            <th scope="col">Team Poster</th>

          </tr>

          </thead>

        <tbody class="font7">

        <?php while($row = mysqli_fetch_array($check)){

                  ?>


          <tr>
            

            <td><?php echo($row["team_name"]);?></td>

            <td><?php echo($row["team_description"]);?></td>

            <td><?php echo($row["team_poster"]);?></td>

          </tr>
          <?php } ?>
          
        </tbody>

      </table>

      <!------END OF ADD TEAM  TABLE------->
    </div>

  </div>
  
  <div>

    <h2 class="text-center my-4 font3">ADD TEAM</h2>

    <div class="container d-flex justify-content-center my-5">
      <!---START OF ADD TEAM FORM-->
      
          
      
      <div class="border rounded col-md-6 py-4 px-5">

        <form action="ajax_load/addTeam_upload.php" class="form-group" method="post" enctype="multipart/form-data" name="addTeam" id="addTeam_form">

        
         
          <div class="form-group">

            <label for="team_name" class="form-label font5">Team Name</label>

            <input type="text"  class="form-control font2" id="team_name" name="team_name" placeholder="">

          </div>

          <div class="form-group">

            <label for="team_description" class="form-label font5">Team Description</label>

            <textarea  class="form-control font2" id="team_description" name="team_description"   rows="4"></textarea>

          </div>

          <div class="form-group">

            <label for="team_poster" class="form-label font5">Team poster</label>

            <input type="file" class="form-control" id="team_poster" name="team_poster">

          </div>

          <div class=" mb-3 text-center">

            <input type="submit" id="addTeamButton" name="submit" class="yellow-regular font5" value="Submit"></input>


          </div>

        </form>

      </div>
    </div>
<!-- END OF ADD TEAM FORM----->
 </section>  


<!-- Start of footer -->

<?php include 'footer.php'; ?>

<!-- End of footer -->
