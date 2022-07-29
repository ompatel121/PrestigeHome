<?php
include("includes/config.php");

$property = mysqli_real_escape_string($con, $_POST['property']);
$name     = mysqli_real_escape_string($con, $_POST['name']);
$mobile   = mysqli_real_escape_string($con, $_POST['mobile']);
$email    = mysqli_real_escape_string($con, $_POST['email']);

$insert = mysqli_query($con, "insert into inquiries (property_id,name,mobile,email) value ('$property','$name','$mobile','$email')");
if($insert)
{
	
	echo "<script>$('#form-detail').attr('style','display:none')</script>";
	echo "<script>$('#property-content').removeClass('d-none');</script>";
}
?>