<?php include '../includes/header.php'; ?>

<div class="container-fluid login-form">
    <form action="">
        <!-- form inputs -->
        <h6>Email/Username:</h6>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="formId1" id="formId1" placeholder="" />
            <label for="formId1">Email/Username</label>
        </div>
        <h6>Password:</h6>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <!-- submit button  -->
        <br>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>


<?php include '../includes/footer.php' ?>