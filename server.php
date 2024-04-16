<?php
session_start();


// initializing variables
$firstname = "";
$lastname = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'car rental v2' , 3308);

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
          echo "Email already exists.";
          exit;
      }
  } else {
      // If user does not exist, hash the password and insert the new user into the database
      $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);
      $insert_query = "INSERT INTO customer (Firstname, Lastname, Gender, Age, Email, Password, Phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $db->prepare($insert_query);
      $stmt->bind_param("sssisss", $firstname, $lastname, $gender, $age, $email, $hashed_password, $phonenumber);
      $stmt->execute();

      if ($stmt->affected_rows === 1) {
          echo "Registration successful!";
          header('Location: login.php'); // Redirect to login page after successful registration
      } else {
          echo "Error: " . $stmt->error;
      }
  }

  $stmt->close();
}

// LOGIN USER
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Preparing SQL statement
  $stmt = $db->prepare("SELECT * FROM customer WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($user = $result->fetch_assoc()) {
      // Verify the hashed password
      if (password_verify($password, $user['Password'])) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('Location: index.php');
          exit();
      } else {
          array_push($errors, "Wrong username/password combination");
      }
  } else {
      array_push($errors, "Wrong username/password combination");
  }
}

?>