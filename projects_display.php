<!-- Start of header -->



<?php include 'header.php'; ?>



<!-- End of header -->



<section id="project_display">



<div class="container">



<?php



include "ajax_load/connect.php";



$count=0;



$query="SELECT `project_id`, `project_name`, `team_name`, `description` FROM `projectdetails` WHERE project_status=1";



$result = $con->query($query);

if($result === false)

{

   user_error("Query failed: ".$con->error."<br />\n$query");

   return false;

}



if ($result->num_rows > 0) {



    // output data of each row



    echo  "<div class='row my-3'>";



    while($row = $result->fetch_assoc()) {



        $count=$count+1;

        $id=$row["project_id"];

     



?>



        <div class="col col-lg-4 col-md-6 col-sm-12">



            <div class="card rounded">



                <div class="card-body">



                    <a href="project.php?rn=<?php echo base64_encode($id); ?>" class="stretched-link text-dark">



                    <h4 class="font5"><?php echo $row["project_name"] ?></h4>



                    <p class="font6"><?php echo $row["description"] ?></p>



                    <h5 class="font5"><?php echo $row["team_name"]  ?></h5>



                    </a>



                </div>



            </div>



        </div>



       <?php



        if($count==0)



        {  echo "</div>"; }



        }



        }



        else



        {



            echo "<center><div class='unavailable'>NO DATA AVAILABLE</div></center>";



        }



        ?>



</div>



</section>



<!-- Start of footer -->



<?php include 'footer.php'; ?>



<!-- End of footer -->

