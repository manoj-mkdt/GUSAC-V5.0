<?php include "header.php"; ?>
<?php include "ajax_load/connect.php"; ?>


<?php 

        if (!isset($_SESSION['reg']) && !isset($_SESSION['token'])) {

            ?>

                <script type="text/javascript">

                    alert('login to continue');

                    location.href = 'login.php';

                </script>

            <?php

            // echo "<script> alert('asd');</script>"

            // header("Location: login.php");

        }



 ?>



<?php



if(isset($_SESSION['errorMessage'])){



    echo "<script type='text/javascript'>



            alert('" . $_SESSION['errorMessage'] . "');



          </script>";



    //to not make the error message appear again after refresh:



    session_unset();



}



?>



    <section id="projectForm" class="mt-2">



      <div class="container">



        <div class="d-flex justify-content-center">



        <div class="border rounded col-md-6 mt-3 px-5" >







          <form action="ajax_load/project_upload.php" class="form-group" method="post" enctype="multipart/form-data" name="projectform" id="projectform">



            <h3 class="text-center my-4 font1">Projects</h3>

              <div class="form-group">

              <label for="project_name" class="form-label font5">Project Name <sup>*</sup></label>



              <input class="form-control" id="project_name" type="text" name="project_name" value="">



              </div>

              <div class="form-group">

              <label for="team_name" class="form-label font5">Team Name <sup>*</sup> </label>



              <input class="form-control font2" type="text" id="team_name" name="team_name" value="">

              </div>

              <div id="errorTeamExist"></div>





              <div class="form-group">

              <label for="team_leader" class="form-label font5">Team Leader <sup>*</sup> </label>



              <input class="form-control font2" type="text" id="team_leader" name="team_leader" value="" placeholder="Please enter Register numbers only">

              </div>



              <div class="form-group">
              <label for="team_members" class="form-label">Team Members <sup>*</sup></label>
             <select name="team_members[]" class="form-control multiple-select" multiple>
              <?php 
              require 'ajax_load/connect.php';
              $query="SELECT `registration_number` FROM `register_member`";
              $result=mysqli_query($con,$query);
                if(mysqli_num_rows($result)>0)
                {
                    foreach ($result as $row ) {
                      echo $row["registration_number"];
                      ?>
                              <option value="<?php echo $row['registration_number'];?>"><?php echo $row['registration_number']; ?></option>

                      <?php
                    }
                }
                else{
                  echo 'Start Typing';
                  
                }
              ?>       
              </select>      
               </div>

              <div class="form-group">



                <label for="project_pic"  class="form-label font5">Projects related pic</label>



                <input class="form-control font2" type="file" name="proj_pic" id="proj" />



              </div>

             

              <div class="form-group">

              <label for="project_links" class="font5">Project related links</label>



                <input class="form-control font2" type="url" id="project_links" name="project_links" value="">

              </div>

                  <div class="form-group">



                    <label for="description" class="form-label font5">Project Description<sup>*</sup></label>



                    <textarea class="form-control font2" id="project_description" name="description" rows="3"></textarea>



                 </div>

                 <div class="text-center">  

                 <input type="submit" name="submit" value="SUBMIT" class="yellow-regular font5" id="pro_submit_btn" value="Submit"></input>

                 </div>

           </form>



          </div>



        </div>



      </div>



    </section>



      
  <?php include "footer.php"; ?>

  <?php 
if(isset($_GET['rn']))
{
  $id=$_GET['rn'];
    $query="SELECT * FROM `projectdetails` WHERE project_id=$id";
    $result = $con->query($query);
    if($row = $result->fetch_assoc()) {
    ?>
    <script>
    
     $("#project_name").val("<?php echo $row["project_name"]; ?>");
     $("#team_name").val("<?php echo $row["team_name"]; ?>");
     $("#team_leader").val("<?php echo $row["team_leader"]; ?>");
     $("#project_name").val("<?php echo $row["project_name"]; ?>");
     $("#project_description").val("<?php echo $row["description"]; ?>");
     $("#project_links").val("<?php echo $row["project_links"]; ?>");
     
    </script>
    <?php } }?>

