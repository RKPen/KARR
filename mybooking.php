<?php
include 'server.php';
$isLoggedIn = displayLoginStatus();

// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE HTML>
<html lang="en">
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
                <li>
                    <a href="#" class="dropdown-toggle">About</a>

                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="team.php">Team</a></li>
                        <li><a href="testimonials.php">Testimonials</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="terms.php">Terms</a></li>
                        <li><a href="fleet.php">Fleet</a></li>
                        <li><a href="mybooking.php" class="active">My Booking</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">
            <div class="inner">
                <h1>My Booking</h1>

                <!-- PHP code block to display booking details -->
                <?php
                $user_email = $_SESSION['email'];
                $booking_query = "SELECT * FROM booking WHERE email = ?";
                $stmt = $db->prepare($booking_query);
                $stmt->bind_param("s", $user_email);
                $stmt->execute();
                $booking_result = $stmt->get_result();

                if ($booking_result->num_rows > 0) {
                    while ($booking_row = $booking_result->fetch_assoc()) {
                        ?>
                        <div class="receipt">
                            <h2>Booking Information</h2>
                            <p>Name: <?php echo $booking_row['Name']; ?></p>
                            <p>Brand: <?php echo $booking_row['Brand']; ?></p>
                            <p>From Date: <?php echo $booking_row['FromDate']; ?></p>
                            <p>To Date: <?php echo $booking_row['ToDate']; ?></p>
                            <p>Duration: <?php echo $booking_row['Duration']; ?> Days</p>
                            <p>Comment: <?php echo $booking_row['Comment']; ?></p>

                            <!-- Add more booking details as needed -->
                    
                            <a href="vehicle_details.php?Brand=<?php echo $booking_row['Brand']; ?>">View Vehicle Details</a>
                            <!-- Add cancel button -->
                            <?php
                            echo "<a href='server.php?cancel_booking={$booking_row['BOOK_ID']}' class='button primary'>Cancel Booking</a>";
                            ?>
                    <!-- Add any other sections or information you want to display -->
                        </div>
                    <?php
                    }
                } else {
                    // No bookings found for the user
                    echo "No bookings found for this user.";
                }
                        ?>             
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <section>
                    <h2><a href=fleet.php#footer>Book now</a></h2>
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
