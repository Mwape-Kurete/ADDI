<?php

// Include the database connection file
require '../includes/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Fetch and sanitize the form inputs
    $title = $conn->real_escape_string($_POST['question_titlee']);
    $content = $conn->real_escape_string($_POST['question_content']);
    $category = $conn->real_escape_string($_POST['question_category']);

    // Validation (You can add more validation as needed)
    if (empty($title) || empty($content) || empty($category)) {
        echo "All fields are required!";
    } else {
        // Prepare the SQL query to insert the ask (question) into the database
        $sql = "INSERT INTO Questions (title, content, category) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            // Handle errors in preparing the SQL statement
            echo "Failed to prepare statement: " . $conn->error;
        } else {
            // Bind parameters to the SQL query
            $stmt->bind_param('sss', $title, $content, $category);

            // Execute the query
            if ($stmt->execute()) {
                // Redirect or display a success message
                echo "Your ask has been posted successfully!";
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

<div class="container-fluid mx-auto">
    <form method="POST" action="" class="asks">
        <h2 class="form-header mx-auto">Ask Around</h2>
        <!-- base info -->
        <h6>Ask Title:</h6>
        <div class="form-floating mb-3">
            <input
                type="text"
                class="form-control"
                name="question_titlee"
                id="formId1"
                placeholder="" />
            <label for="formId1">My Ask is...</label>
        </div>

        <!-- bio and more info -->
        <h6>Let Me Elaborate:</h6>
        <div class="form-floating">
            <textarea
                class="form-control"
                placeholder="Leave a comment here"
                name="question_content"
                id="floatingTextarea2"
                style="height: 170px"></textarea>
            <label for="floatingTextarea2">Elaborate on your ask here...</label>
        </div>

        <!-- Tags -->
        <br />
        <select class="form-select" name="question_category" aria-label="Default select example">
            <option selected>Post Tags:</option>
            <option value="1">Outdoor</option>
            <option value="2">Indoor</option>
            <option value="3">Night Event</option>
            <option value="4">Day Event</option>
            <option value="5">Live Music</option>
            <option value="6">Art&Culture</option>
            <option value="3">Sports Screening</option>
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

<?php include '../includes/footer.php' ?>