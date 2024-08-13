<?php include '../includes/header.php'; ?>

<div class="container-fluid mx-auto">
    <form action="" class="asks">
        <h2 class="form-header mx-auto">Ask Around</h2>
        <!-- base info -->
        <h6>Ask Title:</h6>
        <div class="form-floating mb-3">
            <input
                type="text"
                class="form-control"
                name="formId1"
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
                id="floatingTextarea2"
                style="height: 170px"></textarea>
            <label for="floatingTextarea2">Elaborate on your ask here...</label>
        </div>

        <!-- Tags -->
        <br />
        <select class="form-select" aria-label="Default select example">
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