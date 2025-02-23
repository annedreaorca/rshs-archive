<?php
include '../db-conn.php';

if (isset($_POST['email'], $_POST['name'], $_POST['gender'], $_POST['password'], $_POST['confirm_password'])) {
    
    $email = $_POST['email'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check for empty fields
    if (empty($email) || empty($name) || empty($gender) || empty($password) || empty($confirm_password)) {
        header('location: sign-up.php?error=All fields are required!');
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        header('location: sign-up.php?error=Passwords do not match!');
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE lrn_or_email=?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        header('location: sign-up.php?error=Email already in use!');
        exit();
    }

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert teacher data into the database
    $stmt = $conn->prepare("INSERT INTO users (lrn_or_email, user_name, user_gender, user_password, is_archived, access_level) 
                            VALUES (?, ?, ?, ?, 0, 1)");

    if ($stmt->execute([$email, $name, $gender, $hashed_password])) {
        header('location: sign-in.php?success=Account created successfully! You can now log in.');
        exit();
    } else {
        header('location: sign-up.php?error=Something went wrong. Try again.');
        exit();
    }
}
?>
