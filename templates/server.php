<?php
session_start();
include 'db_connect.php';


$username = $password = '';

if (isset($_POST['register'])) { // Check if the register button was clicked
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);

  $username_pattern = '/^[a-zA-Z0-9]{5,}$/';
  $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,64}$/';
  $email_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  $phone_pattern = '/^(\+?\d{1,3})?[ -]?\(?\d{1,3}\)?[ -]?\d{3}[ -]?\d{4}$/';

  // Validation
  if (empty($username) || !preg_match($username_pattern, $username)) {
    $errors[] = "Invalid or missing username.";
  }
  if (empty($password) || !preg_match($password_pattern, $password)) {
    $errors[] = "Invalid or missing password.";
  }
  if (empty($email) || !preg_match($email_pattern, $email)) {
    $errors[] = "Invalid or missing email.";
  }
  if (empty($phone) || !preg_match($phone_pattern, $phone)) {
    $errors[] = "Invalid or missing phone.";
  }
  if (empty($address)) {
    $errors[] = "Address is required.";
  }

  // Only insert if there are no errors
  if (count($errors) == 0) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username, password, email, phone, address) 
            VALUES ('$username', '$hashed_password', '$email', '$phone', '$address')";
    if (mysqli_query($conn, $sql)) {
      mysqli_close($conn);
      header('Location: loginv_2.php');
      exit();
    } else {
      $errors[] = "Error: " . mysqli_error($conn);
    }
  }
}

if (isset($_POST['login']) && $dbconnected) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($username) || empty($password)) {
    $errors[] = "Username and password are required";
  } else {
    $query = "SELECT * FROM users WHERE username='$username' ";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc($result);
      // Assuming passwords are hashed, using password_verify to check it
      if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['uid'] = $user['user_id'];
        $_SESSION['admin'] = $user['is_admin'];
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['logged_in'] = true;
        header('location: index.php');
        exit;
      } else {
        $errors[] = "Invalid username or password";
      }
    } else {
      $errors[] = "Invalid username or password";
    }
  }
}
