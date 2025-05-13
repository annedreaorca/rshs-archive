<?php
$pageTitle = 'Inventory';
include 'students-layout-header.php';
include '_components/loading.php';
include '../db-conn.php'; // Database connection

// Fetch all items initially
$sql = "SELECT item_id, item_name, item_description, uploader, temp_name, total_available, item_status FROM lab_equipments";
$stmt = $conn->prepare($sql);
$stmt->execute();
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <div class="flex justify-between mb-5">
            <button onclick="toggleSidebar()" class="lg:hidden text-primary rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-menu">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 8l16 0" />
                    <path d="M4 16l16 0" />
                </svg>
            </button>
            <div class="flex lg:hidden gap-4">
                <!-- Search Box -->
                <input type="text" id="searchBox" placeholder="Search items..." class="border px-4 py-2 rounded-lg shadow-md w-40 neural-grotesk text-[14px]">
                
            </div>
        </div>
        
        <div class="flex gap-5 items-center justify-between">
            <div class="page-heading">
                <h1>Student's Inventory</h1>
                <p class="text-gray-600">Manage your lab inventory with ease.</p>
            </div>
            <div class="flex gap-4 max-[1024px]:hidden">
                <!-- Search Box -->
                <input type="text" id="searchBox" placeholder="Search items..." class="border px-4 py-2 rounded-lg shadow-md w-40 neural-grotesk text-[14px]">
            </div>
            <!-- Search Box -->
        </div>

        <!-- Inventory Cards -->
        <div id="inventoryList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
            <?php foreach ($reports as $lab_equipment): ?>
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <img 
                        src="../upload/<?= htmlspecialchars($lab_equipment['temp_name']); ?>"
                        alt="<?= htmlspecialchars($lab_equipment['item_name']); ?>"
                        class="w-full h-70 object-cover rounded-t-lg mb-4">
                    
                    <h2 class="text-xl font-semibold mb-2 text-gray-800"><?= htmlspecialchars($lab_equipment['item_name']); ?></h2>
                    <p class="text-sm text-gray-600"><strong>Description:</strong> <?= htmlspecialchars($lab_equipment['item_description']); ?></p>
                    <p class="text-sm text-gray-600"><strong>Uploader:</strong> <?= htmlspecialchars($lab_equipment['uploader']); ?></p>
                    <p class="text-sm text-gray-600"><strong>Status:</strong> 
                        <span class="<?= ($lab_equipment['total_available'] > 0) ? 'text-green-600' : 'text-red-600'; ?>">
                            <?= ($lab_equipment['total_available'] > 0) ? 'Available' : 'No Available'; ?>
                        </span>
                    </p>
                    <p class="text-sm text-gray-600"><strong>Total Available:</strong> <?= htmlspecialchars($lab_equipment['total_available']); ?></p>
                    
                    <div class="mt-4 flex justify-end space-x-2">
                        <a href="borrow-form.php?id=<?= urlencode($lab_equipment['item_id']); ?>"
                            class="px-4 py-2 bg-yellow-600 text-white rounded-xl hover:bg-yellow-700 transition-colors"
                            onclick="return confirm('Are you sure you want to borrow this item?');">
                            Borrow
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</section>

<?php include 'students-layout-footer.php'; ?>

<script>
document.getElementById('searchBox').addEventListener('input', function() {
    let searchQuery = this.value.trim();
    
    // Send AJAX request only if searchQuery is not empty
    if (searchQuery.length > 0) {
        fetch('search-inventory.php?query=' + encodeURIComponent(searchQuery))
            .then(response => response.text())
            .then(data => {
                document.getElementById('inventoryList').innerHTML = data;
            });
    } else {
        location.reload(); // Reload page if search is empty
    }
});
</script>
