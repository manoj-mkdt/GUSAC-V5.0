<?php include 'header.php' ?>

<?php

session_start();

if(isset($_SESSION['success'])){

    echo "<script type='text/javascript'>

            alert('" . $_SESSION['success'] . "');

          </script>";

    //to not make the error message appear again after refresh:

    unset($_SESSION['success']);   

}

?>
<div class="my-5">

  <h1 class="text-center align-middle font1">HELLO</h1>

</div>

<?php include 'footer.php' ?>

