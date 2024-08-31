<!-- Activity Panel -->
<div class="activity-panel" id="activityPanel-wrapper">
    <div class="activityPanel-heading" id="activeHeader">
        <?php if (isset($_SESSION['username'])): ?>
            <h5 class="username-display"><?php echo $_SESSION['username']; ?> </h5>
            <h6>Here's what you missed</h6>
    </div>
    <div class="list-group list-group-flush">
        <ul class="list-group list-group-flush">
            <li class="list-group-item notification">An item</li>
            <li class="list-group-item notification">A second item</li>
            <li class="list-group-item notification">A third item</li>
            <li class="list-group-item notification">A fourth item</li>
            <li class="list-group-item notification">
                And a fifth one
            </li>
        </ul>
    </div>
<?php else: ?>
    <h5 class="activity-notice">login to view activity</h5>

</div>
<div class="list-group list-group-flush" style="display: none;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item notification">An item</li>
        <li class="list-group-item notification">A second item</li>
        <li class="list-group-item notification">A third item</li>
        <li class="list-group-item notification">A fourth item</li>
        <li class="list-group-item notification">
            And a fifth one
        </li>
    </ul>
</div>
<?php endif ?>
</div>
<!-- /#activityPanel-wrapper -->