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
                	// Logged in, display logout button
					$welcomeMessage = "<span style='font-weight: bold; font-size: larger;'> Signed in !</span>";
            		echo "<li>$welcomeMessage</li>";
                	echo "<li><a href='logout.php'>Logout</a></li>";
            	} else {
                	// Not logged in, display login/signup links
                	echo "<li><a href='login.php'>Login</a></li>";
                	echo "<li><a href='signup.php'>Signup</a></li>";
            	}
        		?>

				<li><a href="offers.php">Offers</a></li>

				<li>
					<a href="#" class="dropdown-toggle">About</a>

					<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="team.php">Team</a></li>
						<li><a href="testimonials.php">Testimonials</a></li>
						<li><a href="faq.php" class="active">FAQ</a></li>
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
				<h1>FAQ</h1>

				<div class="image main">
					<img src="images/banner-image-4-1920x500.jpg" class="img-fluid" alt="" />
				</div>

				<h2 class="m-n"><i class="fa fa-question-circle"></i> 1. How do I book a rental car?</h2>
				<p>Booking is easy and can be done online through our website. Simply enter your rental dates, location,
					and vehicle preference to see available options. You can then select your preferred vehicle and
					complete the booking with your personal details and payment information.</p>

				<h2 class="m-n"><i class="fa fa-question-circle"></i> 2. What documents do I need to rent a car?</h2>
				<p>To rent a car, you'll need a valid driver's license, a credit card in the driver's name, and proof of
					insurance. International customers should also bring their passport and, if required, an
					international driving permit.</p>

				<h2 class="m-n"><i class="fa fa-question-circle"></i> 3. Are there any age restrictions for renting a
					car?</h2>
				<p>Yes, drivers must be at least 21 years old to rent a car.</p>

				<h2 class="m-n"><i class="fa fa-question-circle"></i> 4. What is your fuel policy?</h2>
				<p>Our standard fuel policy is 'full-to-full'. You'll receive the car with a full tank of fuel and
					should return it full to avoid any refueling charges.</p>

				<h2 class="m-n"><i class="fa fa-question-circle"></i> 5. Do you offer discounts or special offers?</h2>
				<p>Yes, we often have special offers and discounts available. Check our website or sign up for our
					newsletter to stay updated on the latest deals.</p>

				<h2 class="m-n"><i class="fa fa-question-circle"></i> Question we didn't answer ?</h2>
				<p>For any further questions, don't hesitate to contact our customer service team. We're here to help
					make your rental experience as smooth and enjoyable as possible.</p>
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