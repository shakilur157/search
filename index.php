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
		<title>Place Search</title>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    	<link rel="stylesheet" href="assets/css/style.css">

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style type="text/css">
			#s{
				width: 50em; /*can be in percentage also.*/
			    height: auto;
			    margin: 0 auto;
			    padding: 10px;
			    position: relative;

			}
			.left {
			  float: left;
			  width: 8em;
			  text-align: right;
			  margin: 2px 10px;
			  display: inline;
			}

			.right {
			  float: left;
			  width: 38em;
			  text-align: left;
			  margin: 2px 10px;
			  display: inline;
			}
			.fd2{
				float: right;

			}
			.fd{
				float: left;
				width: 29em;
			}
			

		</style>
	</head>
	<body class="homepage">
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
						<li class="current"><a href="index.php">Home</a></li>
						<li><a href="signup.php">Signup</a></li>
						<li><a href="login.php">Login</a></li>


					</ul>
				</nav>

			<!-- Banner -->
				<div id="s" >
					<form class="f" method="POST">
					    <div class="left" >
						    <select name="select">
							  	<option value="shop_name">Shop Name</option>
							  	<option value="location">Location</option>
							  	<option value="item">Item</option>
							</select>
					    </div>
					    <div class="right">
					    	<div class="fd">
						    	<input type="text" name = "search" placeholder="Search for anything" />
						    </div>
						    <div class="fd2">
						    	<input type="submit" name = "submit" value="Search">
						    </div>
					    </div>
					</form>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
									<?php
if (isset($_POST['submit'])) {
	//print($_POST['select']);
	$select = $_POST['select'];
	$search = $_POST['search'];

	include('connection.php');
	$conn = connection();

	

	if(strcmp($select,"shop_name")==0)
	{
		$query1 = "SELECT * FROM shops WHERE shop_name LIKE '%".$search."%' ";
		$res1 = mysqli_query($conn,$query1);

		print("<h1>");
		print("<table>");
		while($row = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
			$res = $row['shop_name'];
			print("<tr><td>" );
			print("<a href='right-sidebar.php?result=$res'> ".$res."</a>");
			print("</td>");
			print("<td>".$row['location'] . "</hd></tr>");
			
		}
		print("</table>");
		print("</h1>");
	}
	if(strcmp($select,"location")==0)
	{
		$query1 = "SELECT * FROM shops WHERE location LIKE '%".$search."%' ";
		$res1 = mysqli_query($conn,$query1);

		print("<h1>");
		print("<table>");
		while($row = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
			$res = $row['shop_name'];
			print("<tr><td>" );
			print("<a href='right-sidebar.php?result=$res'> ".$res."</a>");
			print("</td>");
			print("<td>".$row['location'] . "</hd></tr>");
			
		}
		print("</table>");
		print("</h1>");
	}
	if(strcmp($select,"item")==0)
	{
		$query1 = "SELECT * FROM shops WHERE category LIKE '%".$search."%' ";
		$res1 = mysqli_query($conn,$query1);

		print("<h1>");
		print("<table>");
		while($row = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
			$res = $row['shop_name'];
			print("<tr><td>" );
			print("<a href='right-sidebar.php?result=$res'> ".$res."</a>");
			print("</td>");
			print("<td>".$row['location'] . "</hd></tr>");
			
		}
		print("</table>");
		print("</h1>");
	}

}
?>		
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer" class="container">
					<div class="row 200%">
						<div class="12u">
							

							<!-- About -->
								<section>
									<h2 class="major"><span>About us</span></h2>
									<p>
										Probably and hopefully the last thing missing is indicating if files were selected. The file input does usually indicate that, but in our case the input is visually hidden. Luckily, there is a way out: a tiny JavaScript enhancement. The text of a label becomes the name of the selected file. If there were multiple files selected, the text will tell us how many of them were selected.
									</p>
								</section>

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

			<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  		    <script  src="assets/js/index.js"></script>

	</body>
</html>