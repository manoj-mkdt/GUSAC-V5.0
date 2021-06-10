<?php

    require 'connect.php';



    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['reg']) && !empty($_POST['team']) && !empty($_POST['skills'])){

        $firstname = mysqli_real_escape_string($con,trim($_POST['firstname']));

        $lastname = mysqli_real_escape_string($con,trim($_POST['lastname']));

        $reg = mysqli_real_escape_string($con,trim($_POST['reg']));

        $team = mysqli_real_escape_string($con,trim($_POST['team']));

        $skills = mysqli_real_escape_string($con,trim($_POST['skills']));

        $work_link = mysqli_real_escape_string($con,trim($_POST['work_link']));

        $why_join = mysqli_real_escape_string($con,trim($_POST['why_join']));



        // to check user already approved or not

        $sql = "SELECT `team` FROM `team_recruit` WHERE reg_no=$reg ";
        $result = mysqli_query($con,$sql);
        if (mysqli_num_rows($result)>0) {
          echo "user_approved";
          exit();
        }

        // The SQL Query

        $sql = "INSERT INTO `team_recruit`(`firstname`, `lastname`, `reg_no`, `team`, `skills`, `work_link`,`why_join`,`sid`) VALUES (?,?,?,?,?,?,?,?)";



        // Prepare the statement

        $result = mysqli_prepare($con,$sql);



        session_start();

        $sid = $_SESSION['sid'];



        if($result){

            // Bind the parameters

            mysqli_stmt_bind_param($result,"ssssssss",$firstname,$lastname,$reg,$team,$skills,$work_link,$why_join,$sid);



            // Execute the result

            mysqli_stmt_execute($result);



            // Close the Statement

            mysqli_stmt_close($result);



            echo "success";

        }

        else{

            echo "failed";

        }

    } else {

        echo "mandate";

    }



