<?php $pageTitle = 'Dashboard';
    include 'students-layout-header.php';
    include '_components/loading.php';
    
?>
<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="lg:hidden text-primary rounded">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0" /><path d="M4 16l16 0" /></svg>
        </button>
        <div class="page-heading">
            <h1>Student Dashboard </h1>
            <p class="text-gray-600">Manage your lab inventory with ease.</p>
        </div>
        <div class="flex gap-[20px] mt-10 max-[1320px]:flex-col">
            <div class="flex flex-col gap-5 w-6/12 max-[1320px]:w-full">
                <!-- <div class="grid grid-cols-1 sm:grid-cols-3 bg-white shadow-md rounded-lg p-6 overview-cards max-[1550px]:px-3">
                    <div class="card">
                        <div class="card-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="32"  height="32"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-package"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                        </div>
                        <div class="card-content">
                            <h2>Borrowed Items</h2>
                            <span>50</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="32"  height="32"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-package"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                        </div>
                        <div class="card-content">
                            <h2>Remaining Items</h2>
                            <span>180</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="32"  height="32"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-package"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                        </div>
                        <div class="card-content">
                            <h2>Borrowed Items</h2>
                            <span>230</span>
                        </div>
                    </div>
                </div> -->
                <div class="bg-white shadow-md rounded-lg p-6 overview-table">
                    <div class="flex justify-between items-center overview-table-header">
                        <h2>Pending List</h2>
                        <a href="students/sign-in" class="button-medium gray">Full List</a>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 overview-table">
                    <div class="flex justify-between items-center overview-table-header">
                        <h2>Rejected List</h2>
                        <a href="students/sign-in" class="button-medium gray">Full List</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[20px] w-6/12 max-[1320px]:w-full">
                <div class="bg-white shadow-md rounded-lg p-6 overview-table">
                    <div class="flex justify-between items-center overview-table-header">
                        <h2>Approved List</h2>
                        <a href="students/sign-in" class="button-medium gray">Full List</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
<?php include 'students-layout-footer.php'; ?>

