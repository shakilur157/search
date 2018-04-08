<!DOCTYPE html>
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

	<title>Home</title>
	<link rel="stylesheet" type ="text/css" href="css/home.css">
	<link rel="stylesheet" href="css/style.css">
		<style type="text/css">
			#data{
				
				border: 2px solid black;
			}
			table {
				border: 1px solid black;
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
<body>
	
	<h1 style="color: blue; padding: 5px; text-align: center; ">Search Result</h1>
<div id="main-wrapper">
	<div id="main" class="container">
		<div class="row">
			<div class="12u">
				<div class="content">
					<div id="data">
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
									require("connection.php");
									$conn = connection();

									if (isset($_GET['result'])) {
										$ans = $_GET['result'];
										//print($ans);
									}

									$query2= "SELECT * FROM `shops` WHERE shop_name = '$ans' ";
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
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
</body>
</html>