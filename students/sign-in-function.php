<?php
session_start();
unset($_SESSION['student_id']);
include '../db-conn.php';

if (isset($_POST['uid']) && isset($_POST['password'])) {
	
	$uid= $_POST['uid'];
	$password= $_POST['password'];

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

			$user_user_id = $users['user_id'];
			$user_lrn_or_email = $users['lrn_or_email'];
			$user_name = $users['user_name'];
			$user_password = $users['user_password'];
			$user_secret = $users['user_password'];

			if ($password === $user_password) {
				$_SESSION['user_user_id'] = $user_user_id;
				$_SESSION['user_lrn_or_email'] = $user_lrn_or_email;
				$_SESSION['user_name'] = $user_name;
				$_SESSION['user_secret'] = $user_password;

				// Check if user is a teacher (access_level 2)
				if ($users['access_level'] == 2) {
					header("Location: /rshs-archive/students/dashboard");
					exit();
				} else {
					// If not a teacher, show an error message and redirect to login
					header('location: index.php?error=Access Denied! Only Students of RS can access the dashboard.');
					exit();
				}
			} else {
				header('location: index.php?error=Wrong Credentials!');
				exit();
			}
		} else {
			header('location: index.php?error=Invalid User!');
			exit();
		}
	}
}
?>
