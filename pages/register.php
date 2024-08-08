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

<div class="container-fluid register-form">
    <form action="POST" action="register.php">

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
                    <input type="password" class="form-control" name="password" id="formId1" placeholder="" />
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="formId1" id="formId1" placeholder="" />
                    <label for="formId1">Confirm Password</label>
                </div>
            </div>
        </div>

        <!-- bio and more info -->
        <h6>Bio:</h6>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="bio" style="height: 170px"></textarea>
            <label for="bio">Bio</label>
        </div>

        <br>
        <div class="row g-3">
            <h6>Tell Us a Few Facts About Yourself</h6>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Fact #01</span>
                    <input type="text" class="form-control" placeholder="I think Drake is overrated" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Fact #02</span>
                    <input type="text" class="form-control" placeholder="I love Aperol Spritz" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Fact #03</span>
                    <input type="text" class="form-control" placeholder="I don't like alcohol" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <!-- Upload Profile photo and link IG -->
        <br>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">what's your instagram handle</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <!-- submit button  -->
        <br>
        <button type="submit" class="btn btn-primary">Create Your Account</button>
    </form>
</div>


<?php include '../includes/footer.php' ?>