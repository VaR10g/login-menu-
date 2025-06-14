<?php

session_start();
require_once 'config.php';


if (isset($_POST['register'])) {
  
    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


   $checkEmail = $conn->query("SELECT email FROM users WHERE email= '$email'");
   if ($checkEmail->num_rows > 0) {
         
       $_SESSION['register_error'] = "Email already exists. Please use a different email.";
       $_SESSION['active_form'] = 'register';
   } else {
   
         $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
   }

header("Location: index.php");
exit();  
}

if (isset($_POST['login'])) {
  
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        // If email exists, fetch user data
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // If password is correct, set session variables and redirect
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
           // Set user role in session
            
           if ($user['role'] === 'admin') {
               header("Location: admin_page.php");
            } else {
                header("Location: user_page.php");
            }
            exit();
        }    
}
// If email does not exist or password is incorrect, set error message and redirect
$_SESSION['login_error'] = "Invalid email or password.";
// Set active form to login
$_SESSION['active_form'] = 'login';
header("Location: index.php");
exit();
}
?>