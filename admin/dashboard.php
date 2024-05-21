<?php
if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('./partials/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
$sql = "SELECT * FROM event";
$result = $conn->query($sql);
$event_count = $result->num_rows;

$sql = "SELECT * FROM cadet";
$result = $conn->query($sql);
$cadet_count = $result->num_rows;

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
$feedback_count = $result->num_rows;
?>
<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Events</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $event_count; ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Cadets</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $cadet_count; ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Feedbacks</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $feedback_count; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div> <!-- div Row close from header -->
</div> <!-- div Conatiner-fluid close from header -->
<?php
include('./partials/footer.php');
?>
