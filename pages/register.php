<?php include '../includes/header.php'; ?>

<div class="container-fluid register-form">
    <form action="">

        <!-- base info -->
        <h6>Full Name:</h6>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="formId1" id="formId1" placeholder="" />
            <label for="formId1">Full Name</label>
        </div>
        <h6>Email Address:</h6>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="formId1" id="formId1" placeholder="" />
            <label for="formId1">Email Address</label>
        </div>

        <!-- password -->
        <div class="row g-3">
            <h6>Password:</h6>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="formId1" id="formId1" placeholder="" />
                    <label for="formId1">Password</label>
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
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 170px"></textarea>
            <label for="floatingTextarea2">Bio</label>
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