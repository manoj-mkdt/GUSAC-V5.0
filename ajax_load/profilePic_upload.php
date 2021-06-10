<?php 
	session_start();
	$id=$_SESSION['sid'];
	include 'connect.php';
	 
    
	if(isset($_POST['image']))
	{
		$data = $_POST['image'];

		$image_array_1 = explode(";", $data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);

		// deleting old profile pic if exsiting in local directory
		$deleteSql = "SELECT `profile_pic` FROM `register_member` WHERE id=$id";
		$res=mysqli_query($con,$deleteSql);
		while($prof_image=mysqli_fetch_array($res))
		{

			// echo $prof_image['profile_pic'];
			unlink('../uploads/profilePic/'.$prof_image['profile_pic']);
			
		}

		 
		$sql="UPDATE `register_member` SET `profile_pic`=? where id=$id";
		$result = mysqli_prepare($con,$sql);
		
		if($result){
	     //Changing the file name to a unique name
	     $upload_docsNewName =uniqid("", true) . "." .'png';
	     //Making the file destination path
	     $upload_docsDestination = '../uploads/profilePic/' . $upload_docsNewName;
	     file_put_contents($upload_docsDestination, $data);
	     //Bind parameters
	     mysqli_stmt_bind_param($result,"s",$upload_docsNewName);
	     //Execute the statement
	     mysqli_stmt_execute($result);
	     echo "success";
	 	 exit();
		 }
		 else{
		 	echo "Try_Again!!!";
		 	exit();
		 }
	}
?>