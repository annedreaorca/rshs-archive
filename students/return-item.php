<?php
session_start();
include '../db-conn.php';

if (!isset($_SESSION['user_lrn_or_email'])) {
    echo json_encode(["success" => false, "error" => "Unauthorized access"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['b_item_id']) || empty($_POST['b_item_id']) || !isset($_FILES['return_image'])) {
        echo json_encode(["success" => false, "error" => "Invalid request or missing file."]);
        exit;
    }

    $b_item_id = $_POST['b_item_id'];
    $user_lrn_or_email = $_SESSION['user_lrn_or_email'];

    // Set timezone to Philippine time
    date_default_timezone_set('Asia/Manila');
    $return_request = date('Y-m-d H:i:s'); // Current timestamp

    // Check if item exists
    $stmt = $conn->prepare("SELECT item_id FROM borrowed_items WHERE b_item_id = :b_item_id AND lrn_or_email = :user_lrn_or_email");
    $stmt->bindParam(':b_item_id', $b_item_id);
    $stmt->bindParam(':user_lrn_or_email', $user_lrn_or_email);
    $stmt->execute();
    $borrowedItem = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$borrowedItem) {
        echo json_encode(["success" => false, "error" => "Borrowed item not found."]);
        exit;
    }

    // File upload handling
    $uploadDir = '../return-uploads/';
    $fileName = time() . "_" . basename($_FILES["return_image"]["name"]);
    $filePath = $uploadDir . $fileName;

    if (!move_uploaded_file($_FILES["return_image"]["tmp_name"], $filePath)) {
        echo json_encode(["success" => false, "error" => "Failed to upload image."]);
        exit;
    }

    // Mark the item as "Pending Return" and save the return request date
    try {
        $conn->beginTransaction();

        $updateStmt = $conn->prepare("UPDATE borrowed_items 
                                      SET status = 'Pending Return', 
                                          return_image = :return_image, 
                                          return_request = :return_request 
                                      WHERE b_item_id = :b_item_id");
        $updateStmt->bindParam(':return_image', $fileName); // Store file name in DB
        $updateStmt->bindParam(':return_request', $return_request); // Store request timestamp
        $updateStmt->bindParam(':b_item_id', $b_item_id);
        $updateStmt->execute();

        $conn->commit();

        echo json_encode(["success" => true]);
    } catch (Exception $e) {
        $conn->rollBack();
        echo json_encode(["success" => false, "error" => "Failed to return item: " . $e->getMessage()]);
    }
}
?>
