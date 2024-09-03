<?php
require __DIR__ . '/../includes/db.php'; // Include your database connection

$user_id = $_SESSION['user_id'];

// Fetching asks posted by logged in user 
$sql_asks = "SELECT a.*, u.username 
             FROM ask a 
             JOIN users u ON a.user_id = u.user_id 
             WHERE a.approved = 1 
             AND a.user_id = ?";

$stmt_asks = $conn->prepare($sql_asks);

if ($stmt_asks) {
    $stmt_asks->bind_param("i", $user_id);
    $stmt_asks->execute();

    $result_asks = $stmt_asks->get_result();

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
            <div class="col-10 show-thread mx-auto">
                <a
                    name="view-ask-comments"
                    id="view-ask-comments"
                    class="btn btn-primary view-answers-asks-btn"
                    href="/ADDI/pages/single_post.php?ask_id=<?php echo $ask['ask_id'] ?>"
                    role="button">
                    View Answer Thread <i class="bi bi-chevron-compact-down"></i>
                </a>
            </div>
            <!--END OF user ASKED POST/CARD-->
<?php endwhile;
    } else {
        echo "<div class='col-12 notice-card'>
    <div class='card notice-card-cont' style='width: 85%;'>
        <div class='card-body'>
            <h5 class='card-title notice-title' style='font-size:100px;'>&#128148;</h5>
            <p class='card-text notice-details'>No Asks posted yet</p>


        </div>
        <div class='button-login-notice'>
            <a
                href='/ADDI/pages/ask.php'
                class='btn btn-light list-group-item-action mb-3' id='btn-login'>Ask Around</a>
        </div>

    </div>
</div>";
    }
    $stmt_asks->close();
} else {
    echo "<h1>there was an error preparring this content</h1>" . $conn->error;
}

?>