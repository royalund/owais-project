<?php
	
	$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');

	$name = $_POST['name'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$gender = $_POST['gender'];
	$image = $_FILES['photo']['name'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	$idtype = $_POST['idtype'];
	$cnic = $_POST['cnic'];
	$issue = $_POST['issue'];
	$expire = $_POST['expire'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	
	if ($pass == $cpass) {
		move_uploaded_file($tmp_name, "../VoterImg/$image");
	
		$insert = mysqli_query($conn, "INSERT INTO voterregistration(name, dob, email, mobile, gender, photo, idtype, cnic, issue, expire, pass, cpass, status, votes) VALUES ('$name','$dob','$email','$mobile','$gender','$image','$idtype','$cnic','$issue','$expire','$pass','$cpass',0,0)");



	echo '
	<script>
		alert("Submitted");
		location="../Voter login Form /login.html";
	</script>
	';

}

	else{
		echo '
		<script> 
			alert("passowrd and cpass not ms");
			location="index.html";
		</script>	
	';
	}

?>
