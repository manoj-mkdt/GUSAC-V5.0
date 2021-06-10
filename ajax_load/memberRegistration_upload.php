<?php

	include 'connect.php';





	if($_POST['formName']=="mReg"){



		  // Reciving Data

		  $fName=mysqli_real_escape_string($con,trim($_POST['fName']));

	      $lName=mysqli_real_escape_string($con,trim($_POST['lName']));

	      $mrNum=mysqli_real_escape_string($con,trim($_POST['mrNum']));

	      $stream=mysqli_real_escape_string($con,trim($_POST['stream']));

	      $branch=mysqli_real_escape_string($con,trim($_POST['branch']));

	      $yop=mysqli_real_escape_string($con,trim($_POST['yop']));

	      $code=mysqli_real_escape_string($con,trim($_POST['code']));

	      $mpnumber=mysqli_real_escape_string($con,trim($_POST['mpnumber']));

	      $email=mysqli_real_escape_string($con,trim($_POST['email']));

	      $password=mysqli_real_escape_string($con,trim($_POST['password']));



	      // Genrating Unique key

	      $token_hash = time();

		  $token = password_hash($token_hash, PASSWORD_DEFAULT);



	      // hashing password

	      $password=password_hash($password, PASSWORD_DEFAULT);



	      $sql=mysqli_query($con,"SELECT * FROM `register_member` WHERE registration_number ='$mrNum'");

	      if(mysqli_num_rows($sql)>0){

	          echo "user";
	          exit();

	      }

	      else{

	        $sql = "INSERT INTO `register_member`(`first_name`, `last_name`, `registration_number`, `stream`, `branch`, `yop`,`country`, `number`, `email`, `password`,`token_hash`) VALUES (?,?,?,?,?,?,?,?,?,?,?)" ;



        	$result = mysqli_prepare($con,$sql);



        	if($result){

	            // Bind the parameters

	            mysqli_stmt_bind_param($result,"sssssssssss",$fName,$lName,$mrNum,$stream,$branch,$yop,$code,$mpnumber,$email,$password,$token);

	            // Execute the result

	            mysqli_stmt_execute($result);

	            // Close the Statement

	            mysqli_stmt_close($result);

				

				echo "success";

			}

			else{

				echo "failed";

			}

	  	}

	}

	else{

		// EDIT code

	}


