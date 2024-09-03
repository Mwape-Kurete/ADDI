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
$sql_comments = "SELECT c.content, u.username, c.creation
                 FROM comments c
                 JOIN users u ON c.user_id = u.user_id
                 WHERE c.parent_id = ? AND c.parent_type = ?";

$stmt_comments = $conn->prepare($sql_comments);

if (!$stmt_comments) {
    //debugging 
    echo "error preparing statement: " . $conn->error;
    exit();
}

$stmt_comments->bind_param("is", $parent_id, $parent_type);
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