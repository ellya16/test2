<?php
	session_start();
	
	
	$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con,'elexies_hall');
	
	$ID = $_POST['ID'];
	$name = $_POST['name'];
	$phonenum = $_POST['phonenum'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$adminID = $_POST['user'];
	
	$s = "select * from client where CLIENT_ID = '$ID'";
	
	$result = mysqli_query($con, $s);
	
	$num = mysqli_num_rows($result);
	
	if($num == 1){
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('ALERT! THIS ID IS ALREADY TAKEN!')
		window.location.href='client_registration.php';
	</SCRIPT>");}
	else{
		
		$reg = "insert into client(CLIENT_ID,CLIENT_NAME,CLIENT_PHONE,CLIENT_EMAIL,CLIENT_PASS,ADM_ID) values ('$ID' , '$name', '$phonenum', '$email', '$pass', '$adminID')";
		mysqli_query($con, $reg);
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Your Account is Successfully Created!')
		window.location.href='client_login.php';
	</SCRIPT>");						
	}	
?>