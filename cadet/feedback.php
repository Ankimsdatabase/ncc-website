<?php
if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'Feedback');
define('PAGE', 'feedback');
include('./partials/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

if (isset($_SESSION['is_login']) && isset($_SESSION['regimental_no'])) {
    $regimental_no = $_SESSION['regimental_no'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['feedback_text'] == "")) {
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
        $feedback = $_REQUEST["feedback_text"];

        $sql = "INSERT INTO feedback (feedback_text, regimental_no) VALUES (?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $feedback, $regimental_no);

        if ($stmt->execute()) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Feedback Submitted Successfully </div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Feedback </div>';
        }
    }
}

?>
<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST">
        <div class="form-group">
            <label for="stuId">Regemental No:</label> <b><?php echo $regimental_no; ?></b>
        </div>
        <div class="form-group">
            <label for="feedback_text">Write Feedback:</label>
            <textarea class="form-control" id="feedback_text" name="feedback_text" row=2></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>
</div>

</div> <!-- Close Row Div from header file -->

<?php
include('./partials/footer.php');
?>
