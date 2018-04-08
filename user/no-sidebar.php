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
		<title>Add Here</title>
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
							<a href="profile.php"><?php print($name); ?></a>
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
						<li><a href="left-sidebar.php">Edit information</a></li>
						
						<li class="current"><a href="no-sidebar.php">Add Shops</a></li>

					</ul>
				</nav>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div class="row">
							<div class="12u">
								<div class="content">
<?php
$err1=$err12=$err123=$err1234=$err="";
global $picture_name;
$my_name = $_SESSION['loginid'];
global $target_dir;
$target_dir = 'uploads/'.$my_name;
mkdir($target_dir,0777,true);

$target_file = $target_dir.'/'.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $err = "File is not an image.";
        $uploadOk = 0;
    }
}

if (isset($_POST["submit"]) && $_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $err1 = "Sorry, your file is too large.";
    $uploadOk = 0;
}

if(isset($_POST["submit"]) && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $err12 = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if (isset($_POST["submit"]) && $uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    $err123 = "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The picture has been uploaded.";
        $err1234 = "The picture has been uploaded.";
        $picture_name = (( $_FILES["fileToUpload"]["name"]));
    }
     else {
        //echo "Sorry, there was an error uploading your file.";
    }
}

if(isset($_POST['var'])) 
	$picture_name=$_POST['var'];


if(isset($_POST['submit'])) {
	include("connection.php");
	$conn = connection();

	$shop_name = $_POST['Shop_Name'];
	$location = $_POST['Location'];
	$address = $_POST['Address'];
	$phone = $_POST['Phone'];
	$category = $_POST['Category'];
	$description = $_POST['Description'];
	$availability = $_POST['Availability'];
	$online = $_POST['Online'];
	$delivery = $_POST['Delivery'];

	
	
	
	$query = "INSERT INTO `cse311_project`.`shops` (`shop_name`, `location`, `address`, `phone`, `category`, `description`, `availability`, `online`, `delivery`, `picture`,`owner`,`shop_id`) VALUES ('$shop_name', '$location', '$address', '$phone', '$category', '$description ', '$availability', '$online', 'delivery', '$picture_name','$name',$loginid)";
	$result = mysqli_query($conn,$query);




}

?>
									<section>
									<h2 class="major"><span>Add All details</span></h2>
									<form action="no-sidebar.php" method="POST" enctype="multipart/form-data">
											<table ">
												<tr>
													<td><h1>Shop Name</h1></td>
													<td><input type="Text" name="Shop_Name" placeholder="<?php print($shop_name);?>"></td>
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
															<div class="divs" >
																
																	<input type="file" name="fileToUpload" id="fileToUpload">
					    											<input type="submit" value="Upload Image" name="submit" >

																</form>
																<form method="POST"  onsubmit="displayPopup()" action="index.php">
															</div>
														<?php
					    												print($err1."<br>");
					    												print($err12."<br>");
					    												print($err123."<br>");
					    												print($err1234."<br>");
					    								?>
														</h1>
													</td>
												</tr>
												<tr>
													<td><input type='hidden' name='var' value='<?php echo "$picture_name";?>'/> </td>
													<td><input style="float: right;"  type="Submit" name="all_submit" value="Enter"></td>
												</tr>
											</table>
										</form>

								</section>
								</div>
							</div>
						</div>
						<!-- 
							<div class="row 200%">
							<div class="12u">

								Features 

							</div>
						</div> -->
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer" class="container">
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

			<script type="text/javascript">
				function displayPopup()
				{
				 alert("Form successfully submitted!");
				}
			</script>

	</body>
</html>