<?php
$pageTitle = 'Inventory';
include 'admin-layout-header.php';
include '_components/loading.php';
include '../db-conn.php'; // Database connection

// Pagination settings
$itemsPerPage = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Count total items
$sqlCount = "SELECT COUNT(*) AS total FROM lab_equipments";
$stmtCount = $conn->prepare($sqlCount);
$stmtCount->execute();
$totalItems = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Fetch paginated items
$sql = "SELECT item_name, item_description, uploader, temp_name, item_status, total_available FROM lab_equipments LIMIT :offset, :itemsPerPage";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$stmt->execute();
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="flex">
    <?php include '_components/sidebar.php'; ?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <div class="flex justify-between mb-5">
            <button onclick="toggleSidebar()" class="lg:hidden text-primary rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-menu">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 8l16 0" />
                    <path d="M4 16l16 0" />
                </svg>
            </button>
            <div class="flex gap-4 justify-between w-full max-[1024px]:w-auto">
                <input type="text" id="searchBox" placeholder="Search items..." class="border px-4 py-2 rounded-lg shadow-md w-50 neural-grotesk text-[14px]">
                <a href="/admin/add-item" class="button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 5l0 14" /><path d="M5 12l14 0" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="flex gap-5 items-center justify-between">
            <div class="page-heading">
                <h1>Admin Inventory</h1>
                <p class="text-gray-600">Manage and search for laboratory equipments.</p>
            </div>
        </div>

        <!-- Inventory Cards -->
        <div id="inventoryList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-5 gap-6 mt-6">
            <?php foreach ($reports as $lab_equipment): ?>
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow relative">
                    <div class="p-6">
                        <div class="relative pt-5">
                            <img 
                                src="../upload/<?= htmlspecialchars($lab_equipment['temp_name']); ?>"
                                alt="<?= htmlspecialchars($lab_equipment['item_name']); ?>"
                                class="w-full h-70 object-cover rounded-lg mb-4 "
                                onerror="this.onerror=null; this.src='/assets/images/placeholder-broken-image.jpg';"
                            >
                            <div class="absolute top-0 right-0">
                                <span class="<?= ($lab_equipment['total_available'] > 0) ? 'flex justify-center bg-[#D0E9DB] text-[#16904D] py-2 px-5 rounded-[5px] neural-grotesk text-[13px]' : 'flex justify-center bg-[#F0D2D2] text-[#B61E1E] py-2 px-5 rounded-[5px] neural-grotesk text-[13px]'; ?>">
                                <?= ($lab_equipment['total_available'] > 0) ? 'Available' : 'No Available'; ?>
                                </span>
                            </div>
                        </div>
                        
                        <h2 class="text-xl font-semibold mb-2 text-gray-800"><?= htmlspecialchars($lab_equipment['item_name']); ?></h2>
                        <p class="text-[14px] text-gray-700"><?= htmlspecialchars($lab_equipment['item_description']); ?></p>
                        <div class="h-[50px] spacer"></div>
                    </div>
                    <div class="flex items-center justify-between absolute bottom-0 border-t border-t-1 w-full px-6 py-4">
                        <div>
                            <p class="text-sm text-gray-700"><strong>Availability</strong> <span class="text-zinc-400 px-1">-</span> <?= htmlspecialchars($lab_equipment['total_available']); ?></p>
                        </div>
                        <div>
                           <a href="edit-item.php?item_name=<?= urlencode($lab_equipment['item_name']) ?>" class="button-primary text-[12px] pt-[7px] pb-[9px] px-4">Edit</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination Controls -->
        <div class="flex justify-center items-center mt-20 space-x-2">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300">Previous</a>
            <?php endif; ?>

            <!-- Pagination with Ellipsis -->
            <?php
            if ($totalPages <= 7) {
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?page=' . $i . '" class="px-4 py-2 ' . ($i == $page ? 'bg-[#1d2a61] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300') . ' rounded-lg">' . $i . '</a>';
                }
            } else {
                // First 3 pages
                for ($i = 1; $i <= 3; $i++) {
                    echo '<a href="?page=' . $i . '" class="px-4 py-2 ' . ($i == $page ? 'bg-[#1d2a61] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300') . ' rounded-lg">' . $i . '</a>';
                }
                
                // Ellipsis if necessary
                if ($page > 5) {
                    echo '<span class="px-4 py-2">...</span>';
                }

                // Middle pages
                $start = max(4, $page - 1);
                $end = min($totalPages - 3, $page + 1);
                for ($i = $start; $i <= $end; $i++) {
                    echo '<a href="?page=' . $i . '" class="px-4 py-2 ' . ($i == $page ? 'bg-[#1d2a61] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300') . ' rounded-lg">' . $i . '</a>';
                }

                // Ellipsis before the last 3 pages
                if ($page < $totalPages - 4) {
                    echo '<span class="px-4 py-2">...</span>';
                }

                // Last 3 pages
                for ($i = $totalPages - 2; $i <= $totalPages; $i++) {
                    echo '<a href="?page=' . $i . '" class="px-4 py-2 ' . ($i == $page ? 'bg-[#1d2a61] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300') . ' rounded-lg">' . $i . '</a>';
                }
            }
            ?>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300">Next</a>
            <?php endif; ?>
        </div>
    </main>
</section>

<?php include 'admin-layout-footer.php'; ?>

<script>
document.getElementById('searchBox').addEventListener('input', function() {
    let searchQuery = this.value.trim();
    
    if (searchQuery.length > 0) {
        fetch('search-inventory.php?query=' + encodeURIComponent(searchQuery))
            .then(response => response.text())
            .then(data => {
                document.getElementById('inventoryList').innerHTML = data;
            });
    } else {
        location.href = '?page=1'; // Reset to first page when search is empty
    }
});
</script>
