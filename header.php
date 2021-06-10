<?php ob_start(); ?>

<?php session_start(); ?>



<!DOCTYPE html>



<html>



  <head>



    <meta charset="UTF-8">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <?php

        // DYNAMIC TITLE FOR DIFFERENT PAGE

        if (basename($_SERVER['PHP_SELF']) == 'index.php') {

          echo "<title>GUSAC | Home Page</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'profilepage.php') {

          echo "<title>GUSAC | Profile</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'about.php') {

          echo "<title>GUSAC | About</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'event.php') {

          echo "<title>GUSAC | Event</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'certificate_validation.php') {

          echo "<title>GUSAC | Certificate Validation</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'contactUS.php') {

          echo "<title>GUSAC | Contact Us</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'login.php') {

          echo "<title>GUSAC | Login</title>";
        
        } else if (basename($_SERVER['PHP_SELF']) == 'memberRegister.php') {

          echo "<title>GUSAC | Member Register</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'project.php') {

          echo "<title>GUSAC | Project</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'projectform.php') {

          echo "<title>GUSAC | Project Form</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'projects_display.php') {

          echo "<title>GUSAC | Project Display</title>";

        } else if (basename($_SERVER['PHP_SELF']) == 'projects_display.php') {

          echo "<title>GUSAC | Project Display</title>";
        
        } else if (basename($_SERVER['PHP_SELF']) == 'teamRegister.php') {

          echo "<title>GUSAC | Team Register</title>";
        }


        ?>



      <!-- Boostrap CDN Link -->



      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">







      <!-- Font Awesome CDN Link -->



      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">







      <!-- Owl Carousel CSS -->



      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />



      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />







      <!-- Select CDN Link -->



      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">











      <!-- Responsive CSS Link -->



      <link rel="stylesheet" href="css/responsive.css">







      <!-- Default CSS Link -->



      <link rel="stylesheet" href="css/default.css">







      <!-- Custom CSS Link -->



      <link rel="stylesheet" href="css/stylesheet.css">

       <!-- Profile Pic cropper js and css -->
      <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
      <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
      <script src="https://unpkg.com/dropzone"></script>
      <script src="https://unpkg.com/cropperjs"></script>

  </head>



<body>



<!-- Start of Navbar -->

<section id="navbar">

  <!-- this div will only display when the screen size is below tablet screen size i,e 992px -->

  <div id="tabletandBelow">

    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">

     <!-- Logo -->

     <a href="index.php" class="navbar-brand">

         <img src="images\GUSAC_LOGO_V2.png" alt="loading">

     </a>

     <div class="ml-auto">

      <?php

          

          // validating session variable set or not

          if(isset($_SESSION['email']) && isset($_SESSION['token']))

          {

            // making user logout if user inactive for 20 minutes

            if((time() - $_SESSION['last_login_timestamp']) > 1200){

            ?>

                <script type="text/javascript">

                    alert('Your inactive for 20 minutes');

                    location.href = 'ajax_load/logout.php';

                </script>

            <?php

            }

            else{

            $_SESSION['last_login_timestamp'] = time();  

            ?>

            <div class="d-grid d-md-block ml-auto" id="logregButton">

              <button type="button"  class="dropdown-toggle" data-toggle="dropdown" >

                  <i class="far fa-user-circle fa-lg" ></i>

              </button>

        

              <div class="dropdown-menu dropdown-menu-right text-center">

                <h5 class="font1"><?php echo $_SESSION['full_name'];?></h5>

                  <a href="profilepage.php" class="font1">Profile</a>

                  <div class="dropdown-divider"></div>

                  <a  href="ajax_load/logout.php" class="font1">Logout</a>

              </div>

           </div> 

         <?php 

            }

          }

      ?>

     </div>

                   <!-- Nav Button -->

        <?php 

          if(!(isset($_SESSION['email']) && isset($_SESSION['token'])))

          {

        ?>      

              <div class="d-grid gap-2 d-md-block mr-2">

                <a href="login.php"> <button type="button" class="orange-pill font5">Login</button></a>

              </div>

        <?php 

          }

        ?>  

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

     </button>



     <!-- Nav Links -->



      <div class="collapse navbar-collapse" id="navbarToggleExternalContent">

        <ul class="nav navbar-nav font1">

          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>

          <li class="nav-item"><a class="nav-link" href="index.php#eventHome">Events</a></li>

          <li class="nav-item"><a class="nav-link" href="projects_display.php">Projects</a></li>

          <li class="nav-item"><a class="nav-link" href="index.php#teams">Teams</a></li>

        </ul>    

      </div>

    </nav>

  </div>

  <!-- End of Navbar tabletandbelow id -->



  <!-- this div will only display when the screen size is above tablet screen size i,e 992px -->

  <div id="tabletandAbove">

    <nav class="navbar navbar-expand-lg fixed-top">

     <!-- Logo -->

     <a href="index.php" class="navbar-brand">

         <img src="images\GUSAC_LOGO_V2.png" alt="loading">

     </a>



     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

     </button>

     <!-- Nav Links -->



      <div class="collapse navbar-collapse" id="navbarToggleExternalContent">

        <ul class="nav navbar-nav font1">

          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>

          <li class="nav-item"><a class="nav-link" href="index.php#eventHome">Events</a></li>

          <li class="nav-item"><a class="nav-link" href="projects_display.php">Projects</a></li>

          <li class="nav-item"><a class="nav-link" href="index.php#teams">Teams</a></li>

        </ul>

        <!-- Nav Button -->

        <?php

          if(isset($_SESSION['email']) && isset($_SESSION['token']))

          {

          ?>

            <div class="d-grid d-md-block ml-auto" id="logregButton">

              <button type="button"  class="dropdown-toggle" data-toggle="dropdown" >

                  <i class="far fa-user-circle fa-lg" ></i>

              </button>

        

              <div class="dropdown-menu dropdown-menu-right text-center">

                <h5 class="font1"><?php echo $_SESSION['full_name']; ?></h5>

                  <a href="profilepage.php" class="font1">Profile</a>

                  <div class="dropdown-divider"></div>

                  <a  href="ajax_load/logout.php" class="font1">Logout</a>

              </div>

           </div> 

          <?php 

          }

      ?>

        <?php 

          if(!(isset($_SESSION['email']) && isset($_SESSION['token'])))

          {

        ?>      

              <div class="d-grid gap-2 d-md-block ml-auto">

                <a href="login.php"><button class="orange-pill font5">Login</button></a>

              </div>

        <?php 

          }

        ?>      

      </div>

    </nav>

  </div>

  <!-- End of Navbar tabletandAbove id -->

</section>

   

