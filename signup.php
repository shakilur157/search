<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$name = $_SESSION['name'];

	if($name==NULL)
	{
		//echo "<script type='text/javascript'>alert('loging first')</script>";
		//header("location: ../login.php");

	}
	else{
		header("location: user/index.php");

	}

	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Signup here</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<div class="logo container">
						<div>
							<p>Find best products around you</p>
						</div>
					</div>
				</header>


			<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li class="current"><a href="signup.php">Signup</a></li>
						<li><a href="login.php">Login</a></li>

					</ul>
				</nav>

			<!-- Main -->
				

			<!-- Footer -->
				<footer id="footer" class="container">
					<div class="row 200%">
						<div class="12u">

							<!-- About -->
								<section>
									<h2 class="major"><span>Signup Here</span></h2>
									<form method="POST">
											<table ">
												<tr>
													<td><h1>Name</h1></td>
													<td><input type="Text" name="Name"></td>
												</tr>
												<tr>
													<td><h1>Email</h1></td>
													<td><input type="Email" name="Email"></td>
												</tr>
												<tr>
													<td><h1>Phone</h1></td>
													<td><input type="Text" name="Phone"></td>
												</tr>
												<tr>
													<td><h1>Password</h1></td>
													<td><input type="Password" name="Password"></td>
												</tr>
												<tr>
													<td><h1>Gender</h1></td>
													<td style="float: left;">
														<h1>
															<input type="radio" name="gender" value="male" checked> Male
															<input type="radio" name="gender" value="female"> Female
															<input type="radio" name="gender" value="other"> Other
														</h1>
													</td>
												</tr>
												<tr>
													<td></td>
													<td><input style="float: right;"  type="Submit" name="Submit" value="Signup"></td>
												</tr>
											</table>
										</form>

								</section>

						</div>
					</div>
<?php
if(isset($_POST['Submit'])) {
	include("connection.php");
	$conn = connection();
	$name = mysqli_real_escape_string($conn,$_POST['Name']);
	$email = mysqli_real_escape_string($conn,$_POST['Email']);
	$phone = mysqli_real_escape_string($conn,$_POST['Phone']);
	$password = mysqli_real_escape_string($conn,$_POST['Password']); 
	$gender = mysqli_real_escape_string($conn,$_POST['gender']); 

	$sql_signup = "INSERT INTO `cse311_project`.`signup_data` ( `name`, `phone`, `email`, `password`, `gender`) VALUES ('$name', '$phone', '$email', '$password', '$gender')";
	$result = mysqli_query($conn,$sql_signup);

	$sql_login = "INSERT INTO `cse311_project`.`login` ( `name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
	$result = mysqli_query($conn,$sql_login);

	header("location: login.php");

}
?>
					<div class="row 200%">
						<div class="12u">

							<!-- Contact -->
								<section>
									<h2 class="major"><span>Get in touch</span></h2>
									<ul class="contact">
										<li><a class="icon fa-facebook" href="#"><span class="label">Facebook</span></a></li>
										<li><a class="icon fa-twitter" href="#"><span class="label">Twitter</span></a></li>
										<li><a class="icon fa-instagram" href="#"><span class="label">Instagram</span></a></li>
										<li><a class="icon fa-dribbble" href="#"><span class="label">Dribbble</span></a></li>
										<li><a class="icon fa-google-plus" href="#"><span class="label">Google+</span></a></li>
									</ul>
								</section>

						</div>
					</div>

					<!-- Copyright -->
						<div id="copyright">
							<ul class="menu">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>

				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>