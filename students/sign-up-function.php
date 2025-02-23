<?php
session_start();
include '../db-conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $gender = $_POST['gender'];
    $grade = $_POST['grade'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate fields
    if (empty($email) || empty($username) || empty($gender) || empty($grade) || empty($password) || empty($confirm_password)) {
        header('location: sign-up.php?error=All fields are required!');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: sign-up.php?error=Invalid email format!');
        exit();
    }

    if ($password !== $confirm_password) {
        header('location: sign-up.php?error=Passwords do not match!');
        exit();
    }

    // Check if the email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE lrn_or_email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        header('location: sign-up.php?error=Email already exists!');
        exit();
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (lrn_or_email, user_name, user_gender, grade_level, user_password, is_archived, access_level) 
                        VALUES (?, ?, ?, ?, ?, 0, 2)");
    $inserted = $stmt->execute([$email, $username, $gender, $grade, $hashed_password]);
        
    if ($inserted) {
        header('location: sign-in.php?success=Account created successfully! Please log in.');
        exit();
    } else {
        header('location: sign-up.php?error=Failed to create account. Try again!');
        exit();
    }
}
?>
