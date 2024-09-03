<?php
require __DIR__ . '/../includes/db.php'; // Include your database connection

$user_id = $_SESSION['user_id'];

$sql_saves = "SELECT item_type, item_id FROM user_saves WHERE user_id = ?";
$stmt = $conn->prepare($sql_saves);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result_saved = $stmt->get_result();

while ($save = $result_saved->fetch_assoc()) {
    $item_type = $save['item_type'];
    $item_id = $save['item_id'];

    if ($item_type === 'ask') {
        $sql_asks = "SELECT a.*, u.username 
                     FROM ask a 
                     JOIN users u ON a.user_id = u.user_id 
                     WHERE a.approved = 1 
                     AND a.ask_id = ?";
        $stmt_a = $conn->prepare($sql_asks);
        $stmt_a->bind_param("i", $item_id);
        $stmt_a->execute();
        $result_saved_asked = $stmt_a->get_result();

        while ($ask = $result_saved_asked->fetch_assoc()): ?>
            <div class="col-10 ask-card">
                <div class="card ask-card-cont" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($ask['title']) ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($ask['details']) ?></p>
                        <p class="event-ask-tag">#<span class="event-ask-type"><?php echo htmlspecialchars($ask['category']) ?></span></p>

                        <div class="row lower-half d-flex justify-content-between align-items-center">
                            <div class="col-6 meta-info">
                                <a href="#" class="card-link posted-by">@<span><?php echo htmlspecialchars($ask['username']) ?></span></a>
                                <small class="card-link date-time-asks">@<span class="time-asks"><?php echo htmlspecialchars($ask['creation']) ?></small>
                            </div>

                            <div class="col like form-like-btn-container">
                                <form method="post" action="/ADDI/includes/saved.php" class="form-like-btn">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="item_type" value="ask">
                                    <input type="hidden" name="item_id" value="<?php echo $ask['ask_id']; ?>">
                                    <button type="submit" class="like-btn btn btn-light"><i class="bi bi-heart-fill" style="color: white;"></i></button>
                                </form>
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
        <?php endwhile;
    } elseif ($item_type === 'event') {
        $sql_events = "SELECT e.*, u.username 
                       FROM events e 
                       JOIN users u ON e.user_id = u.user_id 
                       WHERE e.approved = 1 
                       AND e.event_id = ?";
        $stmt_e = $conn->prepare($sql_events);
        $stmt_e->bind_param("i", $item_id);
        $stmt_e->execute();
        $result_saved_events = $stmt_e->get_result();

        while ($event = $result_saved_events->fetch_assoc()): ?>
            <div class="col-12 event-card">
                <div class="card event-card-cont" style="width: 85%;">
                    <div class="card-body">
                        <h5 class="card-title event-title"><?php echo htmlspecialchars($event['title']); ?></h5>
                        <p class="card-text event-details"><?php echo htmlspecialchars($event['details']); ?>.</p>

                        <p>When: <strong class="date-of-event"><?php echo htmlspecialchars($event['event_date']); ?></strong></p>
                        <p>Where: <strong class="location-of-event"><?php echo htmlspecialchars($event['location']); ?></strong></p>
                        <p class="event-ask-tag">#<span class="event-ask-type"><?php echo htmlspecialchars($event['category']); ?></span></p>

                        <div class="row lower-half d-flex justify-content-between align-items-center">
                            <div class="col-6 meta-info">
                                <a href="#" class="card-link posted-by">@<span><?php echo htmlspecialchars($event['username']) ?></span></a>
                                <small class="card-link date-time-asks">@<span class="time-asks"><?php echo htmlspecialchars($event['creation']); ?> </small>
                            </div>
                            <div class="col like form-like-btn-container">
                                <form method="post" action="/ADDI/includes/saved.php" class="form-like-btn">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="item_type" value="event">
                                    <input type="hidden" name="item_id" value="<?php echo $event['event_id']; ?>">
                                    <button type="submit" class="like-btn btn btn-light"><i class="bi bi-heart-fill" style="color: white;"></i></button>
                                </form>
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
<?php endwhile;
    } else {
        echo "<div class='col-12 notice-card'>
              <div class='card notice-card-cont' style='width: 85%;'>
                  <div class='card-body'>
                      <h5 class='card-title notice-title' style='font-size:100px;'>&#129396;</h5>
                      <p class='card-text notice-details'>No Saved Posts</p>
                  </div>
                  <div class='button-login-notice'>
                      <a href='/ADDI/pages/ask.php' class='btn btn-light list-group-item-action mb-3' id='btn-login'>Ask Around</a>
                  </div>
              </div>
              </div>";
    }
}

$stmt->close();
$conn->close();
?>