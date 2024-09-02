<?php
require '../includes/db.php'; // Include your database connection

// Determine if it's an event or ask based on the provided ID
$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;
$ask_id = isset($_GET['ask_id']) ? intval($_GET['ask_id']) : 0;

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

// Handle form submission for posting a comment
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['content'])) {
    // Retrieve and sanitize form data
    $user_id = intval($_SESSION['user_id']);
    $content = trim($_POST['content']);

    // Validate the inputs (additional validation can be added as needed)
    if (empty($content)) {
        echo "Comment content cannot be empty.";
        exit();
    }

    // Insert the comment into the database
    $sql = "INSERT INTO comments (user_id, content, parent_id, parent_type, creation) 
            VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isis", $user_id, $content, $parent_id, $parent_type);
        if ($stmt->execute()) {
            // Redirect back to the event or ask page
            $redirect_url = $parent_type === 'event' ? "single_post.php?event_id=$parent_id" : "single_post.php?ask_id=$parent_id";
            header("Location: $redirect_url");
            exit();
        } else {
            echo "Error posting comment: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Fetch details based on parent type (event or ask)
if ($parent_type === 'event') {
    $sql = "SELECT e.*, u.username, p.profile_pic 
            FROM events e 
            JOIN users u ON e.user_id = u.user_id 
            JOIN profiles p ON u.user_id = p.user_id 
            WHERE e.event_id = ?";
} else {
    $sql = "SELECT a.*, u.username, p.profile_pic 
            FROM asks a 
            JOIN users u ON a.user_id = u.user_id 
            JOIN profiles p ON u.user_id = p.user_id 
            WHERE a.ask_id = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $parent_id);
$stmt->execute();
$parent_data = $stmt->get_result()->fetch_assoc();

if ($parent_data) {
    // Render the event or ask details
?>
    <div class="col-12 single-post-details">
        <div class="row">
            <div class="col-2 user-pfp-name text-center">
                <img src="../uploads/<?php echo htmlspecialchars($parent_data['profile_pic']) ?>" alt="user profile" style="max-width: 100px !important; max-height: 100px !important;">
                <p><strong>@<span><?php echo htmlspecialchars($parent_data['username']); ?></span></strong></p>
            </div>
            <div class="col single-pg-post-ask">
                <div class="card single-pg-post-ask-card" style="width: 90%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($parent_data['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($parent_data['details']); ?></p>
                        <div class="row lower-half">
                            <div class="col-11 meta-info">
                                <a href="#" class="card-link posted-by">@<span><?php echo htmlspecialchars($parent_data['username']); ?></span></a>
                                <small class="card-link date-time-asks">posted @<span class="date-asks"><?php echo htmlspecialchars($parent_data['creation']); ?></span></small>
                            </div>
                            <div class="col like">
                                <span class="like-btn"><i class="bi bi-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="dotted">
    <div class="col-12 single-post-add-comment">
        <form action="single_post.php?<?php echo $parent_type === 'event' ? 'event_id=' . $event_id : 'ask_id=' . $ask_id; ?>" method="POST" class="comment-form-area">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">
            <input type="hidden" name="parent_type" value="<?php echo $parent_type; ?>">
            <div class="form-floating">
                <div class="addComment text-center">
                    <textarea name="content" class="form-control add-comment-cont" placeholder="Leave a comment here" id="floatingTextarea" style="height: 200px; width: 95%" required></textarea>
                    <button type="submit" class="btn btn-primary reply-btn">
                        reply <i class="bi bi-send-fill px-3"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="row single-post-comments overflow-auto" style="width: 95%">
        <?php include '../templates/comment_card.php'; ?>
    </div>

<?php
} else {
    echo "<p>" . ucfirst($parent_type) . " not found.</p>";
}

$stmt->close();
$conn->close();
?>