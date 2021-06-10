<?php

  include 'connect.php' ;

  //Getting the file information
  $contact_email = mysqli_real_escape_string($con,trim($_POST['contact_email']));
  $contact_name = mysqli_real_escape_string($con,trim($_POST['contact_name']));
  $contact_subject = mysqli_real_escape_string($con,trim($_POST['contact_subject']));
  $contact_message = mysqli_real_escape_string($con,trim($_POST['contact_message']));


  // Form Validation
  if(!empty($contact_email) && !empty($contact_name) && !empty($contact_subject) && !empty($contact_message) )
  {
    $sql = "INSERT INTO `contactus`(`contact_email`, `contact_name`, `contact_subject`, `contact_message`) VALUES (?,?,?,?)";
    $result = mysqli_prepare($con,$sql);
    if($result){
      // Bind the parameters
      mysqli_stmt_bind_param($result,"ssss",$contact_email,$contact_name,$contact_subject,$contact_message);

      // Execute the result
      mysqli_stmt_execute($result);

      // Close the Statement
      mysqli_stmt_close($result);
      echo "success";

      // // Sending mail
      // $to_email = "gusacbangalore@gmail.com";
      // $subject = "Response from $contact_email";
      // $body = "$contact_message";
      // $headers = "From: technatips@gmail.com";

      // if (mail($to_email, $subject, $body, $headers)) {
      //     echo "success";
      // }
      // else {
      //     echo "emailfailed";
      // }
    }
    else
    {
      echo "failed";
    }
  }
  else
  {
    echo "fill form";
  }
?>
