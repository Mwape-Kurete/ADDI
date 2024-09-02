<?php include '../includes/header.php'; ?>

<div class="row overflow-auto">
    <div class="col-12 main-pageContent admin-reviews">
        <!--loop through asks-->
        <?php include '../templates/admin_review_askCard.php'; ?>
        <hr>
        <!--loop through events-->
        <?php include '../templates/admin_review_eventCard.php'; ?>
    </div>
</div>

<?php include '../includes/footer.php' ?>