<?php
    $pageTitle = 'Inventory';
    include 'students-layout-header.php';
    include '_components/loading.php';
    

    // Fetch reports data
    $sql = "SELECT
                item_id,
                item_name,
                uploader,
                date,
                temp_name,
                item_status
            FROM lab_equipments";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="md:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-menu">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M4 8l16 0" />
                <path d="M4 16l16 0" />
            </svg>
        </button>
        <div class="page-heading">
            <h1>Student's Inventory </h1>
            <p class="text-gray-600">Manage your lab inventory with ease.</p>
        </div>
        <!-- Inventory Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-6 mt-6">
        <?php foreach ($reports as $lab_equipment): ?>
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <!-- Display Image -->
            <img 
                src="../upload/<?= htmlspecialchars($lab_equipment['temp_name']); ?>" 
                alt="<?= htmlspecialchars($lab_equipment['item_name']); ?>" 
                class="w-full h-48 object-cover rounded-t-lg mb-4">
            
            <h2 class="text-xl font-semibold mb-2 text-gray-800"><?= htmlspecialchars($lab_equipment['item_name']); ?></h2>
            <p class="text-sm text-gray-600">
                <strong>Uploader:</strong> <?= htmlspecialchars($lab_equipment['uploader']); ?>
            </p>
            <p class="text-sm text-gray-600">
                <strong>Date:</strong> <?= date('F j, Y, g:i a', strtotime($lab_equipment['date'])); ?>
            </p>
            <p class="text-sm text-gray-600">
                <strong>Status:</strong>
                <span class="<?php
                    if ($lab_equipment['item_status'] === 'Approved') echo 'text-green-600';
                    elseif ($lab_equipment['item_status'] === 'Pending') echo 'text-yellow-600';
                    else echo 'text-red-600';
                ?>">
                    <?= htmlspecialchars($lab_equipment['item_status']); ?>
                </span>
            </p>
            <div class="mt-4 flex justify-end space-x-2">
                <a href="view.php?item_name=<?= urlencode($lab_equipment['item_name']); ?>"
                class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                    View
                </a>
                <a href="borrow-form.php?id=<?= urlencode($lab_equipment['item_id']); ?>""
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
