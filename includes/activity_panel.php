<!-- Activity Panel -->
<div class="activity-panel text-center d-flex flex-column justify-content-center align-items-center" id="activityPanel-wrapper" style="height: 100%;">
    <div class="activityPanel-heading" id="activeHeader">
        <?php if (isset($_SESSION['username'])): ?>
            <h5 class="username-display"><?php echo $_SESSION['username']; ?></h5>
            <h6>WELCOME BACK!</h6>
        <?php else: ?>
            <h5 class="activity-notice">looks like you're not logged in</h5>
        <?php endif ?>
    </div>
</div>
<!-- /#activityPanel-wrapper -->