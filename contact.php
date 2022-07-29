<?php 
include("includes/config.php"); 
$setting_detail = mysqli_query($con, "select * from setting");
$setting_row = mysqli_fetch_assoc($setting_detail);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Us</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/rangeslider.js-2.3.0/rangeslider.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/contact.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/contact_responsive.css">
	<style type="text/css">
		iframe{ width: 100%; }
	</style>
</head>
<body>
<div class="super_container">

	<!-- Header -->
	<?php include("includes/header.php"); ?>
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="assets/images/contact.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="home_title">Contact Us</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li>Contact</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Home Search -->
	<?php include("includes/search.php"); ?>

	<!-- Contact -->
	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Info -->
				<div class="col-lg-4">
					<div class="contact_info">
						<div class="section_title">Get in touch with us</div>
						<div class="contact_info_text">
							<p><?php echo $setting_row['contact_page_desc']; ?></p>
						</div>
						<div class="contact_info_content">
							<ul class="contact_info_list">
								<li>
									<div>Address:</div>
									<div><?php echo $setting_row['contact_page_addr']; ?></div>
								</li>
								<li>
									<div>Phone:</div>
									<div><?php echo $setting_row['contact_page_mobile1']; ?><br><?php echo $setting_row['contact_page_mobile2']; ?></div>
								</li>
								<li>
									<div>Email:</div>
									<div><?php echo $setting_row['contact_page_email']; ?></div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-8">
					<div class="contact_form_container">
						<form action="#" class="contact_form" id="contact_form">
							<div id="error"></div>
							<div class="row">
								<div class="col-lg-6 contact_name_col">
									<input type="text" class="contact_input" placeholder="Name" id="name" required="required">
								</div>
								<div class="col-lg-6">
									<input type="email" class="contact_input" placeholder="E-mail" id="email" required="required">
								</div>
							</div>
							<div><input type="text" class="contact_input" placeholder="Subject" id="subject"></div>
							<div><textarea class="contact_textarea contact_input" placeholder="Message" id="message" required="required"></textarea></div>
							<button class="contact_button button" type="button" id="contact-now">send</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Map -->
	<div class="contact_map">
		<!-- Google Map -->
		<div class="map">
			<div id="google_map" class="google_map">
				<div class="map_container">
					<div id="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17985.677895673194!2d72.9109252862333!3d22.525469634039528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e4d94bab7f247%3A0xdb7cc1e947117cd7!2sNew%20Vallabh%20Vidyanagar%2C%20GIDC%2C%20Anand%2C%20Gujarat!5e1!3m2!1sen!2sin!4v1640506724454!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php include("includes/footer.php"); ?>
</div>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/styles/bootstrap4/popper.js"></script>
<script src="assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="assets/plugins/easing/easing.js"></script>
<script src="assets/plugins/rangeslider.js-2.3.0/rangeslider.min.js"></script>
<script src="assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="assets/js/contact.js"></script>
<script>
$('#district').on('change', function() {
	var name = this.value;
	$.ajax({
        url: "select-city.php",
        type: "post",
        data:{ name:name },
        success: function(data) {
            $("#city").html(data);
        },
    })
});
</script>
<script type="text/javascript">
$("#contact-now").click(function(){

    var name    = $("#name").val();
    var email   = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();
    email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

    if(name==""){
        alert("Please Enter Name");
    }
    else if(email==""){
        alert("Please Enter Email Address");
    }
    else if(!email_regex.test(email)){
        alert("Please Enter Valid Email Address");
    }
    else if(subject==""){
        alert("Please Enter Subject");
    }
    else if(message==""){
        alert("Please Enter Message");
    }
    else{
        $.ajax({
            url: "mail.php",
            type: "post",
            data:{name:name,email:email,subject:subject,message:message},
            success: function(data) {
                $("#error").html(data);
            },
        })
    }
});
</script>
</body>
</html>