<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$name = $_SESSION['name'];
	$loginid = $_SESSION['loginid'];

	if($name==NULL)
	{
		echo "<script type='text/javascript'>alert('loging first')</script>";
		header("location: ../login.php");

	}
	else{
		//header("location: ../welcome_home.php");

	}

	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Result</title>
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
						<li>
							<a href="#"><?php echo($name);?></a>
							<ul>
								<li><a href="profile.php">Account Information</a></li>
								
								<li>
									<a href="#">Change</a>
									<ul>
										<li><a href="#">Account Info</a></li>
										<li><a href="#">Shop Info</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Delete</a>
									<ul>
										<li><a href="#">Account</a></li>
										<li><a href="#">Shop</a></li>
									</ul>
								</li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
						<li><a href="left-sidebar.php">Left Sidebar</a></li>
						<li class="current"><a href="right-sidebar.php">Searhc Result</a></li>
						<li><a href="no-sidebar.php">No Sidebar</a></li>

					</ul>
				</nav>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div class="row">
							<div class="9u 12u(mobile) important(mobile)">
								<div class="content content-left">

									<!-- Content -->
									<h1>
										<table>
											<tr>
												<td>##</td>
												<td>Detail</td>
												
											</tr>
											<tr>
												<td>_________</td>
												<td>_________</td>
												
											</tr>
												<?php
												require("connection.php");
												$conn = connection();

												global $woner;
												if (isset($_GET['result'])) {
													$ans = $_GET['result'];
													//print($ans);
												}

												$query2= "SELECT * FROM `shops` WHERE shop_name = '$ans' ";
												$result2 = mysqli_query($conn, $query2);

												
												while($res2 = mysqli_fetch_array($result2) )
												{	
													echo "<tr>";
													echo "<td> shop name</td>";
													echo "<td>";
													echo "<a href='#'>".$res2['shop_name']."</a>";
													echo "</td>";
													echo "</tr>";

													echo "<tr>";
													echo "<td> location</td>";
													echo "<td>";
													echo $res2['location'];
													echo "</td>";
													echo "<tr>";

													echo "<tr>";
													echo "<td> address</td>";
													echo "<td>";
													echo $res2['address'];
													echo "</td>";
													echo "<tr>";

													echo "<tr>";
													echo "<td> Phone</td>";
													echo "<td>";
													echo $res2['phone'];
													echo "</td>";
													echo "<tr>";

													echo "<tr>";
													echo "<td> category</td>";
													echo "<td>";
													echo $res2['category'];
													echo "</td>";
													echo "<tr>";

													echo "<tr>";
													echo "<td> description</td>";
													echo "<td>";
													echo $res2['description'];
													echo "</td>";
													echo "<tr>";

													echo "<tr>";
													echo "<td> availability</td>";
													echo "<td>";
													echo $res2['availability'];
													echo "</td>";
													echo "<tr>";

													echo "<tr>";
													echo "<td> online</td>";
													echo "<td>";
													echo $res2['online'];
													echo "</td>";
													echo "<tr>";

													echo "<tr>";
													echo "<td> deliver</td>";
													echo "<td>";
													echo $res2['delivery'];
													echo "</td>";
													echo "</tr>";

													$owner = $res2['owner'];

												}

												$query = "SELECT * FROM shops WHERE owner = '$owner' AND shop_name = '$ans' ";
												$r = mysqli_query($conn,$query);
												while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {
												    $current = $row['picture'];

												}
												$current = "uploads/".$loginid."/".$current;

												//print($current);
												?>
											</tr>
										</table>
									</h1>

										

								</div>
							</div>
							<div class="3u 12u(mobile)">
								<div class="sidebar">

									<!-- Sidebar -->

										<!-- Recent Posts -->

										<!-- Something -->
											<section>
												<h2 class="major"><span><?php echo($ans);?></span></h2>
												<?php //print($current);?>
												<a href="#" class="image featured"><img src="<?php echo $current; ?>" alt="" /></a>
												
												
											</section>

										<!-- Something -->
											

								</div>
							</div>
						</div>
						<div class="row 200%">
							<div class="12u">

								<!-- Features -->
									

							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer" class="container">
					<div class="row 200%">
						<div class="12u">

							<!-- About -->
								

						</div>
					</div>
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