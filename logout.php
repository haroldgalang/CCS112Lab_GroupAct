<?php
session_start();

// Destroy the session data
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>