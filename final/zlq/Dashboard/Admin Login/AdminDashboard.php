<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');
    $query = "SELECT * FROM addcandidate";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .nav-item a:hover {
            color: whitesmoke;
            background: #FF7722;
            border-radius: 10px;
        }
        /* Adjusting the votes column alignment */
        .votes-column {
            text-align: center; /* Centering text in the column */
            width: 150px; /* Fixed width for better alignment */
        }
    </style>
</head>
<body>

	<ul class="nav justify-content-center bg-dark" style="padding:20px;">
        <li class="nav-item">
            <h1 style="font-family: bangers;color: blanchedalmond;">Bharat Voting System</h1>
        </li>
    </ul>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="Image/admin.png" width="5%"><b>Admin Panel</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Add Candidate">Add Candidates</a>
                    </li>
		    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="viewcandidates.php">View Candidates</a>
                    </li>
		    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="voterdata.php">View Voters</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Voter Registration Form/index.html">Add Voters</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" onclick="confirmLogout()" aria-current="page" href="../../Voter login Form/login.html">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



	<script>
function confirmLogout() {
    if (confirm("Are you sure you want to log out?")) {
        window.location.href = "login.html"; // Redirect to login.html
    }
}
</script>
















    <div>
        <img src="Image/bg.gif" width="100%" height="600px">
    </div>
    <br><br>

    <div class="container-fluid" id="Add Candidate" style="box-shadow: 2px 2px 10px rgba(0,0,0,0.9);padding: 40px">
        <div class="row">
            <div class="col-sm-8">		
                <h2>Add Election Candidates</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="AddCandidate.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Candidate Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cname">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Party Name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="cparty">
                            </div>
                    </div>	

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Symbol</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="symbol">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Select Photo</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="photo">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-4">
                <img src="Image/head.png" width="100%">
            </div>
        </div>
    </div>

    <br><br>

    <div class="container">		
        <div class="row">
            <div class="col-sm-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Candidate Name</th>
                            <th scope="col">Party</th>
                            <th scope="col">Photo</th>
                            <th scope="col" class="votes-column">Votes</th> <!-- Using class for alignment -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['cparty']; ?></td>
                            <td><img src="Image/<?php echo $row['photo']; ?>" width="30%" alt="Candidate Photo"></td>
                            <td class="votes-column">Total Votes: <?php echo $row['votes']; ?></td> <!-- Using class for alignment -->
                        </tr>
                        <?php	
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
