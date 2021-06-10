<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font Awesome CDN Link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

    <!-- Select CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <!-- Responsive CSS Link -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Default CSS Link -->
    <link rel="stylesheet" href="css/default.css">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="css/stylesheet.css">

  </head>
  <body>
    <section id='project_admin'>
      <?php
      include("ajax_load/connect.php");
      $sql = "SELECT * FROM `projectdetails` LEFT JOIN  `register_member` ON `team_leader`=`registration_number`";
      $check = mysqli_query($con,$sql);
      ?>
       <div class="">
        <h1 class="text-center font3">PROJECTS</h1>
        <button type="button" class="yellow-regular float-right res font5">Download</button>
          <div class="tablemr">
            <table class="table caption-top">
              <caption class="font2">List of project uploads</caption>
                <thead class="font1">
                  <tr>
                    <th scope="col">Uploaded on</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Team Name</th>
                    <th class="size" scope="col">Team leader</th> 
                    <th scope="col">Uploaded By</th> 
                    <th scope="col">Project Related document</th>
                    <th class="size" scope="col">Description</th>
                    <th scope="col">Authorization</th>
                  </tr>
               </thead>
               <tbody class="font7">
                <?php while($row = mysqli_fetch_array($check)){
                    $id=$row['project_id'];
                    $status=$row['project_status'];
                  ?>
                <tr>
                  <td><?php echo($row["time_stamp"]);?></td>
                  <td><a href="<?php echo($row["project_links"]);?>" target="_blank"><?php echo($row["project_name"]);?></a></td>
                  <td><?php echo($row["team_name"]);?></td>
                  <td><b><?php echo($row["team_leader"]);?></b>,<?php echo($row["team_members"]); ?></td>
                  <td><?php echo($row["registration_number"]); ?></td>
                  <td><?php echo($row["project_pic_path"]);?></td>
                  <td><?php echo($row["description"]);?></td>
                  <td>
                    <div class="d-flex">
                      <?php
                      if($status=='1'){
                        echo "Approved";
                      }
                      else if($status=='-1'){
                        echo "Rejected";
                      }
                      else{
                      ?>
                        <a href="ajax_load/approveproject.php?project_id=<?php echo($id);?>&app=1"><input class="orange-regular" type="button" id="approval" name="approve" value="Approve"></a>
                        <a href="ajax_load/approveproject.php?project_id=<?php echo($id);?>&app=-1"><input class="btn btn-danger" type="button" id="reject" name="reject" value="Reject"></a>
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
    <!-- JQuery CDN Link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap Bundle JS CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Select JS CDN LINK -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Owl Carousel CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

    <!-- Custom JS Link -->
    <script src="js/custom.js"></script>

    <!-- Custom JS Link -->
    <script src="js/ajax.js"></script>
  </body>
</html>
