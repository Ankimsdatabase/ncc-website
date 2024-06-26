<?php
if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'Change Password');
define('PAGE', 'change_password');
include('./partials/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

if (isset($_SESSION['is_login']) && isset($_SESSION['regimental_no'])) {
    $regimental_no = $_SESSION['regimental_no'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

if (isset($_REQUEST['update'])) {
    if (($_REQUEST['cadet_new_password'] == "")) {
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
        $sql = "SELECT * FROM cadet WHERE regimental_no='$regimental_no'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $cadet_password = $_REQUEST['cadet_new_password'];
            $sql = "UPDATE cadet SET password = '$cadet_password' WHERE regimental_no = '$regimental_no'";
            if ($conn->query($sql) == TRUE) {
                // below msg display on form submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
            } else {
                // below msg display on form submit failed
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
            }
        }
    }
}

?>

<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
            <?php if (isset($passmsg)) {
                echo $passmsg;
            } ?>
            <form class="mt-5 mx-5" method="POST">
                <!-- <div class="form-group">
                    <label for="regimental_no">Regimental No.</label>
                    <input type="email" class="form-control" id="regimental_no" value=" <?php echo $regimental_no ?>" readonly>
                </div> -->
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" placeholder="New Password" name="cadet_new_password">
                </div>
                <button type="submit" class="btn btn-primary mr-4 mt-4" name="update">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>

            </form>

        </div>

    </div>
</div>

</div> <!-- Close Row Div from header file -->

<?php
include('./partials/footer.php');
?>
