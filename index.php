<?php

require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\Post;

session_start();

// Usage example
$post = new Post();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/button-style.css">
    <title>My Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #555;
        }
        li {
            list-style-type: none;
            padding: 10px;
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <?php 
    if(isset($_SESSION['users'])) {
        echo '<h1>Your Blog Posts</h1>';
        echo '<h2>Welcome'. $_SESSION['users']['first_name'] .'</h2>';
        echo '<a href="blog.php"><button class = "add-blog-button">Add a blog post</button></a>';
        echo '<a href="logout.php"><button>Logout</button></a>';

        $posts = $post->getPostsByLoggedInUser($_SESSION['users']['id']);
        foreach ($posts as $key => $value) {
            echo '  <li><b>'. $value['title'] . '</b><small> Posted by: ' . $value['first_name'] . '  Posted at: ' . $value['created_at'] . '</small> <p>' . $value['content'] . '</li>';
        }
    } else {
        echo '<h1>All Blog Posts</h1>';
        echo '<a href="login.php"><button>Login</button></a>';
        echo '<a href="register.php"><button>Register</button></a>';

        $posts = $post->getPosts();
        foreach ($posts as $key => $value) {
            echo '  <li><b>'. $value['title'] . '</b><small> Posted by: ' . $value['first_name'] . '  Posted at: ' . $value['created_at'] . '</small> <p>' . $value['content'] . '</li>';
        }
    }
    ?>


    <?php
        // get all users from the database and return as an array then loop it inside foreach to create a list
    ?>
</body>
</html>