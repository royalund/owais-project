<?php
$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');

$id = $_GET['id'];

$query = "DELETE FROM voterregistration WHERE id = $id";
mysqli_query($conn, $query);

echo "<script>alert('Voter Deleted'); window.location.href = 'voterdata.php';</script>";
?>
