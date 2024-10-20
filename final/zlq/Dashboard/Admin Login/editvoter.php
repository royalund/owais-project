<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');

$id = $_GET['id'];
$query = "SELECT * FROM voterregistration WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];

    // Update query
    $update_query = "UPDATE voterregistration SET name='$name', dob='$dob', email='$email', mobile='$mobile', gender='$gender' WHERE id = $id";
    mysqli_query($conn, $update_query);

    echo "<script>alert('Voter Updated'); window.location.href = 'voterdata.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Voter</title>
    <style>
        /* General body styling */
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

        /* Form styling */
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

        .edit-form input[type="text"],
        .edit-form input[type="email"],
        .edit-form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
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

        /* Responsive design */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            .edit-form {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <h1>Edit Voter Details</h1>

    <!-- Form to Edit Voter -->
    <form class="edit-form" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="mobile">Mobile</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" required>

        <label for="gender">Gender</label>
        <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>" required>

        <button type="submit" name="update">Update Voter</button>
    </form>

</body>
</html>
