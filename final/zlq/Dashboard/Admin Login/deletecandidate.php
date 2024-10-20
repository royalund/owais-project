<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');

$id = $_GET['id'];

$query = "DELETE FROM addcandidate WHERE id = $id";
mysqli_query($conn, $query);

echo "<script>alert('Candidate Deleted'); window.location.href = 'viewcandidates.php';</script>";
?>
