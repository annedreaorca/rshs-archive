<?php
include '../db-conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id']) && isset($_POST['access_level'])) {
    $user_id = $_POST['user_id'];
    $access_level = $_POST['access_level'];

    // Update user's access level
    $stmt = $conn->prepare("UPDATE users SET access_level = ? WHERE user_id = ?");
    $stmt->execute([$access_level, $user_id]);

    // Redirect back to the user list with a success message
    header("Location: users.php?success=Access Level Updated Successfully");
    exit();
} else {
    header("Location: users.php?error=Invalid Request");
    exit();
}
?>
