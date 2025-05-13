<?php
include '../db-conn.php';

if (isset($_GET['id']) && isset($_GET['action'])) {
    $b_item_id = $_GET['id'];
    $action = $_GET['action'];

    // Fetch the borrowed item details including quantity
    $sql = "SELECT * FROM borrowed_items WHERE b_item_id = :b_item_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':b_item_id', $b_item_id, PDO::PARAM_INT);
    $stmt->execute();
    $borrowed_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$borrowed_item) {
        die("Error: Borrow request not found.");
    }

    $item_id = $borrowed_item['item_id'];
    $requested_quantity = intval($borrowed_item['quantity']); // Ensure quantity is an integer

    if ($action === "approve") {
        // Fetch the available items
        $sql = "SELECT total_available FROM lab_equipments WHERE item_id = :item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt->execute();
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$item) {
            die("Error: Item not found in inventory.");
        }

        $total_available = intval($item['total_available']);

        // Check if enough stock is available
        if ($total_available < $requested_quantity) {
            die("Error: Not enough items available for approval.");
        }

        // Deduct the exact requested quantity
        $new_total = $total_available - $requested_quantity;
        $sql = "UPDATE lab_equipments SET total_available = :new_total WHERE item_id = :item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':new_total', $new_total, PDO::PARAM_INT);
        $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt->execute();

        // Set timezone to Philippine Time
        date_default_timezone_set('Asia/Manila');
        $ph_time = date('Y-m-d H:i:s'); // Get the current date and time in PHT

        // Update the request status to "Approved" and store approval date
        $sql = "UPDATE borrowed_items 
                SET status = 'Approved', date_approved = :date_approved, date_rejected = NULL 
                WHERE b_item_id = :b_item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':date_approved', $ph_time);
        $stmt->bindParam(':b_item_id', $b_item_id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: requests.php?success=Request approved!");
        exit();

    } elseif ($action === "reject") {
        // Set timezone to Philippine Time
        date_default_timezone_set('Asia/Manila');
        $ph_time = date('Y-m-d H:i:s');

        // Update request status to "Rejected" and store the rejected date
        $sql = "UPDATE borrowed_items 
                SET status = 'Rejected', date_rejected = :date_rejected, date_approved = NULL 
                WHERE b_item_id = :b_item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':date_rejected', $ph_time);
        $stmt->bindParam(':b_item_id', $b_item_id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: requests.php?success=Request rejected!");
        exit();
    }
}

$conn = null;
