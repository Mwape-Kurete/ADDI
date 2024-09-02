<?php
require __DIR__ . '/../includes/db.php'; // Include your database connection


// Fetch pending asks along with the name of the user who posted it  username
$sql_asks = "SELECT a.*, u.username 
             FROM ask a 
             JOIN users u ON a.user_id = u.user_id 
             WHERE a.approved = 1";
$result_asks = $conn->query($sql_asks);
?>


<!--START OF ASKED POST/CARD-->
<?php while ($ask = $result_asks->fetch_assoc()): ?>
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
                    <div class="col like">
                        <span class="like-btn"><i class="bi bi-heart"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-10 show-thread mx-auto">
        <button type="button" class="btn btn-primary view-answers-asks-btn"> View Answer Thread <i class="bi bi-chevron-compact-down"></i></button>
    </div>
<?php endwhile; ?>

<!--END OF ASKED POST/CARD-->