<?php
require '../includes/db.php'; // Include the database connection

// Check if the request method is POST, which indicates the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Fetch values of submitted form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Define the SQL query to fetch the user with the provided username
    $sql = 'SELECT id, password FROM users WHERE username = ?';

    // Prepare the SQL statement for execution
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // If preparation fails, show an error message
        echo "Error preparing statement: " . $conn->error;
    } else {
        // Bind the value of the user's input into the SQL statement
        $stmt->bind_param("s", $username); // "s" means one string parameter

        // Execute the prepared statement
        $stmt->execute();

        // Get the result of the query
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the associated row from the database
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a session and store user ID
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $username;

                // Redirect to the user's homepage or dashboard
                header('Location: index.php');
                exit();
            } else {
                // Password is incorrect
                echo "Invalid username or password.";
            }
        } else {
            // No user found with the provided username
            echo "Invalid username or password.";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>


<?php include '../includes/header.php'; ?>

<div class="row login-form">
    <div class="col form-contain mx-auto">
        <!--Login form Start -->
        <form method="POST" action="" class="login">
            <h2 class="form-header mx-auto">Login</h2>
            <!-- form inputs -->
            <h6>Email/Username:</h6>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    id="username"
                    placeholder="" />
                <label for="username">Email/Username</label>
            </div>
            <h6>Password:</h6>
            <div class="form-floating">
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Password" />
                <label for="password">Password</label>
            </div>

            <!-- submit button  -->
            <br />
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary login-reg">
                    Login
                </button>
            </div>
        </form>
        <!--Login form End -->
    </div>
</div>


<?php include '../includes/footer.php' ?>