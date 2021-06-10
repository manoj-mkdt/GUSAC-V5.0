<?php



  require 'connect.php' ;



  session_start();



if(isset($_POST["submit"]) && isset($_POST["team_name"]) && isset($_POST["team_description"]) ) {



  //Getting the file information



  


  $team_name = mysqli_real_escape_string($con,trim($_POST['team_name']));
 

  $team_description = mysqli_real_escape_string($con,trim($_POST['team_description']));





        $upload_docs = $_FILES['team_poster'];



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



                $upload_docsNewName = uniqid("", true) . "." . $upload_docsActualExt;

               

                //Making the file destination path

               

                $upload_docsDestination = '../uploads/TeamPoster/' . $upload_docsNewName;

            



            } else {



                 $_SESSION['errorMessage'] = "WARNING:Error occured while uploading the file";



                 header("Location:../addTeam.php");







            }



        } else {



            $_SESSION['errorMessage'] = "WARNING:The file type is not allowed";



            header("Location:../addTeam.php");



        }



        //End of Docs Validation



        //The SQL Statement



         $sid = $_SESSION['sid'];



        $sql="INSERT INTO `teams`(`team_name`, `team_description`, `team_poster`) VALUES (?,?,?) ";



        //Prepare the statement



        $result = mysqli_prepare($con, $sql);



        if ($result) {



            //Bind parameters



            mysqli_stmt_bind_param($result,"sss",$team_name,$team_description,$upload_docsNewName);



            //Execute the statement



            mysqli_stmt_execute($result);



            //Moving the photo file from temp to destination folder



            move_uploaded_file($upload_docsTmpName, $upload_docsDestination);



            $_SESSION['success'] = "Updated Successfully";



            header("Location: ../addTeam.php");



        } else {





            $_SESSION['errorMessage'] = "Failed";



            header("Location:../addTeam.php");



        }



    }


}
                   
?>



