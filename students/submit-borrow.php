<?php
include '../db-conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $itemid = $_POST['item_id'];
    $lrn_or_email = $_POST['lrn_or_email'];
    $quantity = intval($_POST['quantity']); // Convert to integer

    if ($quantity <= 0) {
        header("Location: borrow-form.php?id=$itemid&error=Invalid quantity!");
        exit();
    }

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

    try {
        // Insert the borrow request WITHOUT updating inventory
        $sql = "INSERT INTO borrowed_items (lrn_or_email, item_id, quantity, date_borrowed, status) 
                VALUES (:lrn_or_email, :item_id, :quantity, :date_borrowed, :status)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':lrn_or_email', $lrn_or_email, PDO::PARAM_STR);
        $stmt->bindParam(':item_id', $itemid, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);

        date_default_timezone_set('Asia/Manila');
        $date_borrowed = date("Y-m-d H:i:s"); 
        $status = "Pending"; // Request is pending approval

        $stmt->bindParam(':date_borrowed', $date_borrowed, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);

        $stmt->execute();

        header("Location: borrow-form.php?id=$itemid&success=Successfully sent a request!");
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
