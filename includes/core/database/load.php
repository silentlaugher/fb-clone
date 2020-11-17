<?php
    include 'includes/core/database/connection.php';
    include 'includes/core/classes/Users.php';
    include 'includes/core/classes/Post.php';
    global $pdo;
    $loadFromUser = new User($pdo);
    $loadFromPost = new Post($pdo);

    define("BASE_URL", "http://localhost/fb/");
?>