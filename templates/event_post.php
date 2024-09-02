<?php
require 'includes/db.php'; // Include your database connection

// Fetch pending events along with the name of the user who posted it  username
$sql_events = "SELECT e.*, u.username 
             FROM events e 
             JOIN users u ON e.user_id = u.user_id 
             WHERE e.approved = 1";
$result_events = $conn->query($sql_events);
?>


<!--START OF EVENT CARD-->
<?php while ($event = $result_events->fetch_assoc()): ?>

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
                        <a href="#" class="card-link posted-by">@<span>username</span></a>
                        <small class="card-link date-time-asks">@<span class="time-asks"><?php echo htmlspecialchars($event['creation']); ?> </small>
                    </div>
                    <div class="col like">
                        <span class="like-btn"><i class="bi bi-heart"></i></span>
                    </div>
                </div>
            </div>
            <a
                name="view-event-comments"
                id="view-event-comments"
                class="btn btn-primary view-event-comments-btn"
                href="#"
                role="button">View Comments</a>

        </div>
    </div>
<?php endwhile; ?>

<!--END OF EVENT CARD-->