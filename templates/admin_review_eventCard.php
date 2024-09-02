<?php
require '../includes/db.php'; // Include your database connection


// Fetch pending events along with the name of the user who posted it  username
$sql_events = "SELECT e.*, u.username 
             FROM events e 
             JOIN users u ON e.user_id = u.user_id 
             WHERE e.approved = 0";
$result_events = $conn->query($sql_events);
?>

<!--START OF Admin Review Card-->

<!--events cards-->
<?php while ($event = $result_events->fetch_assoc()): ?>
    <div class="col events-for-approval">
        <div class="col-12 event-card">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title event-title"><?php echo htmlspecialchars($event['title']); ?></h5>
                    <p class="card-text event-details"><?php echo htmlspecialchars($event['details']); ?></p>
                    <p>When: <strong class="date-of-event"><?php echo htmlspecialchars($event['event_date']); ?></strong></p>
                    <p>Where: <strong class="location-of-event"><?php echo htmlspecialchars($event['location']); ?></strong></p>
                    <div class="row lower-half">
                        <div class="col-11 meta-info">
                            <a href="#" class="card-link posted-by">@<span><?php echo htmlspecialchars(($event['username'])) ?></span></a>
                            <small class="card-link date-time-asks">@<span class="time-asks"><?php echo htmlspecialchars($event['creation']); ?></span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr id="dotted-div">
        <div class="col-12 d-flex justify-contnet-start align-items-center buttons">
            <form method="POST" action="/ADDI/templates/approved.php" class="approved-denied-btns me-2">
                <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>">
                <button type="submit" name="action" value="approve" class="btn btn-primary btn-yes">Approve</button>
            </form>
            <form method="POST" action="/ADDI/templates/denied.php" class="approved-denied-btns">
                <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>">
                <button type="submit" name="action" value="deny" class="btn btn-primary btn-no">Deny</button>
            </form>
        </div>
    </div>
<?php endwhile; ?>

<!--END OF Admin Review Card-->