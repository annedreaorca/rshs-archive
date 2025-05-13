<?php
session_start();
unset($_SESSION['admin_id']);
include '../db-conn.php';

if (isset($_POST['uid']) && isset($_POST['password'])) {
    
    $uid = $_POST['uid'];
    $password = $_POST['password'];

    if (empty($uid)) {
        header('location: index.php?error=Username is Required!');
        exit();
    } elseif (empty($password)) {
        header('location: index.php?error=Password is Required!');
        exit();
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE lrn_or_email=?");
        $stmt->execute([$uid]);

        if ($stmt->rowCount() === 1) {
            $users = $stmt->fetch();

            $user_id = $users['user_id'];
            $user_email = $users['lrn_or_email'];
            $user_name = $users['user_name'];
            $user_hashed_password = $users['user_password'];
            $access_level = $users['access_level']; // Fetch access level

            // Verify hashed password
            if (password_verify($password, $user_hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['access_level'] = $access_level; // Store access level in session

                // Redirect based on user role
                if ($access_level == 1) {
                    header("Location: /admin/dashboard"); // Admins go to admin dashboard
                    exit();
                } else {
                    header("Location: /student/dashboard"); // Students go to student dashboard
                    exit();
                }
            } else {
                header('location: sign-in.php?error=Wrong Credentials!');
                exit();
            }
        } else {
            header('location: sign-in.php?error=Invalid User!');
            exit();
        }
    }
}
?>
