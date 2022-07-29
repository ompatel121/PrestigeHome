<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Properties</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/properties.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/properties_responsive.css">
</head>
<body>

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
							<div class="home_title">Properties</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li>Properties</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Home Search -->
	<?php 
	include("includes/search.php"); 
	if(isset($_GET['city'])){
		$select = mysqli_query($con, "Select * from properties where status='A' AND city='".$_GET['city']."'");
	} else {
		$select = mysqli_query($con, "Select * from properties where status='A'");
	}
	?>
	<!-- Properties -->
	<div class="properties">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title">
						<?php echo mysqli_num_rows($select); ?> 
						Properties found
					</div>
					<div class="section_subtitle">Search your dream home</div>
				</div>
			</div>
			<div class="row properties_row">
				
				<!-- Property -->
				<?php
				while($row = mysqli_fetch_assoc($select)){
				?>
				<div class="col-xl-4 col-lg-6 property_col">
					<div class="property">
						<div class="property_image">
							<img src="images/property/<?php echo $row['folder'].'/'.$row['image']; ?>" alt="">
						</div>
						<div class="property_body text-center">
							<div class="property_location">Miami</div>
							<div class="property_title"><a href="property.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></div>
							<div class="property_price">$ <?php echo $row['price']; ?></div>
						</div>
						<div class="property_footer d-flex flex-row align-items-center justify-content-start">
							<div>
								<div class="property_icon">
									<img src="assets/images/icon_1.png" alt="">
								</div>
								<span><?php echo $row['area']; ?> Ftsq</span>
							</div>
							<div>
								<div class="property_icon">
									<img src="assets/images/icon_2.png" alt="">
								</div>
								<span><?php echo $row['bedroom']; ?> Bedrooms</span>
							</div>
							<div>
								<div class="property_icon">
									<img src="assets/images/icon_3.png" alt="">
								</div>
								<span><?php echo $row['bathroom']; ?> Bathrooms</span>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

			</div>
			<!-- <div class="row">
				<div class="col">
					<div class="pagination">
						<ul>
							<li class="active"><a href="#">01</a></li>
							<li><a href="#">02</a></li>
							<li><a href="#">03</a></li>
							<li><a href="#">04</a></li>
						</ul>
					</div>
				</div>
			</div> -->
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
<script src="assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="assets/js/properties.js"></script>
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