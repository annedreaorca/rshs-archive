<?php
    $pageTitle = 'Edit Laboratory Equipment';
    include 'admin-layout-header.php';
    include '_components/loading.php';
    include '../db-conn.php';

    if (isset($_GET['item_name'])) {
        $item_name = $_GET['item_name'];
        $query = $conn->prepare("SELECT * FROM lab_equipments WHERE item_name = ?");
        $query->execute([$item_name]);
        $item = $query->fetch(PDO::FETCH_ASSOC);

        if (!$item) {
            header("Location: inventory.php?error=Item not found!");
            exit();
        }
    } else {
        header("Location: inventory.php?error=No item selected!");
        exit();
    }
?>

<section class="flex">
    <?php include '_components/sidebar.php'; ?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <div class="page-heading">
            <h1>Edit Item</h1>
            <p class="text-gray-600">Update details to your laboratory equipments.</p>
        </div>
        <div class="flex flex-col mt-10 bg-white shadow-lg rounded-lg p-6">
            <form class="space-y-6" action="edit-item-function.php?item_name=<?= urlencode($item['item_name']) ?>" method="post" enctype="multipart/form-data">
                <!-- Success Alert -->
                <?php if (isset($_GET['success'])) { ?>
                <div class="bg-green-100 text-green-800 p-4 rounded-md flex items-center justify-between">
                    <span><?= htmlspecialchars($_GET['success']) ?></span>
                    <button type="button" class="text-green-800" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                </div>
                <?php } ?>

                <!-- Item Name -->
                <div>
                    <label for="item_name" class="block text-sm font-medium text-gray-700">Item Name</label>
                    <input type="text" name="item_name" id="item_name" value="<?= htmlspecialchars($item['item_name']) ?>" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <!-- Item Description -->
                <div>
                    <label for="item_description" class="block text-sm font-medium text-gray-700">Item Description</label>
                    <input type="text" name="item_description" id="item_description" value="<?= htmlspecialchars($item['item_description']) ?>" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <!-- Availability -->
                <div>
                    <label for="total_available" class="block text-sm font-medium text-gray-700">Number of Items</label>
                    <input type="text" name="total_available" id="total_available" value="<?= htmlspecialchars($item['total_available']) ?>" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <!-- File Upload -->
                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700">Upload New Image</label>
                    <div class="mt-1 flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6">
                        <div class="flex flex-col items-center space-y-1 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-photo-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M15 8h.01" />
                                <path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5" />
                                <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3.5 3.5" />
                                <path d="M14 14l1 -1c.679 -.653 1.473 -.829 2.214 -.526" />
                                <path d="M19 22v-6" />
                                <path d="M22 19l-3 -3l-3 3" />
                            </svg>
                            <input type="file" name="file" id="file" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="text-sm text-gray-600 mt-2">Drop files to upload or select a file</p>
                        </div>
                    </div>
                </div>

                <!-- Hidden Inputs -->
                <input type="hidden" name="old_image" value="<?= htmlspecialchars($item['file_name']) ?>">

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" name="update" class="button-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </main>
</section>

<?php include 'admin-layout-footer.php'; ?>
