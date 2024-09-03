<?php include '../includes/header.php';


?>

<div class="row">
    <?php if (isset($_SESSION['username'])): ?>
        <div class="col-10 main-pageContent profile-tabs">
            <?php include '../includes/profile-tabs.php' ?>
            <div class="profile-content-answered tab-content" id="answered-content">
                <?php include '../templates/user_event_card.php'; ?>
            </div>
            <div class="profile-content-asks tab-content" id="asked-content" style="display: none;">
                <?php include '../templates/user_ask_card.php'; ?>
            </div>
            <div class="profile-content-saved tab-content" id="saved-content" style="display: none;">

            </div>
            <div class="profile-content-pending tab-content" id="pending-content" style="display: none;">
                <?php include '../templates/user_pending_asks.php'; ?>
                <hr>
                <?php include '../templates/user_pending_events.php'; ?>
            </div>

        </div>
        <div class="col activityPanel">
            <?php include '../includes/profile_panel.php' ?>
        </div>
    <?php else: ?>
        <?php include '../templates/please-login.php'; ?>

    <?php endif ?>
</div>

<?php include '../includes/footer.php' ?>