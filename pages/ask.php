<?php

session_start();
// Include the database connection file
require '../includes/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Fetch and sanitize the form inputs
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $details = $_POST['details'];
    $category = $_POST['category'];

    // Assuming these values are provided through a form or other sources
    $user_id = $_SESSION['user_id']; // This should come from the logged-in user's session, e.g., $_SESSION['user_id']
    $approved = 0; // 0 indicates the question is not yet approved

    // Validation (You can add more validation as needed)
    if (empty($title) || empty($details) || empty($category)) {
        echo "All fields are required!";
    } else {
        // Prepare the SQL query to insert the ask (question) into the database
        $sql = "INSERT INTO ask (user_id, title, details, category, approved, creation) 
                VALUES (?, ?, ?, ?, ?, current_timestamp())";

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            // Handle errors in preparing the SQL statement
            echo "Failed to prepare statement: " . $conn->error;
        } else {
            // Bind parameters to the SQL query
            $stmt->bind_param('isssi', $user_id, $title, $details, $category, $approved);

            // Execute the query
            if ($stmt->execute()) {
                // Redirect or display a success message
                echo "Your ask has been sent for review!";
            } else {
                // Handle errors in executing the SQL query
                echo "Failed to post your ask: " . $stmt->error;
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
        <div class="col-10 mx-auto">
            <!--ask question Fom START-->
            <form method="POST" action="ask.php" class="asks">
                <h2 class="form-header mx-auto">Ask Around</h2>
                <!-- base info -->
                <h6>Ask Title:</h6>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="title"
                        id="questionTitle"
                        placeholder="" />
                    <label for="formId1">My Ask is...</label>
                </div>

                <!-- bio and more info -->
                <h6>Let Me Elaborate:</h6>
                <div class="form-floating">
                    <textarea
                        class="form-control"
                        placeholder="Leave a comment here"
                        name="details"
                        id="questionDetails"
                        style="height: 170px"></textarea>
                    <label for="floatingTextarea2">Elaborate on your ask here...</label>
                </div>

                <!-- Tags -->
                <br />
                <select class="form-select" name="category" aria-label="Default select example">
                    <option selected>Post Tags:</option>
                    <option value="Outdoor">Outdoor</option>
                    <option value="Indoor">Indoor</option>
                    <option value="Night Event">Night Event</option>
                    <option value="Day Event">Day Event</option>
                    <option value="Live Music">Live Music</option>
                    <option value="Art&Culture">Art&Culture</option>
                    <option value="Sports Screening">Sports Screening</option>
                </select>

                <!-- submit button  -->
                <br />
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary share-ask">
                        Ask Around!
                    </button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <?php include '../templates/please-login.php'; ?>
    <?php endif; ?>

</div>

<?php include '../includes/footer.php' ?>