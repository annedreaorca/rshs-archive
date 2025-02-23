<?php
include '../db-conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Prevent deletion of super admins (if applicable)
    $stmt = $conn->prepare("SELECT access_level FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user && $user['access_level'] == 0) {
        header("Location: users.php?error=Cannot delete super admin");
        exit();
    }

    // Delete user from the database
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);

    // Redirect back with success message
    header("Location: users.php?success=User Deleted Successfully");
    exit();
} else {
    header("Location: users.php?error=Invalid Request");
    exit();
}
