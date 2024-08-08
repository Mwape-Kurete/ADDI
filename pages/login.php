<?php
//session_start(); //starts / resumes a session -> this is already set in my header file
require '../includes/db.php'; //ensures that the db.php file (containing our connection is placed)

//checking if the request method is POST, which indicates the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //fetching values of submitted form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Define the SQL query to insert the username and password into the users table
    $sql = 'INSERT INTO users (add your query here)';

    // prepare the SQL statement for execution 
    // -> symbol is the object operator (Js would be: user.age | PHP is user->age)
    $stmt = $conn->prepare($sql);


    // Add the values of the user's input into the SQL statement
    $stmt->bind_param("ss", $username, $password); // "ss" means two string parameters

    // If the prepared statement is executed
    if ($stmt->execute()) {
        echo "Registration Complete"; // If execution is successful, display a success message
    } else {
        echo "Error" . $sql . "<br>" . $conn->error; // If there is an error, display the error message along with the SQL query and connection error
    }

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>


<?php include '../includes/header.php'; ?>

<div class="row login-form">
    <div class="col form-contain">
        <form action="">
            <!-- form inputs -->
            <h6>Email/Username:</h6>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="formId1" id="username" placeholder="" />
                <label for="username">Email/Username</label>
            </div>
            <h6>Password:</h6>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <!-- submit button  -->
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>


<?php include '../includes/footer.php' ?>