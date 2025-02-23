<?php
include '../db-conn.php';

if (isset($_GET['id']) && isset($_GET['action'])) {
    $b_item_id = $_GET['id'];
    $action = $_GET['action'];

    // Fetch the borrowed item details
    $sql = "SELECT * FROM borrowed_items WHERE b_item_id = :b_item_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':b_item_id', $b_item_id, PDO::PARAM_INT);
    $stmt->execute();
    $borrowed_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$borrowed_item) {
        die("Error: Borrow request not found.");
    }

    $item_id = $borrowed_item['item_id'];

    if ($action === "approve") {
        // Check if there are available items
        $sql = "SELECT total_available FROM lab_equipments WHERE item_id = :item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt->execute();
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$item || $item['total_available'] <= 0) {
            die("Error: Not enough items available for approval.");
        }

        // Reduce total available items
        $new_total = $item['total_available'] - 1;
        $sql = "UPDATE lab_equipments SET total_available = :new_total WHERE item_id = :item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':new_total', $new_total, PDO::PARAM_INT);
        $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt->execute();

        // Update the request status to "Approved" and store approval date
        $sql = "UPDATE borrowed_items SET status = 'Approved', approval_date = NOW(), denied_date = NULL WHERE b_item_id = :b_item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':b_item_id', $b_item_id, PDO::PARAM_INT);
        $stmt->execute();
        
        header("Location: requests.php?success=Request approved!");
        exit();

    } elseif ($action === "deny") {
        // Update request status to "Denied" and store the denied date
        $sql = "UPDATE borrowed_items SET status = 'Denied', denied_date = NOW(), approval_date = NULL WHERE b_item_id = :b_item_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':b_item_id', $b_item_id, PDO::PARAM_INT);
        $stmt->execute();
        
        header("Location: requests.php?success=Request denied!");
        exit();
    }
}

$conn = null;
?>
