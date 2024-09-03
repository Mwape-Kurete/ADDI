<?php
require __DIR__ . '/../includes/db.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $current_id = $_SESSION['user_id'];

    $sql = "SELECT p.*, u.username 
             FROM profiles p 
             JOIN users u ON p.user_id = u.user_id 
             WHERE p.user_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $current_id);
    $stmt->execute();
    $result_profile = $stmt->get_result();

    while ($result = $result_profile->fetch_assoc()): ?>
        <!-- profile Panel -->
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
            <hr>
            <div class="follow-me">
                <h6>follow me on ig:</h6>
                <a href="https://www.instagram.com/<?php echo htmlspecialchars($result['website']) ?>/" class="ig-handle" target="_blank">@<?php echo htmlspecialchars($result['website']) ?></a>
            </div>
        </div>
    <?php endwhile;
} else { ?>
    <!-- Alternative content for users who are not logged in -->
    <div class="profile-panel" id="profilePanel-wrapper">
        <div class="profilePanel-heading" id="profHeader">
            <h6 class="text-center">Welcome to ADDI!</h6>
        </div>
        <hr>
        <div class="bio-content text-center">
            <div class="login-notice">
                <p>Looks like you aren't logged in. Log in to view your profile panel</p>
            </div>
            <div class="button-for-login">
                <a
                    href="/ADDI/pages/login.php"
                    class="btn btn-light list-group-item-action mb-3" id="btn-login">Login</a>
            </div>
        </div>
    </div>
<?php }
?>
<!-- /#profilePanel-wrapper -->