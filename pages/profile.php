<?php include '../includes/header.php'; ?>

<div class="row">
    <div class="col main-pageContent profile-tabs" style="width: 90%">
        <?php include '../includes/profile-tabs.php' ?>
        <div class="profile-content-answered tab-content" id="answered-content">
            <?php include '../templates/user-reply_card.php'; ?>
        </div>
        <div class="profile-content-asks tab-content" id="asked-content" style="display: none;">

        </div>
        <div class="profile-content-saved tab-content" id="saved-content" style="display: none;">

        </div>
        <div class="profile-content-saved tab-content" id="pending-content" style="display: none;">

        </div>

    </div>
    <div class="col-3 activityPanel">
        <?php include '../includes/profile_panel.php' ?>
    </div>
</div>

<?php include '../includes/footer.php' ?>