<?php



	include 'connect.php';







	$login_email = mysqli_real_escape_string($con,trim($_POST['login_email']));



	$login_password = mysqli_real_escape_string($con,trim($_POST['login_password']));











	// Form Validation



	if(!empty($login_email) && !empty($login_password))



	{







		$check=mysqli_query($con,"SELECT * FROM `register_member` WHERE email='$login_email'");



	    if (mysqli_num_rows($check)>0)



	    {



				session_start();



	      	$row=mysqli_fetch_array($check,MYSQLI_ASSOC);

	     	$status=$row['status'];
	     	
	     	$vPassowrd=$row['password'];

	     	$token=$row['token_hash'];

			$sid=$row['id'];

			$reg=$row['registration_number'];

			$full_name=$row['first_name']." ".$row['last_name'];









	      // echo "asda $token";







	      if(password_verify($login_password, $vPassowrd)){

				if ($status == 0){

		      		echo 'user_blocked';
		      		exit();

		      	}
		      	else{

		      		// Setting Session variables

		      	 	$_SESSION['email']=$login_email;

			        $_SESSION['token']=$token;

					$_SESSION['sid'] = $sid;

					$_SESSION['reg'] = $reg;

					$_SESSION['full_name'] = $full_name;

					$_SESSION['last_login_timestamp'] = time(); 

			        echo 'Successfull';

			        exit();
			    }

	       }



	       else{



	       	 echo "VerifyDetails";

	       	 exit();

	       }



	    }



	    else



	    {



	      echo "user_does_not_exist";

	      exit();

	    }



	}



?>



