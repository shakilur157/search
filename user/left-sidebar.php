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
						<li>
							<a href="profile.php"><?php print($name);?></a>
							<ul>
								<li><a href="profile.php">Account Information</a></li>
								
								<li>
									<a href="#">Change</a>
									<ul>
										<li><a href="left-sidebar.php">Account Info</a></li>
										<li><a href="left-sidebar.php">Shop Info</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Delete</a>
									<ul>
										<li><a href="left-sidebar.php">Account</a></li>
										<li><a href="left-sidebar.php">Shop</a></li>
									</ul>
								</li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
						<li class="current"><a href="left-sidebar.php">Edit information</a></li>

						<li><a href="no-sidebar.php">Add shops</a></li>

					</ul>
				</nav>
<?php

include("connection.php");
$conn = connection();
$query = "SELECT * FROM profile WHERE user_id = '$loginid' AND user_name = '$name' ";
$r = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {
    $current = $row['picture'];
}

$current = "uploads/".$loginid."/".$current;

?>
			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div class="row">
							<div class="3u 12u(mobile)">
								<div class="sidebar">

									<!-- Sidebar -->

										<!-- Something -->
											<section>
												<h2 class="major">
													<span>
														<?php print($name);?>
													</span>
												</h2>
												<a href="#" class="image featured"><img src="<?php echo $current; ?>" alt="" /></a>
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
												<td><form method="POST"><input type="Submit" name="delete_Ac" value="Delete Account"></form></td>
											</tr>
											<tr>
												<td>Delete Shop</td>
												<td><form method="POST">
														<?php
														

														$q = "SELECT * FROM shops WHERE owner = '$name' ";
														$r = mysqli_query($conn,$q);
														print("which one : ");
														while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {
															
														    echo '<input type="Radio" name="'.$row['owner'].'" value="'.$row['shop_name'].'" />'.$row['shop_name'];
														     
														    $owner_rr = $row['owner'];
														}
														


														?>
														<input type="Submit" name="delete_Sp" value="Delete Shop">
													</form>
												</td>
											</tr>
										</table>
									</h1>
									<!-- Content -->
<?php



$uemail = $_SESSION['uemail'];

if (isset($_POST['delete_Ac'])) {
	$sql_del_ac_s = "DELETE FROM signup_data WHERE id = '$loginid' AND name = '$name' ";
	$result = mysqli_query($conn,$sql_del_ac_s);

	$sql_del_ac_l = "DELETE FROM login WHERE id = '$loginid' AND name = '$name' ";
	$result = mysqli_query($conn,$sql_del_ac_l);
	session_destroy();
	header("location: ../login.php");
}

if (isset($_POST['delete_Sp'])) {
	$owner_rr = $_POST[$owner_rr];
	$sql_del_ac_s = "DELETE FROM shops WHERE shop_id = '$loginid' AND shop_name = '$owner_rr' ";
	$result = mysqli_query($conn,$sql_del_ac_s);


}

$query = " SELECT * FROM signup_data WHERE name = '$name' AND email = '$uemail' ";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
{
	$name = $row['name'];
	$email = $row['email'];
	$password = $row['password'];
	$phone = $row['phone'];

}


if(isset($_POST['Submit_Ac']))
{
	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$phone = $_POST['Phone'];
	$gender = $_POST['gender'];





	$sql = " UPDATE signup_data SET name = '$name', email = '$email', phone = '$phone', password = '$password', gender = '$gender' WHERE id = '$loginid' ";
	$result2 = mysqli_query($conn,$sql);

	$sql1 = " UPDATE login SET name = '$name', email = '$email', password = '$password' WHERE id = '$loginid' ";
	$result3 = mysqli_query($conn,$sql1);

	$sql12 = " UPDATE shops SET owner = '$name' WHERE shop_id = '$loginid' ";
	$result32 = mysqli_query($conn,$sql12);
	
	

}

?>
									<section>
									<h2 class="major"><span>Signup Information Change</span></h2>
									<form method="POST" >
											<table ">
												<tr>
													<td><h1>Name</h1></td>
													<td><input type="Text" name="Name" placeholder="<?php print($name); ?>"></td>
												</tr>
												<tr>
													<td><h1>Email</h1></td>
													<td><input type="Email" name="Email" placeholder="<?php print($email); ?>"></td>
												</tr>
												<tr>
													<td><h1>Phone</h1></td>
													<td><input type="Text" name="Phone" placeholder="<?php print($phone); ?>"></td>
												</tr>
												<tr>
													<td><h1>Password</h1></td>
													<td><input type="Password" name="Password" placeholder="<?php print("*******"); ?>"></td>
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
											<form method="POST">
<h1>
									<section>
<?php

$q = "SELECT * FROM shops WHERE owner = '$name' ";
$r = mysqli_query($conn,$q);
print("which one : ");
while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {
	
    echo '<input type="Radio" name="'.$row['owner'].'" value="'.$row['shop_name'].'" />'.$row['shop_name'];
    global $owner_radio;
    $owner_radio = $row['owner'];
}

?>
</h1>
		
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
																<td></td>
																<td><input style="float: right;"  type="Submit" name="Submit_Sp" value="Enter"></td>
															</tr>
														</table>
													</form>
											</section>
										</div>
									</section>
<?php

if(isset($_POST['Submit_Sp']))
{
	$shop_name = $_POST['Shop_Name'];
	$location = $_POST['Location'];
	$address = $_POST['Address'];
	$phone = $_POST['Phone'];
	$category = $_POST['Category'];
	$description = $_POST['Description'];
	$availability = $_POST['Availability'];
	$delivery = $_POST['Delivery'];
	$online = $_POST['Online'];


	$owner_r = $_POST[$owner_radio];
	//print("baaaaaaaaal : ".$ownerr);

	$sql = " UPDATE shops SET shop_name = '$shop_name', location = '$location', phone = '$phone', category = '$category', description = '$description' , availability = '$availability' , delivery = '$delivery' , online = '$online'  WHERE id = '$loginid' ";
	$result2 = mysqli_query($conn,$sql);


}

?>
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