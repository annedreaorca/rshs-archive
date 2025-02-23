<?php
	session_start();
	if (isset($_SESSION['user_user_id']) && isset($_SESSION['user_name']))
	{ 
		header('location: dashboard.php');
	}
	// Function to set active class on navigation for page title
	function setActiveClass($pageName) {
		$currentPage = basename($_SERVER['PHP_SELF']);
		return $currentPage == $pageName ? 'active' : '';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" type="image/jpg" href="image/gc-cores-favicon.png"/>
		<link rel="stylesheet" href="globals.css">
		<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
		<title><?= isset($pageTitle) ? $pageTitle : 'Default Title' ?></title>
		<!-- Set Custom Styles with Tailwind CSS
		<style type="text/tailwindcss">
			@theme {
				/* Background Colors */
				--background-color-primary: #1d2a62;
				--background-color-secondary: #87aece;
				--background-color-tertiary: #f5f3d8;
				--background-color-accent: #1d2a62;
				--background-color-light: #f8f9fa;
				--background-color-dark: #1b1d1f;

				/* Text Colors */
				--color-primary: #1d2a62;
				--color-secondary: #87aece;
				--color-tertiary: #f5f3d8;
				--color-accent: #1d2a62;
				--light: #f8f9fa;
				--dark: #1b1d1f;
				
				/* Alert Colors */
				--background-color-success: #15802e;
				--background-color-danger: #7a1d1d;
				--background-color-warning: #e4ad0a;
			}

		</style> -->
	</head>
	<body class="overflow-hidden bg-light">