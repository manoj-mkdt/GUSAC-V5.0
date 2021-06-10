<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>

    </title>
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

  </head>
<body>
<!-- Start of Navbar -->
<section id="navbar">
  <!-- this div will only display when the screen size is below tablet screen size i,e 992px -->
  <div id="tabletandBelow">
    <nav class="navbar navbar-light  navbar-expand-lg">
     <!-- Logo -->
     <a href="index.php" class="navbar-brand">
         <img src="images\GUSAC_LOGO_V2.png" alt="loading">
     </a>
     <div class="ml-auto">
       <?php
          
          // validating session variable set or not
          if(isset($_SESSION['email']) && isset($_SESSION['token']))
          {
          ?>
            <div class="d-grid d-md-block ml-auto" id="logregButton">
              <button type="button"  class="dropdown-toggle" data-toggle="dropdown" >
                  <i class="far fa-user-circle fa-lg" ></i>
              </button>
        
              <div class="dropdown-menu dropdown-menu-right">
                <h5 class="px-4"><?php echo $_SESSION['full_name']; ?></h5>
                <a href="profilepage.php"><button class="dropdown-item" type="button">Profile</button></a>
                <div class="dropdown-divider"></div>
                <a href="ajax_load/logout.php"><button class="dropdown-item" type="button">Logout</button></a>
              </div>
           </div> 
          <?php 
          }
      ?>
     </div>
     
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
     </button>
     <!-- Nav Links -->

      <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
        <ul class="nav navbar-nav ">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="event.php">Events</a></li>
          <li class="nav-item"><a class="nav-link" href="project.php">Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Teams</a></li>
        </ul>
        <!-- Nav Button -->
        <?php 
          if(!(isset($_SESSION['email']) && isset($_SESSION['token'])))
          {
        ?>      
              <div class="d-grid gap-2 d-md-block ml-auto">
                <a href="login.php"><button class="btn btn-outline-primary">Login</button></a>
                <a href="memberRegister.php"><button class="btn btn-outline-primary">Register</button></a>
              </div>
        <?php 
          }
        ?>      
      </div>
    </nav>
  </div>
  <!-- End of Navbar tabletandbelow id -->

  <!-- this div will only display when the screen size is above tablet screen size i,e 992px -->
  <div id="tabletandAbove">
    <nav class="navbar navbar-light  navbar-expand-lg">
     <!-- Logo -->
     <a href="index.php" class="navbar-brand">
         <img src="images\GUSAC_LOGO_V2.png" alt="loading">
     </a>

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
     </button>
     <!-- Nav Links -->

      <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
        <ul class="nav navbar-nav ">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="event.php">Events</a></li>
          <li class="nav-item"><a class="nav-link" href="project.php">Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Teams</a></li>
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
        
              <div class="dropdown-menu dropdown-menu-right">
                <h5 class="dropdown-item" style=""><?php echo $_SESSION['full_name']; ?></h5>
                <a class="dropdown-item" href="profilepage.php">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="ajax_load/logout.php">Logout</a>
                  
                  <!-- <a href="profilepage.php"><button type="button">Profile</button></a>
                  <div class="dropdown-divider"></div>
                  <a href="ajax_load/logout.php"><button class="dropdown-item" type="button">Logout</button></a> -->
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
                <a href="login.php"><button class="btn btn-outline-primary">Login</button></a>
                <a href="memberRegister.php"><button class="btn btn-outline-primary">Register</button></a>
              </div>
        <?php 
          }
        ?>      
      </div>
    </nav>
  </div>
  <!-- End of Navbar tabletandAbove id -->
</section>
   
