<!-- Start of header -->



<?php include 'header.php'; ?>



<!-- End of header -->



<!-- Certificates Valiadation -->



<?php include "ajax_load/connect.php"; ?>



<section id="certificates">



<div class="container main">



  <h3 class="text-center font7">Certificate Verification</h3>



    <div class="row">



        <div class="card my-2 shadow-sm p-3 mb-5 bg-white rounded">



            <div class="card-body">



                <form  action ="certificate_validation.php" method="POST">



                     <div class="form-group">



                        <input type="text" class="form-control font2" placeholder="Certificate Number" name="certificate_number"><br>



                        <button type="submit" class="yellow-regular btn-md btn-block font5" name="submit">Verify</button>



                     </div>



                </form>



                <?php



                    if(isset($_POST["submit"])){



                    $query="SELECT * FROM `certificate`";



                    $result = $con->query($query);



                    $count=1;



                    $temp=0;



                    if($result->num_rows > 0) {



                        while($row = $result->fetch_assoc()) {



                        $count=$count+1;



                            if($row["certificate_number"]===$_POST["certificate_number"]){



                                 echo "<p class='valid'>Certificate number is valid</p>";



                                $temp=1;



                                echo "<table class='tbl'><tr><td>Name</td><td>".$row["name"]."</td></tr>";



                                echo "<tr> <td>Organization</td><td>".$row["organisation"]."</td></tr>";



                                echo "<tr> <td>Event</td><td>".$row["event"]."</td></tr>";



                                echo "<tr> <td>Issued For</td><td>".$row["issued_for"]."</td></tr>";



                                echo "<tr> <td>Issued Date</td><td>".$row["issued_date"]."</td></tr>";



                                echo "</table>";



                                break;



                            }



                            else{



                                 continue;



                            }



                         }



                    }



                    if($count>=$result->num_rows+1 && $temp==0){



                         echo "<p class='invalid'>Invalid Certificate</p>";



                    }



                    }



                ?>



            </div>



        </div>



    </div>



</div>



</section>



<!-- End of Certificate Validation -->



<!-- Start of footer -->



<?php include 'footer.php'; ?>



<!-- End of footer -->



