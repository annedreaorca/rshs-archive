<?php
    $pageTitle = 'Inventory';
    include 'teachers-layout-header.php';
    include '_components/loading.php';

    // Fetch reports data
    $sql = "SELECT
                item_name,
                item_description,
                uploader,
                temp_name,
                item_status,
                total_available
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
        <div class="flex gap-5 items-center justify-between">
            <div class="page-heading">
                <h1>Teacher's Inventory </h1>
                <p class="text-gray-600">Manage your lab inventory with ease.</p>
            </div>
            <div class="flex">
                <a href="/rshs-archive/teachers/add-item" class="button-add">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="27"  height="27"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                </a>
            </div>
        </div>
        <!-- Inventory Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <?php foreach ($reports as $lab_equipment): ?>
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <!-- Display Image -->
            <img 
                src="../upload/<?= htmlspecialchars($lab_equipment['temp_name']); ?>"
                alt="<?= htmlspecialchars($lab_equipment['item_name']); ?>"
                class="w-full h-70 object-cover rounded-t-lg mb-4">
            
            <h2 class="text-xl font-semibold mb-2 text-gray-800"><?= htmlspecialchars($lab_equipment['item_name']); ?></h2>
            <p class="text-sm text-gray-600">
                <strong>Description:</strong> <?= htmlspecialchars($lab_equipment['item_description']); ?>
            </p>
            <p class="text-sm text-gray-600">
                <strong>Uploader:</strong> <?= htmlspecialchars($lab_equipment['uploader']); ?>
            </p>
            <p class="text-sm text-gray-600">
                <strong>Status:</strong>
                <span class="<?php
                    echo ($lab_equipment['total_available'] > 0) ? 'text-green-600' : 'text-red-600';
                ?>">
                    <?= ($lab_equipment['total_available'] > 0) ? 'Available' : 'No Stock'; ?>
                </span>
            </p>

            <p class="text-sm text-gray-600">
                <strong>Total Available:</strong>
                <span>
                    <?= htmlspecialchars($lab_equipment['total_available']); ?>
                </span>
            </p>
        </div>
    <?php endforeach; ?>

        </div>
    </main>
</section>

<?php include 'teachers-layout-footer.php'; ?>
