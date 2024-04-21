<?php
session_start();
// initializing variables
$firstname = "";
$lastname = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'car_rental_v2' , 3308);

// SIGNUP USER
if (isset($_POST['signup'])) {
  // receive all input values from the form
  // clean the input data
  $firstname = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $age = (int) $_POST['age']; // Cast to integer to ensure numeric input
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['confirmPassword']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);


  // Check if email already exists
  $email_check_query = "SELECT * FROM customer WHERE email = ? LIMIT 1";
  $stmt = $db->prepare($email_check_query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user) { // if user exists
      if ($user['Email'] === $email) {
        $_SESSION['signup_error'] = "Email already in use";
        header('Location: signup.php');
        exit();
      }
  } else {
      // If user does not exist, hash the password and insert the new user into the database
      $hashed_password = password_hash($password_1, PASSWORD_BCRYPT);
      $insert_query = "INSERT INTO customer (Firstname, Lastname, Gender, Age, Email, Password, Phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $db->prepare($insert_query);
      $stmt->bind_param("sssisss", $firstname, $lastname, $gender, $age, $email, $hashed_password, $phonenumber);
      $stmt->execute();

      if ($stmt->affected_rows === 1) {
          header('Location: login.php'); // Redirect to login page after successful registration
      } else {
          echo "Error: " . $stmt->error;
      }
  }

  $stmt->close();
}

//LOGIN USER
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Preparing SQL statement
    $stmt = $db->prepare("SELECT password FROM customer WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Fetch the hashed password from the result
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if (password_verify($password, $hashed_password)) {
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            $_SESSION['success'] = "You are now logged in";
            
            // Store user email in a PHP variable
            $user_email = $email;
            
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['login_error'] = "Wrong username/password combination";
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Wrong username/password combination";
        header('Location: login.php');
        exit();
    }
}

function displayLoginStatus() {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        return true;
    }else{
        return false;
    }
}

// BOOK NOW
if (isset($_POST['book'])) {
    // Assuming $db is a valid MySQLi connection
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $vehicle = mysqli_real_escape_string($db, $_POST['vehicle-type']);
    $bdate = date('Y-m-d H:i:s', strtotime($_POST['date-from']));
    $rdate = date('Y-m-d H:i:s', strtotime($_POST['date-to']));
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    // Ensure user is logged in and email is set in the session
    if (isset($_SESSION['loggedin'])) {
        $user_email = $_SESSION['email']; // Retrieve user's email from session
        $instock_query = "SELECT instock FROM vehicle WHERE Brand = ?";
        $stmt_instock = $db->prepare($instock_query);
        $stmt_instock->bind_param("s", $vehicle);
        $stmt_instock->execute();
        $stmt_instock->store_result();

        if ($stmt_instock->num_rows === 1) {
            $stmt_instock->bind_result($instock);
            $stmt_instock->fetch();
   
            if ($instock > 0) {
                if ($bdate < $rdate) {
                    $duration = date_diff(new DateTime($bdate), new DateTime($rdate))->days;
                    $insert_query = "INSERT INTO booking (email, name, Brand, FromDate, ToDate, Duration, PhoneNumber, Comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $db->prepare($insert_query);
                    $stmt->bind_param("ssssssss", $user_email, $name, $vehicle, $bdate, $rdate, $duration, $phone, $message);
                    $stmt->execute();
                    
                    if ($stmt->affected_rows === 1) {
                        $update_query = "UPDATE vehicle SET instock = instock - 1 WHERE Brand = ?";
                        $stmt_update = $db->prepare($update_query);

                        if (!$stmt_update) {
                            die("Error in SQL query: " . $db->error);
                        }

                        $stmt_update->bind_param("s", $vehicle);
                        $stmt_update->execute();


                        header('Location: mybooking.php');
                        exit();
                    } else {
                        $_SESSION['book_error'] = "Failed to insert data into the database";
                        header('Location: fleet.php#footer');
                        exit();
                    }
                } else {
                    $_SESSION['book_error'] = "Enter a return date that is after the pick-up date";
                    header('Location: fleet.php#footer');
                    exit();
                }
                $stmt->close();
            } else {
                $_SESSION['book_error'] = "Vehicle is out of stock";
                header('Location: fleet.php#footer');
                exit();
            }
        }
    } else {
        $_SESSION['book_error'] = "Please log in to complete the booking";
        header('Location: login.php');
        exit();
    }
}

// Function to cancel booking
function cancelBooking($db, $booking_id, $user_email) {
    // Check if the booking belongs to the logged-in user
    $check_query = "SELECT * FROM booking WHERE Book_ID = ? AND email = ?";
    $stmt_check = $db->prepare($check_query);
    $stmt_check->bind_param("is", $booking_id, $user_email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows === 1) {
        // Booking found, proceed with cancellation
        $row = $result->fetch_assoc();
        $vehicle = $row['Brand'];

        // Delete booking from database
        $delete_query = "DELETE FROM booking WHERE Book_ID = ?";
        $stmt_delete = $db->prepare($delete_query);
        $stmt_delete->bind_param("i", $booking_id);
        $stmt_delete->execute();

        // Update vehicle stock
        $update_query = "UPDATE vehicle SET instock = instock + 1 WHERE Brand = ?";
        $stmt_update = $db->prepare($update_query);
        $stmt_update->bind_param("s", $vehicle);
        $stmt_update->execute();
        // Redirect to a confirmation page
        header('Location: cancel_confirmation.php');
        exit();
    } else {
        // Booking does not belong to the logged-in user
        $_SESSION['cancel_error'] = "You are not authorized to cancel this booking.";
        header('Location: mybookings.php');
        exit();
    }
}

// Cancel booking if requested
if (isset($_SESSION['loggedin']) && isset($_GET['cancel_booking'])) {
    $booking_id = $_GET['cancel_booking'];
    $user_email = $_SESSION['email'];
    cancelBooking($db, $booking_id, $user_email);
}

?>
