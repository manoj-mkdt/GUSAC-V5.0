

<?php include "connect.php";



/* ******************************* To Remove the A row ***************************************8 */

if(isset($_POST["submit"])=="block"){



    $reg=$_GET['rn'];

    $query="UPDATE `register_member` SET `status`='0' WHERE registration_number='$reg'";

    $result = mysqli_query($con, $query);

    if ($result) {

        header("Location:../members_display.php");

    }

    else{

         header("Location:../members_display.php");

    }

}

elseif(isset($_POST["submit2"])=="Active"){

    

    $reg=$_GET['rn'];

    $query="UPDATE `register_member` SET `status`='1' WHERE registration_number='$reg'";

    $result = mysqli_query($con, $query);

    if ($result) {

        header("Location:../members_display.php");

    }

    else{

         header("Location:../members_display.php");

    }

}
else if(isset($_POST["submit4"])=="bulkBlock"){

  $members = $_POST['registerBulk'];
  // echo $members;
  foreach ($members as $value) {
    $team_members= $value;
    $result=mysqli_query($con,"UPDATE `register_member` SET `status`='0' WHERE registration_number=
    '$team_members' ");
    header("Location:../members_display.php");
    }


}
else if(isset($_POST["submit5"])=="bulkActive"){

  $members = $_POST['registerBulk'];
  // echo $members;
  foreach ($members as $value) {
        $team_members= $value;
        $result=mysqli_query($con,"UPDATE `register_member` SET `status`='1' WHERE registration_number=
        '$team_members' ");
    }
    header("Location:../members_display.php");
}
else if(isset($_POST["submit6"])=="bulkFlag"){
    $members = $_POST['registerBulk'];
    $reason=$_POST['bulkFlag_message']; 
    foreach ($members as $value) {
        $team_members= $value;
        $result=mysqli_query($con,"INSERT INTO `member_flags`(`register_number`, `reason`) VALUES ('$team_members','$reason')");
    }   
    header("Location:../members_display.php");
}

/************************************************ END of removing row*****************************************/

/************************************************ Start of Adding Flag*****************************************/

    if(isset($_POST["submit"])){

        $reg = mysqli_real_escape_string($con,trim($_POST['reg']));

        $reason = mysqli_real_escape_string($con,trim($_POST['Flag_Message']));

        $query =" INSERT INTO `member_flags`(`register_number`, `reason`) VALUES (?,?)";

        $result = mysqli_prepare($con, $query);

        if ($result) {

            //Bind parameters

            mysqli_stmt_bind_param($result,"ss",$reg,$reason);

            //Execute the statement

            mysqli_stmt_execute($result);

            header("Location:../members_display.php");

        }

        else

        {

           

            header("Location:../members_display.php");

        }

    }

/************************************************ Remove of Adding Flag*****************************************/

 ?>