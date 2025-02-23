<!-- Sidebar -->
<aside id="sidebar" class="!fixed top-0 left-0 h-screen w-68 !bg-white shadow-lg transform -translate-x-full transition-transform duration-300 lg:translate-x-0 lg:relative p-6 !z-[99999]">
    <div class="flex items-center justify-between pb-4">
        <img src="/rshs-archive/assets/images/Archive-Logo.png" alt="RSHS Archive Logo" class="w-[140px] mb-[-10px]">
        <button onclick="toggleSidebar()" class="lg:hidden">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </button>
    </div>
    <nav class="mt-5 space-y-2">
        <a href="/rshs-archive/teachers/dashboard" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('dashboard.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /><path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /></svg>
            <span class="ml-3 text-[16px]">Dashboard</span>
        </a>
        <a href="/rshs-archive/teachers/inventory" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('inventory.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-flask"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 3l6 0" /><path d="M10 9l4 0" /><path d="M10 3v6l-4 11a.7 .7 0 0 0 .5 1h11a.7 .7 0 0 0 .5 -1l-4 -11v-6" /></svg>
            <span class="ml-3 text-[16px]">Inventory</span>
        </a>
        <a href="/rshs-archive/teachers/requests" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('requests.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag-exclamation"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-6.426a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.258 1.678" /><path d="M9 11v-5a3 3 0 0 1 6 0v5" /><path d="M19 16v3" /><path d="M19 22v.01" /></svg>
            <span class="ml-3 text-[16px]">Requests</span>
        </a>
        <a href="/rshs-archive/teachers/borrowed" class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-gray-200 rounded-lg sidebar-link-item <?= setActiveClass('borrowed.php') ?>">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-wash-temperature-6"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15h.01" /><path d="M3 6l1.721 10.329a2 2 0 0 0 1.973 1.671h10.612a2 2 0 0 0 1.973 -1.671l1.721 -10.329" /><path d="M12 15h.01" /><path d="M15 15h.01" /><path d="M15 12h.01" /><path d="M12 12h.01" /><path d="M9 12h.01" /><path d="M3.486 8.965c.168 .02 .34 .033 .514 .035c.79 .009 1.539 -.178 2 -.5c.461 -.32 1.21 -.507 2 -.5c.79 -.007 1.539 .18 2 .5c.461 .322 1.21 .509 2 .5c.79 .009 1.539 -.178 2 -.5c.461 -.32 1.21 -.507 2 -.5c.79 -.007 1.539 .18 2 .5c.461 .322 1.21 .509 2 .5c.17 0 .339 -.014 .503 -.034" /></svg>
            <span class="ml-3 text-[16px]">Borrowed</span>
        </a>
    </nav>
</aside>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("-translate-x-full");
    }
</script>