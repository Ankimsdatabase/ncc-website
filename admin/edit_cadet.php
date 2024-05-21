<?php
if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'Edit Cadet');
define('PAGE', 'cadets');

include('./partials/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

// Update
if (isset($_REQUEST['update'])) {

    // cadet status
    $status_values = ['pending', 'active', 'blocked'];

    // Checking for Empty Fields
    if (empty($_REQUEST['regimental_no']) || empty($_REQUEST['status']) || !in_array($_REQUEST['status'], $status_values)) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $regimental_no = $_REQUEST['regimental_no'];
        $status = $_REQUEST['status'];

        $stmt = $conn->prepare("UPDATE cadet SET status= ? WHERE regimental_no= ?");
        $stmt->bind_param("ss", $status, $regimental_no);

        if ($stmt->execute()) {
            $_SESSION['msg'] = '<div class="alert alert-success col-sm-6 mt-2" role="alert"> Status Updated Successfully </div>';
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger col-sm-6 mt-2" role="alert"> Unable to Update Status </div>';
        }

        $stmt->close();
        header("Location: cadets.php");
        exit();
    }
}
?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Update Cadet</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM cadet WHERE regimental_no = ?";
        // $sql = "SELECT * FROM cadet WHERE regimental_no = '{$_REQUEST['regimental_no']}'";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $_REQUEST['regimental_no']);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="regimental_no">Regimental No.</label>
            <input type="text" class="form-control" id="regimental_no" name="regimental_no" value="<?php if (isset($row['regimental_no'])) {
                                                                                                        echo $row['regimental_no'];
                                                                                                    } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($row['name'])) {
                                                                                        echo $row['name'];
                                                                                    } ?>" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($row['email'])) {
                                                                                        echo $row['email'];
                                                                                    } ?>" readonly>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone No.</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php if (isset($row['phone_number'])) {
                                                                                                        echo $row['phone_number'];
                                                                                                    } ?>" readonly>
        </div>

        <?php if ($row["photo"]) : ?>
            <div class="cadet-image-holder">
                Cadet Image:

                <img src="/public/images/<?php echo  $row['photo'] ?>" alt="<?php echo $row['name'] ?>" />
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="pending" <?php if (isset($row['status']) && $row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                <option value="active" <?php if (isset($row['status']) && $row['status'] == 'active') echo 'selected'; ?>>Active</option>
                <option value="blocked" <?php if (isset($row['status']) && $row['status'] == 'blocked') echo 'selected'; ?>>Blocked</option>
            </select>
        </div>



        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="update" name="update">Update</button>
            <a href="cadets.php" class="btn btn-secondary">Goto Cadets</a>
        </div>

    </form>
</div>
</div> <!-- div Row close from header -->
</div> <!-- div Conatiner-fluid close from header -->

<?php
include('./partials/footer.php');
?>
