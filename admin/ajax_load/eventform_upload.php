<?php



require "connect.php";



if(isset($_POST["submit"]) && isset($_POST["eventname"]) && isset($_POST["eventdate"]) && isset($_POST["lastdate"])  && isset($_POST['ggform']) && isset($_POST['eventdescription'])){



    $eventname = mysqli_real_escape_string($con,trim($_POST['eventname']));



    $eventdate = mysqli_real_escape_string($con,trim($_POST['eventdate']));



    $lastdate = mysqli_real_escape_string($con,trim($_POST['lastdate']));



    $time = mysqli_real_escape_string($con,trim($_POST['time']));



    $meridian = mysqli_real_escape_string($con,trim($_POST['meridian']));



    $ggform = mysqli_real_escape_string($con,trim($_POST['ggform']));



    $description = mysqli_real_escape_string($con,trim($_POST['eventdescription']));



    // Doc Validation



    //Getting the file







    $upload_docs = $_FILES['posterimg'];



    if (!empty($upload_docs['name'])) {



        //Getting the file information



        $upload_docsName = $upload_docs['name'];



        $upload_docsType = $upload_docs['type'];



        $upload_docsTmpName = $upload_docs['tmp_name'];



        $upload_docsError = $upload_docs['error'];



        $upload_docsSize = $upload_docs['size'];



        //Breaking the filename into name and extension part



        $upload_docsExt = explode(".", $upload_docsName);



        //Getting the actual extension



        $upload_docsActualExt = strtolower(end($upload_docsExt));



        //Making an array of allowed extension



        $allowed = array('jpg','jpeg','png');



        //Checking if the extension is valid or not



        if (in_array($upload_docsActualExt, $allowed)) {



            //Check if there is any error or not



            if ($upload_docsError === 0) {



                //Changing the file name to a unique name



                $upload_docsNewName =uniqid("", true) . "." . $upload_docsActualExt;

               

                //Making the file destination path

               

                $upload_docsDestination = '../../uploads/eventposters/' . $upload_docsNewName;

            



            } else {



                session_start();



                 $_SESSION['errorMessage'] = "WARNING:Error occured while uploading the file";



                 header("Location:../eventform.php");







            }



        } else {



            session_start();



            $_SESSION['errorMessage'] = "WARNING:The file type is not allowed";



            header("Location:../eventform.php");



        }



        //End of Docs Validation



        //The SQL Statement

        $eventtime=$time. " ".$meridian;



        $sql = "INSERT INTO `eventtable`(`event_name`, `event_date`, `last_date`, `event_time`,`poster`,`ggform`, `event_description`) VALUES (?,?,?,?,?,?,?)";







        //Prepare the statement



        $result = mysqli_prepare($con, $sql);



        if ($result) {



            //Bind parameters



            mysqli_stmt_bind_param($result,"sssssss",$eventname,$eventdate,$lastdate,$eventtime,$upload_docsNewName,$ggform,$description);



            //Execute the statement



            mysqli_stmt_execute($result);



            //Moving the photo file from temp to destination folder



            move_uploaded_file($upload_docsTmpName, $upload_docsDestination);



            session_start();



            $_SESSION['success'] = "Updated Successfully";



            header("Location: ../eventtable.php");



        } else {



            session_start();



            $_SESSION['errorMessage'] = "Failed";



            header("Location:../eventform.php");



        }



    }



    else {



        //The SQL Statement

        $eventtime=$time. " ".$meridian;



        $sql = "INSERT INTO `eventtable`(`event_name`, `event_date`, `last_date`, `event_time`,`poster`,`ggform`, `event_description`) VALUES (?,?,?,?,?,?,?)";







        //Prepare the statement



        $result = mysqli_prepare($con, $sql);



        if ($result) {



            //Bind parameters



            mysqli_stmt_bind_param($result,"sssssss",$eventname,$eventdate,$lastdate,$eventtime,$upload_docsNewName,$ggform,$description);



            //Execute the statement



            mysqli_stmt_execute($result);



            session_start();



            $_SESSION['success'] = "Updated Successfully2 ";



            header("Location: ../eventtable.php");



        } else {



            session_start();



            $_SESSION['errorMessage'] = "Failed";



            header("Location:../eventform.php");







        }



    }



}



?>



