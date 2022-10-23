<?php
session_start();
require('connection.php');

if ($_SESSION['ID']=="") {
	header('location:index.html');
}
$ID = $_SESSION['ID'];
$q = "SELECT PatientID FROM patient WHERE TelNo ='$ID'";
$cq = mysqli_query($con,$q);
$row = mysqli_fetch_assoc($cq);
$reg = $row["PatientID"];
$q = "SELECT * FROM patient WHERE PatientID  = '$reg'";
$cq = mysqli_query($con,$q);
$ret = mysqli_num_rows($cq);

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>My Profile - Doctor </title>
	<meta charset="UTF-8">
	<link href="img/logo.jpg" rel="shortcut icon"/>
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/w3.css">
</head>

<body>
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<header class="header-section">
		<div class="container">
			<a href="patient_main.php" class="site-logo">
				<img src="img/logo.jpg" alt="logo" height="100" width="100">
			</a>
			<div class="nav-switch">
				<div class="ns-bar"></div>
			</div>
			<div class="header-right">
				</ul>
				<div class="header-btns">
					<a href="patient_main.php" class="site-btn sb-c3"><?php echo $ID; ?></a>
				</div>
			</div>
		</div>
	</header>

	<section class="DBbody">
		<h3 align="center">Your Details</h3>
		<div class="stdetails">
			<?php
			if (mysqli_num_rows($cq)>0) {
				while ($row = mysqli_fetch_assoc($cq)) {
					$PatientID = $row["PatientID"];
					$Name = $row["Name"];
					$AD = $row["Address"];
					$DOB = $row["DOB"];
					$MOB  = $row["TelNo"];
					$Gender = $row["Gender"];

					print "<div>
							<p>Patient ID : $PatientID</p>
							<p>Name : $Name</p>
							<p>Address : $AD</p>
							<p>Date of birth : $DOB</p>
							<p>Mobile NO : $MOB</p>
							<p>Gender : $Gender</p>
					</div>";
				}
			}
			?>
		</div>
		
	</section>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
