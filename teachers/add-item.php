<?php
    $pageTitle = 'Add Laboratory Equipment';
    include 'teachers-layout-header.php';
    include '_components/loading.php';
?>

<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <div class="page-heading">
            <h1>Admin Dashboard </h1>
            <p class="text-gray-600">Manage your lab inventory with ease.</p>
        </div>
        <div class="flex flex-col mt-10 bg-white shadow-lg rounded-lg p-6">
            <form class="space-y-6" action="add-item-function.php" enctype="multipart/form-data" method="post" autocomplete="off">
                <!-- Success Alert -->
                <?php if (isset($_GET['success'])) { ?>
                <div class="bg-green-100 text-green-800 p-4 rounded-md flex items-center justify-between">
                    <span><?= $_GET['success']?></span>
                    <button type="button" class="text-green-800" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                </div>
                <?php } ?>

                <!-- Item Name -->
                <div>
                    <label for="item_name" class="block text-sm font-medium text-gray-700">Item Name</label>
                    <input type="text" name="item_name" id="item_name" placeholder="Enter item name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                </div>

                <!-- Uploader -->
                <div>
                    <label for="uploader" class="block text-sm font-medium text-gray-700">Uploader</label>
                    <input type="text" name="uploader" id="uploader" placeholder="Enter uploader name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <!-- Availability -->
                <div>
                    <label for="total_available" class="block text-sm font-medium text-gray-700">Number of Item</label>
                    <input type="text" name="total_available" id="total_available" placeholder="" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <!-- Date -->
                <div>
                    <label for="cdate" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="cdate" id="cdate" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <!-- Hidden Inputs -->
                <input type="hidden" name="item_status" value="Available">

                <!-- File Upload -->
                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700">Upload your file</label>
                    <div class="mt-1 flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6">
                        <div class="flex flex-col items-center space-y-1 text-center">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="100"  height="100"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3.5 3.5" /><path d="M14 14l1 -1c.679 -.653 1.473 -.829 2.214 -.526" /><path d="M19 22v-6" /><path d="M22 19l-3 -3l-3 3" /></svg>
                            <input type="file" name="file" id="file" required class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="text-sm text-gray-600 mt-2">Drop files to upload or select a file</p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" name="submit" class="button-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </main>
</section>

<?php include 'teachers-layout-footer.php'; ?> 
