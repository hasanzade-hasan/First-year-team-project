<?php
include "./config/config.php";
include "./config/connect.php";
include "./config/query.php";

//myprofile menu required
if (!isset($_SESSION["sn_idx"])) {
	echo "<script>alert('This menu requires a login.');location.href='/';</script>"; 
	exit;
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Profile page</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		 <script src="js/script.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
  
  
  <script>

  </script>
		<noscript>
			
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="index.php">SanoManchester</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="map.php">Healthy Manchester Map</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="contact.php">Cntact</a></li>
						
					</ul>
				</nav>
			</header>
		
		<!-- One -->
			
				<div id = "main">
					<div id='cssmenu'>
						<ul>
   							<li <?php echo ( $page_id == "1" ) ? "class='active'" : ""; ?>><a href='myprofile.php'><span>MY Profile</span></a></li>
   							<li <?php echo ( $page_id == "2" ) ? "class='active'" : ""; ?>><a href='calendar.php'><span>My Calendar</span></a></li>
   							<li <?php echo ( $page_id == "3" ) ? "class='active'" : ""; ?>><a href='calculator.php'><span>Calories calculator</span></a></li>
    						<li <?php echo ( $page_id == "4" ) ? "class='active'" : ""; ?>><a href='recepies.php'><span>Recepies</span></a></li>
   							<li <?php echo ( $page_id == "5" ) ? "class='active'" : "class='last'"; ?>><a href='exercises.php'><span>Exercises</span></a></li>
						</ul>
					</div>
