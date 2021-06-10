<?php

include 'connect.php';

    if(isset($_GET['project_id'])){
    	echo $_GET['app'];
    	$id=$_GET['project_id'];
    	if ($_GET['app']=='1'){
	    	$sql=" UPDATE `projectdetails` SET `project_status`='1' WHERE project_id='$id' ";
	    	mysqli_query($con,$sql);
    	}
    		elseif ($_GET['app']=='-1') {
    		$sql=" UPDATE `projectdetails` SET `project_status`='-1' WHERE project_id='$id' ";
	    	mysqli_query($con,$sql);
    	}
    }
    header('Location:../project_admin.php');

 ?>
