<?php
include '../db-conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $itemid = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $lrn_or_email = $_POST['lrn_or_email'];
    $quantity = intval($_POST['quantity']);
    $uploader = $_SESSION['user_name'] ?? 'Unknown User';

    // Validate total available items
    if (!isset($_POST['total_available'])) {
        header("Location: borrow-form.php?id=$itemid&error=Total available not provided!");
        exit();
    }

    $total_available = intval($_POST['total_available']);

    if ($quantity > $total_available || $quantity <= 0) {
        header("Location: borrow-form.php?id=$itemid&error=Invalid quantity requested!");
        exit();
    }

    // Reduce available count
    $new_total = $total_available - $quantity;

    // Check if student exists
    $sql = "SELECT * FROM users WHERE lrn_or_email = :lrn_or_email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':lrn_or_email', $lrn_or_email, PDO::PARAM_STR);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$student) {
        header("Location: borrow-form.php?id=$itemid&error=Invalid Student ID / Email!");
        exit();
    }

    // Update available equipment count
    $sql = "UPDATE lab_equipments SET total_available = :total_available WHERE item_id = :itemid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':total_available', $new_total, PDO::PARAM_INT);
    $stmt->bindParam(':itemid', $itemid, PDO::PARAM_INT);
    $stmt->execute();

    // Insert into borrowed_items table
    try {
        $sql = "INSERT INTO borrowed_items (lrn_or_email, item_id, quantity, uploader) 
                VALUES (:lrn_or_email, :item_id, :quantity, :uploader)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':lrn_or_email', $lrn_or_email, PDO::PARAM_STR);
        $stmt->bindParam(':item_id', $itemid, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':uploader', $uploader, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: borrow-form.php?id=$itemid&success=Successfully borrowed the item!");
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            header("Location: borrow-form.php?id=$itemid&error=Student ID already exists in borrowed records!");
        } else {
            header("Location: borrow-form.php?id=$itemid&error=Database error: " . $e->getMessage());
        }
    }
}

$conn = null;
?>
