<?php 
$pageTitle = 'Request Equipments';
include 'teachers-layout-header.php';
include '_components/loading.php';
include '../db-conn.php';

// Fetch borrowed items and join with users and lab_equipments
$sql = "SELECT 
            bi.b_item_id, 
            le.item_name, 
            u.user_name AS student_name, 
            bi.date_borrowed, 
            bi.status 
        FROM borrowed_items bi
        INNER JOIN users u ON bi.lrn_or_email = u.lrn_or_email
        INNER JOIN lab_equipments le ON bi.item_id = le.item_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$borrowed_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="md:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M4 8l16 0" />
                <path d="M4 16l16 0" />
            </svg>
        </button>
        <div class="page-heading">
            <h1>Manage Borrow Requests</h1>
            <p class="text-gray-600">Manage your lab inventory with ease.</p>
        </div>
        <table class="w-full bg-white rounded-xl shadow-md mt-10">
            <thead>
                <tr class="bg-gray-100 text-gray-600">
                    <th class="py-2 px-4">Item Name</th>
                    <th class="py-2 px-4">Student Name</th>
                    <th class="py-2 px-4">Borrow Date</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($borrowed_items as $request): ?>
                <tr class="border-t">
                    <td class="py-2 px-4"><?= htmlspecialchars($request['item_name']); ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($request['student_name']); ?></td>
                    <td class="py-2 px-4"><?= date('F j, Y, g:i a', strtotime($request['date_borrowed'])); ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($request['status']); ?></td>
                    <td class="py-2 px-4">
                        <a href="borrow-function.php?id=<?= $request['b_item_id']; ?>&action=approve"
                            class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition-colors">Approve</a>
                        <a href="borrow-function.php?id=<?= $request['b_item_id']; ?>&action=deny"
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition-colors">Deny</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</section>

<?php include 'teachers-layout-footer.php'; ?>
