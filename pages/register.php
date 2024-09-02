<?php

require '../includes/db.php'; // Ensure that the db.php file (containing the connection) is included

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetching values of submitted form and setting them as PHP variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $bio = $_POST['bio'];
    $ig_handle = $_POST['ig_handle'];

    // Some form validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo 'Please fill in all required fields.';
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format!';
        exit();
    }

    if ($password !== $confirm_password) {
        echo 'Passwords do not match!';
        exit();
    }

    if (strlen($password) < 8) {
        echo 'password needs to be 8 characters long.';
        exit();
    }




    // Password hashing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the file was uploaded before accessing it
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
        $profile_pic = $_FILES['profile_pic']['name'];

        // Handle file upload
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($profile_pic);

        // The following verifies that the file is an image
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["profile_pic"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an issue uploading your file.";
                exit(); // Exiting to prevent DB insertion if the image failed to upload
            }
        } else {
            echo "File is not an image.";
            exit(); // Exiting to prevent DB insertion if the image is incorrect
        }
    } else {
        echo "No file uploaded or file upload error.";
        exit(); // Exiting if the file was not uploaded correctly
    }

    // Start a transaction to ensure data consistency 
    $conn->begin_transaction();

    try {
        // Inserting a new user into the Users Table
        $sql_user = "INSERT INTO Users (username, email, password) VALUES (?, ?, ?)";
        $stmt_user = $conn->prepare($sql_user);

        // Check if the prepare() failed
        if (!$stmt_user) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        $stmt_user->bind_param("sss", $username, $email, $hashed_password);

        // Execute the SQL statement for inserting the user 
        $stmt_user->execute();

        // Fetch the ID of the user that was just created 
        $user_id = $stmt_user->insert_id;

        // Inserting the corresponding profile into the Profiles table 
        $sql_profile = "INSERT INTO Profiles (user_id, profile_pic, bio, website) VALUES (?, ?, ?, ?)";
        $stmt_profile = $conn->prepare($sql_profile);

        // Check if the prepare() failed
        if (!$stmt_profile) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        $stmt_profile->bind_param('isss', $user_id, $profile_pic, $bio, $ig_handle);
        $stmt_profile->execute();

        // Commit the transaction 
        $conn->commit();

        // Redirect the user after they have successfully created an account  and store their id in session storage
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;

        header('Location: ../index.php?id=' .  $_SESSION['user_id']);

        exit();
    } catch (Exception $e) {
        // Rollback the transaction if there's an issue 
        $conn->rollback();
        echo "Failed to create account: " . $e->getMessage();
    } finally {

        // Close all the statements and connections
        if (isset($stmt_user)) {
            $stmt_user->close();
        }
        if (isset($stmt_profile)) {
            $stmt_profile->close();
        }
        $conn->close();
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="row register-form">
    <div class="col-10 mx-auto form-container-register">
        <!--Forms Start Here-->
        <form method="POST" action="register.php" enctype="multipart/form-data" class="register">
            <h2 class="form-header mx-auto">Create An Account</h2>
            <!-- base info -->
            <h6>Full Name:</h6>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    id="username"
                    placeholder="" />
                <label for="username">Username</label>
            </div>
            <h6>Email Address:</h6>
            <div class="form-floating mb-3">
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="" />
                <label for="email">Email Address</label>
            </div>

            <!-- password -->
            <div class="row g-3">
                <h6>Password:</h6>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder="" />
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input
                            type="password"
                            class="form-control"
                            name="confirm_password"
                            id="confirm-password"
                            placeholder="" />
                        <label for="confirm-password">Confirm Password</label>
                    </div>
                </div>
            </div>

            <!-- bio and more info -->
            <h6>Bio:</h6>
            <div class="form-floating">
                <textarea
                    class="form-control"
                    placeholder="Leave a comment here"
                    name="bio"
                    id="bio"
                    style="height: 170px"></textarea>
                <label for="bio">Bio</label>
            </div>

            <!-- Upload Profile photo and link IG -->
            <br />
            <div class="row g-3">
                <div class="col">
                    <div class="form-group mb-3">
                        <label
                            for="profile-img"
                            class="form-label profile-form-label">Add A Profile Photo</label>
                        <br />
                        <input class="form-control pfp-input" type="file" name="profile_pic" id="profile-img" />
                    </div>
                </div>
                <div class="col">
                    <span class="instagram-handle">What's your @?</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">@</span>
                        <div class="form-floating">
                            <input
                                type="text"
                                class="form-control"
                                id="ig-handle"
                                name="ig_handle"
                                placeholder="Instagram Handle" />
                            <label for="ig-handle">instagram handle</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- submit button  -->
            <br />
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary login-reg">
                    Create Your Account
                </button>
            </div>
        </form>
        <!--/Forms Start Here-->
    </div>
</div>



<?php include '../includes/footer.php' ?>