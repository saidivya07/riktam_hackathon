<?php
include("includes/connection.php");
if(isset($_POST['sign_up'])){
	$name=mysqli_real_escape_string($con,$_POST['u_name']);
	$email=mysqli_real_escape_string($con,$_POST['u_email']);
	$pass=mysqli_real_escape_string($con,$_POST['u_pass']);
	$country=mysqli_real_escape_string($con,$_POST['u_country']);
	$gender=mysqli_real_escape_string($con,$_POST['u_gender']);
	$birthday=mysqli_real_escape_string($con,$_POST['u_birthday']);
	$status="unverified";
	$posts="no";
	$ver_code=mt_rand();

	if(strlen($pass)<8)
	{
		echo "<script>alert('Password should be minimum 8 characters!')</script>";
		exit();
	}
	$check_email ="select * from users where user_email='$email'";
	$run_email=mysqli_query($con,$check_email);
	$check=mysqli_num_rows($run_email);
	if($check==1)
	{
		echo "<script>alert('Email already exist, please try again!')</script>";
		exit();
	}

	$insert = "insert into users (user_name,user_email,user_pass,user_country,user_gender,user_birthday,user_image,user_reg_date,status,ver_code,posts) values('$name','$email','$pass','$country','$gender','$birthday','default.jpg',NOW(),'$status','$ver_code','$posts')";

	$query=mysqli_query($con,$insert);

	if($query){
		echo "<h3 style='width:200px;text-align:justify;color:orange;'>Hi, $name congratulations registration is complete.</h3>";
	}

	else{
		echo "registration failed, try again!";
	}

}
?>