<?php
if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'Cadet Profile');
define('PAGE', 'profile');
include('./partials/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

if (isset($_SESSION['is_login']) && isset($_SESSION['regimental_no'])) {
    $regimental_no = $_SESSION['regimental_no'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM cadet WHERE regimental_no='$regimental_no'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $phone_number = $row["phone_number"];
    $email = $row["email"];
    $photo = $row["photo"];
}

if (isset($_REQUEST['update'])) {
    if (($_REQUEST['name'] === "")) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
        $name = $_REQUEST["name"];
        $phone_number = $_REQUEST["phone_number"];
        $email = $_REQUEST["email"];

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $image_folder = UPLOAD_PATH . 'cadets/';
            $year = date("Y");
            $month = date("m");
            $targetDir = $image_folder . $year . '/' . $month . '/';

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $image_name = $_FILES['photo']['name'];
            $image_tmp_name = $_FILES['photo']['tmp_name'];
            $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

            if (!in_array($image_extension, array('jpg', 'jpeg', 'png'))) {
                $_SESSION['msg'] = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Only JPG, JPEG, and PNG files are allowed.</div>';
                header("Location: profile.php");
                exit();
            }

            $timestamp = time();
            $filename_without_extension = pathinfo($image_name, PATHINFO_FILENAME);

            $new_image_name = $filename_without_extension . '-' . $timestamp . '.' . $image_extension;

            move_uploaded_file($image_tmp_name, $targetDir . $new_image_name);

            $full_image_path = 'cadets/' . $year . '/' . $month . '/' . $new_image_name;

            $stmt = $conn->prepare("UPDATE cadet SET name = ?, phone_number = ?, email = ?, photo = ? WHERE regimental_no = ?");
            $stmt->bind_param("sssss", $name, $phone_number, $email, $full_image_path, $regimental_no);
        } else {
            // Update statement without image field
            $stmt = $conn->prepare("UPDATE cadet SET name = ?, phone_number = ?, email = ? WHERE regimental_no = ?");
            $stmt->bind_param("ssss", $name, $phone_number, $email, $regimental_no);
        }

        if ($stmt->execute()) {
            $_SESSION['msg'] = '<div class="alert alert-success col-sm-6 mt-2" role="alert"> Event Updated Successfully </div>';
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger col-sm-6 mt-2" role="alert"> Unable to Update Event </div>';
        }

        $stmt->close();
        header("Location: profile.php");
        exit();
    }
}

?>
<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <p>Regimental No. <?php if (isset($regimental_no)) {
                                    echo $regimental_no;
                                } ?></p>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($name)) {
                                                                                        echo $name;
                                                                                    } ?>">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone No.</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php if (isset($phone_number)) {
                                                                                                        echo $phone_number;
                                                                                                    } ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>">
        </div>

        <div class="form-group">
            <label for="photo">Upload Image</label>
            <input type="file" class="form-control-file" id="photo" name="photo" ccept=".jpg, .jpeg, .png">
        </div>

        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>
</div>

</div> <!-- Close Row Div from header file -->

<?php
include('./partials/footer.php');
?>
