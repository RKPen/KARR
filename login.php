<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login - KARR Car Rental</title>
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
                <li><a href="index.php" class="active">Home</a></li>

                <li><a href="login.php">Login</a></li>

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
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">
            <form method="post" action="server.php">
                <?php include('errors.php'); ?>
                <h2>Login</h2>
                <div class="form-group">
                    <label for="loginEmail">Email:</label>
                    <input type="email" id="loginEmail" name="email"  required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password:</label>
                    <input type="password" id="loginPassword" name="password" required>
                </div>
                <button type="L-submit" , name= "login">Login</button>
                <p class="S-login">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </form>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <section>
                    <ul class="icons">
                        <li><a href="https://twitter.com/KARRrental" class="icon style2 fa-twitter"><span class="label">X</span></a></li>
                        <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    </ul>

                    &nbsp;
                </section>

                <ul class="copyright">
                    <li>Copyright © 2024 KARR Car Rental </li>
                </ul>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/login.js"></script>
</body>

</html>