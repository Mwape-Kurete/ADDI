<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADDI</title>

    <!-- Bootstrap Links -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />

    <!--Change to absolute file paths-->
    <link href="/ADDI/assets/css/main.css" rel="stylesheet" />
    <link href="/ADDI/assets/css/templates.css" rel="stylesheet" />
    <link href="/ADDI/assets/css/includes.css" rel="stylesheet" />

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Arya:wght@400;700&family=Fascinate+Inline&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet" />

    <!--/Google Fonts-->
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right sidebar-cont" id="sidebar-wrapper">
            <div class="sidebar-heading" id="navHeader">
                <h1 class="logo-txt">ADDI</h1>
            </div>
            <?php if (isset($_SESSION['admin_id'])): ?>
                <div class="list-group list-group-flush sidebar-item-group">
                    <a href="/ADDI/pages/review_ques.php"
                        class="list-group-item list-group-item-action <?php echo $current_page == 'review_ques.php' ? 'active' : ''; ?>"
                        style="background-color: rgba(175, 117, 194, 1);">Review Posts</a>

                    <!--NAV BUTTONS-->
                    <div class="buttons-nav">
                        <?php if (isset($_SESSION['admin_id'])): ?>
                            <form method="post" action="/ADDI/pages/logout.php" class="form-logout-btn">
                                <button
                                    type="submit"
                                    class="btn btn-light list-group-item-action mb-3" id="btn-logout" name="logout-button">Logout</button>
                            </form>

                        <?php else: ?>
                            <a href="/ADDI/pages/login.php"
                                class="btn btn-light list-group-item-action mb-3 <?php echo $current_page == 'login.php' ? 'active' : ''; ?>"
                                id="btn-login">Login</a>
                        <?php endif; ?>
                    </div>
                    <!--/NAV BUTTONS-->
                </div>
            <?php else: ?>
                <div class="list-group list-group-flush sidebar-item-group">
                    <a href="/ADDI/index.php"
                        class="list-group-item list-group-item-action <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">Home</a>
                    <a href="/ADDI/pages/ask.php"
                        class="list-group-item list-group-item-action <?php echo $current_page == 'ask.php' ? 'active' : ''; ?>">Ask Around</a>
                    <a href="/ADDI/pages/share.php"
                        class="list-group-item list-group-item-action <?php echo $current_page == 'share.php' ? 'active' : ''; ?>">Share Event</a>
                    <a href="/ADDI/pages/profile.php"
                        class="list-group-item list-group-item-action <?php echo $current_page == 'profile.php' ? 'active' : ''; ?>">Profile</a>

                    <!--NAV BUTTONS-->
                    <div class="buttons-nav">
                        <?php if (isset($_SESSION['username'])): ?>
                            <form method="post" action="/ADDI/pages/logout.php" class="form-logout-btn">
                                <button
                                    type="submit"
                                    class="btn btn-light list-group-item-action mb-3" id="btn-logout" name="logout-button">Logout</button>
                            </form>
                        <?php else: ?>
                            <a href="/ADDI/pages/login.php"
                                class="btn btn-light list-group-item-action mb-3 <?php echo $current_page == 'login.php' ? 'active' : ''; ?>"
                                id="btn-login">Login</a>
                            <a href="/ADDI/pages/register.php"
                                class="btn btn-light list-group-item-action mb-3 <?php echo $current_page == 'register.php' ? 'active' : ''; ?>">Create Account</a>
                        <?php endif; ?>
                    </div>
                    <!--/NAV BUTTONS-->
                </div>
            <?php endif; ?>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">