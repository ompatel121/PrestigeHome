<?php
include("includes/config.php");

$id = mysqli_real_escape_string($con, $_POST['name']);
$select = mysqli_query($con, "select * from cities where district_id='$id' AND status='A'");
if(mysqli_num_rows($select)>0)
{
	while($row = mysqli_fetch_assoc($select))
	{
		echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
	}
}
else
{
	echo '<option value="">Select City</option>';
}
?>