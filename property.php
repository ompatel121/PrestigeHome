<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Property</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" disabled href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/rangeslider.js-2.3.0/rangeslider.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/property.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/property_responsive.css">
	<style type="text/css">
		iframe{ width: 100%; }
	</style>
</head>
<body>
<?php
$select = mysqli_query($con, "select * from properties where id='".$_GET['id']."'");
$r = mysqli_fetch_assoc($select);
?>
<div class="super_container">

	<!-- Header -->
	<?php include("includes/header.php"); ?>
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="assets/images/properties.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="home_title"><?php echo $r['title']; ?></div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><?php echo $r['title']; ?></li>
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

	<!-- Intro -->
	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="intro_content d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="intro_title_container">
							<div class="intro_title"><?php echo $r['title']; ?></div>
							<div class="intro_tags">
								<ul>
									<li><b style="color: navy">Location : </b></li>
									<li>
									<?php
									$d = mysqli_fetch_assoc(mysqli_query($con, "select * from districts where id='".$r['district']."'"));
									echo @$d['district_name'].' ,';
									?>
									</li>
									<li>
									<?php
									$c = mysqli_fetch_assoc(mysqli_query($con, "select * from cities where id='".$r['city']."'"));
									echo @$c['city_name'];
									?>
									</li>
								</ul>
							</div>
						</div>
						<div class="intro_price_container ml-lg-auto d-flex flex-column align-items-start justify-content-center">
							<div>For Sale</div>
							<div class="intro_price">&#8377;<?php echo $r['price']; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="intro_slider_container">

			<!-- Intro Slider -->
			<div class="owl-carousel owl-theme intro_slider">
				<!-- Slide -->
				<?php foreach(explode(",",$r['gallery']) as $value){ ?>
					<div class="owl-item"><img src="images/property/<?php echo $r['folder'].'/'.$value; ?>" alt=""></div>
				<?php } ?>
			</div>

			<!-- Intro Slider Nav -->
			<div class="intro_slider_nav_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="intro_slider_nav_content d-flex flex-row align-items-start justify-content-end">
								<div class="intro_slider_nav intro_slider_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
								<div class="intro_slider_nav intro_slider_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Property -->
	<div class="property">
		<div class="container">
			<div class="row">
				<div class="col-md-12" id="error"></div>
				<!-- Form Details -->
				<div class="col-md-6 mx-auto" id="form-detail">
					<div class="sidebar_search pb-3">
						<div class="sidebar_search_title">Enter Details</div>
							<div class="sidebar_search_form_container">
								<form action="#" class="sidebar_search_form" id="sidebar_search_form">
									<div class="form-group">
										<input type="text" id="name" class="form-control py-2 mb-3" placeholder="Enter Name" required>
									</div>
									<div class="form-group">
										<input type="text" id="mobile" class="form-control py-2 mb-3" placeholder="Mobile Number" required>
									</div>
									<div class="form-group">
										<input type="email" id="email" class="form-control py-2 mb-3" placeholder="Email Address" required>
									</div>
									<div class="form-group text-center">
										<button type="button" id="client-detail" class="btn btn-primary px-5">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!-- SMS OTP -->
				<!-- <div class="col-md-6 mx-auto">
					<div class="sidebar_search pb-3">
						<div class="sidebar_search_title">Enter OTP</div>
							<div class="sidebar_search_form_container">
								<form action="#" class="sidebar_search_form" id="sidebar_search_form">
									<div class="form-group">
										<input type="text" class="form-control py-2 mb-3" placeholder="Enter OTP Number">
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control py-2 mb-3" placeholder="Mobile Number">
									</div>
									<div class="form-group text-right">
										<label><a href="#">Resend OTP</a></label>
									</div>
									<div class="form-group text-center">
										<button class="btn btn-primary px-5">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> -->

				<!-- Property Content -->
				<div class="col-md-12 d-none" id="property-content">
					<div class="property_content">

						<div class="property_icons">
							<div class="property_title">Facilities</div>
							<div class="property_rooms d-flex flex-sm-row flex-column align-items-start justify-content-start">

								<!-- Property Room Item -->
								<div class="property_room">
									<div class="property_room_title">Bedrooms</div>
									<div class="property_room_content d-flex flex-row align-items-center justify-content-start">
										<div class="room_icon"><img src="assets/images/room_1.png" alt=""></div>
										<div class="room_num"><?php echo $r['bedroom']; ?></div>
									</div>
								</div>

								<!-- Property Room Item -->
								<div class="property_room">
									<div class="property_room_title">Bathrooms</div>
									<div class="property_room_content d-flex flex-row align-items-center justify-content-start">
										<div class="room_icon"><img src="assets/images/room_2.png" alt=""></div>
										<div class="room_num"><?php echo $r['bathroom']; ?></div>
									</div>
								</div>

								<!-- Property Room Item -->
								<div class="property_room">
									<div class="property_room_title">Area</div>
									<div class="property_room_content d-flex flex-row align-items-center justify-content-start">
										<div class="room_icon"><img src="assets/images/room_3.png" alt=""></div>
										<div class="room_num"><?php echo $r['area']; ?> Sq Ft</div>
									</div>
								</div>

								<!-- Property Room Item -->
								<div class="property_room">
									<div class="property_room_title">Patio</div>
									<div class="property_room_content d-flex flex-row align-items-center justify-content-start">
										<div class="room_icon"><img src="assets/images/room_4.png" alt=""></div>
										<div class="room_num">1</div>
									</div>
								</div>

								<!-- Property Room Item -->
								<div class="property_room">
									<div class="property_room_title">Garage</div>
									<div class="property_room_content d-flex flex-row align-items-center justify-content-start">
										<div class="room_icon"><img src="assets/images/room_5.png" alt=""></div>
										<div class="room_num">2</div>
									</div>
								</div>

							</div>
						</div>

						<!-- Description -->
						<div class="property_description">
							<div class="property_title">Description</div>
							<div class="property_text property_text_2">
								<?php echo $r['content']; ?>
							</div>
						</div>

						<!-- Additional Details -->
						<div class="additional_details">
							<div class="property_title">Other Facilities</div>
							<div class="details_container">
								<ul>
									<?php
									foreach (explode(',', $r['facility']) as $value) 
									{ 
										$facility = mysqli_fetch_assoc(mysqli_query($con, "Select facility from facilities where id='$value'"));
										echo '<li><i class="fa fa-arrow-right mr-2"></i>'.$facility['facility'].'</li>';
									} 
									?>
								</ul>
							</div>
						</div>

						<!-- Property On Map -->

						<div class="property_map mt-5">
							<div class="property_title">Property on map</div>
							<div class="property_map_container">

								<!-- Google Map -->
								<div id="google_map" class="google_map">
									<div class="map_container">
										<div id="map"><?php echo $r['map']; ?></div>
									</div>
								</div>

							</div>
						</div>
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
<script src="assets/plugins/greensock/TweenMax.min.js"></script>
<script src="assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="assets/plugins/easing/easing.js"></script>
<script src="assets/plugins/rangeslider.js-2.3.0/rangeslider.min.js"></script>
<script src="assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="assets/js/property.js"></script>
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
$( "#client-detail" ).click(function(){
   	var property = <?php echo $_GET['id']; ?>;
   	var name     = $("#name").val();
   	var mobile   = $("#mobile").val();
   	var email    = $("#email").val();

   	if(property.length==0)
   	{
   		alert("Enter Property");
   	}
   	else if(name.length ==0)
   	{
   		alert("Enter Name")
   	}
   	else if(name.length < 4)
   	{
   		alert("Enter Valid Name")
   	}
   	else if(mobile.length != 10)
   	{
   		alert("Enter Valid Mobile Number ")
   	}
   	else
   	{
   		$.ajax({
	      	url: "inquiry.php",
	      	type: "POST",
	      	data: { property:property,name:name,email:email,mobile:mobile },
	      	success:function(data,status)
	      	{
	         	$("#error").html(data);
	      	}
	   	});
   	}
});
</script>
</body>
</html>