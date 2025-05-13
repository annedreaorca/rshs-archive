<?php 
$pageTitle = 'Rejected Borrow Requests';
include 'admin-layout-header.php';
include '_components/loading.php';
include '../db-conn.php';

// Fetch only rejected borrowed items, including quantity
$sql = "SELECT 
            bi.b_item_id, 
            le.item_name, 
            u.user_name AS student_name, 
            bi.date_borrowed, 
            bi.quantity,
            bi.date_rejected
        FROM borrowed_items bi
        INNER JOIN users u ON bi.lrn_or_email = u.lrn_or_email
        INNER JOIN lab_equipments le ON bi.item_id = le.item_id
        WHERE bi.status = 'Rejected'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$borrowed_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="flex">
    <?php include '_components/sidebar.php'; ?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="lg:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M4 8l16 0" />
                <path d="M4 16l16 0" />
            </svg>
        </button>
        <h2 class="text-2xl font-bold text-gray-700">Rejected Requests</h2>
        <p class="mt-2 text-gray-600">View all rejected borrow requests.</p>
        
        
        <div class="mt-6 bg-white shadow-md rounded-lg p-4 md:p-6 overflow-x-auto">
            <table class="w-full min-w-[1200px]">
                <thead>
                    <tr>
                        <th class="table-head">Laboratory Equipment</th>
                        <th class="table-head">Quantity</th>
                        <th class="table-head">Student Name</th>
                        <th class="table-head">Date Requested</th>
                        <th class="table-head">Date Rejected</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($borrowed_items as $item): ?>
                    <tr>
                        <td class="table-data"><?= htmlspecialchars($item['item_name']); ?></td>
                        <td class="table-data text-center"><?= intval($item['quantity']); ?></td>
                        <td class="table-data"><?= htmlspecialchars($item['student_name']); ?></td>
                        <td class="table-data"><?= date('F j, Y, g:i a', strtotime($item['date_borrowed'])); ?></td>
                        <td class="table-data"><?= date('F j, Y, g:i a', strtotime($item['date_rejected'])); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</section>

<?php include 'admin-layout-footer.php'; ?>
