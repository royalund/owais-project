<?php
	session_start();
	$voterdata=$_SESSION['voterdata'];

	$conn = mysqli_connect('localhost', 'root', '', 'voterdatabase');
	$query = "SELECT * FROM addcandidate";
	$result = mysqli_query($conn, $query);


	if($_SESSION['voterdata']['status']==0){
		$status = '<b style="color:green;">Not Voted</b>';
	}
	else{
	
	$status='<b style = "color:red;">Voted</b>';
	}
?> 	

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .nav-item a {
            color: whitesmoke;
        }

        .nav-item a:hover {
            color: whitesmoke;
            background-image: url('/changes/kkrrh/admin/images/hola.gif');
            border-radius: 10px;
        }

        #main-sec {
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.9);
        }
    </style>
</head>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none; right:0; width:100%" id="rightMenu">
    <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
    
    <div class="container" style="padding-top:50px;">
	 <div class="row">
	   <div class="col-sm-3"></div>
	   <div class="col-sm-6">
	<h2>Admin Login Form</h2><br>
	<p>Please Enter Your Information To Proceed</p><hr><br><br>
	    <form action="Admin Login/Adminlogin.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
        </form>
		</div>
		<div class="col-sm-3"></div>
	</div>
	</div>
</div>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand"><i class="fa fa-fw fa-globe"></i>Bharat Voting System</a>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="fa fa-fw fa-home"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-fw fa-search"></i>Search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-fw fa-envelope"></i>Contact us</a>
            </li>
        </ul>
        <form class="nav-item">
            <button class="btn btn-outline-success" type="button" onclick="openRightMenu()"><i class="fa fa-fw fa-user"></i>Admin Login</button>
        </form>
    </div>
</nav>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators"></div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/hola.gif" class="d-block w-100" height="500px" alt="...">
            <div class="carousel-caption d-md-block">
                <h5>Welcome To The New Age Of Voting</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
    </div>
</div>
<br><br><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="card-header">
                    <marquee>Vote Can Be Cast Only Once</marquee>
                </div>
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="Admin Login/temp/<?php echo $voterdata['photo']?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">
                                <li>Name: <?php echo $voterdata['name']; ?></li>
                                <li>Mobile No: <?php echo $voterdata['mobile']; ?></li>
                                <li>CNIC No: <?php echo $voterdata['cnic']; ?></li>
                            </p>
                            <h5 class="card-title">Status: <?php echo $status ?>	</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <table class="table" id="main-sec">
                <thead>
                    <tr>
                        <th scope="col">Candidate Details</th>
                        <th scope="col">Symbol</th>
                        <th scope="col">Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td>
                            <li>Candidate Name: <?php echo $row['cname'] ?></li>
                            <li>Party Name: <?php echo $row['cparty'] ?></li>
                            <li>Total Votes:<?php echo $row['votes'] ?></li><br>
		
				<form action="Admin Login/vote.php" method="post">
				<input type="hidden" name="gvotes" value="<?php echo $row['votes']  ?>">
				<input type="hidden" name="gid" value="<?php echo $row['id']  ?>">  

				<?php
		
					if($_SESSION['voterdata']['status']==0){
						?>
					<button type="submit" class="btn btn-danger">Vote</button>
				<?php
				}
				else{
				?>
				<button disabled type="button" class="btn btn-danger">Vote</button>
				<?php
			









					}
		

				
				?>


                            
                        </td></form>
                        <td><img src="Admin Login/Image/<?php echo $row['symbol']?>" width="40%" style="border-radius:10%"></td>
                        <td><img src="Admin Login/Image/<?php echo $row['photo']?>" width="40%" style="border-radius:10%"></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function openRightMenu() {
    document.getElementById("rightMenu").style.display = "block";
}

function closeRightMenu() {
    document.getElementById("rightMenu").style.display = "none";
}
</script>

</body>
</html>
