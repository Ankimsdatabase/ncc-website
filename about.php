<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');
include('./partials/header.php');
?>
<div class="container-fluid bg-dark">
    <div class="row" style="height:500px; width:100%; object-fit:cover; box-shadow:10px; display: flex; align-items:center; justify-content: center">
        <!-- <img src="./image/coursebanner.jpg" alt="events" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" /> -->
        <h1 style="color: white">About</h1>
    </div>
</div>

<!-- Start About Section -->
<div class="container-fluid p-4" style="background-color:#E9ECEF">
    <div class="container" style="background-color:#E9ECEF">
        <div class="row text-center">
            <div class="col-sm">
                <h3>About Us</h3>
                <p>The National Cadet Corps (NCC) is a youth development movement. It has enormous potential for
                    nation-building. St. Edmunds College Nation Cadet Corps (SECNCC) is one of the oldest NCC units
                    in
                    the country, providing opportunities to the youth for their overall development with a sense of
                    Duty, Commitment, Dedication, Discipline so that they become able leaders and useful citizens.
                    The
                    National Cadet Corps, St. Edmunds College under the unit 42 Megh Bn NCC Composite Technical
                    Regiment
                    National Cadet Corps is a student unit of the Indian Army which aims to develop a sense of
                    discipline, rigour, and unity in the cadets. It provides a platform for the students to develop
                    their personalities by engaging themselves in various events. The Guard of Honour, Indoor and
                    outdoor sports events, firing practice, and Training camps aim to inculcate the values of
                    teamwork
                    and discipline in the cadets and exposure to life in the Army.At the same time, working for the
                    society, the NCC conducts plantation and cleanliness drives, awareness campaigns, and activities
                    for
                    social causes to instill the spirit of service in the young cadets. Currently, the NCC has 100
                    active members who are continuously guided by the Unit's Commanding Officer and are working
                    towards
                    self-development and nation-building. 'UNITY AND DISCIPLINE,' the motto of the NCC, precisely
                    highlights the aim and culture of the unit.</p>
            </div>
            <!-- End About Section -->
        </div>
    </div>
</div>

<!-- Start Students Testimonial -->
<div class="container-fluid mt-5" style="background-color: #4B7289" id="testimony">
    <h1 class="text-center testyheading p-4"> Message From Officials </h1>
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
                <?php
                $sql = "SELECT * from testimony LIMIT 7";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="testimonial">
                            <p class="description">
                                <?php echo $row['description']; ?>
                            </p>
                            <div class="pic">
                                <img src="/public/images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" />
                            </div>
                            <div class="testimonial-prof">
                                <h4><?php echo $row['name']; ?></h4>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div> <!-- End Students Testimonial -->


<?php
include('./partials/footer.php');
?>
