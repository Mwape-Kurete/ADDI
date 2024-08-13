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
        href="https://fonts.googleapis.com/css2?family=Arya:wght@400;700&family=Fascinate+Inline&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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
            <div class="list-group list-group-flush sidebar-item-group">
                <a href="/ADDI/index.php" class="list-group-item list-group-item-action">Home</a>
                <a
                    href="/ADDI/pages/ask.php"
                    class="list-group-item list-group-item-action">Ask Around</a>
                <a
                    href="/ADDI/pages/share.php"
                    class="list-group-item list-group-item-action">Share Event</a>
                <a
                    href="/ADDI/pages/profile.php"
                    class="list-group-item list-group-item-action">Profile</a>

                <!--NAV BUTTONS-->
                <div class="buttons-nav">
                    <a
                        href="/ADDI/pages/logout.php"
                        class="btn btn-light list-group-item-action mb-3 logout">Logout</a>

                    <a
                        href="/ADDI/pages/login.php"
                        class="btn btn-light list-group-item-action mb-3">Login</a>
                    <a
                        href="/ADDI/pages/register.php"
                        class="btn btn-light list-group-item-action mb-3">Create Account</a>
                </div>
                <!--/NAV BUTTONS-->
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
</body>

</html>