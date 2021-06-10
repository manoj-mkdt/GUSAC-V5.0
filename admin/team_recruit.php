<!-- Start of header -->

<?php include 'header.php'; ?>

<!-- End of header -->

    <section id='team_recruit_admin'>

      <?php

      include("ajax_load/connect.php");
      ?>

        <h1 class="text-center font3">Team Recruit</h1>

        <!-------------------------------- Button for download----------------------------->
        <div class="d-flex justify-content-center">
          <button type="button" class="yellow-regular font5" onclick="exportteamData()"><i class="fa fa-download"></i>&nbsp Download</button>
        </div>

        <div>

        

          <!-------------------------------- Input box for Search Button----------------------------->
          <div class="row mx-5 my-3">
             <div class="col-lg-8 px-0">

              <input class="form-control font2" id="myInput" type="text" placeholder="Search..">

            </div>

                   <!-----------------  Start of Choose Filter Botton  -------------------->
                   <div class="mx-2 ml-4">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle font5 mt-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" name="submit" aria-expanded="false">
                      Choose Filter
                  </button>
                  <div class="dropdown-menu font5" aria-labelledby="dropdownMenuButton">
                      <form action="team_recruit.php" method="POST">
                          <input type="submit" class="dropdown-item" value="All">
                          <input  type="submit" class="dropdown-item font5" name="submit2" value="Approved">
                          <input  type="submit" class="dropdown-item font5"  name="submit"  value="Rejected">
                          <input  type="submit" class="dropdown-item font5"  name="pending"  value="Pending">
                          <input  type="submit" class="dropdown-item font5"  name="team"  value="Team">
                      </form>
                  </div>
              </div>
            </div>
            <div class="mx-2 ml-2">
               <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle font5 mt-0" type="button" id="teamdropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" name="submit" aria-expanded="false">
                      Team
                  </button>
                  <div class="dropdown-menu font5" aria-labelledby="teamdropdownMenuButton">
                      <form action="team_recruit.php" method="POST">
                          <input type="submit" class="dropdown-item font5" name="graphic" value="Graphic Team">
                          <input  type="submit" class="dropdown-item font5" name="content" value="Content Team">
                          <input  type="submit" class="dropdown-item font5"  name="pRM"  value="PR & Marketing Team">
                          <input  type="submit" class="dropdown-item font5"  name="webTeam"  value="Web Team">
                          <input  type="submit" class="dropdown-item font5"  name="social"  value="Socail Media">
                      </form>
                  </div>
              </div>
            </div>

      </div>
        <?php
            if(isset($_POST["submit2"])=="Approved"){
              $qurey = "SELECT * FROM `team_recruit`LEFT JOIN  `register_member` ON `reg_no`=`registration_number` WHERE team_status=1 ORDER BY team_id DESC";
            }
            elseif(isset($_POST["submit"])=="Rejected"){
              $qurey = "SELECT * FROM `team_recruit`LEFT JOIN  `register_member` ON `reg_no`=`registration_number` WHERE team_status=-1 ORDER BY team_id DESC";
            }
            elseif(isset($_POST["pending"])=="Pending"){
              $qurey = "SELECT * FROM `team_recruit`LEFT JOIN  `register_member` ON `reg_no`=`registration_number` WHERE team_status=0 ORDER BY team_id DESC";
            }
            elseif(isset($_POST["graphic"])=="Graphic Team"){
              $qurey = "SELECT * FROM `team_recruit`LEFT JOIN  `register_member` ON `reg_no`=`registration_number` WHERE team='Graphic Designing' ORDER BY team_id DESC";
            }
            elseif(isset($_POST["content"])=="Content Team"){
              $qurey = "SELECT * FROM `team_recruit`LEFT JOIN  `register_member` ON `reg_no`=`registration_number` WHERE team='Content Team' ORDER BY team_id DESC";
            }
            elseif(isset($_POST["pRM"])=="PR & Marketing Team"){
              $qurey = "SELECT * FROM `team_recruit`LEFT JOIN  `register_member` ON `reg_no`=`registration_number` WHERE team='PR & Marketing Team' ORDER BY team_id DESC";
            }
            elseif(isset($_POST["webTeam"])=="Web Team"){
              $qurey = "SELECT * FROM `team_recruit`LEFT JOIN  `register_member` ON `reg_no`=`registration_number` WHERE team='Web Development' ORDER BY team_id DESC";
            }
            elseif(isset($_POST["social"])=="Socail Media"){
              $qurey = "SELECT * FROM `team_recruit`LEFT JOIN  `register_member` ON `reg_no`=`registration_number` WHERE team='Socail Media' ORDER BY team_id DESC";
            }

            else{
              $qurey = "SELECT * FROM `team_recruit` LEFT JOIN  `register_member` ON `reg_no`=`registration_number` ORDER BY team_id DESC";
             }

             $check = mysqli_query($con,$qurey);
         ?>
<!-----------------  End of Choose Filter Botton  ----------------->

          <div class="mx-5">

            <table id="teamTable" class="table caption-top ">

              <caption class="font2">List of team recruit</caption>

                <thead class="font1">

                  <tr>

                    <th scope="col">Name</th>

                    <th scope="col">Regester Number</th>

                    <th scope="col">Team</th>

                    <th scope="col">Skills</th>

                    <th scope="col">Work link</th>

                    <th class="size">Why joined</th>

                    <th scope="col">Submited On</th>

                    <th scope="col">Email</th>

                    <th scope="col">Phone No</th>

                    <th scope="col">Status</th>

                  </tr>

               </thead>

               <tbody id='recruitTable'>

                <?php while($row = mysqli_fetch_array($check)){

                    $id=$row['team_id'];

                    $status=$row['team_status'];

                  ?>

                <tr class="font7">

                  <td><?php echo($row["firstname"]);?> <?php echo($row["lastname"]);?></td>

                  <td><?php echo($row["reg_no"]);?></td>

                  <td><?php echo($row["team"]);?></td>

                  <td><?php echo($row["skills"]);?></td>

                  <td><?php echo($row["work_link"]);?></td>

                  <td><?php echo($row["why_join"]);?></td>

                  <td><?php echo($row["submit_time"]);?></td>

                  <td><?php echo($row["email"]);?></td>

                  <td><?php echo($row["country"].' '.$row["number"]); ?></td>

                  <td>
                    <div class="d-flex">

                      <?php

                     if($status=='1'){
                        ?>
                        <a href="ajax_load/approveteam.php?team_id=<?php echo($id);?>&app=2"><input class=" mx-1 btn btn-danger" type="button" id="end_tenure" name="end_tenure " value="End Tenure"></a>
                        <?php
                      }

                      else if($status=='-1'){

                        echo "Rejected";

                      }
                      else if($status=='2'){

                        echo "Completed";

                      }

                      else{

                    ?>

                      <a href="ajax_load/approveteam.php?team_id=<?php echo($id);?>&app=1"><input class="
                       mx-1 orange-regular" type="button" id="approval" name="approve" value="Approve"></a>

                      <a href="ajax_load/approveteam.php?team_id=<?php echo($id);?>&app=-1"><input class=" mx-1 btn btn-danger" type="button" id="reject" name="reject" value="Reject"></a>

                    <?php }



                    ?>

                      </div>

                  </td>



                </tr>

                <?php } ?>

              </tbody>

            </table>

          </div>

      </div>

    </section>

    <!-- Start of footer -->

<?php include 'footer.php'; ?>

<!-- End of footer -->
