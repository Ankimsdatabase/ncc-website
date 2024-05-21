<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

include('./partials/header.php');
?>
<!-- Start Video Background-->
<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="public/video/long.mp4" />
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content">How's The Josh?</h1>

    </div>
</div> <!-- End Video Background -->

<div class="container-fluid bg-danger txt-banner">
    <!-- Start Text Banner -->
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5> <i class="fa fa-school mr-3"></i>St. Edmunds College</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i> 42 Megh Bn NCC</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fa fa-bell mr-3"></i> Shillong Group</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fa fa-search mr-3"></i> North Eastern Region</h5>
        </div>
    </div>
</div> <!-- End Text Banner -->


<div class="container mt-5">
    <h1 class="text-center">Upcoming Event</h1>
    <div class="card-deck mt-4">
        <?php
        $sql = "SELECT * FROM event WHERE start_date >= CURDATE() ORDER BY start_date ASC LIMIT 3";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $event_id = $row['id'];
                echo '
               <div class="col-sm-4 mb-4">
                  <a href="event_detail.php?id=' . $event_id . '" class="btn" style="text-align: left; padding:0px;"><div class="card">
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

    <div class="text-center m-2">
        <a class="btn btn-danger btn-sm" href="events.php">View All Events</a>
    </div>
</div>



<div class="container-fluid bg-danger">
    <!-- Start Social Follow -->
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a class="text-white social-hover" href="https://sec.edu.in/"><i class="fa fa-school mr-3"></i> St. Edmunds College</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="https://sec.edu.in/"><i class="fab fa-twitter"></i> Twitter</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="https://www.youtube.com/@secncc5003"><i class="fab fa-youtube"></i> Youtube</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="https://www.instagram.com/sec.ncc.official/"><i class="fab fa-instagram"></i> Instagram</a>
        </div>
    </div>
</div> <!-- End Social Follow -->

<!-- Start About Section -->
<!-- <div class="container-fluid p-4" style="background-color:#E9ECEF">
    <div class="container" style="background-color:#E9ECEF">
        <div class="row text-center">
            <div class="col-sm">
                <h5>About Us</h5>
                <p>SECNCC provides universal access to the world’s best education, partnering with top universities and organizations to offer courses online.</p>
            </div>
            <div class="col-sm">
                <h5>Category</h5>
                <a class="text-dark" href="#">Web Development</a><br />
                <a class="text-dark" href="#">Web Designing</a><br />
                <a class="text-dark" href="#">Android App Dev</a><br />
                <a class="text-dark" href="#">iOS Development</a><br />
                <a class="text-dark" href="#">Data Analysis</a><br />
            </div>
            <div class="col-sm">
                <h5>Contact Us</h5>
                <p>SECNCC Pvt Ltd <br> Near Police Camp II <br> Bokaro, Jharkhand <br> Ph. 000000000 </p>
            </div>
        </div>
    </div>
</div> -->

<!-- End About Section -->

<?php

include('./partials/footer.php');

?>
