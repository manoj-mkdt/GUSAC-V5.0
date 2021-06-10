<?php

    session_start();

    if(isset($_SESSION['reg'])){

        session_unset();

        session_destroy();

        ?>
        <p>You have been logged out.</p>
        <meta http-equiv="refresh" content="3;url=../login.php" />
      <?php
        // header('Location: ../index.php');

    }

    else{

        header("Location: ../index.php");

        die();

    }

?>

