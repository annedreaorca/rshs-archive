<?php 
$pageTitle = 'Manage Requests';
include 'admin-layout-header.php';
include '_components/loading.php';
include '../db-conn.php';

// Fetch Pending Borrow Requests
$sqlBorrowRequests = "SELECT 
            bi.b_item_id, 
            le.item_name, 
            u.user_name AS student_name, 
            bi.date_borrowed, 
            bi.status, 
            bi.quantity,
            bi.date_approved
        FROM borrowed_items bi
        INNER JOIN users u ON bi.lrn_or_email = u.lrn_or_email
        INNER JOIN lab_equipments le ON bi.item_id = le.item_id
        WHERE bi.status = 'Pending'";

$stmt = $conn->prepare($sqlBorrowRequests);
$stmt->execute();
$borrowed_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch Pending Returns for Verification
$sqlPendingReturns = "SELECT 
            bi.b_item_id, 
            le.item_name, 
            u.user_name AS student_name, 
            bi.date_borrowed, 
            bi.date_returned, 
            bi.status, 
            bi.quantity, 
            bi.return_image,
            bi.return_request
        FROM borrowed_items bi
        INNER JOIN users u ON bi.lrn_or_email = u.lrn_or_email
        INNER JOIN lab_equipments le ON bi.item_id = le.item_id
        WHERE bi.status = 'Pending Return'";

$stmt = $conn->prepare($sqlPendingReturns);
$stmt->execute();
$pending_returns = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="lg:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M4 8l16 0" />
                <path d="M4 16l16 0" />
            </svg>
        </button>
        <div class="page-heading">
            <h1>Manage Requests</h1>
            <p class="text-gray-600">Track, approve, and verify equipment requests.</p>
        </div>

        <!-- Borrow Requests Table -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-4 md:p-6 overflow-x-auto">
            <h2 class="text-lg font-semibold mb-5">Pending Borrow Requests</h2>
            <table class="w-full min-w-[1200px]">
                <thead>
                    <tr>
                        <th class="table-head">Laboratory Equipment</th>
                        <th class="table-head">Quantity</th>
                        <th class="table-head">Student Name</th>
                        <th class="table-head">Date Requested</th>
                        <th class="table-head">Status</th>
                        <th class="table-head">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($borrowed_items as $request): ?>
                    <tr>
                        <td class="table-data"><?= htmlspecialchars($request['item_name']); ?></td>
                        <td class="table-data text-center"><?= intval($request['quantity']); ?></td>
                        <td class="table-data"><?= htmlspecialchars($request['student_name']); ?></td>
                        <td class="table-data"><?= date('F j, Y, g:i a', strtotime($request['date_borrowed'])); ?></td>
                        <td class="table-data"><?= htmlspecialchars($request['status']); ?></td>
                        <td class="table-data">
                            <a href="borrow-function.php?id=<?= $request['b_item_id']; ?>&action=approve"
                                class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition-colors">Approve</a>
                            <a href="borrow-function.php?id=<?= $request['b_item_id']; ?>&action=reject"
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition-colors">Reject</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pending Returns Table -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-4 md:p-6 overflow-x-auto">
            <h2 class="text-lg font-semibold mb-5">Pending Returns</h2>
            <table class="w-full min-w-[1200px]">
                <thead>
                    <tr>
                        <th class="table-head">Laboratory Equipment</th>
                        <th class="table-head">Quantity</th>
                        <th class="table-head">Student Name</th>
                        <th class="table-head">Date Borrowed</th>
                        <th class="table-head">Date Requested</th>
                        <th class="table-head">Return Image</th>
                        <th class="table-head">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pending_returns as $return): ?>
                    <tr>
                        <td class="table-data"><?= htmlspecialchars($return['item_name']); ?></td>
                        <td class="table-data text-center"><?= intval($return['quantity']); ?></td>
                        <td class="table-data"><?= htmlspecialchars($return['student_name']); ?></td>
                        <td class="table-data"><?= date('F j, Y, g:i a', strtotime($return['date_borrowed'])); ?></td>
                        <td class="table-data text-green-500">
                            <?= !empty($return['return_request']) ? date('F j, Y, g:i a', strtotime($return['return_request'])) : '<span class="text-gray-500">Not Available</span>'; ?>
                        </td>
                        <td class="table-data">
                            <?php if (!empty($return['return_image'])): ?>
                                <a href="../return-uploads/<?= htmlspecialchars($return['return_image']); ?>" data-fancybox="gallery" data-caption="Returned Item">
                                    <img src="../return-uploads/<?= htmlspecialchars($return['return_image']); ?>" alt="Returned Item" width="100">
                                </a>
                            <?php else: ?>
                                <span class="text-gray-500">No Photo</span>
                            <?php endif; ?>
                        </td>
                        <td class="table-data">
                            <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 verify-btn" data-bitemid="<?= $return['b_item_id']; ?>">Verify</button>
                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 reject-return-btn" data-bitemid="<?= $return['b_item_id']; ?>">Reject</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</section>

<!-- Fancybox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        Thumbs: { autoStart: false },
    });
        
    document.querySelectorAll('.verify-btn').forEach(button => {
        button.addEventListener('click', function() {
            const b_item_id = this.getAttribute('data-bitemid');
    
            if (confirm("Are you sure you want to verify this return?")) {
                fetch(`verify-return.php?id=${b_item_id}&action=verify`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Return verified successfully!");
                            location.reload();
                        } else {
                            alert("Failed to verify return: " + data.error);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    });
    
    document.querySelectorAll('.reject-return-btn').forEach(button => {
        button.addEventListener('click', function() {
            const b_item_id = this.getAttribute('data-bitemid');
    
            if (confirm("Are you sure you want to reject this return?")) {
                fetch(`verify-return.php?id=${b_item_id}&action=reject-return`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Return rejected.");
                            location.reload();
                        } else {
                            alert("Failed to reject return: " + data.error);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
});
    
</script>

<?php include 'admin-layout-footer.php'; ?>
