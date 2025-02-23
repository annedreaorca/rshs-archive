<?php
include '../db-conn.php'; // Adjust this to your database connection file

// Check if the request ID and action are provided in the URL
if (isset($_GET['id']) && isset($_GET['action'])) {
    $b_item_id = $_GET['id'];
    $action = $_GET['action'];

    // Validate the action
    if ($action === 'approve') {
        // Update the status to 'Approved'
        $sql = "UPDATE borrowed_items SET status = 'Approved' WHERE b_item_id = ?";
    } elseif ($action === 'deny') {
        // Update the status to 'Denied'
        $sql = "UPDATE borrowed_items SET status = 'Denied' WHERE b_item_id = ?";
    } else {
        echo "Invalid action specified.";
        exit();
    }

    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->execute([$b_item_id]);

    // Redirect back to the requests page
    header('Location: requests.php');
    exit();
} else {
    echo "Invalid request.";
}
?>
