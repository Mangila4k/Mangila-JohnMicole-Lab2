<?php

require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\User;

session_start();

$user = new User();
$message = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Validate the password match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $message = "Passwords do not match!";
    } else {
        $registered = $user->register([
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ]);

        if ($registered) {
            $message = "You have successfully registered! You may now login.";
        } else {
            $message = "Registration failed. Please try again.";
        }
    }
}

// Redirect if user is already logged in
if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            height: 100vh;
            font-family: 'Roboto', sans-serif;
            background: url('https://via.placeholder.com/1920x1080') no-repeat center center fixed; /* background image */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .register-form {
            background: rgba(255, 255, 255, 0.8); /* semi-transparent white */
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            backdrop-filter: blur(5px);
        }

        .register-form h1 {
            margin-top: 0;
            color: #2e7d32;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 2rem;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #2e7d32;
        }

        input[type="submit"] {
            background: #2e7d32;
            color: #fff;
            border: none;
            padding: 0.75rem;
            font-size: 1.1rem;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #1b5e20;
        }

        .register-form p {
            margin-top: 1rem;
            text-align: center;
        }

        .register-form a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: bold;
        }

        .register-form a:hover {
            text-decoration: underline;
        }

        .success-message, .error-message {
            padding: 0.75rem;
            border-radius: 5px;
            font-size: 0.95rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .success-message {
            background-color: #d0f0d0;
            color: #2e7d32;
        }

        .error-message {
            background-color: #fdecea;
            color: #d32f2f;
        }

        /* Extra mobile-friendly styles */
        @media (max-width: 600px) {
            .register-form {
                padding: 1.5rem 2rem;
            }

            .register-form h1 {
                font-size: 1.5rem;
            }

            input[type="submit"] {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-form">
        <form method="POST" action="register.php">
            <h1>Register</h1>
            
            <!-- Show success or error messages -->
            <?php if ($message): ?>
                <div class="<?php echo strpos($message, 'success') !== false ? 'success-message' : 'error-message'; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            
            <input type="submit" name="submit" value="Register">
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
