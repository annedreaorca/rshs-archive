<?php
include '../db-conn.php';

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $uploader = $_POST['uploader'];
    $item_status = $_POST['item_status'];
    $total_available = $_POST['total_available'];

    // Check if the item already exists
    $checkItem = $conn->prepare("SELECT COUNT(*) FROM lab_equipments WHERE item_name = ?");
    $checkItem->execute([$item_name]);
    $existingItemCount = $checkItem->fetchColumn();

    if ($existingItemCount > 0) {
        // Redirect to edit page instead of adding duplicate
        header("Location: edit-item.php?item_name=" . urlencode($item_name) . "&prompt=edit");
        exit();
    }

    if (!empty($_FILES['file']['name'])) {
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];

        // Rename the file to ensure a unique name
        $fname = date("YmdHis") . '_' . $name;
        $chk = $conn->prepare("SELECT COUNT(*) FROM lab_equipments WHERE file_name = ?");
        $chk->execute([$name]);
        $count = $chk->fetchColumn();

        if ($count) {
            $i = 1;
            $c = 0;
            while ($c == 0) {
                $i++;
                $reversedParts = explode('.', strrev($name), 2);
                $tname = strrev($reversedParts[1]) . "_" . $i . '.' . strrev($reversedParts[0]);
                $chk2 = $conn->prepare("SELECT COUNT(*) FROM lab_equipments WHERE file_name = ?");
                $chk2->execute([$tname]);
                $chk2Count = $chk2->fetchColumn();
                if ($chk2Count == 0) {
                    $c = 1;
                    $name = $tname;
                }
            }
        }

        if (move_uploaded_file($temp, "../upload/" . $fname)) {
            try {
                $query = $conn->prepare("INSERT INTO lab_equipments
                    (item_name, item_description, uploader, item_status, total_available, file_name, temp_name, is_archived)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $query->execute([$item_name, $item_description, $uploader, $item_status, $total_available, $name, $fname, 0]);

                header("Location: add-item.php?success=Item has been uploaded!");
                exit();
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    header('location: add-item.php?error=Item cannot be uploaded');
                } else {
                    echo $e->getMessage();
                }
            }
        } else {
            die("Error moving the uploaded file.");
        }
    } else {
        try {
            $query = $conn->prepare("INSERT INTO lab_equipments
                (item_name, item_description, uploader, item_status, total_available, is_archived)
                VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([$item_name, $item_description, $uploader, $item_status, $total_available, 0]);

            header('location: add-item.php?success=Item has been uploaded!');
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                header('location: add-item.php?error=Item cannot be uploaded');
            } else {
                echo $e->getMessage();
            }
        }
    }
}

if (isset($_POST['update'])) {
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $uploader = $_POST['uploader'];
    $item_status = $_POST['item_status'];
    $total_available = $_POST['total_available'];

    $query = $conn->prepare("UPDATE lab_equipments 
                             SET item_description=?, uploader=?, item_status=?, total_available=? 
                             WHERE item_name=?");
    $query->execute([$item_description, $uploader, $item_status, $total_available, $item_name]);

    header("Location: inventory.php?success=Item updated!");
    exit();
}

$conn = null;
?>
