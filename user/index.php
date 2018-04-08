<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$name = $_SESSION['name'];

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
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style type="text/css">
    

#h { padding: 20px;}
#h h1 {
    color:#222222;
}
#c {
    height: inherit;
    background: #ebebeb;
    width: 100%;
    padding:20px;
    box-sizing: border-box;
}
#c input {
    width: 100%;
    font-size:20px;
    color: #424242;
    padding:10px;
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
						<li><a href="left-sidebar.php">Edit Information</a></li>
						
						<li><a href="no-sidebar.php">Add shops</a></li>
						
						


					</ul>
				</nav>

			<!-- Banner -->
				<div id="search_me">
				    
				    <div id="c">
				        <input type="search" name="keyword" placeholder="Search here" id="searchbox">
				        <div id="results"></div>
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
  		    <script>
    $(document).ready(function () {
        $("#searchbox").on('keyup',function () {
            var key = $(this).val();
 
            $.ajax({
                url:'fetch.php',
                type:'GET',
                data:'keyword='+key,
                beforeSend:function () {
                    $("#results").slideUp('fast');
                },
                success:function (data) {
                    $("#results").html(data);
                    $("#results").slideDown('fast');
                }
            });
        });
    });
</script>

	</body>
</html>