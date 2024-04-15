<?php
session_start();
if (empty($_SESSION['logged_in'])) {
    header('location: login.php');
    exit();
}
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

				<li><a href="login.php">Login</a></li>

				<li><a href="signup.php">Signup</a></li>

				<li><a href="offers.php" class="active">Offers</a></li>

				<li>
					<a href="#" class="dropdown-toggle">About</a>

					<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="team.php">Team</a></li>
						<li><a href="testimonials.php">Testimonials</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="terms.php">Terms</a></li>
						<li><a href="fleet.php">Fleet</a></li>
					</ul>
				</li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<h1>Offers</h1>

				<div class="image main">
					<img src="images/banner-image-6-1920x500.jpg" class="img-fluid" alt="" />
				</div>

				<!-- Offers -->
				<section class="tiles">
					<article class="style1">
						<span class="image">
							<img src="images/Honda-car.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Our special limited-time offer on Honda rentals</h2>

							<p>price from: <strong> $ 99.99</strong> per weekend</p>

							<div class="content">
								<p></p>
							</div>
						</a>
					</article>
					<article class="style2">
						<span class="image">
							<img src="images/Toyota-car.webp" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Our special limited-time offer on Toyota rentals</h2>

							<p>price from: <strong> $ 99.99</strong> per weekend</p>

							<div class="content">
								<p></p>
							</div>
						</a>
					</article>
					<article class="style3">
						<span class="image">
							<img src="images/bmw-car.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Our special limited-time offer on BMW rentals</h2>

							<p>price from: <strong> $ 149.99</strong> per weekend</p>

							<div class="content">
								<p></p>
							</div>
						</a>
					</article>

					<article class="style4">
						<span class="image">
							<img src="images/mercedes-car.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Our special limited-time offer on Mercedes rentals</h2>

							<p>price from: <strong> $ 170.00</strong> per weekend</p>

							<div class="content">
								<p></p>
							</div>
						</a>
					</article>

					<article class="style5">
						<span class="image">
							<img src="images/Tahoe-car.png" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Our special limited-time offer on Tahoe rentals</h2>

							<p>price from: <strong> $ 180.00</strong> per weekend</p>

							<div class="content">
								<p></p>
							</div>
						</a>
					</article>

					<article class="style6">
						<span class="image">
							<img src="images/maserati-car.avif" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Our special limited-time offer on Maserati rentals</h2>

							<p>price from: <strong> $ 299.99</strong> per weekend</p>

							<div class="content">
								<p></p>
							</div>
						</a>
					</article>
				</section>
			</div>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<section>
					<h2>Book now</h2>
					<h2>Manage Your Account</h2>
					<ul>
						<li><a href="signup.php">Sign Up</a> - Create an account to manage bookings and get special
							offers.</li>
						<li><a href="login.php">Login</a> - Access your account to manage existing bookings and more.
						</li>
					</ul>
				</section>
				<section>
					<h2>Contact Info</h2>

					<ul class="alt">
						<li><span class="fa fa-envelope-o"></span> <a href="#">karrrentalcompany.info@gmail.com</a></li>
						<li><span class="fa fa-phone"></span> +961 77-777-777 </li>
						<li><span class="fa fa-map-pin"></span> Lebanon , Beirut , American University of Beirut</li>
					</ul>

					<h2>Follow Us</h2>

					<ul class="icons">
						<li><a href="https://twitter.com/KARRrental" class="icon style2 fa-twitter"><span
									class="label">X</span></a></li>
						<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
					</ul>
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