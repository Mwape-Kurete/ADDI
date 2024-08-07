<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDI</title>

    <!-- Bootstrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
    <?php session_start(); ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading" id="naveHeader">ADDI</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="pages/ask.php" class="list-group-item list-group-item-action bg-light">Ask Around</a>
                <a href="pages/share.php" class="list-group-item list-group-item-action bg-light">Share Event</a>
                <a href="pages/profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>


                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="pages/logout.php" class="btn btn-light list-group-item-action mb-2">Logout</a>
                <?php else : ?>
                    <a href="pages/login.php" class="btn btn-light list-group-item-action mb-2">Login</a>
                    <a href="pages/register.php" class="btn btn-light list-group-item-action mb-2">Create Account</a>
                <?php endif; ?>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
            </nav>
            <div class="container-fluid">
</body>

</html>