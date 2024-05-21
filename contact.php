<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

include('./partials/header.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include('./vendor/PHPMAILER/src/PHPMailer.php');
include('./vendor/PHPMAILER/src/SMTP.php');
include('./vendor/PHPMAILER/src/Exception.php');

if (isset($_POST['submit'])) {
    // Collect form data
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Admin email
    $admin_email = "ankitbtri@gmail.com";
    // Initialize PHPMailer
    $mail = new PHPMailer;

    // Enable debugging (0 = off, 1 = client messages, 2 = client and server messages)
    $mail->SMTPDebug = 0;

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->Port = 587; // SMTP port (TLS)
    $mail->SMTPSecure = 'tls'; // Encryption method (ssl is deprecated)
    $mail->SMTPAuth = true; // Enable SMTP authentication

    // SMTP credentials
    $mail->Username = $admin_email; // Your Gmail username
    $mail->Password = "xzytpflygsqxyijk"; // Your Gmail password (consider using environment variables for security)

    // Sender and recipient details
    $mail->setFrom($email, $name); // Sender's email and name
    $mail->addAddress($admin_email, 'SECNCC'); // Recipient's email and name
    $mail->addReplyTo($email, $name);
    // Email content
    $mail->Subject = $subject; // Email subject
    $mail->Body = $message; // HTML message body


    if ($mail->send()) {
        echo '<script>alert("Your message has been sent successfully.");</script>';
    } else {
        echo '<script>alert("There was an error sending your message. Please try again later.");</script>';
    }
}
?>





<div class="container-fluid bg-dark">
    <div class="row" style="height:500px; width:100%; object-fit:cover; box-shadow:10px; display: flex; align-items:center; justify-content: center">
        <h1 style="color: white">Contact US</h1>
    </div>
</div>

<!--Start Contact Us-->
<div class="container mt-4" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
    <div class="row">
        <!--Start Contact Us Row-->
        <div class="col-md-8">
            <!--Start Contact Us 1st Column-->
            <form action="" method="post">
                <input type="text" class="form-control" name="name" placeholder="Name"><br>
                <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
                <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
                <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
            </form>
        </div> <!-- End Contact Us 1st Column-->

        <div class="col-md-4 stripe text-white text-center">
            <!-- Start Contact Us 2nd Column-->
            <h3>SECNCC</h3>
            <p>SECNCC,
                Near Veronica lane, laitumukhrah
                Shillong, - 793001<br />
                Phone: +91 60330392540 <br />
                WWW.SECNCC.COM </p>
        </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
</div> <!-- End Contact Us Container-->
<!-- End Contact Us -->

<?php

include('./partials/footer.php');

?>
