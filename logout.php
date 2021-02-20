<?php
    session_start();
    $_SESSION['user_level'] = '';
    unset($_SESSION['user_level']);
    session_unset();
    session_destroy();
    header("Location: index.html");
?>