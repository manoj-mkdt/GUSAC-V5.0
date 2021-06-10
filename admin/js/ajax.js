$(document).ready(function () {

	$('#certificateButton').on('click', function(e){

    e.preventDefault();

    var certificate = new Object();



    certificate.certificate_no = $('#certificate_no').val();

    certificate.name = $('#name').val();

    certificate.organization = $('#organization').val();

    certificate.event = $('#event').val();

    certificate.issuedFor = $('#issuedFor').val();

    certificate.issuedBy = $('#issuedBy').val();

    if(certificate.certificate_no!="" && certificate.name!="" && certificate.organization!="" &&  certificate.event!="" && certificate.issuedFor!="" && certificate.issuedBy!="")

    { 

      $.ajax({

              type: 'POST',

              url: 'ajax_load/certificate_upload.php',

              data: certificate,

              cache: false,

              

              success: function(dataResult){

                           if(dataResult=="successfully"){

                            document.getElementById("certificateForm").reset();

                              location.reload();

                           }

                           else if(dataResult=="certificate_exist"){

                            alert("Certificate already Exist");

                           }

                           else if(dataResult=="failed"){

                            document.getElementById("certificateForm").reset();

                            alert("Error occured!!! Try Again");

                           }

                           else{

                              console.log(dataResult);

                           }

              }

     });

     }

     else{

       alert("Please Complete the fields");

     }

   });

});









