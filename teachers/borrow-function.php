<?php
include '../db-conn.php'; // Adjust this to your database connection file

// Check if item_name is passed as a query parameter
if (isset($_GET['item_name'])) {
    $item_name = urldecode($_GET['item_name']);

    // Update the status of the item to 'Borrowed'
    $sql = "UPDATE lab_equipments SET item_status = 'Borrowed' WHERE item_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$item_name]);

    // Redirect back to the inventory page
    header('Location: inventory.php');
    exit();
} else {
    echo "No item selected for borrowing.";
}
?>
