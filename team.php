<?php
include 'server.php';
$isLoggedIn = displayLoginStatus();
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<div class="inner">

				<!-- Logo -->
				<a href="index.php" class="logo">
					<span class="fa fa-car"></span> <span class="title">KARR Rental</span>
				</a>

				<!-- Nav -->
				<nav>
					<ul>
						<li><a href="#menu">Menu</a></li>
					</ul>
				</nav>

			</div>
		</header>

		<!-- Menu -->
		<nav id="menu">
			<h2>Menu</h2>
			<ul>
				<li><a href="index.php">Home</a></li>

				<?php
            	if ($isLoggedIn) {
					$welcomeMessage = "<span style='font-weight: bold; font-size: larger;'> Signed in !</span>";
            		echo "<li>$welcomeMessage</li>";
                	// Logged in, display logout button
                	echo "<li><a href='logout.php'>Logout</a></li>";
            	} else {
                	// Not logged in, display login/signup links
                	echo "<li><a href='login.php'>Login</a></li>";
                	echo "<li><a href='signup.php'>Signup</a></li>";
            	}
        		?>

				<li>
					<a href="#" class="dropdown-toggle">About</a>

					<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="team.php" class="active">Team</a></li>
						<li><a href="testimonials.php">Testimonials</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="terms.php">Terms</a></li>
						<li><a href="fleet.php">Fleet</a></li>
						<li><a href="mybooking.php">My Booking</a></li>

					</ul>
				</li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<h1>Team</h1>

				<div class="image main">
					<img src="images/banner-image-2-1920x500.jpg" class="img-fluid" alt="" />
				</div>

				<div class="container">
					<div class="row">
						<div class="col-sm-3 text-center">
							<img src="images/Roy.jpg" class="img-fluid" alt="" />

							<h2 class="m-n">Roy Yammine</h2>

							<p>
								<br>

								<a href="#"><i class="fa fa-twitter"></i></a> &nbsp;
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</p>
						</div>

						<div class="col-sm-3 text-center">
							<img src="images/karim5.jpg" class="img-fluid" alt="" />

							<h2 class="m-n">karim Maamari</h2>

							<p>
								<br>

								<a href="#"><i class="fa fa-twitter"></i></a> &nbsp;
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</p>
						</div>

						<div class="col-sm-3 text-center">
							<img src="images/riad2.jpg" class="img-fluid" alt="" />

							<h2 class="m-n">Riad El Zaylaa</h2>

							<p>
								<br>

								<a href="#"><i class="fa fa-twitter"></i></a> &nbsp;
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</p>
						</div>

						<div class="col-sm-3 text-center">
							<img src="images/anthony2.jpg" class="img-fluid" alt="" />

							<h2 class="m-n">Anthony Sarkis</h2>

							<p>
								<br>

								<a href="#"><i class="fa fa-twitter"></i></a> &nbsp;
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<section>
					<ul class="icons">
						<li><a href="https://twitter.com/KARRrental" class="icon style2 fa-twitter"><span
									class="label">X</span></a></li>
						<li><a href="https://www.facebook.com/karr.rental" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/karrrental?igsh=eHhkcDVmN25reXNz" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>

					&nbsp;
				</section>

				<ul class="copyright">
					<li>Copyright © 2024 KARR Car Rental </li>
				</ul>
			</div>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/login.js"></script>
	
</body>

</html>
