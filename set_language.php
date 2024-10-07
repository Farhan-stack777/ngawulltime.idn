<?php
session_start();

// Set the language based on the URL parameter
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'id'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Redirect back to the referring page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
