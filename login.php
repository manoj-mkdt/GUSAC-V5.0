<!-- Start of header -->



<?php



include 'header.php';



?>



<!-- End of header -->







<!-- Start of Login -->



<section id="login_box">



  <div class="border rounded col-md-4 mx-auto main">







    <form id="login_form">



      <h1 class="text-center my-3 font1">LOGIN</h1>



      <div class="col-md-12 col-sm-12 text-center alert alert-danger alert-dismissible" id="msuccess" style="display:none;">



        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>



      </div>



      <div class="my-3">



        <label for="SL_email" class="form-label font5">Email address</label>



        <input type="email" class="form-control font2" id="login_email" name="login_email" aria-describedby="SLemailHelp" placeholder="Email" required>



        <small id="SLemailHelp" class="form-text font2">Enter @GITAM Mail ID.</small>



      </div>



      <div class="mb-3">



        <label for="SL_password" class="form-label font5">Password</label>



        <input type="password" class="form-control font2" id="login_password" name="login_password" placeholder="Password" required>



      </div>



      <div class="mb-3 text-center">



         <input type="submit" class="yellow-pill font5" id="loginButton" value="Login"/><br>

         <!-- <button type="button" class="orange-pill">Login</button> -->



          <div class="d-flex flex-row">

             <a href="#" data-toggle="modal" data-target="#forgotPmodal" class="font5">Forgot Password?</a>

             <a href="memberRegister.php" class="ml-auto font5">New here? Register Now!</a>

          </div>   



      </div>



    </form>



  </div>



</section>



<!-- End of Login -->







<!----start of Forgot modal--->



<div class="modal fade" id="forgotPmodal" tabindex="-1" aria-labelledby="forgotPmodalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">



  <div class="modal-dialog">



    <div class="modal-content">



      <div class="modal-header">



        <h5 class="modal-title font1" id="forgotPmodalLabel" style="color:black;">Forgot Password</h5>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close">



          <span aria-hidden="true">&times;</span>



        </button>



      </div>



      <div class="modal-body">



        <div class="form-group">



          <label for="InputEmail1" class="font5">Email address</label>



          <input type="text" name="email" class="form-control font2" placeholder="" required>



        </div>



      </div>



      <div class="modal-footer">



        <a href="#" data-toggle="modal" class="yellow-regular font5" data-target="#mailmodal" data-dismiss="modal">Submit</a>



      </div>



    </div>



  </div>



</div>



<!---END OF FORGOT MODAL--->



<!--CONFIRM Modal Start -->



	<div class="modal fade" id="mailmodal" tabindex="-1" aria-labelledby="mailmodalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">



	  <div class="modal-dialog">



	    <div class="modal-content">



	           <div class="modal-body font2">



	              Hey our team will get in touch soon!!! <br>



	              <a href="#" data-toggle="modal" class="yellow-regular mt-4 font5" data-target="#mailmodal" data-dismiss="modal">Close</a>



	           </div>



	       </div>



	   </div>



	</div>



 <!-- Delete this line and write your code here -->







<!-- Start of footer -->



<?php include 'footer.php'; ?>



<!-- End of footer -->



