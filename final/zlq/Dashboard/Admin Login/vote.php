<?php
  
	
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');
	
		
	$votes = $_POST['gvotes'];
	$total_votes = $votes+1;
	$gid = $_POST['gid'];
	$uid = $_SESSION['voterdata']['id'];

	$update_votes = mysqli_query($conn, "UPDATE addcandidate SET votes ='$total_votes' WHERE id = '$gid'  ");
	$update_user_status = mysqli_query($conn, "UPDATE voterregistration SET status =-1 WHERE id = '$uid'  ");

	if($update_votes and $update_user_status){
		$candidate = mysqli_query($conn, "SELECT * FROM addcandidate");
		$candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);

		$_SESSION['voterdata']['status']=1;
		$_SESSION['candidatedata'] = $candidatedata;
		
		echo "Voting Successfull";
	}
	else{
		echo '
			<script>
				alert("Votinng Successfull");
				location ="../dashboard.php";
			</script>
		';
	}


?>