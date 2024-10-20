<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');

$id = $_GET['id'];
$query = "SELECT * FROM addcandidate WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $cname = $_POST['cname'];
    $cparty = $_POST['cparty'];
    $symbol = $_POST['symbol'];

    // Update query (excluding votes field)
    $update_query = "UPDATE addcandidate SET cname='$cname', cparty='$cparty', symbol='$symbol' WHERE id = $id";
    mysqli_query($conn, $update_query);

    echo "<script>alert('Candidate Updated'); window.location.href = 'viewcandidates.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Candidate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('Image/bg.gif');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            color: white;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .edit-form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .edit-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .edit-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .edit-form button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .edit-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Edit Candidate Details</h1>

    <form class="edit-form" method="POST">
        <label for="cname">Name</label>
        <input type="text" id="cname" name="cname" value="<?php echo $row['cname']; ?>" required>

        <label for="cparty">Party</label>
        <input type="text" id="cparty" name="cparty" value="<?php echo $row['cparty']; ?>" required>

        <label for="symbol">Symbol</label>
        <input type="text" id="symbol" name="symbol" value="<?php echo $row['symbol']; ?>" required>

        <button type="submit" name="update">Update Candidate</button>
    </form>

</body>
</html>
