<?php


if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'Add Testimony');
define('PAGE', 'testimonies');

include('./partials/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}


// Create
if (isset($_REQUEST['submit'])) {
    if (empty($_REQUEST['name']) || empty($_REQUEST['description']) ||  !$_FILES['image']['size']) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $name = $_REQUEST['name'];
        $description = $_REQUEST['description'];


        // Specify image folder
        $image_folder = UPLOAD_PATH . 'testimonies/';
        $year = date("Y");
        $month = date("m");
        $targetDir = $image_folder . $year . '/' . $month . '/';

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        if (!in_array($image_extension, array('jpg', 'jpeg', 'png'))) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Only JPG, JPEG, and PNG files are allowed.</div>
                </div>';
            return;
        }

        $timestamp = time();
        $filename_without_extension = pathinfo($image_name, PATHINFO_FILENAME);

        $new_image_name = $filename_without_extension . '-' . $timestamp . '.' . $image_extension;


        // Move uploaded image to destination folder
        move_uploaded_file($image_tmp_name, $targetDir . $new_image_name);

        $full_image_path = 'testimonies/' . $year . '/' . $month . '/' . $new_image_name;
        // Update statement with image field
        $stmt = $conn->prepare("INSERT INTO testimony (name , description , image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $description, $full_image_path);

        if ($stmt->execute()) {
            $_SESSION['msg'] = '<div class="alert alert-success col-sm-6 mt-2" role="alert"> Official Message Added Successfully </div>';
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger col-sm-6 mt-2" role="alert"> Unable to Add Official Message </div>';
        }

        $stmt->close();
        header("Location: testimonies.php");
        exit();
    }
}

?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Add Official Message</h3>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($_REQUEST['name'])) {
                                                                                        echo $_REQUEST['name'];
                                                                                    } ?>">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description"><?php if (isset($_REQUEST['description'])) {
                                                                                    echo $_REQUEST['description'];
                                                                                } ?></textarea>
        </div>


        <div class="form-group">
            <label for="image">Change Image</label>
            <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png" />
        </div>


        <div class=" text-center">
            <button type="submit" class="btn btn-danger" id="submit" name="submit">Submit</button>
            <a href="testimonies.php" class="btn btn-secondary">Goto Official Messages</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>

</div>
</div> <!-- div Row close from header -->
</div>

<?php
include('./partials/footer.php');
?>
