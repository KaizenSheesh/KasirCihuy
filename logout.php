<?php
session_start(); // Start the session (if not started already)
include 'koneksi.php'; // Include your database connection file

function logout() {
    // Destroy all session data
    session_destroy();

    // Unset all session variables
    $_SESSION = array();

    // Ensure that the session cookie is deleted
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Redirect to the login page (change this to your actual login page)
    header("Location: adminlogin.php");
    exit(); // Ensure that no further code is executed after the redirect
}

// Example usage (usually in your logout.php file):
logout();
?>
