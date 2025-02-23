<?php
    $pageTitle = 'Borrow Equipment';
    include '../db-conn.php';
    include 'students-layout-header.php';

    // Validate ID
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("<p class='text-red-500'>Error: Missing or invalid equipment ID.</p>
             <p>Debug Info: " . htmlspecialchars($_SERVER['QUERY_STRING']) . "</p>");
    }
    $id = $_GET['id'];

    try {
        $sql = "SELECT * FROM lab_equipments WHERE item_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            die("<p class='text-red-500'>Error: Equipment not found.</p>");
        }
    } catch (PDOException $e) {
        die("<p class='text-red-500'>Error: " . $e->getMessage() . "</p>");
    }

    if (!isset($_SESSION['user_user_id'])) {
        die("<p class='text-red-500'>Error: User not logged in.</p>");
    }
    
    $user_id = $_SESSION['user_user_id'];
    $sql_user = "SELECT user_name, lrn_or_email FROM users WHERE user_id = :user_id";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt_user->execute();
    $user = $stmt_user->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("<p class='text-red-500'>Error: User data not found.</p>");
    }

    date_default_timezone_set('Asia/Manila');
    $cdate = date("F j, Y h:i:sa");
?>

<section class="flex">
    <?php include '_components/sidebar.php'; ?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="md:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0" /><path d="M4 16l16 0" />
            </svg>
        </button>
        <div class="page-heading">
            <h1>Borrow Equipment</h1>
            <p class="text-gray-600">Manage your lab inventory with ease.</p>
        </div>

        <form class="p-6 bg-white rounded-lg shadow-md space-y-4 mt-10" action="submit-borrow.php" method="post" autocomplete="off">
            <label for="item_name" class="block text-gray-700 font-medium">Item Name</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="item_name" id="item_name" value="<?= htmlspecialchars($row['item_name']) ?>" readonly required>

            <label for="quantity" class="block text-gray-700 font-medium">Quantity</label>
            <input type="number" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="quantity" id="quantity" min="1" max="<?= htmlspecialchars($row['total_available']) ?>" required>

            <input type="hidden" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="lrn_or_email" id="lrn_or_email" value="<?= htmlspecialchars($user['lrn_or_email']) ?>" readonly required>

            <label for="cdate" class="block text-gray-700 font-medium">Date</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="cdate" id="cdate" value="<?= $cdate ?>" readonly required>

            <input type="hidden" name="item_id" value="<?= htmlspecialchars($row['item_id']) ?>">
            <input type="hidden" name="status" value="Pending">
            <input type="hidden" name="total_available" value="<?= htmlspecialchars($row['total_available']) ?>">
            <input type="hidden" name="uploader" value="<?= htmlspecialchars($user['user_name']) ?>">

            <?php if (isset($_GET['success'])) { ?>
                <div class="p-3 bg-green-100 text-green-700 border border-green-400 rounded-lg">
                    <?= htmlspecialchars($_GET['success']) ?>
                </div>
            <?php } elseif (isset($_GET['error'])) { ?>
                <div class="p-3 bg-red-100 text-red-700 border border-red-400 rounded-lg">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php } ?>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Submit</button>
        </form>
    </main>
</section>

<?php include 'students-layout-footer.php'; ?>
