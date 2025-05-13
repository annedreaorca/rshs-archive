<?php
include '../db-conn.php'; // Adjust to your database connection file

// Check if ID and action are set
if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    // Determine status based on action
    $status = ($action === 'approve') ? 'Approved' : 'Rejected';

    // Update the status of the borrow request
    $sql = "UPDATE borrow_requests SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$status, $id]);

    // If approved, update item status to "Borrowed"
    if ($status === 'Approved') {
        $sqlItem = "UPDATE lab_equipments SET item_status = 'Borrowed' WHERE item_name =
                    (SELECT item_name FROM borrow_requests WHERE id = ?)";
        $stmtItem = $conn->prepare($sqlItem);
        $stmtItem->execute([$id]);
    }

    // Redirect back to manage requests page
    header('Location: requests.php');
    exit();
} else {
    echo "Invalid request.";
}
?>
