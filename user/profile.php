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
		<title>Place Search</title>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    	<link rel="stylesheet" href="assets/css/style.css">

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style type="text/css">
			#data{
				
				border: 1px solid black;
			}
			table {
			    border-collapse: collapse;
			}
			th, td {
			    border-bottom: 1px solid #ddd;
			}
			tr:nth-child(even) {background-color: #f2f2f2;}
			th {
			    background-color: #4CAF50;
			    color: white;
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
						<li class="current"><a href="profile.php">Profile</a></li>
						<li>
							<a href="#"><?php print($name);?></a>
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
						<li><a href="no-sidebar.php">Add shops</a></li>
						
						


					</ul>
				</nav>

			<!-- Banner -->
				<div class="3u 12u(mobile)">
					<div class="sidebar">

						<!-- Sidebar -->

							<!-- Recent Posts -->
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
							<!-- Something -->
								<section>
									<h2 class="major"><span><?php print($name); ?></span></h2>
									<a href="#" class="image featured"><img src= "<?php echo $current; ?>" alt="smiley face" /></a>

									<form method="POST" action="profile.php" enctype="multipart/form-data">

										<input type="file" name="fileToUpload" id="fileToUpload">
					    				<input type="submit" value="Upload Image" name="submit" >
									</form>
									<form method="POST">
										
										<input type='hidden' name='var' value='<?php echo "$picture_name";?>'/>
										<input type="submit" name="sub" value="Make it profile picture">
									</form>
									
								</section>

							<!-- Something -->
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

if(isset($_POST['sub'])) 
	$picture_name=$_POST['var'];

if(isset($_POST['submit']))
{
	$sql = "INSERT INTO `cse311_project`.`profile`(`user_id`,`user_name`,`picture`) VALUES ('$loginid','$name','$picture_name')";
	$result = mysqli_query($conn,$sql);
}



?>							

					</div>
				</div>
				<div id="data" >
					<h1>
						<table>
								<tr>
									<th>Shop Name</th>
									<th>Location</th>
									<th>Address</th>
									<th>Phone</th>
									<th>Category</th>
									<th>Description</th>
									<th>Availability</th>
									<th>Online Order</th>
									<th>Home Delivery</th>
								</tr>
									<?php
									

									$query2= "SELECT * FROM `shops` WHERE shop_id = '$loginid' AND owner = '$name' ";
									$result2 = mysqli_query($conn, $query2);

									
									while($res2 = mysqli_fetch_array($result2) )
									{	
										echo "<tr>";
										echo "<td>";
										echo "<a href='#'>".$res2['shop_name']."</a>";
										echo "</td>";
										echo "<td>";
										echo $res2['location'];
										echo "</td>";
										echo "<td>";
										echo $res2['address'];
										echo "</td>";
										echo "<td>";
										echo $res2['phone'];
										echo "</td>";
										echo "<td>";
										echo $res2['category'];
										echo "</td>";
										echo "<td>";
										echo $res2['description'];
										echo "</td>";
										echo "<td>";
										echo $res2['availability'];
										echo "</td>";
										echo "<td>";
										echo $res2['online'];
										echo "</td>";
										echo "<td>";
										echo $res2['delivery'];
										echo "</td>";
										echo "</tr>";
									}

									?>
								</tr>
						</table>
					</h1>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
											
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