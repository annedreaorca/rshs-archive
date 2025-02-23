<?php $pageTitle = 'Students Sign In';
    include '_components/loading.php';
?>

<?php
	session_start();

    // Prevent browser from caching the page
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Check if the user is already logged in
    if (isset($_SESSION['user_user_id']) && isset($_SESSION['user_name'])) {
        header('Location: /rshs-archive/students/dashboard');
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
		<link rel="shortcut icon" type="image/jpg" href="/rshs-archive/assets/images/Archive-Favicon.png"/>
		<link rel="stylesheet" href="/rshs-archive/globals.css">
		<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
		<title><?= isset($pageTitle) ? $pageTitle : 'Default Title' ?></title>
	</head>
	<body class="bg-light">
        <main class="flex bg-front overflow-hidden max-[840px]:items-end main-content" id="mainContent">
            <section class="flex flex-row wide-container max-[840px]:flex-col max-[840px]:!w-full">
                <div class="w-[50%] justify-center flex min-[841px]items-center max-[840px]:bg-white max-[840px]:items-end ml-right z-1 !py-[75px] !pr-[100px] max-[1140px]:!pr-[50px] max-[840px]:!pr-[30px] max-[840px]:!pl-[30px] max-[840px]:!w-full">
                    <div class="flex flex-col justify-center gap-6 z-1 w-full">
                        <div class="flex flex-col gap-[30px]">
                            <img src="../assets/images/placeholder-logo.png" alt="Labzada Logo" class="w-[75px] h-[75px]">
                            <div class="flex flex-col gap-3">
                                <h1 class="text-3xl font-600 text-dark text-left mt-5">Student Login</h1>
                                <p class="text-zinc-600 mt-2">Please enter your credentials below.</p>
                            </div>
                            <form class="flex flex-col gap-12" action="sign-in-function.php" method="post" autocomplete="off">
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-3">
                                        <input type="text" class="!px-4 !py-3 border-1 border-zinc-400 rounded-[7px]" name="uid" id="uid" placeholder="Enter your Email">
                                        <input type="password" class="!px-4 !py-3 border-1 border-zinc-400 rounded-[7px]" name="password" id="pass" placeholder="Enter your Password">
                                    </div>
                                    <a href="#" class="text-accent text-right text-sm font-500">Forgot Password?</a>
                                </div>
                                
                                <div class="flex gap-4">
                                    <button type="submit" class="bg-primary rounded-[7px] !px-10 !py-4 text-center text-light font-500 w-full">Sign In</button>
                                </div>
                            </form>
                            <p class="text-center neural-grotesk">Don't have an account yet? <a href="sign-up" class="text-accent font-500">Sign Up</a></p>
                        </div>
                    </div>
                </div>
                <div class="w-[50%] max-[840px]:!w-full max-[640px]:hidden">
                </div>
            </section>
        </main>
<?php include 'students-layout-footer.php'; ?>