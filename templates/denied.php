<?php
require '../includes/db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Print POST data to ensure correct values are being passed
    print_r($_POST);

    if (isset($_POST['event_id'])) {
        $event_id = $_POST['event_id']; // The ID of the event to approve

        // Prepare and bind SQL statement to approve the event
        $sql_event = "DELETE FROM events WHERE event_id = ?";
        $stmt_event = $conn->prepare($sql_event);

        if (!$stmt_event) {
            echo "Error preparing statement: " . $conn->error;
            exit();
        }

        $stmt_event->bind_param("i", $event_id);

        if ($stmt_event->execute()) {
            if ($stmt_event->affected_rows > 0) {
                echo "Event denied successfully!";
            } else {
                echo "No event was denied. Please check the event ID.";
            }
        } else {
            echo "Error denying event: " . $stmt_event->error;
        }

        $stmt_event->close(); // Close the event statement
    }

    if (isset($_POST['ask_id'])) {
        $ask_id = $_POST['ask_id']; // The ID of the ask to approve

        // Prepare and bind SQL statement to approve the ask
        $sql_ask = "DELETE FROM ask WHERE ask_id = ?";
        $stmt_ask = $conn->prepare($sql_ask);

        if (!$stmt_ask) {
            echo "Error preparing statement: " . $conn->error;
            exit();
        }

        $stmt_ask->bind_param("i", $ask_id);

        if ($stmt_ask->execute()) {
            if ($stmt_ask->affected_rows > 0) {
                echo "Ask denied successfully!";
            } else {
                echo "No ask was denied. Please check the ask ID.";
            }
        } else {
            echo "Error denying ask: " . $stmt_ask->error;
        }

        $stmt_ask->close(); // Close the ask statement
    }

    // Close the database connection
    $conn->close();

    // Redirect after operations are completed
    header('Location: ../index.php');
    exit();
}
