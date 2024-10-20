<?php

	$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');


	$cname = $_POST['cname'];
	$cparty = $_POST['cparty'];
	
	$images = $_FILES['symbol']['name'];
	$tmp_name = $_FILES['symbol']['tmp_name'];

	$image = $_FILES['photo']['name'];
	$tmp_name1 = $_FILES['photo']['tmp_name'];
	

	$insert = mysqli_query($conn, "INSERT INTO addCandidate (cname, cparty, symbol, photo) VALUES ('$cname','$cparty','$images','$image')");

	if($insert==true){

		move_uploaded_file($tmp_name, "Image/$images");
		move_uploaded_file($tmp_name, "Image/$image");

		echo '
	
		<script>
			alert("Candidate Added Successfully");
			location = "AdminDashboard.php";
		</script>
		';
		}
	else{
		
		echo 'Some Error Occured';
		}



?>