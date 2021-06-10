<!-- Start of header -->

<?php include 'header.php'; ?>

<!-- End of header -->

<?php include "ajax_load/connect.php";?>



<!-- -------------------------------Start of Member Dispaly page in admin---------------------- -->

<section id="memberdisplay">

<div class="container">

<h2 class="d-flex justify-content-center font3"><strong>Members</strong></h2>



<!-------------------------------- Button for download----------------------------->

<div class="d-flex justify-content-center">

    <button class="btn-sm yellow-regular font5" onclick="exportData()"><i class="fa fa-download"></i> Download</button>

 </div>

<br>

    

<!-------------------------------- Input box for Search Button----------------------------->

<div class="col-lg-15">

    <input class="form-control font2" id="myInput" type="text" placeholder="Search..">

</div>

<div class="row my-2 d-flex justify-content-center">
    <div class="col-lg-2">

        <div class="dropdown">

            <button class="btn btn-secondary dropdown-toggle font5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" name="submit" aria-expanded="false">

                Choose Filter

            </button>

            <div class="dropdown-menu font5" aria-labelledby="dropdownMenuButton">

                <form action="members_display.php" method="POST">

                    <input type="submit" class="dropdown-item" name="submit1" value="All">

                    <input  type="submit" class="dropdown-item" name="submit2" value="Active">

                    <input  type="submit" class="dropdown-item"  name="submit"  value="block">

                </form>

            </div>

        </div>

    </div>
    <div class="col-lg-2">
    <div class="dropdown">

            <button class="btn btn-secondary dropdown-toggle font5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" name="submit" aria-expanded="false">

                Year

            </button>

            <div class="dropdown-menu font5" aria-labelledby="dropdownMenuButton">

                <form action="members_display.php" method="POST">

                    <input type="submit" class="dropdown-item" name="year_submit_1" value="2021">

                    <input  type="submit" class="dropdown-item" name="year_submit_2" value="2022">

                    <input  type="submit" class="dropdown-item"  name="year_submit_3"  value="2023">

                    <input  type="submit" class="dropdown-item"  name="year_submit_4"  value="2024">

                </form>

            </div>

        </div>
    </div>
    <div class="col-lg-2">
        <div class="dropdown">

            <button class="btn btn-secondary dropdown-toggle font5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" name="submit" aria-expanded="false">

                Stream

            </button>

            <div class="dropdown-menu font5" aria-labelledby="dropdownMenuButton">

                <form action="members_display.php" method="POST">

                    <input type="submit" class="dropdown-item" name="stream_submit_1" value="B.Tech">

                    <input  type="submit" class="dropdown-item" name="stream_submit_2" value="BBA">

                    <input  type="submit" class="dropdown-item"  name="stream_submit_3"  value="B.SC">

                    <input  type="submit" class="dropdown-item"  name="stream_submit_4"  value="M.Tech">

                </form>

            </div>

        </div>
    </div>
    <div class="col-lg-2">
        <div class="dropdown">

            <button class="btn btn-secondary dropdown-toggle font5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" name="submit" aria-expanded="false">

                Branch

            </button>

            <div class="dropdown-menu font5" aria-labelledby="dropdownMenuButton">

                <form action="members_display.php" method="POST">

                    <input type="submit" class="dropdown-item" name="branch_submit_1" value="CSE">

                    <input  type="submit" class="dropdown-item" name="branch_submit_2" value="ECE">

                    <input  type="submit" class="dropdown-item"  name="branch_submit_3"  value="EEE">

                    <input  type="submit" class="dropdown-item"  name="branch_submit_4"  value="Mech">

                </form>

            </div>

        </div>

    </div>
</div>

