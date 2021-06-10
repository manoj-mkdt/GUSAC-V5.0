$(document).ready(function () {

  // ? ************** Member REGISTER VALIDATIONS AND  AJAX BY GOURAB ****************

    let member_reg_email_error = true;

    let member_password_error = true;

    let member_cpassword_error = true;

    let member_phone_error = true;

    let member_reg_error = true;

    let member_firstname_error = true;

    let member_lastname_error = true;



    // ************* Email ID Validation *************



    function reg_email_id_validate() {

        let member_reg_email = $('#memberRegister #email').val();

        let pattern_for_email = /^([a-zA-Z0-9_.+-])+\@((gitam)+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (member_reg_email == '') {

            $('#member_reg_emailError').html("**Email should not be Empty!");

            member_reg_email_error = false;

            return false;

        }

        else if ((!pattern_for_email.test(member_reg_email)) || (member_reg_email.indexOf('.in') == -1)) {

            $('#member_reg_emailError').html("**Email is Invalid!");

            member_reg_email_error = false;

            return false;

        }

        else {

            $('#member_reg_emailError').html("");

            member_reg_email_error = true;

        }

    }

    $('#memberRegister #email').on("keyup", function () {

        reg_email_id_validate();

    });

    // ************* End of Email ID Validation *************



    // ************* Password Validation *************

    function member_password_validate() {

        let member_password = $('#memberRegister #password').val();

        let lowercase_pattern = /[a-z]/;

        let uppercase_pattern = /[A-Z]/;

        let number_pattern = /[0-9]/;

        let specialchar_pattern = /[!@#$%^&*()?:]/;

        if (member_password == '') {

            $('#member_passwordError').html("**Password should not be Empty!");

            member_password_error = false;

            return false;

        }

        else if (member_password.length < 6) {

            $('#member_passwordError').html("**Password should be at least of 6 digits");

            member_password_error = false;

            return false;

        }

        else if (!lowercase_pattern.test(member_password)) {

            $('#member_passwordError').html("**Password should contain at least one small letter");

            member_password_error = false;

            return false;

        }

        else if (!uppercase_pattern.test(member_password)) {

            $('#member_passwordError').html("**Password should contain at least one capital letter");

            member_password_error = false;

            return false;

        }

        else if (!number_pattern.test(member_password)) {

            $('#member_passwordError').html("**Password should contain at least one number");

            member_password_error = false;

            return false;

        }

        else if (!specialchar_pattern.test(member_password)) {

            $('#member_passwordError').html("**Password should contain at least one spcial Character");

            member_password_error = false;

            return false;

        }

        else {

            $('#member_passwordError').html("");

            member_password_error = true;

        }

    }

    $('#memberRegister #password').on("keyup", function () {

        member_password_validate();

    });

    // ************* End of Password Validation *************





    // ************* Confirm Password Validation *************

    function confirm_password_validate() {

        let member_password = $('#memberRegister #password').val();

        let confirmpassword = $('#memberRegister #confirmPassword').val();



        if (confirmpassword == '') {

            $('#confirmpasswordError').html("**Confirm Password should not be Empty!");

            member_cpassword_error = false;

            return false;

        }

        else if (confirmpassword != member_password) {

            $('#confirmpasswordError').html("**Passwords are not matching");

            member_cpassword_error = false;

            return false;

        }

        else {

            $('#confirmpasswordError').html("Password Matched");

            member_cpassword_error = true;

        }

    }





    $('#memberRegister #confirmPassword').on("keyup", function () {

        confirm_password_validate();

    });

    // ************* End of Confirm Password Validation *************



    // ************* Member Phone Number Validation *************

    function phone_num_validate() {

        let pattern_for_phone = /^[0-9]+$/;

        let number_right = $('#memberRegister #mpnumber').val();



        if (number_right == '') {

            $('#number_rightError').html("**Phone Number should not be Empty!");

            member_phone_error = false;

            return false;

        }

        else if (!pattern_for_phone.test(number_right)) {

            $('#number_rightError').html("**Only Numbers are allowed in Phone Number!");

            member_phone_error = false;

            return false;

        }

        else if (number_right.length != 10) {

            $('#number_rightError').html("**Phone Number should be of 10 digits!");

            member_phone_error = false;

            return false;

        }

        else {

            $('#number_rightError').html("");

            member_phone_error = true;

        }

    }

    $('#memberRegister #mpnumber').on('keyup', function () {

        phone_num_validate();

    });

    // ************* End of Member Phone Number Validation *************



    // ************* Member Register number Validation *************

    function reg_num_validate() {

        let pattern_for_reg = /^[0-9]+$/;

        let reg_no = $('#memberRegister #mrNum').val();



        if (reg_no == '') {

            $('#reg_noError').html("**Registration Number should not be Empty!");

            member_reg_error = false;

            return false;

        }

        else if (!pattern_for_reg.test(reg_no)) {

            $('#reg_noError').html("**Only Numbers are allowed in Registration Number!");

            member_reg_error = false;

            return false;

        }

        else if (reg_no.length != 12) {

            $('#reg_noError').html("**Invalid Reg number");

            member_reg_error = false;

            return false;

        }

        else {

            $('#reg_noError').html("");

            member_reg_error = true;

        }

    }

    $('#memberRegister #mrNum').on('keyup', function () {

        reg_num_validate();

    });

    // ************* Member Register number Validation *************



    // ************* Member First Name Validation *************

    function member_first_name_validate() {

        let pattern_for_sfname = /^[A-Za-z]+$/;

        let member_firstname = $('#memberRegister #fName').val();



        if (member_firstname == '') {

            $('#member_firstnameError').html("**First Name should not be Empty!");

            member_firstname_error = false;

            return false;

        }

        else if (!pattern_for_sfname.test(member_firstname)) {

            $('#member_firstnameError').html("**Only Letters are allowed in First Name!");

            member_firstname_error = false;

            return false;

        }

        else if (member_firstname.length > 30) {

            $('#member_firstnameError').html("**First Name should not be greater than 30 characters!");

            member_firstname_error = false;

            return false;

        }

        else {

            $('#member_firstnameError').html("");

            member_firstname_error = true;

        }

    }



    $('#memberRegister #fName').on("keyup", function () {

        member_first_name_validate();

    });



    // ************* End of Member First Name Validation *************



    // ************* Member Last Name Validation *************

    function member_last_name_validate() {

        let pattern_for_slname = /^[A-Za-z]+$/;

        let member_lastname = $('#memberRegister #lName').val();



        if (member_lastname == '') {

            $('#member_lastnameError').html("**Last Name should not be Empty!");

            member_lastname_error = false;

            return false;

        }

        else if (!pattern_for_slname.test(member_lastname)) {

            $('#member_lastnameError').html("**Only Letters are allowed in Last Name!");

            member_lastname_error = false;

            return false;

        }

        else if (member_lastname.length > 30) {

            $('#member_lastnameError').html("**Last Name should not be greater than 30 characters!");

            member_lastname_error = false;

            return false;

        }

        else {

            $('#member_lastnameError').html("");

            member_lastname_error = true;

        }

    }



    $('#memberRegister #lName').on("keyup", function () {

        member_last_name_validate();

    });



    function demo(){

      console.log("Demo");

    }

  // ************* Member Last Name Validation *************



  $('#recruit_submit').click(function (e) {

    e.preventDefault();



    var formData = new Object();



    formData.firstname = $('#team_recruit #fname').val();

    formData.lastname = $('#team_recruit #lname').val();

    formData.reg = $('#team_recruit #rnum').val();

    formData.team = $('#team_recruit #teamSelect').find(":selected").text();

    formData.skills = $('#team_recruit #skills').val();

    formData.work_link = $('#team_recruit #work_link').val();

    formData.why_join = $('#team_recruit #whyHire').val();



    $.ajax({

      url: "ajax_load/teamRegister_upload.php",

      method: "POST",

      data: formData,

      success: function (teamData) {

        if(teamData == "success") {

          alert('Registered Succesfully..!! We will contact you soon');

          location.href = 'index.php';

        }

        else if(teamData == "failed") {

          alert("Unknow Error Occured! Please try again later");

        }

        else if(teamData === 'mandate') {

          alert("Please enter all mandatory fileds.");

        }
        else if (teamData.trim() == "user_approved") {
          alert("team already approved");
        }

        else {

          console.log(teamData);

          console.log(teamData == "success");

        }

      }, error: function () {

        alert("Ajax error Occured");

      }

    });

  });



    // Member Register Ajax

$('#mRegister').on('click', function(e) {

  e.preventDefault();

  var formData = new Object();

  formData.formName= "mReg";



  formData.fName = $('#fName').val();

  formData.lName = $('#lName').val();

  formData.mrNum = $('#mrNum').val();

  formData.stream = $('#stream').val();

  formData.branch = $('#branch').find(":selected").text();
  
  formData.yop = $('#yop').find(":selected").text();

  formData.code = $('#code').val();

  formData.mpnumber = $('#mpnumber').val();

  formData.email = $('#email').val();

  formData.password = $('#password').val();

  formData.confirmPassword = $('#confirmPassword').val();



  if(formData.fName!="" && formData.lName!="" && formData.mrNum!="" && formData.stream!="" && formData.branch!=""

  && formData.yop!="" && formData.code!="" && formData.mpnumber!="" && formData.email!="" && formData.password!="" && formData.confirmPassword !=""){
    if (member_reg_email_error == true && member_password_error == true &&  member_cpassword_error == true &&
     member_phone_error == true && member_reg_error == true && member_firstname_error == true && member_lastname_error == true){


    $.ajax({

      url: "ajax_load/memberRegistration_upload.php",

      type: "POST",

      data: formData,

      cache: false,

      success: function(dataResult){

        if(dataResult == "success"){

          // $("#mRegister").removeAttr("disabled");

          // $('#memberForm').find('input:text').val('');

          // $("#msuccess").show();

          // $('#msuccess').html('Data added successfully !');

           $('#memberForm')[0].reset();

          alert('Register successfully! Please Login to continue');

          location.href = 'login.php';



        }

        else if(dataResult == "failed"){

          $('#memberForm')[0].reset();

            alert("Error occured! Try Again");

        }

        else if(dataResult == "user"){

          // alert('Member exist! Please Login');

           $('#memberForm')[0].reset();

          $("#msuccess").show();

          $('#msuccess').html('Member exist! Please Login <a href="login.php">Click Here</a>').css("background-color", "#f8d7da","color", "#721c24;");

        } else {

          console.log(dataResult);

        }

      }

    });
    }
  else{
    alert('Entry valid details');
  }

  }

  else{

    $('#memberForm')[0].reset();

    $("#msuccess").show();

    $('#msuccess').html('Please fill all the fields').css("background-color", "#f8d7da","color", "#721c24;");

  }

});





//Login Form

$('#login_form').on('submit', function(e){

  e.preventDefault();

  $.ajax({

    type:"POST",

    url: "ajax_load/login_validate.php",

    data: new FormData(this),

    contentType: false,

    cache: false,

    processData:false,

    success:function(dataResult){

      if (dataResult == "Successfull"){

        alert('Logged in successfully');

        window.location = "profilepage.php";

      }
      else if (dataResult.trim() == "user_blocked"){

        alert('Admin blocked User');

      }

      else if(dataResult == "user_does_not_exist"){

        $("#msuccess").show();

        $('#msuccess').html('User does not exist!! Register to Continue <a href="memberRegister.php">Click Here</a>');

      }

      else if(dataResult=="VerifyDetails"){

        $("#msuccess").show();

        $('#msuccess').html('Verify email and password & Try Again!!');

      }

      else{

        console.log(dataResult);

      }

    }



  });

});





// ContactUs



$('#contactUs').on('submit', function(e) {

  e.preventDefault();



  $.ajax({

          type: 'POST',

          url: 'ajax_load/contactUs_upload.php',

          data: new FormData(this),

          contentType: false,

          cache: false,

          processData:false,

    success: function(dataResult){

      if(dataResult == "success"){

          $("#mailmodal").modal("toggle");

          $('#modelMessage').html('Hey Thanks for reaching us...!!! will get in touch soon :)');

        }

        else if(dataResult == "failed"){

            alert("Error occured! Try Again");

        }

        else if(dataResult == "fill form"){

          $("#mailmodal").modal("toggle");

          $('#modelMessage').html('Fill the details to continue!!');





        }

        else if(dataResult=="emailfailed"){

          alert("Error occured! in email Try Again");

        }

        else{

          console.log(dataResult);

        }

    }



  });

});



// End of ContactUs



 // Updating profile form   

  $('#profilePage #profilePageSave').on('click',function(){

    var profileData = new Object();

    

    profileData.firstname = $('#profilePage #first_Name').val();

    profileData.lastname = $('#profilePage #last_Name').val();

    profileData.stream = $('#profilePage #stream').val();

    profileData.branch = $('#profilePage #branch').val();

    profileData.yop = $('#profilePage #yop').val();

    profileData.code = $('#profilePage #code').val();

    profileData.mpnumber = $('#profilePage #mpnumber').val();

    profileData.email = $('#profilePage #email').val();

    if(profileData.firstname!="" && profileData.lastname!="" && profileData.stream!="" && profileData.branch!="" 

    && profileData.yop!="" && profileData.code!="" && profileData.mpnumber!="" && profileData.email!=""){

    $.ajax({

        url: "ajax_load/profilepage_update.php",

        type: "POST",

        data: profileData,

        cache: false,

        success: function(dataResult){

          if(dataResult.trim()=="success"){

            alert('Data updated successfully !');
            window.location = "profilepage.php";                         

          }

          else if(dataResult.trim() == "failed"){

            alert("Error occured! Try Again");

          }

          else{
            
            console.log(dataResult);

          }

          

        }

      });

    }

    else{

      alert('Please fill all the field !');

    }

  });


// Change password profilepage

  $('#profilePage #change_pwd_save').on('click',function(){

      // alert('con');
      var pwdChange = new Object();

      pwdChange.old_pwd = $('#profilePage #old_pwd').val();

      pwdChange.new_pwd = $('#profilePage #new_pwd').val();

      pwdChange.confirm_new_pwd = $('#profilePage #confirm_new_pwd').val();

      if( pwdChange.old_pwd!= "" &&  pwdChange.new_pwd!="" &&  pwdChange.confirm_new_pwd!=""){

        if(pwdChange.new_pwd == pwdChange.confirm_new_pwd ){
          $('#profilePage #notMatching').hide();
          // alert('same');
          $.ajax({
              url: "ajax_load/change_pwd.php",
              type: "POST",
              data: pwdChange,
              success: function(dataResult){
                if(dataResult.trim()=="success"){
                  alert('Password updated successfully !'); 
                  window.location = "ajax_load/logout.php";            
                }
                else if(dataResult.trim() == "error_occured"){
                  alert("Error occured! Try Again");
                }
                else if(dataResult.trim() == "pwd_dntMatch"){
                  alert('Old Password incorrect');
                }
                else{ 
                  console.log(dataResult);
                }
              }

            });
        }
        else{
          $('#profilePage #notMatching').show();
          $('#profilePage #notMatching').html("Password Not Matching").css('color','red');
        }

      }
      else{
        alert('Fill the details');
      }

  });


    // Upadting profile Pic

    $('#profilePicSave').on('submit', function(e) {

      e.preventDefault();

        $.ajax({

          type: 'POST',

          url: 'ajax_load/profilePic_upload.php',

          data: new FormData(this),

          contentType: false,

          cache: false,

          processData: false,

          success: function (dataResult) {

            if (dataResult == "success") {

              alert("Profile picture updated");

              location.reload();

            }

            else if (dataResult == "Try_Again!!!") {

              alert("Try Again!!!");

            }

            else if (dataResult == "Error_file_Type") {

              alert("File Type miss match!!");

            }

            else {

              console.log(dataResult);

            }

          }

        });

    });

 // Profile Pic uploading Js starts

    var image = document.getElementById('profile_pic_image');  
    profile_modal=$('#profile_pic_modal');  

      var readURL = function(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
             profile_modal.modal('show');
             url=e.target.result;
             image.src = url;
             readURL(reader.result);
             // alert(url);
            
            }
            reader.readAsDataURL(input.files[0]);
          }
      }
    

    profile_modal.on('shown.bs.modal', function() {
    cropper = new Cropper(image, {
      aspectRatio: 1,
      viewMode: 3,
      preview:'.profile_pic_preview'
    });
    }).on('hidden.bs.modal', function(){
      cropper.destroy();
        cropper = null;
    });

    $('#profile_pic_crop').click(function(){
    canvas = cropper.getCroppedCanvas({
      width:250,
      height:250
    });

    canvas.toBlob(function(blob){
      url = URL.createObjectURL(blob);
      var reader = new FileReader();
      reader.readAsDataURL(blob);
      reader.onloadend = function(){
        var base64data = reader.result;
        // alert(base64data);
        $.ajax({
          url:'ajax_load/profilePic_upload.php',
          method:'POST',
          data:{image:base64data},
          success:function(data)
          {
            if (data == 'success') {
              profile_modal.modal('hide');
              $('#uploaded_image').attr('src', data);
              alert('Profile Pic Updated!!');
              window.location = "profilepage.php";
            }
            else if(data == 'Try_Again!!!'){
              alert('Try Again!!!');
            }
            else{
              console.log(data);
            }
       
          }
          });
        };
      });
    });

    $(".file-upload").on('change', function(e){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
    // Profile Pic uploading Js ends

});

