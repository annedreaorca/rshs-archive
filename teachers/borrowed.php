<?php 
$pageTitle = 'Borrowed Equipments';
include 'teachers-layout-header.php';
include '_components/loading.php';
include '../db-conn.php';

// Fetch only approved borrowed items
$sql = "SELECT 
            bi.b_item_id, 
            le.item_name, 
            u.user_name AS student_name, 
            bi.date_borrowed, 
            bi.approval_date 
        FROM borrowed_items bi
        INNER JOIN users u ON bi.lrn_or_email = u.lrn_or_email
        INNER JOIN lab_equipments le ON bi.item_id = le.item_id
        WHERE bi.status = 'Approved'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$borrowed_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="flex">
    <?php include '_components/sidebar.php'; ?>
    <main class="flex-1 min-h-screen p-6">
        <button onclick="toggleSidebar()" class="md:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M4 8l16 0" />
                <path d="M4 16l16 0" />
            </svg>
        </button>
        <h2 class="text-2xl font-bold text-gray-700">Borrowed Equipments</h2>
        <p class="mt-2 text-gray-600">List of users who successfully borrowed an item.</p>

        <table class="w-full bg-white rounded-xl shadow-md mt-6">
            <thead>
                <tr class="bg-gray-100 text-gray-600">
                    <th class="py-2 px-4">Item Name</th>
                    <th class="py-2 px-4">Student Name</th>
                    <th class="py-2 px-4">Borrow Date</th>
                    <th class="py-2 px-4">Approval Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($borrowed_items as $item): ?>
                <tr class="border-t">
                    <td class="py-2 px-4"><?= htmlspecialchars($item['item_name']); ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($item['student_name']); ?></td>
                    <td class="py-2 px-4"><?= date('F j, Y, g:i a', strtotime($item['date_borrowed'])); ?></td>
                    <td class="py-2 px-4"><?= date('F j, Y, g:i a', strtotime($item['approval_date'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</section>

<?php include 'teachers-layout-footer.php'; ?>