<br>
<?php
      if((isset($_POST["submit2"])=="Active") || (isset($_POST["submit"])=="Block") ||
        (isset($_POST["submit1"])=="All") ){
        ?>
        <div class="border my-2">
            <form class="mx-5 my-3" action="ajax_load/membersflag.php" id="bulkForm" method="post">
            <div class="form-group">
                <label for="registerBulk" class="form-label">Select Register Number <sup>*</sup></label>
                <select name="registerBulk[]" class="form-control multiple-select" multiple>
                  <?php 
                  // require 'ajax_load/connect.php';
                  if (isset($_POST["submit2"])=="Active"){
                      $query="SELECT  `registration_number`,`status` FROM `register_member` WHERE status=1";
                  }
                  else if(isset($_POST["submit"])=="Block"){
                    $query="SELECT  `registration_number`,`status` FROM `register_member` WHERE status=0";
                  }
                  else{
                    $query="SELECT `registration_number` FROM `register_member`";
                  }    
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
            
            <div class="d-flex justify-content-center my-2">
                <?php
                if (isset($_POST["submit2"])=="Active"){
                      ?><button type='submit' form="bulkForm" class='btn btn btn-danger mx-3' name='submit4' value='bulkBlock'>Block</button>
                <?php
                  }
                  else if(isset($_POST["submit"])=="Block"){
                   ?>
                    <button type='submit' form="bulkForm" class='orange-regular mx-3' name='submit5' Value='bulkActive'>Active</button>
                   <?php
                  }
                ?>
                
               
                <input type="button" class='btn btn-danger mx-3' id="bulkFlags" value="Flag" />
            </div>

            <div id="flagReason" class="justify-content-center mx-5" style="display: none;">
                <label for="bulkFlag_message" class="form-label">Reason</label>
                <textarea class="form-control" name="bulkFlag_message" id="bulkFlag_message" rows="3"></textarea>
                <div class="text-center">
                    <button type="submit" form="bulkForm" name="submit6" Value='bulkFlag' class='yellow-regular my-2'>Submit</button>
                </div>  
            </div>
            </form>
        </div>    
        <?php
      }  

    ?>
    <br>


