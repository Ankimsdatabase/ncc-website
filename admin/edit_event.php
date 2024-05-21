<?php


if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'Edit Event');
define('PAGE', 'events');

include('./partials/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}


// Update
if (isset($_REQUEST['update'])) {

    if (empty($_REQUEST['name']) || empty($_REQUEST['description']) || empty($_REQUEST['location']) || empty($_REQUEST['start_date']) || empty($_REQUEST['end_date']) || empty($_REQUEST['description'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $description = $_REQUEST['description'];
        $location = $_REQUEST['location'];
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Specify image folder
            $image_folder = UPLOAD_PATH . 'events/';
            $year = date("Y");
            $month = date("m");
            $targetDir = $image_folder . $year . '/' . $month . '/';

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }


            // Get image details
            // $image_name = $_FILES['image']['name'];
            // $image_tmp_name = $_FILES['image']['tmp_name'];

            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

            if (!in_array($image_extension, array('jpg', 'jpeg', 'png'))) {
                $_SESSION['msg'] = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Only JPG, JPEG, and PNG files are allowed.</div>';
                header("Location: events.php");
                exit();
            }

            $timestamp = time();
            $filename_without_extension = pathinfo($image_name, PATHINFO_FILENAME);

            $new_image_name = $filename_without_extension . '-' . $timestamp . '.' . $image_extension;


            // Move uploaded image to destination folder
            move_uploaded_file($image_tmp_name, $targetDir . $new_image_name);

            $full_image_path = 'events/' . $year . '/' . $month . '/' . $new_image_name;
            // Update statement with image field
            $stmt = $conn->prepare("UPDATE event SET name = ?, description = ?, location = ?, start_date = ?, end_date = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssssssi", $name, $description, $location, $start_date, $end_date, $full_image_path, $id);
        } else {
            // Update statement without image field
            $stmt = $conn->prepare("UPDATE event SET name = ?, description = ?, location = ?, start_date = ?, end_date = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $name, $description, $location, $start_date, $end_date, $id);
        }

        if ($stmt->execute()) {
            $_SESSION['msg'] = '<div class="alert alert-success col-sm-6 mt-2" role="alert"> Event Updated Successfully </div>';
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger col-sm-6 mt-2" role="alert"> Unable to Update Event </div>';
        }

        $stmt->close();
        header("Location: events.php");
        exit();
    }
}

?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Update Event</h3>
    <?php

    if (!isset($_REQUEST['view'])) {
        echo "<script> location.href='/admin/events.php'; </script>";
    }

    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM event WHERE id = ?";
        // $sql = "SELECT * FROM cadet WHERE regimental_no = '{$_REQUEST['regimental_no']}'";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $_REQUEST['id']);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input id="id" name="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : ""  ?>" hidden />
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($row['name'])) {
                                                                                        echo $row['name'];
                                                                                    } ?>">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description"><?php if (isset($row['description'])) {
                                                                                    echo $row['description'];
                                                                                } ?></textarea>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php if (isset($row['location'])) {
                                                                                                echo $row['location'];
                                                                                            } ?>">
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php if (isset($row['start_date'])) {
                                                                                                    echo $row['start_date'];
                                                                                                } ?>">
        </div>

        <div class="form-group">
            <label for="end_date">Start Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php if (isset($row['end_date'])) {
                                                                                                echo $row['end_date'];
                                                                                            } ?>">
        </div>

        <div class="form-group">
            <label for="image">Change Image</label>
            <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png" />
        </div>


        <div class=" text-center">
            <button type="submit" class="btn btn-danger" id="update" name="update">Update</button>
            <a href="events.php" class="btn btn-secondary">Goto Events</a>
        </div>

    </form>
    <?php
    if (isset($row['image'])) : ?>
        <div class="image-holder">
            Current Image

            <img src="/public/images/<?php echo  $row['image'] ?>" alt="<?php echo $row['name'] ?>" />
        </div>
    <?php endif; ?>

</div>
</div> <!-- div Row close from header -->
</div>

<?php
include('./partials/footer.php');
?>
