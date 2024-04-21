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
						<li class="active"><a href="about.php">About Us</a></li>
						<li><a href="team.php">Team</a></li>
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
				<h1>Terms</h1>

				<div class="image main">
					<img src="images/banner-image-5-1920x500.jpg" class="img-fluid" alt="" />
				</div>

				<h2 class="m-n">1. Terms of Rental</h2>
				<p><u>Eligibility</u> : The customer must meet the minimum age requirement of 21 years and possess a
					valid driver's license.<br>
					<u>Rental Period</u> : The customer agrees to return the vehicle on the date and time specified in
					the rental agreement, subject to any agreed extensions.
				</p>

				<h2 class="m-n">2. Payment and Fees</h2>
				<p><u>Rental Charges</u> : Charges are based on the vehicle type, rental period, and any additional
					services or insurance selected.<br>
					<u>Deposit</u> : A refundable deposit is required for all rentals, the amount of which may vary by
					vehicle type and rental duration.<br>
					<u>Late Return Fee</u> : Vehicles returned after the agreed time are subject to late return fees.
				</p>

				<h2 class="m-n">3. Use of Vehicle</h2>
				<p><u>Permitted Use</u> : The vehicle may only be used for normal driving purposes and must not be used
					for any competitive events, illegal activities, or in a manner that could cause damage.<br>
					<u>Restrictions</u> : The vehicle may not be driven outside the agreed-upon rental area without
					prior consent.
				</p>

				<h2 class="m-n">4. Insurance and Liability</h2>
				<p><u>Insurance</u> : Various insurance options are available and can be selected at the time of
					booking. The customer is responsible for any damages not covered by insurance.<br>
					<u>Liability</u> : KARR is not liable for any personal injuries or property damage arising from the
					use of the rented vehicle.
				</p>

				<h2 class="m-n">5. Cancellations and Refunds</h2>
				<p><u>Cancellation Policy</u> : Reservations can be canceled up to 48 hours before the rental start time
					for a full refund. Cancellations made after this period may incur a fee.<br>
					<u>No-Show Policy</u> : Failure to pick up the vehicle at the scheduled time without prior notice
					may result in forfeiture of the entire rental amount.
				</p>
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