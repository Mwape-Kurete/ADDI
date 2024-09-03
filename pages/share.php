<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Include the database connection file
require '../includes/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Fetch and sanitize the form inputs
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    $details = $_POST['details'];
    $category = $_POST['category'];

    $approved = 0; // 0 indicates the question is not yet approved

    // Validation (You can add more validation as needed)
    if (empty($title) || empty($location) || empty($event_date) || empty($details) || empty($category)) {
        echo "All fields are required!";
    } else {
        // Prepare the SQL query to insert the ask (question) into the database
        $sql = "INSERT INTO events (user_id, title, location, event_date, details, category, approved, creation) 
                VALUES (?, ?, ?, ?, ?, ?, ?, current_timestamp())";

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            // Handle errors in preparing the SQL statement
            echo "Failed to prepare statement: " . $conn->error;
        } else {
            // Bind parameters to the SQL query
            $stmt->bind_param('isssssi', $user_id, $title, $location, $event_date, $details, $category, $approved);

            // Execute the query
            if ($stmt->execute()) {
                // Redirect or display a success message
                echo <<<HTML
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Your event has been sent for review!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                HTML;
            } else {
                // Handle errors in executing the SQL query
                $errorMsg = htmlspecialchars($stmt->error); // Sanitize error message
                echo <<<HTML
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to post your ask: $errorMsg
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                HTML;
            }

            // Close the statement
            $stmt->close();
        }
    }

    // Close the database connection
    $conn->close();
}
?>

<?php include '../includes/header.php'; ?>

<div class="row">
    <?php if (isset($_SESSION['username'])): ?>
        <div class="col-10 postEventForm mx-auto">
            <!--Share Event Fom START-->
            <form method="POST" action="share.php" class="share">
                <h2 class="form-header mx-auto">Create An Event</h2>
                <!-- base info -->
                <h6>Ask Title:</h6>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="title"
                        id="event_title"
                        placeholder="" />
                    <label for="event_title">Event Name</label>
                </div>

                <h6>Add Event Location:</h6>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="location"
                        id="event_loc"
                        placeholder="" />
                    <label for="event_loc">Event Location</label>
                </div>

                <div class="form-group py-3">
                    <h6>Select Date and Time</h6>
                    <input
                        type="datetime-local"
                        name="event_date"
                        class="form-control"
                        id="datetimeInput" />
                </div>

                <!-- More info -->
                <h6>Why You're Coming</h6>
                <div class="form-floating">
                    <textarea
                        class="form-control"
                        name="details"
                        placeholder="Leave a comment here"
                        id="event_details"
                        style="height: 170px"></textarea>
                    <label for="event_details">Elaborate on event details here...</label>
                </div>

                <!-- Tags -->
                <br />
                <select class="form-select" name="category" aria-label="Default select example">
                    <option selected>Event Tags:</option>
                    <option value="1">Outdoor</option>
                    <option value="2">Indoor</option>
                    <option value="3">Night Event</option>
                    <option value="4">Day Event</option>
                    <option value="5">Live Music</option>
                    <option value="6">Art & Culture</option>
                    <option value="7">Festival</option>
                </select>

                <!-- submit button  -->
                <br />
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary share-ask">
                        Share This Event!
                    </button>
                </div>
            </form>
            <!--Share Event Fom END-->
        </div>
    <?php else: ?>
        <?php include '../templates/please-login.php';  ?>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php' ?>