<div class="table-responsive font1">

  <table id="mytable" class='table table-bordered table-striped'>

        <thead>

          <tr>

            <th>Register</th>

            <th>Full Name</th>

            <th>Stream</th>

            <th>Branch</th>

            <th>Year</th>

            <th>Email</th>

            <th>Phone no</th>

            <th>Status</th>

            <th>Flags</th>

            <th>Opertaions </th>

          </tr>

        </thead>

        <tbody id='myTable' class="font7">



        <?php 

            if(isset($_POST["submit2"])=="Active")

            {

             $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE status=1 ORDER BY id DESC";

            }

            elseif(isset($_POST["submit"])=="block"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE status=0 ORDER BY id DESC";

            }
            elseif(isset($_POST["year_submit_1"])=="2021"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE yop='2021' ORDER BY id DESC";

            }
            elseif(isset($_POST["year_submit_2"])=="2022"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE yop='2022' ORDER BY id DESC";

            }
            elseif(isset($_POST["year_submit_3"])=="2023"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE yop='2023' ORDER BY id DESC";

            }
            elseif(isset($_POST["year_submit_4"])=="2024"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE yop='2024' ORDER BY id DESC";

            }
            elseif(isset($_POST["stream_submit_1"])=="B.Tech"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE stream='B.Tech' ORDER BY id DESC";

            }
            elseif(isset($_POST["stream_submit_2"])=="B.SC"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE stream='B.SC' ORDER BY id DESC";

            }
            elseif(isset($_POST["stream_submit_3"])=="M.Tech"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE stream='M.Tech' ORDER BY id DESC";

            }
            elseif(isset($_POST["stream_submit_4"])=="BBA"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE stream='BBA' ORDER BY id DESC";

            }
            elseif(isset($_POST["branch_submit_1"])=="CSE"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE branch='CSE' ORDER BY id DESC";

            }
            elseif(isset($_POST["branch_submit_2"])=="EEE"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE branch='EEE' ORDER BY id DESC";

            }
            elseif(isset($_POST["branch_submit_3"])=="ECE"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE branch='ECE' ORDER BY id DESC";

            }
            elseif(isset($_POST["branch_submit_4"])=="Mech"){

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` WHERE branch='Mech' ORDER BY id DESC";

            }

            else{

            $query="SELECT  `first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`, `country`, `number`, `email` , `status` FROM `register_member` ORDER BY id DESC";

             }

        $result = $con->query($query);

        if($result->num_rows == 0)

        {

                echo "<p class='d-flex justify-content-center' style='color:red'><b>Not available</b></p>";

        }

        else{

            while($row = $result->fetch_assoc()) {



            //calculating the current pursuing year according to stream

                if($row['stream']=='B.Tech'){

                    $a=4-($row['yop']-date("Y"));

                }

                elseif ($row['stream']=='M.Tech'  || $row['stream']=='M.Sc' ) {

                    $a=2-($row['yop']-date("Y"));

                }

                else{

                    $a=3-($row['yop']-date("Y"));

                }

                if($row['status']==1)

                {

                    $status="Active";

                }

                else{

                    $status="Block";

                }



                $reg=$row['registration_number'];



            //Counting no of flags from member_flags table

            $query2="SELECT * FROM member_flags WHERE register_number='$reg' ORDER BY id DESC";  

            $result2 = mysqli_query($con, $query2);

            $rowscount= mysqli_num_rows($result2);



            echo "<tr>";

            echo "<td>".$reg."</td>";

            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";

            echo "<td>".$row['stream']."</td>";

            echo "<td>".$row['branch']."</td>";

            echo "<td>".$a."</td>";

            echo "<td>".$row['email']."</td>";

            echo "<td>+".$row['country']." ".$row['number']."</td>";

            echo "<td>".$status."</td>";

            echo "<td>".$rowscount."</td>";

            ?>
            <td>
            	<div class="d-flex">

	                <button type='button' class='mx-1 btn-sm gray-regular flagbtn'>Add Flag</button>

	                <?php  

	                if($row['status']==1){ ?>

	                <form action='ajax_load/membersflag.php?rn=$reg' method='POST'><input type='submit' class='mx-1 btn btn-danger' name='submit' Value='Block'></form>

	                <?php  } 

	                else{ ?>

	                    <form action='ajax_load/membersflag.php?rn=$reg' method='POST'><input type='submit' class='mx-1 btn-sm orange-regular' name='submit2' Value='Active'></form>

	               <?php } ?> 
	            </div>
            </td>

            <?php  

            echo "</tr>";

            }

       }

       echo  "</tbody></table>";

    ?>

 <!--------------------------- Start of  Modal For AddFlag Button's Modal ----------------------->   

<div class="modal fade" id="FlagModal" tabindex="-1" aria-labelledby="FlagModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="FlagModalLabel"> <b> FLAG </b></h3>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>

                <!--- FlAG MODAL BODY---->

                <div class="modal-body">

                    <form action="ajax_load/membersflag.php" method="POST">

                        <div class="form-group">

                            <input type="text" class="form-control" name="reg" id="reg"  placeholder="Register number" readonly>

                        </div>

                        <div class="form-group">

                            <label for="Flag_message" class="form-label">Reason</label>

                            <textarea class="form-control" name="Flag_Message" id="Flag_message" rows="4" required></textarea>

                        </div>

                        <div class="text-center my-4">

                             <button type="submit" class="yellow-regular"  name="submit">Save</button>

                        </div>

                    </form>

                </div>      

            </div>

        </div>

</div>

<!--------------------------- End of Modal For AddFlag Button's Modal ----------------------->   
</div>

</div>

<!-- ----------Script tag for functioning of Search button----------------------------------->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



</section>

<!-- -------------------------------End of Member Dispaly page in admin---------------------->

<!-- Start of footer -->

<?php include 'footer.php'; ?>

<!-- End of footer -->

