<?php
	session_start();
	include '../db-conn.php';

	if (!isset($_SESSION['user_user_id']) && !isset($_SESSION['user_name'])) {
		header('location: /admin/dashboard');
        exit();
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
		<link rel="shortcut icon" type="image/jpg" href="../assets/images/Archive-Favicon.png"/>
		<link rel="stylesheet" href="../globals.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
		<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
		<title><?= isset($pageTitle) ? $pageTitle : 'Default Title' ?></title>
		<style>
		    /* Dashboard */
            .overview-cards .card {
                display: flex !important;
                gap: 14px !important;
            }
            
            .overview-cards .card {
                padding: 20px 30px !important;
            }
            
            
            .overview-cards .card:nth-child(odd) {
                border-right: 1px solid #e0e0e0 !important;
            }
            
            .overview-cards .card:nth-child(4n), .overview-cards .card:nth-child(4n-1) {
                border-top: 1px solid #e0e0e0 !important;
            }
            @media screen and (max-width: 639px) {
                .overview-cards .card {
                    flex-direction: row !important;
                }
                .overview-cards {
                    padding: 5px 10px !important;
                }
                .overview-cards .card:not(:last-child) {
                    border-right: 0px solid #e0e0e0 !important;
                    border-bottom: 1px solid #e0e0e0 !important;
                }
            
                .overview-cards .card:nth-child(4n), .overview-cards .card:nth-child(4n-1) {
                    border-top: 0px solid #e0e0e0 !important;
                }
            
                .overview-cards .card {
                    padding: 20px 10px 20px 10px !important;
                }
            }
		</style>
	</head>
	<body class="bg-light">