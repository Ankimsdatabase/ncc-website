<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['is_login'])) {
    $regimental_no = $_SESSION['regimental_no'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
if (isset($regimental_no)) {
    $sql = "SELECT name, photo FROM cadet WHERE regimental_no = '$regimental_no'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $photo = $row['photo'];
}
?>

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
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/public/assets/css/stustyle.css">

</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../">SECNCC Cadet</a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5 " style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3 cadet-image-holder">
                            <?php if ($photo) : ?>
                                <img src="/public/images/<?php echo $photo ?>" alt="<?php echo $name; ?>" class="img-thumbnail rounded-circle">
                            <?php else : ?>
                                <i class="fa fa-user" style="font-size: 100px;" aria-hidden="true"></i>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'profile') {
                                                    echo 'active';
                                                } ?>" href="profile.php">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'feedback') {
                                                    echo 'active';
                                                } ?>" href="feedback.php">
                                <i class="fa fa-comments"></i>
                                Feedback
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
