<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize the search query
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

// Fetch candidates from the database
$query = "SELECT * FROM addcandidate WHERE cname LIKE '%$search%' OR cparty LIKE '%$search%'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Data</title>
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

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            border-radius: 5px;
            border: none;
        }

        .search-form button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #218838;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            table {
                width: 100%;
            }

            .search-form input[type="text"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <h1>Candidate Data</h1>

    <!-- Search Form -->
    <form class="search-form" method="POST" action="">
        <input type="text" name="search" placeholder="Search by Name or Party" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
        <button type="submit">Search</button>
    </form>

    <!-- Candidate Table -->
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Party</th>
            <th>Symbol</th>
            <th>Votes</th>
            <th>Action</th>
        </tr>

        <!-- PHP code to loop through the database result and display the table -->
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['cname']}</td>
                    <td>{$row['cparty']}</td>
                    <td>{$row['symbol']}</td>
                    <td>{$row['votes']}</td>
                    <td>
                        <a href='editcandidate.php?id={$row['id']}'>Edit</a> |
                        <a href='deletecandidate.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No candidates found</td></tr>";
        }
        ?>
    </table>

</body>
</html>
