<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $user_id = intval($_POST['user_id']);
    $item_type = $_POST['item_type']; // 'event' or 'ask'
    $item_id = intval($_POST['item_id']);

    // Prepare the SQL query to insert a new saved item
    $sql = "INSERT INTO user_saves (user_id, item_type, item_id, creation) 
            VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isi", $user_id, $item_type, $item_id);
        if ($stmt->execute()) {
            // Redirect back to the previous page
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error saving item: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
