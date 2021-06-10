<?php
  include 'connect.php' ;
  session_start();
  $id = $_SESSION['sid'];

  //Getting the file information


  $old_pwd = mysqli_real_escape_string($con,trim($_POST['old_pwd']));
  $new_pwd = mysqli_real_escape_string($con,trim($_POST['new_pwd']));

  $new_pwd=password_hash($new_pwd, PASSWORD_DEFAULT);
  $check=mysqli_query($con,"SELECT `password` FROM `register_member` WHERE id='$id'");
  if(mysqli_num_rows($check)>0)
  {
      foreach ($check as $row ) {
          $vPassowrd = $row["password"];
          if(password_verify($old_pwd, $vPassowrd)){
            $update = 'UPDATE `register_member` SET `password` = ?';
            $result = mysqli_prepare($con,$update);
            if($result){

                // Bind the parameters

                mysqli_stmt_bind_param($result,"s",$new_pwd);

                // Execute the result

                mysqli_stmt_execute($result);

                // Close the Statement

                mysqli_stmt_close($result);

          

                echo "success";

              }
          }
          else{
            echo "pwd_dntMatch";
          }
      }
  }
  else{
    echo "error_occured";
     }
