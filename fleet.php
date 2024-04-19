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

				<li><a href="offers.php">Offers</a></li>

				<li><a href="fleet.php" class="active">Fleet</a></li>

				<li>
					<a href="#" class="dropdown-toggle">About</a>

					<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="team.php">Team</a></li>
						<li><a href="testimonials.php">Testimonials</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="terms.php">Terms</a></li>
					</ul>
				</li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<h1>Fleet</h1>

				<div class="image main">
					<img src="images/banner-image-7-1920x500.jpg" class="img-fluid" alt="" />
				</div>

				<!-- Fleet -->
				<section class="tiles">
					<article class="style1">
						<span class="image">
							<img src="images/product-1-720x480.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Volkswagen</h2>

							<p>price from: <strong> $ 90.00</strong> per weekend</p>

							<p>
								<i class="fa fa-user"></i> 5 &nbsp;&nbsp;
								<i class="fa fa-briefcase"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-sign-out"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-cog"></i> A
							</p>
						</a>
					</article>
					<article class="style2">
						<span class="image">
							<img src="images/product-2-720x480.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Chevrolet</h2>

							<p>price from: <strong> $ 100.00</strong> per weekend</p>

							<p>
								<i class="fa fa-user"></i> 5 &nbsp;&nbsp;
								<i class="fa fa-briefcase"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-sign-out"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-cog"></i> A
							</p>
						</a>
					</article>
					<article class="style3">
						<span class="image">
							<img src="images/product-3-720x480.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Renault</h2>

							<p>price from: <strong> $ 110.00</strong> per weekend</p>

							<p>
								<i class="fa fa-user"></i> 5 &nbsp;&nbsp;
								<i class="fa fa-briefcase"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-sign-out"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-cog"></i> A
							</p>
						</a>
					</article>

					<article class="style4">
						<span class="image">
							<img src="images/product-4-720x480.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Maserati</h2>

							<p>price from: <strong> $ 120.00</strong> per weekend</p>

							<p>
								<i class="fa fa-user"></i> 5 &nbsp;&nbsp;
								<i class="fa fa-briefcase"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-sign-out"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-cog"></i> A
							</p>
						</a>
					</article>

					<article class="style5">
						<span class="image">
							<img src="images/product-5-720x480.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>Fiat</h2>

							<p>price from: <strong> $ 130.00</strong> per weekend</p>

							<p>
								<i class="fa fa-user"></i> 5 &nbsp;&nbsp;
								<i class="fa fa-briefcase"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-sign-out"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-cog"></i> A
							</p>
						</a>
					</article>

					<article class="style6">
						<span class="image">
							<img src="images/product-6-720x480.jpg" alt="" />
						</span>
						<a href="#footer" class="scrolly">
							<h2>BMW</h2>

							<p>price from: <strong> $ 140.00</strong> per weekend</p>

							<p>
								<i class="fa fa-user"></i> 5 &nbsp;&nbsp;
								<i class="fa fa-briefcase"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-sign-out"></i> 4 &nbsp;&nbsp;
								<i class="fa fa-cog"></i> A
							</p>
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
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<input type="text" name="name" id="name" placeholder="Your Name" />
							</div>

							<div class="field half">
								<select name="vehicle-type" id="vehicle-type">
									<option value="">Volkswagen</option>
									<option value="">Chevrolet</option>
									<option value="">Renault</option>
									<option value="">Maserati</option>
									<option value="">Fiat</option>
									<option value="">BMW</option>
								</select>
							</div>

							<div class="field half">
								<input type="datetime-local" name="date-from" id="date-from"
									placeholder="Pick-up date/time" />
							</div>

							<div class="field half">
								<input type="datetime-local" name="date-to" id="date-to"
									placeholder="Return date/tiem" />
							</div>

							<div class="field half">
								<input type="text" name="email" id="email" placeholder="Email" />
							</div>

							<div class="field half">
								<input type="text" name="phone" id="phone" placeholder="Phone" />
							</div>

							<div class="field">
								<textarea name="message" id="message" rows="3" placeholder="Comment"></textarea>
							</div>

							<div class="field text-right">
								<label>&nbsp;</label>

								<ul class="actions">
									<li><input type="submit" value="Book now" class="primary" /></li>
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