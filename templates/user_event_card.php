<?php
require __DIR__ . '/../includes/db.php'; // Include your database connection

$user_id = $_SESSION['user_id'];

// Fetching events posted by logged in user 
$sql_events = "SELECT e.*, u.username 
             FROM events e 
             JOIN users u ON e.user_id = u.user_id 
             WHERE e.approved = 1 
             AND e.user_id = ?";

$stmt_events = $conn->prepare($sql_events);

if ($stmt_events) {
    $stmt_events->bind_param("i", $user_id);
    $stmt_events->execute();

    $result_events = $stmt_events->get_result();

    //check if the user has posted any events 
    if ($result_events->num_rows > 0) {

        while ($event = $result_events->fetch_assoc()): ?>
            <!--START OF EVENT CARD-->
            <div class="col-12 event-card">
                <div class="card event-card-cont" style="width: 85%;">
                    <div class="card-body">
                        <h5 class="card-title event-title"><?php echo htmlspecialchars($event['title']); ?></h5>
                        <p class="card-text event-details"><?php echo htmlspecialchars($event['details']); ?>.</p>

                        <p>When: <strong class="date-of-event"><?php echo htmlspecialchars($event['event_date']); ?></strong></p>
                        <p>Where: <strong class="location-of-event"><?php echo htmlspecialchars($event['location']); ?></strong></p>
                        <p class="event-ask-tag">#<span class="event-ask-type"><?php echo htmlspecialchars($event['category']); ?></span></p>
                        <div class="row lower-half">
                            <div class="col-11 meta-info">
                                <a href="#" class="card-link posted-by">@<span><?php echo htmlspecialchars($event['username']) ?></span></a>
                                <small class="card-link date-time-asks">@<span class="time-asks"><?php echo htmlspecialchars($event['creation']); ?> </small>
                            </div>
                        </div>
                    </div>
                    <a
                        name="view-event-comments"
                        id="view-event-comments"
                        class="btn btn-primary view-event-comments-btn"
                        href="/ADDI/pages/single_post.php?event_id=<?php echo $event['event_id'] ?>"
                        role="button">View Comments</a>

                </div>
            </div>
            <!--END OF EVENT CARD-->
<?php endwhile;
    } else {
        echo "<div class='col-12 notice-card'>
    <div class='card notice-card-cont' style='width: 85%;'>
        <div class='card-body'>
            <h5 class='card-title notice-title' style='font-size:100px;'>&#128148;</h5>
            <p class='card-text notice-details'>No events posted yet</p>


        </div>
        <div class='button-login-notice'>
            <a
                href='/ADDI/pages/share.php'
                class='btn btn-light list-group-item-action mb-3' id='btn-login'>Post an Event</a>
        </div>

    </div>
</div>";
    }
    $stmt_events->close();
} else {
    echo "<h1>there was an error preparring this content</h1>" . $conn->error;
}

?>