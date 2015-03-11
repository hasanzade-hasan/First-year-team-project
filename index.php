<?php
include "./config/config.php";
include "./config/connect.php";
include "./config/query.php";
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Home Page</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/ajax.js"></script>
		
  
  
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
				<h1><a href="index.html">SanoManchester</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="map.html">Healthy Manchester Map</a></li>
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="contact.html">Cntact</a></li>
						
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>SANOMANCHESTER</h2>
					<p>Health is the real wealth </p>
					<ul class="actions">
						<li><span href="#" class="button big special" id="toggle-login">Log in</span> <div id="login">
							<div id="triangle"></div>
							<h1>Log in</h1>
							<form name='frm_login' method="POST" action="<?=$_SERVER['PHP_SELF']?>" onSubmit="javascript:login();return false;" >
							<input type="hidden" name="mode" value="login">
								<input type="email" name="email" placeholder="Email" />
								<input type="password" name="pass" placeholder="Password" />
								<input type="submit" value="Log in"/>
							</form>
							</div>
							<script src="js/index.js"></script>
						</li>
						<li><span href="#" class="button big special" id="toggle-signup">signup</span>
						<div id="signup">
							<div id="triangle"></div>
								<h1>Sig up</h1>
								<form name='frm_regist' method="POST" action="<?=$_SERVER['PHP_SELF']?>" onSubmit="javascript:regist();return false;">
								<input type="hidden" name="mode" value="regist">
									<ul>
										<li> <input type="text" placeholder="Name" name="rname" /> </li>
										<li> <input type="text" placeholder="Surname" name="surname" /> </li>
									</ul>
									<ul>
										<li> <input type="email" placeholder="Email" name="email" /> </li>
										<li> <select type = "input" name="gender">
												<option value="">- GENDER -</option>
												<option value="0">Male</option>
												<option value="1">Female</option>
											     </select> </li>
									</ul>
									<ul >
										<li> <input type="text" placeholder="weight" name="weight" /> </li>
										<li> <input type="text" placeholder="height" name="height" /> </li>
									</ul>
									<ul>
										<li> <input type="password" placeholder="Password" name="pass1" /> </li>
										<li> <input type="password" placeholder="Confirm Password" name="pass2" /> </li>
									</ul>
									<br>
									<br>
									<input type="submit" value="Sign up" />										
								</form>
						</div>
						<script src="js/index2.js"></script>
						</li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>Why SANOMANCHESTER?</h2>
				</header>
				<div id = "main">
					<div id="box">
						
						<img src="images/salad.jpg" width ="100%">
						<h3>RECIEPES</h3>
						<p>Nullam quis eleifend lectus. Suspendisse et lacus placerat, suscipit erat id, ullamcorper nisl. Maecenas gravida dictum fringilla. Phasellus lobortis, felis id accumsan condimentum, magna erat malesuada ligula, quis egestas urna nisl nec velit. Etiam at metus sit amet ex feugiat tincidunt.</p>
					</div>
					<div id="box">
						<img src="images/work.jpg" width ="100%">
						<h3>EXERCISES</h3>
						<p>Nullam quis eleifend lectus. Suspendisse et lacus placerat, suscipit erat id, ullamcorper nisl. Maecenas gravida dictum fringilla. Phasellus lobortis, felis id accumsan condimentum, magna erat malesuada ligula, quis egestas urna nisl nec velit. Etiam at metus sit amet ex feugiat tincidunt.</p>
						</div>
					<div id="box">
						<img src="images/diet.jpg" width ="100%">
						<h3>A PERSONAL CALENDAR</h3>
						<p>Nullam quis eleifend lectus. Suspendisse et lacus placerat, suscipit erat id, ullamcorper nisl. Maecenas gravida dictum fringilla. Phasellus lobortis, felis id accumsan condimentum, magna erat malesuada ligula, quis egestas urna nisl nec velit. Etiam at metus sit amet ex feugiat tincidunt.</p>
					</div>
		
				</div>
			</section>
			<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="copyright">
						<li>&copy; Z4. All rights reserved.</li>
						<li>Design: Z4 </li>
						<li>Images: blabla.com </li>
						<li>
						<ul class="icons">
								<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
								
							</ul>
						</li>
					</ul>
				</div>
				
			</footer>
			<script type="text/javascript">
				function login(){
					var email = document.frm_login.email.value;
					var pass = document.frm_login.pass.value;
					var mode = document.frm_login.mode.value;
					sendRequest(
						login_result, '&email='+ email + '&pass=' + pass + '&mode=' + mode,
						'POST',
						'./member.html', true, true
					);
				}

				function login_result(oj){
					var res = decodeURIComponent(oj.responseText);
					if ( res == "login_ok" ) {
						location.href="./myprofile.html";
					}else {
						//alert(res);
						return false;
					}
				}

				function regist(){
					var email = document.frm_regist.email.value;
					var rname = document.frm_regist.rname.value;
					var surname = document.frm_regist.surname.value;
					var gender = document.frm_regist.gender.value;
					var weight = document.frm_regist.weight.value;
					var height = document.frm_regist.height.value;
					var pass1 = document.frm_regist.pass1.value;
					var pass2 = document.frm_regist.pass2.value;
					var mode = document.frm_regist.mode.value;
					sendRequest(
						regist_result, '&email='+ email + '&pass1=' + pass1 + '&pass2=' + pass2 + '&mode=' + mode + '&rname=' + rname + '&surname=' + surname + '&gender=' + gender + '&weight=' + weight + '&height=' + height + '&mode=' + mode,
						'POST',
						'./member.html', true, true
					);
				}

				function regist_result(oj){
					var res = decodeURIComponent(oj.responseText);

					if ( res == "regist_ok" ) {
						alert("Join successfully completed");
						location.href="./myprofile.html";
					}else {
						alert(res);
						return false;
					}
				}	
			</script>
	</body>
</html>
