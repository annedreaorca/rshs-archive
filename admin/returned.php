<?php 
$pageTitle = 'Returned Equipments';
include 'admin-layout-header.php'; 
include '../db-conn.php';

$sql = "SELECT 
            bi.b_item_id, 
            u.user_name, 
            le.item_name, 
            bi.quantity, 
            bi.date_borrowed, 
            bi.date_returned, 
            bi.return_image
        FROM borrowed_items bi
        INNER JOIN lab_equipments le ON bi.item_id = le.item_id
        INNER JOIN users u ON bi.lrn_or_email = u.lrn_or_email
        WHERE bi.status = 'Returned'
        ORDER BY bi.date_returned DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$returned_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="page-heading">
            <h1>Returned Equipments</h1>
            <p class="text-gray-600">View all returned items by users.</p>
        </div>
        
        <div class="mt-6 bg-white shadow-md rounded-lg p-4 md:p-6 overflow-x-auto">
            <table class="w-full min-w-[1200px]">
                <thead>
                    <tr>
                        <th class="table-head">Name</th>
                        <th class="table-head">Laboratory Equipment</th>
                        <th class="table-head">Quantity</th>
                        <th class="table-head">Date Borrowed</th>
                        <th class="table-head">Date Returned</th>
                        <th class="table-head">Image Proof</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($returned_items)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">No returned items found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($returned_items as $item): ?>
                        <tr>
                            <td class="table-data"><?= htmlspecialchars($item['user_name']); ?></td>
                            <td class="table-data"><?= htmlspecialchars($item['item_name']); ?></td>
                            <td class="table-data text-center"><?= intval($item['quantity']); ?></td>
                            <td class="table-data"><?= date('F j, Y, g:i a', strtotime($item['date_borrowed'])); ?></td>
                            <td class="table-data text-green-500"><?= date('F j, Y, g:i a', strtotime($item['date_returned'])); ?></td>
                            <td class="table-data">
                                <?php if (!empty($item['return_image'])): ?>
                                    <a href="../return-uploads/<?= htmlspecialchars($item['return_image']); ?>" data-fancybox="gallery" data-caption="<?= htmlspecialchars($item['item_name']); ?>">
                                        <img src="../return-uploads/<?= htmlspecialchars($item['return_image']); ?>" alt="Returned Item" width="100" class="cursor-pointer border rounded shadow-sm">
                                    </a>
                                <?php else: ?>
                                    <span class="text-gray-500">No Photo</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</section>

<?php include 'admin-layout-footer.php'; ?>