<?php
include '../db-conn.php';

if (isset($_GET['query'])) {
    $searchQuery = '%' . $_GET['query'] . '%';
    
    // Search for items that match the query
    $sql = "SELECT item_id, item_name, item_description, uploader, temp_name, total_available, item_status FROM lab_equipments WHERE item_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$searchQuery]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
        foreach ($results as $lab_equipment) {
            echo '<div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow">';
            echo '<img src="../upload/' . htmlspecialchars($lab_equipment['temp_name']) . '" alt="' . htmlspecialchars($lab_equipment['item_name']) . '" class="w-full h-70 object-cover rounded-t-lg mb-4">';
            echo '<h2 class="text-xl font-semibold mb-2 text-gray-800">' . htmlspecialchars($lab_equipment['item_name']) . '</h2>';
            echo '<p class="text-sm text-gray-600"><strong>Description:</strong> ' . htmlspecialchars($lab_equipment['item_description']) . '</p>';
            echo '<p class="text-sm text-gray-600"><strong>Uploader:</strong> ' . htmlspecialchars($lab_equipment['uploader']) . '</p>';
            echo '<p class="text-sm text-gray-600"><strong>Status:</strong> <span class="' . ($lab_equipment['total_available'] > 0 ? 'text-green-600' : 'text-red-600') . '">' . ($lab_equipment['total_available'] > 0 ? 'Available' : 'No Available') . '</span></p>';
            echo '<p class="text-sm text-gray-600"><strong>Total Available:</strong> ' . htmlspecialchars($lab_equipment['total_available']) . '</p>';
            echo '<div class="mt-4 flex justify-end space-x-2">';
            echo '<a href="borrow-form.php?id=' . urlencode($lab_equipment['item_id']) . '" class="px-4 py-2 bg-yellow-600 text-white rounded-xl hover:bg-yellow-700 transition-colors" onclick="return confirm(\'Are you sure you want to borrow this item?\');">Borrow</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p class='text-gray-600 text-lg'>No items found.</p>";
    }
}
?>