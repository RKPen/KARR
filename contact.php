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

				<li><a href="signup.php">Signup</a></li>

				<li><a href="offers.php">Offers</a></li>

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
				<li><a href="contact.php" class="active">Contact Us</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<h1>Contact Us</h1>
				<span class="image main"><iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.565755444001!2d35.48074400000001!3d33.9008359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f16d44859007f%3A0x6189012b4bd99908!2sAmerican%20University%20of%20Beirut!5e0!3m2!1sen!2slb!4v1713124854357!5m2!1sen!2slb"
						width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe></span>
				<p>Get in Touch with KARR Rental</p>

				<p>We're here to help you hit the road in style! Whether you have questions about our fleet, need
					assistance with booking, or want to discuss long-term rental options, our team is ready to provide
					you with top-notch service and support. Contact us anytime via phone, email, or by visiting our
					office. Let KARR Car Rental be part of your next journey, ensuring a seamless and enjoyable
					experience from start to finish. Drive with us, drive with confidence!</p>
			</div>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<section>
					<h2>Contact Us</h2>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>

							<div class="field half">
								<input type="text" name="email" id="email" placeholder="Email" />
							</div>

							<div class="field">
								<input type="text" name="subject" id="subject" placeholder="subject" />
							</div>

							<div class="field">
								<textarea name="message" id="message" rows="3" placeholder="Notes"></textarea>
							</div>

							<div class="field text-right">
								<label>&nbsp;</label>

								<ul class="actions">
									<li><input type="submit" value="Send Message" class="primary" /></li>
								</ul>
							</div>
						</div>
					</form>
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
						<li><a href="https://www.facebook.com/karr.rental" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/karrrental?igsh=eHhkcDVmN25reXNz" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
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