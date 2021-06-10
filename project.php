<!-- Start of header -->



<?php include 'header.php'; ?>



<!-- End of header -->



<!----Start of Event Page---->

<?php include 'ajax_load/connect.php';

if(isset($_GET['rn'])){

$id=base64_decode($_GET["rn"]);

$query3="SELECT * FROM `projectdetails` WHERE project_id ='$id'";

$result = $con->query($query3);

$count = $result->num_rows;

if($count <= 0)

{

                echo "<p class='d-flex justify-content-center' style='color:red'><b>Invalid Data</b></p>";

}

else{

if($row = $result -> fetch_assoc()) {



?>



<section id="single_project">



      <div class="container border main">



      <div class ="text-center mb-4">



        <h2 class="font4"><?php echo $row['project_name']; ?><h2>



        <h3 class="font6"><small><?php echo $row['team_leader']?></small></h3>



      </div>



        <div class="row">



          <div class="col-md-6 col-sm-12 text-center" id="Image">



            <img id="myImg2" src="uploads/projects/<?php echo $row['project_pic_path'];?>" class="border rounded img-fluid" alt="Project poster">



          </div>



          <div class="col-md-6 col-sm-12  my-auto">



                <p class="text-justify"><?php echo $row['description']?></p>



                <p class="font6"><b>Team Members: </b> <span><?php echo $row['team_members']?></span> </p>  <!-- Make the team leader bold -->



                <p class="font6"><b>Project Links: </b> <span> <a href="<?php echo  $row['project_links']?>" target="_blank">Click here</a> </span> </p>



          </div>



        </div>



      </div>

<?php  }}}?>

    </section>



    <!----End of Event Page---->



<!-- Start of footer -->



<?php include 'footer.php'; ?>



<!-- End of footer -->







