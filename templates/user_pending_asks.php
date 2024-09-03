<?php
require __DIR__ . '/../includes/db.php'; // Include your database connection

$user_id = $_SESSION['user_id'];

// Fetching asks posted by logged in user that need to be reviewed
$sql_asks_pending = "SELECT a.*, u.username 
             FROM ask a 
             JOIN users u ON a.user_id = u.user_id 
             WHERE a.approved = 0 
             AND a.user_id = ?";

$stmt_asks_pending = $conn->prepare($sql_asks_pending);

if ($stmt_asks_pending) {
    $stmt_asks_pending->bind_param("i", $user_id);
    $stmt_asks_pending->execute();

    $result_asks = $stmt_asks_pending->get_result();

    //check if the user has posted any asks
    if ($result_asks->num_rows > 0) {

        while ($ask = $result_asks->fetch_assoc()): ?>
            <!--START OF USER ASKED POST/CARD-->
            <div class="col-10 ask-card">
                <div class="card ask-card-cont" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($ask['title']) ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($ask['details']) ?></p>
                        <p class="event-ask-tag">#<span class="event-ask-type"><?php echo htmlspecialchars($ask['category']) ?></span></p>
                        <div class="row lower-half">
                            <div class="col-11 meta-info">
                                <a href="#" class="card-link posted-by">@<span><?php echo htmlspecialchars($ask['username']) ?></span></a>
                                <small class="card-link date-time-asks">@<span class="time-asks"><?php echo htmlspecialchars($ask['creation']) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END OF user ASKED POST/CARD-->
<?php endwhile;
    } else {
        echo "<div class='col-12 notice-card'>
    <div class='card notice-card-cont' style='width: 85%;'>
        <div class='card-body'>
            <h5 class='card-title notice-title' style='font-size:100px;'>&#128164;</h5>
            <p class='card-text notice-details'>No Pending Asks</p>


        </div>
        <div class='button-login-notice'>
            <a
                href='/ADDI/pages/ask.php'
                class='btn btn-light list-group-item-action mb-3' id='btn-login'>Ask Around</a>
        </div>

    </div>
</div>";
    }
    $stmt_asks_pending->close();
} else {
    echo "<h1>there was an error preparring this content</h1>" . $conn->error;
}

?>