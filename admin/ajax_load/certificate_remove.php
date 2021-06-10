<?php
// Admin Certificate table's Remove function
// checking Id to remove form the Database
include 'connect.php';

    if(isset($_GET['id'])){
    	$id=$_GET['id'];
	    	$sql="DELETE FROM `certificate` WHERE id='$id'";
	    	mysqli_query($con,$sql);
    }
    header('Location:../certificate.php');

 ?>
