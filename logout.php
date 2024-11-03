<?php
// Start session
session_start();
// Unset all of the session variables
session_unset();
// Destroy the session.
session_destroy();
// Redirect to login
header('Location: login');

die();
?>
