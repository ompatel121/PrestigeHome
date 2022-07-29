<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
	<style type="text/css">
		.search_form_select{padding-left: 8px;}
	</style>
</head>
<body>

<div class="super_container">

	<!-- Header -->
	<?php include("includes/header.php"); ?>
	<!-- Home -->

	<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme recent_slider">
				
				<!-- Slide -->
				<?php
               	$select = mysqli_query($con, "select * from sliders");
               	while($row = mysqli_fetch_assoc($select)){
               	?>
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/sliders/<?php echo $row['image']; ?>)"></div>
					<div class="slide_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="slide_content">
										<!--<div class="home_subtitle">super offer</div>-->
										<div class="home_title"><?php echo $row['title']; ?></div>
										<div class="home_details">
											<ul class="home_details_list d-flex flex-row align-items-center justify-content-start">
												<li>
													<div class="home_details_image"><img src="assets/images/icon_1.png" alt=""></div>
													<span> <?php echo $row['ftsq']; ?> Ftsq</span>
												</li>
												<li>
													<div class="home_details_image"><img src="assets/images/icon_2.png" alt=""></div>
													<span> <?php echo $row['bedroom']; ?> Bedrooms</span>
												</li>
												<li>
													<div class="home_details_image"><img src="assets/images/icon_3.png" alt=""></div>
													<span> <?php echo $row['bathroom']; ?> Bathrooms</span>
												</li>
											</ul>
										</div>
										<div class="home_price">&#8377; <?php echo $row['price']; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <?php } ?>

			</div>
		</div>
	</div>

	<!-- Home Search -->
	<?php include("includes/search.php"); ?>

	<!-- Recent -->
	<div class="recent">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title">Recent Properties</div>
					<div class="section_subtitle">Search your dream home</div>
				</div>
			</div>
			<div class="row recent_row">
				<div class="col">
					<div class="recent_slider_container">
						<div class="owl-carousel owl-theme recent_slider">
							
							<!-- Slide -->
							<?php
							$select = mysqli_query($con, "Select * from properties where status='A'");
							while($row = mysqli_fetch_assoc($select)){
							?>
							<div class="owl-item">
								<div class="recent_item">
									<div class="recent_item_inner">
										<div class="recent_item_image">
											<img src="images/property/<?php echo $row['folder'].'/'.$row['image']; ?>" alt="">
										</div>
										<div class="recent_item_body text-center">
											<div class="recent_item_location">Miami</div>
											<div class="recent_item_title"><a href="property.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></div>
											<div class="recent_item_price">	&#8377 <?php echo $row['price']; ?></div>
										</div>
										<div class="recent_item_footer d-flex flex-row align-items-center justify-content-start">
											<div>
												<div class="recent_icon">
													<img src="assets/images/icon_1.png" alt="">
												</div>
												<span><?php echo $row['area']; ?> Ftsq</span>
											</div>
											<div>
												<div class="recent_icon">
													<img src="assets/images/icon_2.png" alt="">
												</div>
												<span><?php echo $row['bedroom']; ?> Bedrooms</span>
											</div>
											<div>
												<div class="recent_icon">
													<img src="assets/images/icon_3.png" alt="">
												</div>
												<span><?php echo $row['bathroom']; ?> Bathrooms</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>

						<div class="recent_slider_nav_container d-flex flex-row align-items-start justify-content-start">
							<div class="recent_slider_nav recent_slider_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
							<div class="recent_slider_nav recent_slider_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
						</div>
					</div>
					<div class="button recent_button"><a href="properties.php">see more</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cities -->
	<div class="cities">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title">Find properties in these cities</div>
					<div class="section_subtitle">Search your dream home</div>
				</div>
			</div>
		</div>
		
		<div class="cities_container d-flex flex-row flex-wrap align-items-start justify-content-between">
			<?php
			$select = mysqli_query($con, "Select * from cities where status='A' LIMIT 8");
			while($row = mysqli_fetch_assoc($select)){
			?>
			<div class="city">
				<img src="images/cities/<?php echo $row['city_img']; ?>">
				<div class="city_overlay">
					<a href="properties.php?city=<?php echo $row['id']; ?>" class="d-flex flex-column align-items-center justify-content-center">
						<div class="city_title"><?php echo $row['city_name']; ?></div>
					</a>	
				</div>
			</div>
			<?php } ?>
			
		</div>
	</div>

	<!-- Testimonials -->
	<div class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title">What our clients say</div>
					<div class="section_subtitle">Search your dream home</div>
				</div>
			</div>
			<div class="row testimonials_row">
				
				<!-- Testimonial Item -->
				<?php
				$select = mysqli_query($con, "Select * from our_clients");
				while($row = mysqli_fetch_assoc($select)){
				?>
				<div class="col-lg-4 testimonial_col">
					<div class="testimonial">
						<div class="testimonial_title text-center"><?php echo $row['title']; ?></div>
						<div class="testimonial_text text-justify"><?php echo $row['short_desc']; ?></div>
						<div class="testimonial_author_image mx-auto"><img src="assets/images/<?php echo $row['image']; ?>" alt=""></div>
						<div class="testimonial_author text-center"><span class="text-primary"><?php echo $row['name']; ?></span></div>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php include("includes/footer.php"); ?>
</div>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/styles/bootstrap4/popper.js"></script>
<script src="assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="assets/plugins/easing/easing.js"></script>
<script src="assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="assets/js/custom.js"></script>
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
</body>
</html>