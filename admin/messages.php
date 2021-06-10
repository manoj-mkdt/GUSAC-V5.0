<!---Start of header -->
<?php include 'header.php'; ?>
<!-- End of header -->
<section id="messages">
	<div class="container text-center my-3">
	  		<h3 class="font1">MESSAGES </h3>
	</div>
	  		
	<?php
	include "ajax_load/connect.php";
	$sql = "SELECT * FROM `contactus` WHERE 1 ORDER BY `contactus`.`current_timestamp` DESC";
	$check = mysqli_query($con,$sql);



	?>

	<?php 
	while($row = mysqli_fetch_array($check)){
			$timestamp= strtotime($row["current_timestamp"]);
	?>
		<div class="card w-75 my-3">		  
		    <div class="container my-3" id="content">
		    	<h6 class="font6"><b>Subject: </b><?php echo $row["contact_subject"]; ?></h6>
		    	<p class="font6"><?php echo $row["contact_message"]; ?></p>	    	
		        <h6 class="font6"><b>Name: </b><?php echo $row["contact_name"];?></h6><br>
		      	<div class="row" id="mail">
		      		<div class="col-md-6 font6">
			      		<h6><b>Email Id: </b><a href="mailto:<?php echo $row["contact_email"]; ?>"><?php echo $row["contact_email"]; ?></a></h6>   <br>   	
			      	</div>
			      	<div class="col-md-6 font6" id="messageTime">
			        	<h6 >Time: <?php echo date("d-m-y D h:i A", $timestamp); ?></h6>
			    	</div>
		        </div>		          
		    </div>	
		</div>
	<?php
	}?>
</section>
<!-- Start of footer -->
<?php  include 'footer.php'; ?>
<!-- End of footer--->

