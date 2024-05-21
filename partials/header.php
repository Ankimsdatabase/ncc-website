<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Student Testimonial Owl Slider CSS -->
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/owl.min.css">
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/owl.theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/testyslider.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/css/style.css" />
    <title>
        SECNCC
    </title>
</head>

<body>
    <!-- Start Nagigation -->
    <nav class="navbar navbar-front navbar-expand-sm navbar-dark pl-5 fixed-top">
        <a href="index.php" class="navbar-brand">
            <img src="public/images/logo.jpg" class="logo" alt="SECNCC logo">
            SECNCC</a>
        <span class="navbar-text">Unity and Discipline</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myMenu">
            <!-- <ul class="navbar-nav pl-5 custom-nav ml-auto"> -->
            <!-- <ul class="navbar-nav custom-nav ml-auto nav nav-pills"> -->
            <ul class="navbar-nav custom-nav ml-auto nav nav-pills">
                <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a>
                </li>
                <li class="nav-item custom-nav-item"><a href="events.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'events.php' ? 'active' : ''; ?>">Events</a>
                </li>
                <?php
                session_start();
                if (
                    isset($_SESSION['is_admin_login']) && isset($_SESSION['adminLogEmail'])
                ) {
                    echo '<li class="nav-item custom-nav-item"><a href="admin/dashboard.php" class="nav-link"> Dashboard</a></li> <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                } else if (isset($_SESSION['is_login']) && isset($_SESSION['regimental_no'])) {
                    echo '<li class="nav-item custom-nav-item"><a href="cadet/profile.php" class="nav-link">Profile</a></li> <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                } else {
                    echo '<li class="nav-item custom-nav-item"><a href="#login" class="nav-link" data-toggle="modal" data-target="#cadetLogin">Login</a></li> <li class="nav-item custom-nav-item"><a href="#signup" class="nav-link" data-toggle="modal" data-target="#cadetRegistration">Register</a></li>';
                }
                ?>
                <?php if (!isset($_SESSION['is_admin_login'])) : ?>
                    <li class="nav-item custom-nav-item"><a href="contact.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact
                            Us</a></li>
                <?php endif; ?>
                <li class="nav-item custom-nav-item"><a href="about.php" class="nav-link">About</a></li>
                <!-- <li class="nav-item custom-nav-item"><a href="#Contact" class="nav-link">Contact</a></li> -->
            </ul>
        </div>
    </nav> <!-- End Navigation -->
