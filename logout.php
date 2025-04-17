<?php
// Start the session
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Regenerate session id for security
session_id(uniqid());

// Set a session message to inform user of successful logout
session_start();
$_SESSION['message'] = "You have been successfully logged out.";
$_SESSION['message_type'] = "success";

// Redirect to homepage
header("Location: index.php");
exit();
?>