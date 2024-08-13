<?php include '../includes/header.php'; ?>

<div class="row">
    <div class="col-10 postEventForm mx-auto">
        <!--Share Event Fom START-->
        <form action="" class="share">
            <h2 class="form-header mx-auto">Create An Event</h2>
            <!-- base info -->
            <h6>Ask Title:</h6>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="formId1"
                    id="formId1"
                    placeholder="" />
                <label for="formId1">Event Name</label>
            </div>

            <h6>Add Event Location:</h6>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="formId1"
                    id="formId1"
                    placeholder="" />
                <label for="formId1">Event Location</label>
            </div>

            <div class="form-group py-3">
                <h6>Select Date and Time</h6>
                <input
                    type="datetime-local"
                    class="form-control"
                    id="datetimeInput" />
            </div>

            <!-- More info -->
            <h6>Why You're Coming</h6>
            <div class="form-floating">
                <textarea
                    class="form-control"
                    placeholder="Leave a comment here"
                    id="floatingTextarea2"
                    style="height: 170px"></textarea>
                <label for="floatingTextarea2">Elaborate on event details here...</label>
            </div>

            <!-- Tags -->
            <br />
            <select class="form-select" aria-label="Default select example">
                <option selected>Event Tags:</option>
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
                    Share This Event!
                </button>
            </div>
        </form>
        <!--Share Event Fom END-->
    </div>
</div>

<?php include '../includes/footer.php' ?>