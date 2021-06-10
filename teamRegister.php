<!-- Start of header -->









<?php 

    include 'header.php';

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

 <!-- End of header -->

 

<!--Start of Register page--->



<section id="team_recruit">

      <?php

        include("admin/ajax_load/connect.php");

        $sql = "SELECT * FROM `teams` WHERE 1";

        $check = mysqli_query($con,$sql);

        ?>


    <div class="container mb-5">



        <div class="row">



        	<div class="col-md-6 my-auto" id="Image">



                <div class="hide_responsive">



                    <img src="images/img2.jpeg" >



                </div>



            </div>



            <!-- Start of Register Box -->



        	<div class="col-md-6 col-sm-12" id="form">



        		<div class ="px-4 border rounded mt-5">



                    <form id="recForm" method="post">



        				<h4 class="my-4 text-center font1">Register Here to be a part of Our Team </h4>



        			    <div class="row">



        					<div class="col-sm-12 col-md-6 form-group">



        						<label for="fname" class="font5">First name <sup>*</sup></label>



        						<input type="text" class="form-control font2" placeholder="First name" aria-label="First name" id="fname" disabled>



        					</div>



        					<div class="col-sm-12 col-md-6 form-group">



        						<label for="lname" class="font5">Last name <sup>*</sup></label>



        						<input type="text" class="form-control font2" placeholder="Last name" aria-label="Last name" id="lname" disabled>



        					</div>



        			  	</div>



        			  	<div class="form-group">



        				    <label for="rnum" class="form-label font5">Registration number <sup>*</sup></label>



        				    <input type="text" class="form-control font2" id="rnum" placeholder="GITAM ID" id="rnum" disabled>



        			    </div>



                        <div class="form-group">



                            <label for="teamSelect" class="font5">Team <sup>*</sup></label>



                            <select class="form-control font2" id="teamSelect">

                            <option>Chosse your team</option>
                              
                                <?php while($row = mysqli_fetch_array($check)){

                                    $id=$row['id'];

                                ?>

                                 <option><?php echo($row["team_name"]);?></option>
                                
                                <?php
                                   }
                                ?>
                       

                            </select>



                        </div>



                        <div class="form-group">



                            <label for="skills" class="font5">Revelant Skills <small id="skills-desc" class="desc font2">(Seperated by Commas)</small> <sup>*</sup></label>



                            <input type="text" class="form-control font2" id="skills" placeholder="Revelant Skills">



                        </div>



                        <div class="form-group">



                            <label for="work_link" class="font5">Pervious Work Link</label>



                            <input type="text" class="form-control font2" id="work_link" palceholder="Pervious Work Link">



                            <small id="work_link" class="desc font2">Please upload your previous work (if any) / samples to your drive and share link here</small>



                        </div>



                        <div class="form-group">



                            <label for="whyHire" class="font5">Why you want to join this team?</label>



                            <textarea class="form-control font2" id="whyHire" name="why" cols="20" rows="4">Tell us in short why do you want to join this team and what makes you different?</textarea>



                        </div>



                        <div class="text-center my-4">



                            <button type="submit" class="yellow-regular font5" id="recruit_submit">Register</button>



                        </div>



                    </form>



                </div>



            </div>



        </div>



    </div>



</section>



<!--- End of Register page--->



<!--- Start of Autofill of Name lastname Reg no--->



<?php 

    $id=$_SESSION['sid'];

    // echo $id;

    

    $query="SELECT * FROM `register_member` WHERE id=$id";

    $result = $con->query($query);

    if($row = $result->fetch_assoc()) {

        // echo $row['first_name'];;

    ?>

    <script type="text/javascript">

       document.getElementById('fname').value="<?php echo $row['first_name']; ?>";

       document.getElementById('lname').value="<?php echo $row['last_name']; ?>";

       document.getElementById('rnum').value="<?php echo $row['registration_number']; ?>";



    </script>



    <?php } ?>



<!--- End of Autofill of Name lastname Reg no--->



<!-- Start of footer -->



  <?php include 'footer.php'; ?>



 <!-- End of footer -->



