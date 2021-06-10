<?php



include 'connect.php';



    if(isset($_GET['team_id'])){

    	echo $_GET['app'];

    	$id=$_GET['team_id'];

    	if ($_GET['app']=='1'){

	    	$sql=" UPDATE `team_recruit` SET `team_status`='1' WHERE team_id='$id' ";

	    	mysqli_query($con,$sql);

    	}

    		elseif ($_GET['app']=='-1') {

    		$sql=" UPDATE `team_recruit` SET `team_status`='-1' WHERE team_id='$id' ";

	    	mysqli_query($con,$sql);

    	}
         elseif ($_GET['app']=='2') {

            $sql=" UPDATE `team_recruit` SET `team_status`='2' WHERE team_id='$id' ";

            mysqli_query($con,$sql);

        }

    }

    header('Location:../team_recruit.php');



 ?>

