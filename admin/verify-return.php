<?php
include '../db-conn.php';

date_default_timezone_set('Asia/Manila'); // Set timezone to Philippine time
$ph_time = date('Y-m-d H:i:s'); // Get current PH time

if (isset($_GET['id']) && isset($_GET['action'])) {
    $b_item_id = $_GET['id'];
    $action = $_GET['action'];

    if ($action === 'verify') {
        // Start a transaction
        $conn->beginTransaction();

        try {
            // Update borrowed_items status to 'Returned'
            $sql = "UPDATE borrowed_items SET status = 'Returned', date_returned = :ph_time WHERE b_item_id = :b_item_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ph_time', $ph_time);
            $stmt->bindParam(':b_item_id', $b_item_id);
            $stmt->execute();

            // Get item_id and quantity from borrowed_items
            $query = "SELECT item_id, quantity FROM borrowed_items WHERE b_item_id = :b_item_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':b_item_id', $b_item_id);
            $stmt->execute();
            $borrowedItem = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($borrowedItem) {
                $item_id = $borrowedItem['item_id'];
                $borrowed_quantity = $borrowedItem['quantity'];

                // Update inventory (increase total_available)
                $inventoryStmt = $conn->prepare("UPDATE lab_equipments SET total_available = total_available + :borrowed_quantity WHERE item_id = :item_id");
                $inventoryStmt->bindParam(':borrowed_quantity', $borrowed_quantity);
                $inventoryStmt->bindParam(':item_id', $item_id);
                $inventoryStmt->execute();
            }

            // Commit transaction
            $conn->commit();
            echo json_encode(['success' => true]);

        } catch (Exception $e) {
            $conn->rollBack();
            echo json_encode(['success' => false, 'error' => 'Transaction failed: ' . $e->getMessage()]);
        }

    } elseif ($action === 'reject-return') {
        $sql = "UPDATE borrowed_items SET status = 'Rejected Return' WHERE b_item_id = :b_item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':b_item_id', $b_item_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to update status.']);
        }
    }
}
?>
