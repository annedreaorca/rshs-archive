<?php
    include '../db-conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $itemid = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $lrn_or_email = $_POST['lrn_or_email'];
        $total_available = $_POST['total_available'] - 1;

        // Check if item is available
        if ($total_available <= 0) {
            header("Location: borrow-form.php?id=$itemid&error=Not enough items available!");
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

        // Update available equipment count
        $sql = "UPDATE lab_equipments SET total_available = :total_available WHERE item_id = :itemid";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':total_available', $total_available, PDO::PARAM_INT);
        $stmt->bindParam(':itemid', $itemid, PDO::PARAM_INT);
        $stmt->execute();

        // Insert into borrowed_items table (Removed `status` column)
        try {
            $sql = "INSERT INTO borrowed_items (lrn_or_email, item_id) VALUES (:lrn_or_email, :item_id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':lrn_or_email', $lrn_or_email, PDO::PARAM_STR);
            $stmt->bindParam(':item_id', $itemid, PDO::PARAM_INT);
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
