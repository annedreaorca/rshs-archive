<?php 
$pageTitle = 'Dashboard';
include 'admin-layout-header.php';
include '_components/loading.php';
include '../db-conn.php';

// Fetch total approved borrowed items
$sql = "SELECT SUM(quantity) FROM borrowed_items WHERE status = 'Approved'";
$result = $conn->prepare($sql);
$result->execute();
$total_borrowed_items = $result->fetchColumn();

// Fetch total available equipment
$sql = "SELECT SUM(total_available) FROM lab_equipments";
$result = $conn->prepare($sql);
$result->execute();
$total_available_equipments = $result->fetchColumn();

// Fetch total pending borrow requests
$sql = "SELECT COUNT(*) FROM borrowed_items WHERE status = 'Pending'";
$result = $conn->prepare($sql);
$result->execute();
$total_pending_requests = $result->fetchColumn();

// Fetch total registered users
$sql = "SELECT COUNT(*) FROM users";
$result = $conn->prepare($sql);
$result->execute();
$total_users = $result->fetchColumn();

// Fetch recent approved transactions
$sql = "SELECT u.user_name, e.item_name, b.quantity, b.date_borrowed
        FROM borrowed_items b
        JOIN users u ON b.lrn_or_email = u.lrn_or_email
        JOIN lab_equipments e ON b.item_id = e.item_id
        WHERE b.status = 'Approved'
        ORDER BY b.date_borrowed DESC
        LIMIT 5";
$result = $conn->prepare($sql);
$result->execute();
$approved_transactions = $result->fetchAll(PDO::FETCH_ASSOC);

// Fetch all borrow requests (for Request List)
$sql = "SELECT u.user_name, e.item_name, b.status
        FROM borrowed_items b
        JOIN users u ON b.lrn_or_email = u.lrn_or_email
        JOIN lab_equipments e ON b.item_id = e.item_id
        ORDER BY b.date_borrowed DESC";
