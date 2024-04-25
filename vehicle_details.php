<?php
// Include the database connection file
include 'server.php';
$isLoggedIn = displayLoginStatus();

// Check if the brand parameter is set in the URL
if (isset($_GET['Brand'])) {
    // Retrieve and sanitize the brand parameter from the URL
    $brand = mysqli_real_escape_string($db, $_GET['Brand']);

    // Query to fetch details of the vehicle using the brand
    $vehicle_query = "SELECT * FROM vehicle WHERE Brand = ?";
    $stmt = $db->prepare($vehicle_query);
    $stmt->bind_param("s", $brand);
    $stmt->execute();
    $vehicle_result = $stmt->get_result();

    // Check if the vehicle details are found
    if ($vehicle_result->num_rows > 0) {
        // Fetch the details of the vehicle
        $vehicle_row = $vehicle_result->fetch_assoc();

        // Query to fetch booking details
        $booking_query = "SELECT Duration FROM booking WHERE Brand = ?";
        $stmt = $db->prepare($booking_query);
        $stmt->bind_param("s", $brand);
        $stmt->execute();
        $booking_result = $stmt->get_result();

        // Check if the booking details are found
        if ($booking_result->num_rows > 0) {
            // Fetch the duration from booking
            $booking_row = $booking_result->fetch_assoc();
            $duration = $booking_row['Duration'];

            // Calculate total price
            $total_price = $vehicle_row['Price'] * $duration;

            // Display the vehicle details
            ?>
        <!DOCTYPE HTML>
        <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
            <title>Vehicle Details</title>
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
                        <li><a href="mybooking.php">My Booking</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>

                <!-- Main -->
                <div id="main">
                     <div class="vehicle-details" style="background-color: #fff; border: 2px solid #000; padding: 20px; max-width: 600px; margin: 0 auto;">
                        <h2 style="font-size: 24px; margin-bottom: 10px; text-align: center;">Vehicle Details</h2>
        
                        <div style="text-align: center; margin-bottom: 20px;">
                            <img src="https://karrrental.com/images/<?php echo $vehicle_row['Image_Path']; ?>" alt="Vehicle Image" width="400" height="300" style="border: 2px solid #000; border-radius: 5px;">
                        </div>
                    
                        <p style="margin: 5px 0;"><strong>Plate Number:</strong> <?php echo $vehicle_row['Plate_Num']; ?></p>
                        <p style="margin: 5px 0;"><strong>Total Price for <?php echo $duration; ?> Days:</strong> $<?php echo $total_price; ?></p>
                        <p style="margin: 5px 0;"><strong>Color:</strong> <?php echo $vehicle_row['Color']; ?></p>
                        <p style="margin: 5px 0;"><strong>Gas Type:</strong> <?php echo $vehicle_row['Gas_Type']; ?></p>
                        <p style="margin: 5px 0;"><strong>Mileage:</strong> <?php echo $vehicle_row['Milage']; ?>KM</p>
                        <p style="margin: 5px 0;"><strong>Brand:</strong> <?php echo $vehicle_row['Brand']; ?></p>
                        <p style="margin: 5px 0;"><strong>Model:</strong> <?php echo $vehicle_row['Model']; ?></p>
                        <p style="margin: 5px 0;"><strong>Type:</strong> <?php echo $vehicle_row['Type']; ?></p>
                        <p style="margin: 5px 0;"><strong>Year:</strong> <?php echo $vehicle_row['Year']; ?></p>
                    
                        <p style="text-align: center; margin-top: 20px;">
                            <a href="mybooking.php" style="color: #007bff; text-decoration: none;">Back to My Booking</a>
                        </p>
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
        </body>
        </html>
        <?php
   // } else {
        echo "No details found for the booked vehicle.";
    }
} else {
    // Redirect if the brand parameter is not set
    header('Location: fleet.php');
    exit();
}}
?>
