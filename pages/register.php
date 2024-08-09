<?php

require '../includes/db.php'; //ensures that the db.php file (containing our connection is placed)

//checking if the request method is POST, which indicates the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //fetching values of submitted form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM users WHERE (add your query here)';

    // prepare the SQL statement for execution 
    // -> symbol is the object operator (Js would be: user.age | PHP is user->age)
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password); //'s' means string parameter 

    //execute the SQL statement 
    $stmt->execute();

    //storing the result 
    $result = $stmt->get_result();

    //checks if the result is not empty 
    if ($result->num_rows > 0) {
        // fetching the data retrieved from the associative array and storing it in user variable... i think 
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {
            //start a session and store 
            $_SESSION['username'] = $user['id'];
            header('Location: index.php');
            exit();
        } else {
            echo 'Invalid username/password';
        }
    } else {
        echo 'Invalid username/password';
    }

    $stmt->close();
    $conn->close();
}
?>

<?php include '../includes/header.php'; ?>

<div class="row register-form">
    <div class="col-10 mx-auto form-container-register">
        <form action="POST" action="register.php">
            <h2 class="form-header mx-auto">Create An Account</h2>
            <!-- base info -->
            <h6>Full Name:</h6>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="formId1" id="fullname" placeholder="" />
                <label for="fullname">Full Name</label>
            </div>
            <h6>Email Address:</h6>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="formId1" id="email" placeholder="" />
                <label for="email">Email Address</label>
            </div>

            <!-- password -->
            <div class="row g-3">
                <h6>Password:</h6>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="" />
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="formId1" id="confirm-password" placeholder="" />
                        <label for="confirm-password">Confirm Password</label>
                    </div>
                </div>
            </div>

            <!-- bio and more info -->
            <h6>Bio:</h6>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="bio" style="height: 170px"></textarea>
                <label for="bio">Bio</label>
            </div>


            <!-- Upload Profile photo and link IG -->
            <br>
            <div class="row g-3">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="profile-img" class="form-label profile-form-label">Add A Profile Photo</label>
                        <br>
                        <input class="form-control pfp-input" type="file" id="profile-img">
                    </div>
                </div>
                <div class="col">
                    <span class="instagram-handle">What's your @?</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">@</span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ig-handle" placeholder="Instagram Handle">
                            <label for="ig-handle">instagram handle</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- submit button  -->
            <br>
            <button type="submit" class="btn btn-primary">Create Your Account</button>
        </form>
    </div>
</div>



<?php include '../includes/footer.php' ?>