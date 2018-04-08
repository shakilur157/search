<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Left Sidebar - TXT by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style type="text/css">
			.divs {
		    position: relative;
		    display: inline-block;
		    //background-color: #fcc;
		}

		.inputs {
		    position:absolute;
		    left: 0px;
		    height: 100%;
		    width: 100%;
		    opacity: 0;
		    background: #00f;
		    z-index:999;
		}

		.icons {
		    position:relative;
		}
		</style>
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
						<li><a href="signup.php">Signup</a></li>
						<li><a href="login.php">Login</a></li>

					</ul>
				</nav>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div class="row">
							<div class="3u 12u(mobile)">
								<div class="sidebar">

									<!-- Sidebar -->

										<!-- Something -->
											<section>
												<h2 class="major"><span>Arush</span></h2>
												<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
												<p>
													Donec sagittis massa et leo semper scele risque metus faucibus. Morbi congue mattis mi.
													Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum sed commodo luctus blandit.
												</p>
												
											</section>

										<!-- Something -->

								</div>
							</div>
							<div class="9u 12u(mobile) important(mobile)">
								<div class="content content-right">
									<h1>
										<table>
											<tr>
												<td>Delete Account</td>
												<td><input type="Submit" name="delete_Ac" value="Delete Account"></td>
											</tr>
											<tr>
												<td>Delete Shop</td>
												<td><input type="Submit" name="delete_Sp" value="Delete Shop"></td>
											</tr>
										</table>
									</h1>
									<!-- Content -->
									<section>
									<h2 class="major"><span>Signup Information Change</span></h2>
									<form>
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
													<td><input style="float: right;"  type="Submit" name="Submit_Ac" value="Done"></td>
												</tr>
											</table>
										</form>

								</section>

								</div>
							</div>
						</div>
						<div class="row 200%">
							<div class="12u">

								<!-- Features -->
									<section class="box features">
										<h2 class="major"><span>Edit shop information</span></h2>
										<div>
											<section>
													<form>
														<table ">
															<tr>
																<td><h1>Shop Name</h1></td>
																<td><input type="Text" name="Shop_Name"></td>
															</tr>
															<tr>
																<td><h1>Location</h1></td>
																<td><input type="Text" name="Location"></td>
															</tr>
															<tr>
																<td><h1>Address</h1></td>
																<td><input type="Text" name="Address"></td>
															</tr>
															<tr>
																<td><h1>Phone</h1></td>
																<td><input type="Text" name="Phone"></td>
															</tr>
															<tr>
																<td><h1>Category</h1></td>
																<td><input type="Text" name="Category"></td>
															</tr>
															<tr>
																<td><h1>Description</h1></td>
																<td><textarea  name="Description" placeholder="All items..."></textarea></td>
															</tr>
															<tr>
																<td><h1>Availability</h1></td>
																<td><input type="Text" name="Availability"></td>
															</tr>
															<tr>
																<td><h1>Online Order</h1></td>
																<td>
																	<h1>
																		<input type="Radio" name="Online" value="Yes">Yes
																		<input type="Radio" name="Online" value="No">No
																	</h1>
																</td>
															</tr>
															<tr>
																<td><h1>Home Delivery</h1></td>
																<td>
																	<h1>
																		<input type="Radio" name="Delivery" value="Yes">Yes
																		<input type="Radio" name="Delivery" value="No">No
																	</h1>
																</td>
															</tr>
															<tr>
																<td><h1>Upload Picture</h1></td>
																<td>
																	<h1>
																		<div class="divs">
																			<input type='file' id='image' class="inputs">
																			<i class="fa fa-image fa-2x icons"></i>
																			<!--<input type="submit" value="Upload Image" name="submit"> -->
																		</div>

																	</h1>
																</td>
															</tr>
															<tr>
																<td></td>
																<td><input style="float: right;"  type="Submit" name="Submit_Sp" value="Enter"></td>
															</tr>
														</table>
													</form>
											</section>
										</div>
									</section>

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