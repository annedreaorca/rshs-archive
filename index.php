<?php
    $pageTitle = 'RSHS Archive';
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
		<link rel="shortcut icon" type="image/jpg" href="assets/images/Archive-Favicon.png"/>
		<link rel="stylesheet" href="globals.css">
		<title><?= isset($pageTitle) ? $pageTitle : 'Default Title' ?></title>
	</head>
	<body class="overflow-y-auto bg-light">
        <header class="flex justify-between items-center !py-5 !px-15 max-[1024px]:!px-5 header-wrapper default-container bg-transparent relative">
            <div class="flex gap-10 header-content">
                <div class="header-logo">
                    <img src="assets/images/Archive-Favicon.png" alt="RSHS Archive Logo">
                </div>
                <!-- Desktop Navigation -->
                <ul class="max-[1024px]:hidden lg:flex gap-8 items-center header-nav">
                    <li class="nav-link"><a href="#" class="block p-4">Home</a></li>
                    <li class="nav-link"><a href="#features" class="block p-4">Features</a></li>
                    <li class="nav-link"><a href="#how-to-use" class="block p-4">How To Use</a></li>
                    <li class="nav-link"><a href="">About Us</a></li>
                    <li class="nav-link"><a href="#our-team">Our Team</a></li>
                </ul>
            </div>
            <!-- Login Button (Visible on Desktop) -->
            <div class="max-[1024px]:hidden lg:block header-button">
                <a href="portal.php" class="bg-primary rounded-full !px-7 !py-2.5 text-center text-light font-500">Login</a>
            </div>

            <!-- Hamburger Menu (Visible on Mobile) -->
            <button id="menu-toggle" class="lg:hidden text-3xl focus:outline-none">
                ☰
            </button>

            <!-- Mobile Sidebar -->
            <div id="sidebar-mobile" class="flex flex-col justify-between gap-30 fixed top-0 right-0 h-full max-[1024px]:w-100 max-[768px]:w-full bg-white transform translate-x-full transition-transform duration-300 lg:hidden z-50 !p-5">
                <button id="close-menu" class="absolute top-7 right-6 text-2xl">✕</button>
                <div class="flex">
                    <div class="w-[70%] header-logo">
                        <img src="assets/images/Archive-Favicon.png" alt="RSHS Archive Logo">
                    </div>
                    <div class="w-[30%]">
                    </div>
                </div>
                <ul class="mt-16 !space-y-10 text-center mobile-nav-links">
                    <li class="nav-link"><a href="#" class="block p-4">Home</a></li>
                    <li class="nav-link"><a href="#features" class="block p-4">Features</a></li>
                    <li class="nav-link"><a href="#how-to-use" class="block p-4">How To Use</a></li>
                    <li class="nav-link"><a href="" class="block p-4">About Us</a></li>
                    <li class="nav-link"><a href="#our-team" class="block p-4">Our Team</a></li>
                </ul>
                <div class="flex header-button !w-full">
                    <a href="portal.php" class="bg-primary rounded-full !px-7 !py-3 text-center text-light font-500 w-full">Login</a>
                </div>
            </div>
        </header>
        <section class="flex hero-wrapper !py-50 max-[1024px]:!py-25 !px-15 max-[1024px]:!px-5 default-container rounded-[40px] max-[1024px]:!rounded-[20px]">
            <div class="!w-[40%] max-[1024px]:!w-full">
                <div class="flex flex-col gap-10 hero-content">
                    <div class="flex flex-col gap-3">
                        <h1 class="hero-title">
                            <img src="assets/images/Archive-Logo.png" alt="RSHS Archive Logo">
                            <span class="hidden">Archive</span>
                        </h1>
                        <p class="content-desc">ARCHIVE streamlines laboratory management at Regional Science High School III, ensuring seamless access to equipment. By eliminating delays, we create a more productive and engaging learning environment for students to explore, learn, and excel.</p>
                    </div>
                    <div class="flex">
                        <button class="button-outline-white">Get Started</button>
                    </div>
                </div>
            </div>
            <div class="!w-[60%] max-[1024px]:!hidden"></div>
        </section>
        <section class="flex features-wrapper !py-[100px] max-[1024px]:!py-25 !px-15 max-[1024px]:!px-5 default-container rounded-[40px] max-[1024px]:!rounded-[20px]" id="features">
            <div class="flex flex-col gap-15 features-content">
                <div class="flex flex-col gap-5">
                    <h2 class="section-title text-center">Features</h2>
                    <p class="section-desc text-center">ARCHIVE is designed to make laboratory management easier and more efficient. Here are some of the features that make it possible.</p>
                </div>
                <div class="grid grid-cols-3 max-[768px]:!grid-cols-1 gap-5 feature-cards">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-box"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /></svg>
                        </div>
                        <h3 class="title">Equipment Inventory</h3>
                        <p class="feature-desc">Manage equipment inventory and keep track of supplies.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-box"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /></svg>
                        </div>
                        <h3 class="title">Equipment Reservation</h3>
                        <p class="feature-desc">Reserve equipment in advance to ensure availability when you need it.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-box"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /></svg>
                        </div>
                        <h3 class="title">Equipment Tracking</h3>
                        <p class="feature-desc">Track equipment usage and availability in real-time.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col how-to-use-wrapper !py-[100px] max-[1024px]:!py-25 !px-15 max-[1024px]:!px-5 default-container rounded-[40px] max-[1024px]:!rounded-[20px]" id="how-to-use">
            <div class="flex gap-20">
                <div class="flex flex-col gap-5">
                    <h2 class="section-title">How To Use <span class="text-primary">ARCHIVE</span></h2>
                    <p class="section-desc">
                        ARCHIVE is designed to make laboratory management easier and more efficient. Here are some of the features that make it possible.
                    </p>
                    
                </div>
                <div class="flex gap-5 items-center slider-controls max-[768px]:hidden">
                    <button class="prev-btn" onclick="moveSlide(-1)">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" />
                        </svg>
                    </button>
                    <button class="next-btn" onclick="moveSlide(1)">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                    </button>
                </div>
            </div>
            <div class="slider-container max-[768px]:!hidden">
                <div class="slider">
                    <div class="slide">
                        <div class="slide-item">
                            <span class="tag">Step 1</span>
                            <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                                <h3 class="title">Log In</h3>
                                <p>To begin using ARCHIVE, log in to the platform using your credentials. If you're a new user, register using your school-provided information.</p>
                            </div>
                        </div>
                        <div class="slide-item">
                            <span class="tag">Step 2</span>
                            <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                                <h3 class="title">Browse Available Equipment</h3>
                                <p>Once logged in, explore the available laboratory equipment using the search bar or category filters. Each item includes descriptions and availability status.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-item">
                            <span class="tag">Step 3</span>
                            <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                                <h3 class="title">Request Equipment</h3>
                                <p>Select the equipment you need and submit a request with your preferred date and time to ensure availability.</p>
                            </div>
                        </div>
                        <div class="slide-item">
                            <span class="tag">Step 4</span>
                            <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                                <h3 class="title">Approval & Confirmation</h3>
                                <p>Your request will be reviewed by the system administrator. Once approved, you will receive a confirmation with pickup details.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-item">
                            <span class="tag">Step 5</span>
                            <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                                <h3 class="title">Pick Up & Use</h3>
                                <p>On your scheduled date, visit the designated lab area to collect your reserved equipment and follow the usage guidelines.</p>
                            </div>
                        </div>
                        <div class="slide-item">
                            <span class="tag">Step 6</span>
                            <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                                <h3 class="title">6. Return Equipment</h3>
                                <p>Return the equipment on time and report any damages or issues to the lab manager.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-item">
                            <span class="tag">Step 7</span>
                            <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                                <h3 class="title">Track & Manage Requests</h3>
                                <p>Monitor the status of your requests through your ARCHIVE dashboard and keep track of borrowed items.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dots-container max-[768px]:hidden">
                <span class="dot" onclick="goToSlide(0)"></span>
                <span class="dot" onclick="goToSlide(1)"></span>
                <span class="dot" onclick="goToSlide(2)"></span>
                <span class="dot" onclick="goToSlide(3)"></span>
            </div>
            <div class="hidden gap-5 items-center slider-controls-mobile max-[768px]:flex">
                <button class="prev-btn" onclick="moveSlide(-1)">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" />
                    </svg>
                </button>
                <button class="next-btn" onclick="moveSlide(1)">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                </button>
            </div>
            <div class="mobile-how-to-use">
                <div class="item">
                    <span class="tag">Step 1</span>
                    <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                        <h3 class="title">Log In</h3>
                        <p>To begin using ARCHIVE, log in to the platform using your credentials. If you're a new user, register using your school-provided information.</p>
                    </div>
                </div>
                <div class="item">
                    <span class="tag">Step 2</span>
                    <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                        <h3 class="title">Browse Available Equipment</h3>
                        <p>Once logged in, explore the available laboratory equipment using the search bar or category filters. Each item includes descriptions and availability status.</p>
                    </div>
                </div>
                <div class="item">
                    <span class="tag">Step 3</span>
                    <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                        <h3 class="title">Request Equipment</h3>
                        <p>Select the equipment you need and submit a request with your preferred date and time to ensure availability.</p>
                    </div>
                </div>
                <div class="item">
                    <span class="tag">Step 4</span>
                    <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                        <h3 class="title">Approval & Confirmation</h3>
                        <p>Your request will be reviewed by the system administrator. Once approved, you will receive a confirmation with pickup details.</p>
                    </div>
                </div>
                <div class="item">
                    <span class="tag">Step 5</span>
                    <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                        <h3 class="title">Pick Up & Use</h3>
                        <p>On your scheduled date, visit the designated lab area to collect your reserved equipment and follow the usage guidelines.</p>
                    </div>
                </div>
                <div class="item">
                    <span class="tag">Step 6</span>
                    <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                        <h3 class="title">6. Return Equipment</h3>
                        <p>Return the equipment on time and report any damages or issues to the lab manager.</p>
                    </div>
                </div>
                <div class="item">
                    <span class="tag">Step 7</span>
                    <div class="flex flex-col gap-2 !pl-5 border-l-1 border-gray-200">
                        <h3 class="title">Track & Manage Requests</h3>
                        <p>Monitor the status of your requests through your ARCHIVE dashboard and keep track of borrowed items.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex about-us-wrapper !py-[100px] max-[1024px]:!py-25 !px-15 max-[1024px]:!px-5 default-container rounded-[40px] max-[1024px]:!rounded-[20px]" id="our-team">
            <div class="flex flex-col gap-15 team-content">
                <div class="flex flex-col gap-5">
                    <h2 class="section-title text-center">Our Team</h2>
                    <p class="section-desc text-center">A Passionate Team Dedicated to Revolutionizing Laboratory Management, Ensuring Seamless Access to Resources, and Enhancing Efficiency for Students and Educators Alike..</p>
                </div>
                <div class="grid grid-cols-3 max-[768px]:!grid-cols-2 max-[458px]:!grid-cols-1 gap-10 feature-cards">
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-1 px-5 w-full">
                            <h3 class="title text-center">John Rich Naval</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:" class="email text-center">-</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Austin James Dillioc</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:" class="email text-center">-</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Jhon Lyorhick L. Aguilar</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:aguilarlyorhick@gmail.com" class="email text-center">aguilarlyorhick@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Kresia Dey L. Abastillas</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:kresiadeyabastillas@gmail.com" class="email text-center">kresiadeyabastillas@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Chris Daniel Suyom</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:" class="email text-center">-</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Jhun Orlan C. Banal</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:nuhjnalrobanal@gmail.com" class="email text-center">nuhjnalrobanal@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">John Patrick Andrade</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:andradejp182@gmail.com" class="email text-center">andradejp182@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Xander S. Balmores</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:balmoresxander@gmail.com" class="email text-center">balmoresxander@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/placeholder-profile.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Francisco Paolo Mallari</h3>
                            <span class="title text-center text-primary role">Researcher</span>
                            <a href="mailto:" class="email text-center">-</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/Mahasiah Bautista.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Mahasiah A. Bautista</h3>
                            <span class="title text-center text-primary role">Developer</span>
                            <a href="mailto:" class="email text-center">202110045@gordoncollege.edu.ph</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/Christian Jay Cuya.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Christian Jay A. Cuya</h3>
                            <span class="title text-center text-primary role">Developer</span>
                            <a href="mailto:202110045@gordoncollege.edu.ph" class="email text-center">202110045@gordoncollege.edu.ph</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 team-card">
                        <div class="team-image">
                            <img src="assets/images/Andrea Anne Orca.jpg" alt="Equipment Inventory">
                        </div>
                        <div class="flex flex-col gap-2 px-5 w-full">
                            <h3 class="title text-center">Andrea Anne P. Orca</h3>
                            <span class="title text-center text-primary role">Developer</span>
                            <a href="mailto:202110209@gordoncollege.edu.ph" class="email text-center">202110209@gordoncollege.edu.ph</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer-wrapper">
            <div class="flex justify-between items-center !py-20 !px-15 max-[1024px]:!px-5  default-container bg-transparent relative">
                <div class="flex flex-col gap-10 items-center w-full footer-content">
                    <div class="footer-logo">
                        <img src="assets/images/Archive-Logo.png" alt="RSHS Archive Logo" class="w-[300px]">
                    </div>
                    <!-- Desktop Navigation -->
                    <ul class="flex gap-8 justify-center items-center footer-nav">
                    <li class="nav-link"><a href="#">Home</a></li>
                    <li class="nav-link"><a href="#features">Features</a></li>
                    <li class="nav-link"><a href="#how-to-use">How To Use</a></li>
                    <li class="nav-link"><a href="">About Us</a></li>
                    <li class="nav-link"><a href="#our-team">Our Team</a></li>
                    </ul>
                    <hr class="w-full border-t border-t-1 border-gray-400 !mt-5 !pb-5">
                    <div class="flex justify-center items-center w-full footer-bottom">
                        <p class="text-center text-gray-500">© 2025 RSHS Archive. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar-mobile').classList.remove('translate-x-full');
        });

        document.getElementById('close-menu').addEventListener('click', function () {
            document.getElementById('sidebar-mobile').classList.add('translate-x-full');
        });
    </script>
    <script>
        let currentIndex = 0;

        function moveSlide(direction) {
            const slides = document.querySelectorAll(".slide");
            const totalSlides = slides.length;
            currentIndex += direction;

            if (currentIndex < 0) currentIndex = totalSlides - 1;
            if (currentIndex >= totalSlides) currentIndex = 0;

            updateSlider();
        }

        function goToSlide(index) {
            currentIndex = index;
            updateSlider();
        }

        function updateSlider() {
            const slider = document.querySelector(".slider");
            const dots = document.querySelectorAll(".dot");
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;

            dots.forEach(dot => dot.classList.remove("active"));
            dots[currentIndex].classList.add("active");
        }

        document.addEventListener("DOMContentLoaded", updateSlider);
        
        document.addEventListener("DOMContentLoaded", function () {
            if (window.innerWidth <= 768) {
                const slidesContainer = document.querySelector(".slider");
                const slideItems = document.querySelectorAll(".slide-item");

                slidesContainer.innerHTML = ""; // Clear existing slides

                slideItems.forEach(item => {
                    const newSlide = document.createElement("div");
                    newSlide.classList.add("slide");
                    newSlide.appendChild(item);
                    slidesContainer.appendChild(newSlide);
                });
            }
        });
    </script>
</html>