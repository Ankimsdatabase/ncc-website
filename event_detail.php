<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

include('./partials/header.php');

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$event_id = $_GET['id'];


// var_dump($row);

?>
<div class="container-fluid bg-dark">

    <div class="row">
        <?php
        $sql = "SELECT * FROM event WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo "
            <div class='row' style='height:500px; width:100%; object-fit:cover; box-shadow:10px; display: flex; align-items:center; justify-content: center'>
                <h1 style='color: white'>$row[name]</h1>
            </div>
          ";
        }
        ?>

    </div>
</div>



<div class="container mt-5 mb-5">
    <div class="row shadow">
        <div class="col-md-4">
            <img src="public/images/<?php echo $row['image'] ?>" class="card-img-top big" alt="<?php echo $row['name'] ?>" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title"><?php echo $row['name'] ?></h2>
                <p class="card-text"> <b>Location:</b> <?php echo $row['location'] ?></p>
                <p class="card-text"> <b>Description:</b> <?php echo $row['description'] ?></p>
                <p class="card-text"> <b>Start Date:</b> <?php echo $row['start_date'] ?></p>
                <p class="card-text"> <b>End Date:</b> <?php echo $row['end_date'] ?></p>
            </div>
        </div>
        <?php
        $stmt->close();
        ?>
    </div>
</div>
<?php

include('./partials/footer.php');
?>
