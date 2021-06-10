<!-- Start of header -->
<?php include 'header.php'; ?>
<!-- End of header -->

<!-- Start of body -->
<section id="contact_page">
    <div class="container border rounded main">
                <div class="text-center my-3">
                    <h1 class="font4">CONTACT US</h1>
                    <p class="font2">Feel free to reach out to us. Our team will reply back within 24 hours.</p>
                </div>
                <div class="form-group">
                    <label for="contact_email" class="form-label font5">Email ID</label>
                    <input type="email" class="form-control font6" id="contact_email" placeholder="username@gitam.in">
                </div>
                <div class="form-group">
                    <label for="contact_name" class="form-label font5">Name</label>
                    <input type="Name" class="form-control font6" id="contact_name" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label for="contact_subject" class="form-label font5">Subject</label>
                    <input type="Subject" class="form-control font6" id="contact_subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="contact_message" class="form-label font5">Message</label>
                    <textarea class="form-control font6" id="contact_message" rows="4">Write your message here</textarea>
                </div>
                <div class="form-group text-center">
                <button type="button" class="yellow-regular font5" data-toggle="modal" data-target="#mailmodal" data-dismiss="modal">Submit</button>
                </div>
            </div>
</section>
<!---End --->
<!---Start of close modal--->
<div class="modal fade" id="mailmodal" tabindex="-1" aria-labelledby="mailmodalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body font2">
				 Thanks for reaching out to us! Our team will contact you soon :)
			</div>
			<div class="modal-footer">
			    <a href="#" data-toggle="modal" class="yellow-regular font5" data-target="#mailmodal" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>
<!---End of Contact Us Modal----->
<!-- End of body -->

<!-- Start of footer -->
<?php include 'footer.php'; ?>
<!-- End of footer -->
