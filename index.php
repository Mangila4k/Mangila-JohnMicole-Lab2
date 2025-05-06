<?php

require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\Post;

session_start();

$post = new Post();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f5f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2e7d32;
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 1.8rem;
        }

        .actions a button {
            margin-left: 10px;
            background-color: #81c784;
            border: none;
            padding: 0.6rem 1rem;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .actions a button:hover {
            background-color: #66bb6a;
        }

        .container {
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .welcome {
            font-size: 1.2rem;
            color: #444;
            margin-bottom: 2rem;
        }

        .post-card {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
            margin-bottom: 1.5rem;
        }

        .post-card h2 {
            margin-top: 0;
            color: #2e7d32;
        }

        .post-meta {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 1rem;
        }

        .post-content {
            color: #333;
            line-height: 1.6;
        }

        .no-posts {
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>

<header>
    <h1>My Blog</h1>
    <div class="actions">
        <?php if(isset($_SESSION['users'])): ?>
            <a href="blog.php"><button>Add Post</button></a>
            <a href="logout.php"><button>Logout</button></a>
        <?php else: ?>
            <a href="login.php"><button>Login</button></a>
            <a href="register.php"><button>Register</button></a>
        <?php endif; ?>
    </div>
</header>

<div class="container">
    <?php 
    if (isset($_SESSION['users'])) {
        echo '<div class="welcome">Welcome, ' . htmlspecialchars($_SESSION['users']['first_name']) . '!</div>';
        $posts = $post->getPostsByLoggedInUser($_SESSION['users']['id']);

        if (empty($posts)) {
            echo '<div class="no-posts">You haven\'t posted anything yet.</div>';
        }

        foreach ($posts as $value) {
            echo '<div class="post-card">';
            echo '<h2>' . htmlspecialchars($value['title']) . '</h2>';
            echo '<div class="post-meta">Posted by: ' . htmlspecialchars($value['first_name']) . ' | ' . $value['created_at'] . '</div>';
            echo '<div class="post-content">' . nl2br(htmlspecialchars($value['content'])) . '</div>';
            echo '</div>';
        }

    } else {
        echo '<div class="welcome">Browse all public blog posts:</div>';
        $posts = $post->getPosts();

        if (empty($posts)) {
            echo '<div class="no-posts">No blog posts available.</div>';
        }

        foreach ($posts as $value) {
            echo '<div class="post-card">';
            echo '<h2>' . htmlspecialchars($value['title']) . '</h2>';
            echo '<div class="post-meta">Posted by: ' . htmlspecialchars($value['first_name']) . ' | ' . $value['created_at'] . '</div>';
            echo '<div class="post-content">' . nl2br(htmlspecialchars($value['content'])) . '</div>';
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>
