<!-- Sidebar -->
<div id="sidebar" class="!fixed top-0 left-0 h-screen w-68 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 md:translate-x-0 md:relative p-6 z-[99999]">
    <div class="flex items-center justify-between pb-4">
    <img src="/rshs-archive/assets/images/Archive-Logo.png" alt="RSHS Archive Logo" class="w-[140px] mb-[-10px]">
        <button onclick="toggleSidebar()" class="md:hidden">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </button>
    </div>
    <nav class="mt-4 space-y-2">
        <a href="/rshs-archive/students/dashboard" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('dashboard.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /><path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /></svg>
            <span class="ml-3 text-[16px]">Dashboard</span>
        </a>
        <a href="/rshs-archive/students/inventory" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('inventory.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-flask"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 3l6 0" /><path d="M10 9l4 0" /><path d="M10 3v6l-4 11a.7 .7 0 0 0 .5 1h11a.7 .7 0 0 0 .5 -1l-4 -11v-6" /></svg>
            <span class="ml-3 text-[16px]">Inventory</span>
        </a>
        <a href="/rshs-archive/logout" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('logout.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" /><path d="M15 12h-12l3 -3" /><path d="M6 15l-3 -3" /></svg>
            <span class="ml-3 text-[16px]">Sign Out</span>
        </a>
    </nav>
</div>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("-translate-x-full");
    }
</script>