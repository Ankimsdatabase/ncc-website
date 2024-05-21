 <!-- Start Footer -->
 <footer class="container-fluid bg-dark text-center p-2">
     <small class="text-white">Copyright &copy; <?php echo date('Y'); ?> || Designed By Ankit Bhattarai from Bachelor Of Computer Application 6th Semester, Project || <?php
                                                                                                            if (isset($_SESSION['is_admin_login'])) {
                                                                                                                echo '<a href="admin/dashboard.php"> Admin Dashboard</a> <a href="logout.php">Logout</a>';
                                                                                                            } else {
                                                                                                                echo '<a href="#login" data-toggle="modal" data-target="#adminLoginModalCenter"> Admin Login</a>';
                                                                                                            }
                                                                                                            ?>
     </small>

 </footer> <!-- End Footer -->

 <!-- Start Student Registration Modal -->
 <div class="modal fade" id="cadetRegistration" tabindex="-1" role="dialog" aria-labelledby="cadet-registration-modal" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="cadet-registration-modal">Cadet Registration</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_cadet_registration()">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <!--Start Form Registration-->
                 <?php include('cadet_registration.php'); ?>
                 <!-- End Form Registration -->
             </div>
             <div class="modal-footer">
                 <span id="successMsg"></span>
                 <button type="button" class="btn btn-primary" id="signup" onclick="register_cadet()">Sign Up</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_cadet_registration()">Close</button>
             </div>
         </div>
     </div>
 </div>
 <!-- End Student Registration Modal -->


 <!-- Start Student Login Modal -->
 <div class="modal fade" id="cadetLogin" tabindex="-1" role="dialog" aria-labelledby="cadet-login-modal" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="cadet-login-modal">Cadet Login</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="close_cadet_login()">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form role="form" id="cadet_login_form">
                     <div class="form-group">
                         <i class="fas fa-envelope"></i><label for="regimental_no_login" class="pl-2 font-weight-bold">Regimental No.</label><small id="statusLogMsg1"></small><input type="text" class="form-control" placeholder="Regimental No." name="regimental_no_login" id="regimental_no_login">
                     </div>
                     <div class="form-group">
                         <i class="fas fa-key"></i><label for="cadet_password" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Password" name="cadet_password" id="cadet_password">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <small id="statusLogMsg"></small>
                 <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="login_cadet()">Login</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="close_cadet_login()">Cancel</button>
             </div>
         </div>
     </div>
 </div> <!-- End Student Login Modal -->


 <!-- Start Admin Login Modal -->
 <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="adminLoginModalCenterTitle">Admin Login</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="clearAdminLoginWithStatus()">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form role="form" id="adminLoginForm">
                     <div class="form-group">
                         <i class="fas fa-envelope"></i><label for="adminLogEmail" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="adminLogEmail" id="adminLogEmail">
                     </div>
                     <div class="form-group">
                         <i class="fas fa-key"></i><label for="adminLogPass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Password" name="adminLogPass" id="adminLogPass">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <small id="statusAdminLogMsg"></small>
                 <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="clearAdminLoginWithStatus()">Cancel</button>
             </div>
         </div>
     </div>
 </div> <!-- End Admin Login Modal -->

 <!-- Jquery and Boostrap JavaScript -->
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/jquery.min.js"></script>
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/popper.min.js"></script>
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/bootstrap.min.js"></script>

 <!-- Font Awesome JS -->
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/all.min.js"></script>

 <!-- Student Testimonial Owl Slider JS  -->
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/owl.min.js"></script>
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/testyslider.js"></script>

 <!-- Student Ajax Call JavaScript -->
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/ajaxrequest.js"></script>

 <!-- Admin Ajax Call JavaScript -->
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/adminajaxrequest.js"></script>

 <!-- Custom JavaScript -->
 <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/custom.js"></script>

 </body>

 </html>
