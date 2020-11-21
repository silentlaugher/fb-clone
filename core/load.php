<?php
    include 'database/connection.php';
    include 'classes/Users.php';
    include 'classes/Post.php';
    global $pdo;
    $loadFromUser = new User($pdo);
    $loadFromPost = new Post($pdo);

    define("BASE_URL", "http://localhost/fb/");
?>