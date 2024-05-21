<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo TITLE ?>
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/adminstyle.css">
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">SECNCC <small class="text-white">Admin
                Dashboard</small></a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'dashboard') {
                                                    echo 'active';
                                                } ?>" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'events') {
                                                    echo 'active';
                                                } ?>" href="events.php">
                                <i class="fas fa-users"></i>
                                Events
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'cadets') {
                                                    echo 'active';
                                                } ?>" href="cadets.php">
                                <i class="fas fa-users"></i>
                                Cadets
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'feedbacks') {
                                                    echo 'active';
                                                } ?>" href="feedbacks.php">
                                <i class="fa fa-comments"></i>
                                Cadet Feedbacks
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'testimonies') {
                                                    echo 'active';
                                                } ?>" href="testimonies.php">
                                <i class="fa fa-comments"></i>
                                Official Message
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'change_password') {
                                                    echo 'active';
                                                } ?>" href="change_password.php">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
