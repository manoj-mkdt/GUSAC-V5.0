<?php

  include 'connect.php';

  //Getting the file information
  $certificate_no = mysqli_real_escape_string($con,trim($_POST['certificate_no']));
  $name = mysqli_real_escape_string($con,trim($_POST['name']));
  $organization = mysqli_real_escape_string($con,trim($_POST['organization']));
  $event = mysqli_real_escape_string($con,trim($_POST['event']));
  $issuedFor = mysqli_real_escape_string($con,trim($_POST['issuedFor']));
  $issuedBy = mysqli_real_escape_string($con,trim($_POST['issuedBy']));


      // Validating Unique Certificate
      $check = mysqli_query($con,"SELECT * FROM `certificate` WHERE  certificate_number ='$certificate_no'");
      $count1 = mysqli_num_rows($check);

      if($count1>0){
        echo 'certificate_exist';
      }
      else{
        $sql="INSERT INTO `certificate`(`certificate_number`, `name`, `organisation`, `event`, `issued_for`, `issued_date`) VALUES(?,?,?,?,?,?)";

        $result = mysqli_prepare($con,$sql);

          // Upload file to server
            if($result){
              // Bind the parameters
              mysqli_stmt_bind_param($result,"ssssss",$certificate_no,$name,$organization,$event,$issuedFor,$issuedBy);
              // Execute the result
              mysqli_stmt_execute($result);
              echo "successfully";

              // Close the Statement
              mysqli_stmt_close($result);
              
            }
            else{
              echo 'failed';
            }
      }
?>
