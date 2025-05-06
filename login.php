<?php

require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\User;

session_start();

$user = new User();

if (isset($_POST['submit'])) {
    $user_info = $user->login([
        'username' => $_POST['username'],
    ]);

    if ($user_info && password_verify($_POST['password'], $user_info['password'])) {
        $_SESSION['users'] = $user_info;
        header('Location: index.php');
        exit;
    } else {
        $message = 'Invalid username or password';
    }
}

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
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #e6f4e6; /* light green */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            background: #ffffff;
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-form h1 {
            margin-top: 0;
            color: #2e7d32; /* dark green */
            margin-bottom: 1.5rem;
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        input[type="submit"] {
            background: #2e7d32;
            color: #fff;
            border: none;
            padding: 0.75rem;
            font-size: 1rem;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background: #1b5e20;
        }

        .login-form p {
            margin-top: 1rem;
            text-align: center;
        }

        .login-form a {
            color: #2e7d32;
            text-decoration: none;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #d32f2f;
            background-color: #fdecea;
            padding: 0.75rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <form method="POST" action="login.php">
            <h1>Login</h1>
            <?php if (isset($message)): ?>
                <div class="error-message"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Login">
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        </form>
    </div>
</body>
</html>
