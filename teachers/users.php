<?php
$pageTitle = 'Users';
include 'teachers-layout-header.php';
include '_components/loading.php';
include '../db-conn.php'; // Database connection

// Fetch all users except super admin (if there's an access level 0 for super admins)
$stmt = $conn->prepare("SELECT user_id, user_name, lrn_or_email, access_level FROM users WHERE access_level IN (1, 2)");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalUsers = count($users); // Get total count
?>

<section class="flex">
    <?php include '_components/sidebar.php'; ?>
    <main class="flex-1 min-h-screen p-8 ml-[272px] max-[1023px]:ml-[0px] overflow-scroll-y">
        <button onclick="toggleSidebar()" class="md:hidden text-primary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0" /><path d="M4 16l16 0" />
            </svg>
        </button>
        <div class="flex justify-between items-center">
            <div class="page-heading">
                <h1>Users Dashboard</h1>
                <p class="text-gray-600">View, update, and manage user roles.</p>
            </div>
            <!-- Total Users Display -->
            <div class="total_users">
                <p>Total Users:</p>
                <span><?= $totalUsers; ?></span>
            </div>
        </div>

        <!-- User Table -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-6 table-container !overflow-x-auto">
            <table class="w-full !min-w-[600px]">
                <thead>
                    <tr>
                        <th class="table-head">User ID</th>
                        <th class="table-head">Name</th>
                        <th class="table-head">Email</th>
                        <th class="table-head">Access Level</th>
                        <th class="table-head">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td class="table-data">
                                <?= $user['user_id']; ?>
                            </td>
                            <td class="table-data">
                                <?= htmlspecialchars($user['user_name']); ?>
                            </td>
                            <td class="table-data">
                                <?= htmlspecialchars($user['lrn_or_email']); ?>
                            </td>
                            <td class="table-data">
                                <?= ($user['access_level'] == 1) ? 'Admin' : 'Student'; ?>
                            </td>
                            <td class="table-data">
                                <form action="update-access.php" method="post" class="inline-block">
                                    <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                                    <select name="access_level" class="border px-2 py-1 rounded">
                                        <option value="1" <?= ($user['access_level'] == 1) ? 'selected' : ''; ?>>Admin</option>
                                        <option value="2" <?= ($user['access_level'] == 2) ? 'selected' : ''; ?>>Student</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded ml-2">Update</button>
                                </form>

                                <!-- Delete User -->
                                <form action="delete-user.php" method="post" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</section>

<?php include 'teachers-layout-footer.php'; ?>
