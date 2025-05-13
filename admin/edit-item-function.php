<?php
include '../db-conn.php';

if (!isset($_GET['item_name'])) {
    header("Location: inventory.php?error=No item selected");
    exit;
}

$item_name = urldecode($_GET['item_name']);
$query = $conn->prepare("SELECT * FROM lab_equipments WHERE item_name = ?");
$query->execute([$item_name]);
$item = $query->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    header("Location: inventory.php?error=Item not found");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $uploader = $_POST['uploader'];
    $item_status = $_POST['item_status'];
    $total_available = $_POST['total_available'];
    $old_image = $item['file_name']; // Keep existing file if no new upload

    $new_image = $old_image; // Default to old image
    $new_temp_name = $item['temp_name']; // Default to old temp_name

    // Handle file upload if a new image is provided
    if (!empty($_FILES['file']['name'])) {
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];

        // Rename the file to avoid duplicate filenames
        $fname = date("YmdHis") . '_' . $name;
        $target_dir = "../upload/";
        $target_file = $target_dir . $fname;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_types)) {
            header("Location: edit-item.php?item_name=" . urlencode($item_name) . "&error=Invalid file type");
            exit;
        }

        // Check for duplicates in the database
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
                if ($chk2->fetchColumn() == 0) {
                    $c = 1;
                    $name = $tname;
                }
            }
        }

        // Move file and update file names
        if (move_uploaded_file($temp, $target_file)) {
            $new_image = $name;
            $new_temp_name = $fname;

            // Delete old image if it exists
            if (!empty($old_image) && file_exists($target_dir . $old_image)) {
                unlink($target_dir . $old_image);
            }
        } else {
            header("Location: edit-item.php?item_name=" . urlencode($item_name) . "&error=File upload failed");
            exit;
        }
    }

    // Update the database
    $update_query = $conn->prepare("UPDATE lab_equipments 
        SET item_name=?, item_description=?, uploader=?, item_status=?, total_available=?, file_name=?, temp_name=? 
        WHERE item_name=?");
    $update_query->execute([$new_item_name, $item_description, $uploader, $item_status, $total_available, $new_image, $new_temp_name, $item_name]);

    header("Location: inventory.php?success=Item updated successfully");
    exit;
}
?>
