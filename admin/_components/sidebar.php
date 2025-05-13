<!-- Sidebar -->
<aside id="sidebar" class="!fixed top-0 left-0 h-screen w-68 !bg-white shadow-lg transform -translate-x-full transition-transform duration-300 lg:translate-x-0 lg:relative p-6 !z-[99999]">
    <div class="flex items-center justify-between pb-4">
        <img src="/assets/images/Archive-Logo.png" alt="RSHS Archive Logo" class="w-[140px] mb-[-10px]">
        <button onclick="toggleSidebar()" class="lg:hidden">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </button>
    </div>
    <nav class="mt-5 space-y-2">
        <a href="/admin/dashboard" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('dashboard.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /><path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /></svg>
            <span class="ml-3 text-[16px]">Dashboard</span>
        </a>
        <a href="/admin/users" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('users.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users-group"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" /><path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M17 10h2a2 2 0 0 1 2 2v1" /><path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M3 13v-1a2 2 0 0 1 2 -2h2" /></svg>
            <span class="ml-3 text-[16px]">Users</span>
        </a>
        <a href="/admin/inventory" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('inventory.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-flask"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 3l6 0" /><path d="M10 9l4 0" /><path d="M10 3v6l-4 11a.7 .7 0 0 0 .5 1h11a.7 .7 0 0 0 .5 -1l-4 -11v-6" /></svg>
            <span class="ml-3 text-[16px]">Inventory</span>
        </a>
       <div class="relative">
            <button onclick="toggleDropdown()" class="flex items-center w-full px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-unknown">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><path d="M12 17v.01"/><path d="M12 14a1.5 1.5 0 1 0 -1.14 -2.474"/>
                </svg>
                <span class="ml-3 text-[16px] neural-grotesk">Borrow Status</span>
                <svg class="ml-auto transition-transform duration-300 transform rotate-0" id="dropdownIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6l6 -6"/>
                </svg>
            </button>
            <div id="dropdownMenu" class="hidden mt-2 space-y-2 pl-8">
                <a href="/admin/requests" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('requests.php') ?>">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-10"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l-3 -2" /><path d="M12 7v5" /></svg>
                    <span class="ml-3 text-[16px]">Pending</span>
                </a>
                <a href="/admin/approved" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('approved.php') ?>">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checks"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                    <span class="ml-3 text-[16px]">Approved</span>
                </a>
                <a href="/admin/rejected" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('rejected.php') ?>">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                    <span class="ml-3 text-[16px]">Rejected</span>
                    
                </a>
                <a href="/admin/returned" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('returned.php') ?>">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg>
                    <span class="ml-3 text-[16px]">Returned</span>
                    
                </a>
            </div>
        </div>
        <a href="/logout" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('logout.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" /><path d="M15 12h-12l3 -3" /><path d="M6 15l-3 -3" /></svg>
            <span class="ml-3 text-[16px]">Sign Out</span>
        </a>
    </nav>
</aside>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("-translate-x-full");
    }

    function toggleDropdown() {
        const menu = document.getElementById("dropdownMenu");
        const icon = document.getElementById("dropdownIcon");
        menu.classList.toggle("hidden");
        icon.classList.toggle("rotate-180");
    }

    // Keep the dropdown open if the current page matches one of the request-related URLs
    document.addEventListener("DOMContentLoaded", function() {
        const currentPath = window.location.pathname;
        const requestPages = ["/admin/requests", "/admin/approved", "/admin/rejected"];
        const dropdownMenu = document.getElementById("dropdownMenu");
        const dropdownIcon = document.getElementById("dropdownIcon");

        if (requestPages.includes(currentPath)) {
            dropdownMenu.classList.remove("hidden");
            dropdownIcon.classList.add("rotate-180");
            dropdownMenu.classList.add("flex");
        }
    });
</script>

</script>