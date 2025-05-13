<?php 
$pageTitle = 'Borrowed Equipments';
include 'students-layout-header.php';
include '_components/loading.php';
include '../db-conn.php';

session_start();

if (!isset($_SESSION['user_lrn_or_email'])) {
    die("Error: User not logged in.");
}

$user_lrn_or_email = $_SESSION['user_lrn_or_email']; // Get logged-in user

// Fetch borrowed items only for the logged-in user
$sql = "SELECT 
            bi.b_item_id, 
            le.item_name, 
            bi.date_borrowed, 
            bi.status, 
            bi.quantity, 
            bi.date_approved, 
            bi.date_rejected
        FROM borrowed_items bi
        INNER JOIN lab_equipments le ON bi.item_id = le.item_id
        WHERE bi.lrn_or_email = :user_lrn_or_email"; 

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_lrn_or_email', $user_lrn_or_email);
$stmt->execute();
$borrowed_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="flex">
    <?php include '_components/sidebar.php';?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="lg:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M4 8l16 0" />
                <path d="M4 16l16 0" />
            </svg>
        </button>
        <div class="page-heading">
            <h1>Borrowed Equipments</h1>
            <p class="text-gray-600">View your equipment requests and status updates.</p>
        </div>
        <table class="w-full bg-white rounded-xl shadow-md mt-10">
            <thead>
                <tr class="bg-gray-100 text-gray-600">
                    <th class="py-2 px-4">Laboratory Equipment</th>
                    <th class="py-2 px-4">Quantity</th>
                    <th class="py-2 px-4">Date Borrowed</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($borrowed_items)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No borrowed items found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($borrowed_items as $request): ?>
                    <tr class="border-t">
                        <td class="py-2 px-4"><?= htmlspecialchars($request['item_name']); ?></td>
                        <td class="py-2 px-4 text-center"><?= intval($request['quantity']); ?></td>
                        <td class="py-2 px-4"><?= date('F j, Y, g:i a', strtotime($request['date_borrowed'])); ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($request['status']); ?></td>
                        <td class="py-2 px-4">
                            <?php if ($request['status'] === 'Approved'): ?>
                                <button class="bg-blue-500 text-white px-4 py-1 rounded return-btn" data-bitemid="<?= $request['b_item_id']; ?>">
                                    Return
                                </button>
                                <form class="return-form hidden mt-2" enctype="multipart/form-data">
                                    <input type="file" name="return_image" accept="image/*" required class="mb-2">
                                    <input type="hidden" name="b_item_id" value="<?= $request['b_item_id']; ?>">
                                    <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded">Submit</button>
                                </form>
                            <?php elseif ($request['status'] === 'Pending Return'): ?>
                                <span class="text-green-500">Verifying</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</section>

<script>
document.querySelectorAll('.return-btn').forEach(button => {
    button.addEventListener('click', function() {
        const form = this.nextElementSibling;
        form.classList.toggle('hidden'); // Show/hide form
    });
});

document.querySelectorAll('.return-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('return-item.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Item returned successfully!");
                location.reload();
            } else {
                alert("Failed to return item: " + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>

<?php include 'students-layout-footer.php'; ?>