$result = $conn->prepare($sql);
$result->execute();
$borrow_requests = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="lg:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0"/><path d="M4 16l16 0"/>
            </svg>
        </button>
        
        <div class="page-heading">
            <h1>Admin Dashboard</h1>
            <p class="text-gray-600">Manage your lab inventory with ease.</p>
        </div>

        <div class="flex gap-[20px] mt-10 max-[1320px]:flex-col">
            <div class="flex flex-col gap-5 w-6/12 max-[1320px]:w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 bg-white shadow-md rounded-lg overview-cards p-2">
                    <div class="card">
                        <div class="card-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cube"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 16.008v-8.018a1.98 1.98 0 0 0 -1 -1.717l-7 -4.008a2.016 2.016 0 0 0 -2 0l-7 4.008c-.619 .355 -1 1.01 -1 1.718v8.018c0 .709 .381 1.363 1 1.717l7 4.008a2.016 2.016 0 0 0 2 0l7 -4.008c.619 -.355 1 -1.01 1 -1.718z" /><path d="M12 22v-10" /><path d="M12 12l8.73 -5.04" /><path d="M3.27 6.96l8.73 5.04" />
                            </svg>
                        </div>
                        <div class="card-content">
                            <h2>Borrowed Equipments</h2>
                            <span><?= $total_borrowed_items ?? 0; ?></span>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cube"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 16.008v-8.018a1.98 1.98 0 0 0 -1 -1.717l-7 -4.008a2.016 2.016 0 0 0 -2 0l-7 4.008c-.619 .355 -1 1.01 -1 1.718v8.018c0 .709 .381 1.363 1 1.717l7 4.008a2.016 2.016 0 0 0 2 0l7 -4.008c.619 -.355 1 -1.01 1 -1.718z" /><path d="M12 22v-10" /><path d="M12 12l8.73 -5.04" /><path d="M3.27 6.96l8.73 5.04" />
                            </svg>
                        </div>
                        <div class="card-content">
                            <h2>Available Equipments</h2>
                            <span><?= $total_available_equipments ?? 0; ?></span>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cube"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 16.008v-8.018a1.98 1.98 0 0 0 -1 -1.717l-7 -4.008a2.016 2.016 0 0 0 -2 0l-7 4.008c-.619 .355 -1 1.01 -1 1.718v8.018c0 .709 .381 1.363 1 1.717l7 4.008a2.016 2.016 0 0 0 2 0l7 -4.008c.619 -.355 1 -1.01 1 -1.718z" /><path d="M12 22v-10" /><path d="M12 12l8.73 -5.04" /><path d="M3.27 6.96l8.73 5.04" />
                            </svg>
                        </div>
                        <div class="card-content">
                            <h2>Pending Requests</h2>
                            <span><?= $total_pending_requests ?? 0; ?></span>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cube"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 16.008v-8.018a1.98 1.98 0 0 0 -1 -1.717l-7 -4.008a2.016 2.016 0 0 0 -2 0l-7 4.008c-.619 .355 -1 1.01 -1 1.718v8.018c0 .709 .381 1.363 1 1.717l7 4.008a2.016 2.016 0 0 0 2 0l7 -4.008c.619 -.355 1 -1.01 1 -1.718z" /><path d="M12 22v-10" /><path d="M12 12l8.73 -5.04" /><path d="M3.27 6.96l8.73 5.04" />
                            </svg>
                        </div>  
                        <div class="card-content">
                            <h2>Registered Users</h2>
                            <span><?= $total_users ?? 0; ?></span>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 overview-table">
                    <div class="flex justify-between items-center overview-table-header mb-4">
                        <h2>Borrowed List</h2>
                        <a href="/admin/approved" class="button-medium gray">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="table-head">Name</th>
                                    <th class="table-head">Equipment</th>
                                    <th class="table-head">Quantity</th>
                                    <th class="table-head">Date Borrowed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($approved_transactions)): ?>
                                    <?php foreach (array_slice($approved_transactions, 0, 10) as $t): ?>
                                        <tr>
                                            <td class="table-data"><?= htmlspecialchars($t['user_name']) ?></td>
                                            <td class="table-data"><?= htmlspecialchars($t['item_name']) ?></td>
                                            <td class="table-data"><?= $t['quantity'] ?></td>
                                            <td class="table-data"><?= date('M d, Y', strtotime($t['date_borrowed'])) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center pt-7 text-gray-500">No approved transactions found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Request List (All Requests) -->
            <div class="w-6/12 max-[1320px]:w-full  ">
                <div class="bg-white shadow-md rounded-lg p-6 overview-table">
                    <div class="flex justify-between items-center overview-table-header mb-4">
                        <h2>Request List</h2>
                        <a href="/admin/requests" class="button-medium gray">View All</a>
                    </div>
                    <div class="overflow-x-auto w-full">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="table-head">Name</th>
                                    <th class="table-head">Equipment</th>
                                    <th class="table-head">Status</th>
                                </tr>
                            </thead>
                           <tbody>
                                <?php if (!empty($borrow_requests)): ?>
                                    <?php foreach (array_slice($borrow_requests, 0, 10) as $r): ?>
                                        <tr>
                                            <td class="table-data"><?= htmlspecialchars($r['user_name']) ?></td>
                                            <td class="table-data"><?= htmlspecialchars($r['item_name']) ?></td>
                                            <td class="table-data">
                                                <span class="
                                                    <?php 
                                                        if ($r['status'] == 'Returned') echo 'flex justify-center bg-[#D0E9DB] w-full text-[#16904D] py-2 px-5 rounded-[5px]'; 
                                                        elseif ($r['status'] == 'Pending') echo 'flex justify-center bg-[#FDEFDA] w-full text-[#B6771E] py-2 px-5 rounded-[5px]';
                                                        else echo 'flex justify-center bg-[#F0D2D2] text-[#B61E1E] py-2 px-5 w-full rounded-[5px]';
                                                    ?>
                                                ">
                                                    <?= $r['status'] ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-gray-500">No requests found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<?php include 'admin-layout-footer.php'; ?>
