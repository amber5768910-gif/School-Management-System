<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}
// Check if user has specific role
function has_role($role) {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === $role;
}

// Check if user has permission (admin or principal)
function has_permission() {
    return isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], ['admin', 'principal']);
}

// Redirect to login if not logged in
function require_login() {
    if (!is_logged_in()) {
        header('Location: ../login.php');
        exit();
    }
}

// Redirect to login if no permission
function require_permission() {
    require_login();
    if (!has_permission()) {
        header('Location: admin/index.php?error=no_permission');
        exit();
    }
}

// Get current user info
function get_logged_in_user() {
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'username' => $_SESSION['tuname'] ?? null,
        'name' => $_SESSION['name'] ?? null,
        'role' => $_SESSION['user_role'] ?? null
    ];
}
?>