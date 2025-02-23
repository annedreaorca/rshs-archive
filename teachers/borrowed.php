<?php $pageTitle = 'Borrowed Equipments';
    include 'teachers-layout-header.php';
    include '_components/loading.php';
    
?>
<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-6">
        <button onclick="toggleSidebar()" class="md:hidden text-primary rounded">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0" /><path d="M4 16l16 0" /></svg>
        </button>
        <h2 class="text-2xl font-bold text-gray-700">Borrowed Equipments</h2>
        <p class="mt-2 text-gray-600">Manage your lab inventory with ease.</p>
    </main>
</section>
<?php include 'teachers-layout-footer.php'; ?>

