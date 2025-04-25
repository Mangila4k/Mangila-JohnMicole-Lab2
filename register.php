<?php

require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\User;

session_start();

// Usage example
$user = new User();

// checks if the button is clicked and the form is submitted. If true, run the createUser() function from our User class
// Then pass in an array of data to the createUser class since createUser accepts an array of data
if(isset($_POST['submit'])) {
    $registered = $user->register([
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ]);
}

if(isset($_SESSION['users']) && !empty($_SESSION['users'])) {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class = "register-form">
        <form method="POST" action="register.php">
            <h1>Register</h1>
            <?php echo isset($registered) ? 'You have successfully registered! You may now login' : ''; ?>
            <input type="text" name="first_name" id="" placeholder="First Name">
            <input type="text" name="last_name" id="" placeholder="Last Name">
            <input type="username" name="username" id="" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    
</body>
</html>