<?php
require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\Post;

session_start();

$post = new Post();

if (isset($_POST['submit'])) {
    $post->addPost([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'author_id' => $_POST['author_id']
    ]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
        }

        .left-panel {
            flex: 1;
            background-color: #1b5e20; /* dark green */
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .left-panel h1 {
            font-size: 2.5rem;
            max-width: 400px;
            line-height: 1.4;
        }

        .right-panel {
            flex: 1;
            background-color: #e6f4e6; /* light green */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .form-container {
            background: #ffffff;
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-container h2 {
            margin-top: 0;
            color: #2e7d32;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        input[type="submit"] {
            background: #2e7d32; /* dark green */
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #1b5e20;
        }

        .greeting {
            margin-bottom: 1rem;
            color: #444;
        }

        a {
            color: #2e7d32;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 1rem;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="left-panel">
        <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['users']['first_name']); ?>! Ready to share your thoughts?</h1>
    </div>
    <div class="right-panel">
        <div class="form-container">
            <div class="greeting">
                <a href="index.php">&larr; Go back</a>
            </div>
            <h2>Add a Blog Post</h2>
            <form method="POST" action="blog.php">
                <input type="text" name="title" placeholder="Enter a title..." required>
                <input type="hidden" name="author_id" value="<?php echo htmlspecialchars($_SESSION['users']['id']); ?>">
                <textarea name="content" rows="6" placeholder="Write your content here..." required></textarea>
                <input type="submit" name="submit" value="Publish">
            </form>
        </div>
    </div>
</body>
</html>
