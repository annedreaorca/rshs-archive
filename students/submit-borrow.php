<?php
    include '../db-conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $itemid = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $lrn_or_email = $_POST['lrn_or_email'];

        // Debugging: Check the received value
        if (!isset($_POST['total_available'])) {
            header("Location: borrow-form.php?id=$itemid&error=Total available not provided!");
            exit();
        }

        $total_available = intval($_POST['total_available']); // Convert to integer
        
        // Ensure there is at least 1 item available before borrowing
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

        try {
            $sql = "INSERT INTO borrowed_items (lrn_or_email, item_id, date_borrowed, status) 
                    VALUES (:lrn_or_email, :item_id, :date_borrowed, :status)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':lrn_or_email', $lrn_or_email, PDO::PARAM_STR);
            $stmt->bindParam(':item_id', $itemid, PDO::PARAM_INT);
            
            // Get current date and time
            date_default_timezone_set('Asia/Manila');
            $date_borrowed = date("Y-m-d H:i:s"); 
            $status = "Pending"; // Set status as pending
        
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
