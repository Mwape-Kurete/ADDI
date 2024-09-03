<?php
require '../includes/db.php';

$current_id = $_SESSION['user_id'];

$sql = "SELECT p.*, u.username 
             FROM profiles p 
             JOIN users u ON p.user_id = u.user_id 
             WHERE p.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $current_id);
$stmt->execute();
$result_profile = $stmt->get_result();


?>


<!-- profile Panel -->
<?php while ($result = $result_profile->fetch_assoc()): ?>
    <div class="profile-panel" id="profilePanel-wrapper">
        <div class="profilePanel-heading" id="profHeader">
            <div class="profile-photo">
                <img
                    src="../uploads/<?php echo htmlspecialchars($result['profile_pic']) ?>"
                    alt="temp profile photo"
                    style="max-width: 150px; max-height: 150px; border-radius: 5px" />
            </div>
            <h6 class="username-handle">@<?php echo htmlspecialchars($result['username']) ?></h6>
        </div>
        <hr>
        <div class="bio-content">
            <h6>Bio:</h6>
            <p>
                <?php echo htmlspecialchars($result['bio']) ?>
            </p>
        </div>
    </div>
<?php endwhile; ?>
<!-- /#profilePanel-wrapper -->