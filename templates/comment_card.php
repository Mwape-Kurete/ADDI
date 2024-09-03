<?php

if ($event_id > 0) {
    $parent_type = 'event';
    $parent_id = $event_id;
} elseif ($ask_id > 0) {
    $parent_type = 'ask';
    $parent_id = $ask_id;
} else {
    echo "<p>Invalid ID.</p>";
    exit();
}

// Fetch details based on parent type (event or ask)
if ($parent_type === 'event') {
    $sql_comments = "SELECT e.*, u.username, p.profile_pic 
            FROM events e 
            JOIN users u ON e.user_id = u.user_id 
            JOIN profiles p ON u.user_id = p.user_id 
            WHERE e.event_id = ?";
} else {
    $sql_comments = "SELECT a.*, u.username, p.profile_pic 
            FROM ask a 
            JOIN users u ON a.user_id = u.user_id 
            JOIN profiles p ON u.user_id = p.user_id 
            WHERE a.ask_id = ?";
}


$stmt = $conn->prepare($sql);

if (!$stmt) {
    //debugging 
    echo "error preparing statement: " . $conn->error;
    exit();
}

$stmt_comments = $conn->prepare($sql_comments);
$stmt_comments->bind_param("i", $parent_id);
$stmt_comments->execute();
$result_comments = $stmt_comments->get_result();



while ($comment = $result_comments->fetch_assoc()): ?>

    <!--START OF COMMENT CARD-->
    <div class="col-12 comment-card" style="margin-bottom: 20px">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <p class="card-text comment-text"><?php echo htmlspecialchars($comment['content']); ?></p>
                <div class="row lower-half">
                    <div class="col-11 meta-info">
                        <a href="#" class="card-link posted-by">@<span><?php echo htmlspecialchars($comment['username']); ?></span></a>
                        <small class="card-link date-time-asks">@<span class="time-asks"><?php echo htmlspecialchars($comment['creation']); ?></span></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END OF COMMENT CARD-->

<?php endwhile;

$stmt_comments->close();
?>