<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDI</title>

    <!-- Bootstrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/ADDI/assets/css/main.css" rel="stylesheet">
    <link href="/ADDI/assets/css/templates.css" rel="stylesheet">
    <link href="/ADDI/assets/css/includes.css" rel="stylesheet">

</head>

<body>
    <?php session_start(); ?>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right sidebar-cont" id="sidebar-wrapper">
            <div class="sidebar-heading" id="navHeader">
                <h3>ADDI</h3>
            </div>
            <div class="list-group list-group-flush">
                <a href="/ADDI/index.php" class="list-group-item list-group-item-action">Home</a>
                <a href="/ADDI/pages/ask.php" class="list-group-item list-group-item-action">Ask Around</a>
                <a href="/ADDI/pages/share.php" class="list-group-item list-group-item-action">Share Event</a>
                <a href="/ADDI/pages/profile.php" class="list-group-item list-group-item-action">Profile</a>


                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="/ADDI/pages/logout.php" class="btn btn-light list-group-item-action mb-2">Logout</a>
                <?php else : ?>
                    <a href="/ADDI/pages/login.php" class="btn btn-light list-group-item-action mb-2">Login</a>
                    <a href="/ADDI/pages/register.php" class="btn btn-light list-group-item-action mb-2">Create Account</a>
                <?php endif; ?>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
</body>

</html>