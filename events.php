<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');
include('./partials/header.php');
?>
<div class="container-fluid bg-dark">
    <div class="row" style="height:500px; width:100%; object-fit:cover; box-shadow:10px; display: flex; align-items:center; justify-content: center">
        <!-- <img src="./image/coursebanner.jpg" alt="events" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" /> -->
        <h1 style="color: white">Events</h1>
    </div>
</div>

<div class=" container mt-5">
    <h1 class="text-center">All Events</h1>
    <div class="row mt-4">
        <?php
        $sql = "SELECT * FROM event";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                echo '
                <div class="col-sm-4 mb-4">
                  <a href="event_detail.php?id=' . $id . '" class="btn" style="text-align: left; padding:0px;"><div class="card">
                    <img src="/public/images/' . $row['image'] . '" class="card-img-top img-block" alt="' . $row['name'] . '" />
                    <div class="card-body">
                      <h5 class="card-title">' . $row['name'] . '</h5>
                      <p class="card-text description">' . substr($row['description'], 0, 100) . '</p>
                      <p class="card-text">' . $row['location'] . '</p>
                    </div>
                    <div class="card-footer">
                    <p class="card-text d-inline">Date: ' . $row['start_date'] . ' - ' . $row['end_date'] . '</p>
                    </div>
                  </div> </a>
                </div>
              ';
            }
        }
        ?>
    </div>
</div>

<?php
include('./partials/footer.php');
?>
