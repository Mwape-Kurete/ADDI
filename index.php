<?php include 'includes/header.php'; ?>

<div class="row">
    <div class="col main-pageContent home-tabs">
        <?php include 'includes/home-tabs.php' ?>
        <div class="home-content-events tab-content" id="events-content">
            <?php include 'templates/event_post.php'; ?>
        </div>
        <div class="home-content-asks tab-content" id="home-asked-content" style="display: none;">
            <?php include 'templates/asked_post.php'; ?>
        </div>

    </div>
    <div class="col activityPanel">
        <?php include 'includes/activity_panel.php'; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>