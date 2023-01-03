
<!DOCTYPE html>
<html lang="en">
  <?php require('component/head.php') ?>
    <body data-bs-spy="scroll" data-bs-offset="170" data-bs-target=".privacy-policy-sidebar-menu">

        <div class="overlay"></div>
        <div class="preloader">
            <div class="scene" id="scene">
                <input type="checkbox" id="andicator" />
                <div class="cube">
                    <div class="cube__face cube__face--front"><i></i></div>
                    <div class="cube__face cube__face--back"><i></i><i></i></div>
                    <div class="cube__face cube__face--right">
                        <i></i> <i></i> <i></i> <i></i> <i></i>
                    </div>
                    <div class="cube__face cube__face--left">
                        <i></i> <i></i> <i></i> <i></i> <i></i> <i></i>
                    </div>
                    <div class="cube__face cube__face--top">
                        <i></i> <i></i> <i></i>
                    </div>
                    <div class="cube__face cube__face--bottom">
                        <i></i> <i></i> <i></i> <i></i>
                    </div>
                </div>
            </div>
        </div>

    <div class="header">
    <div class="container">
        <div class="header-bottom">
            <div class="header-bottom-area align-items-center">
                <div class="logo"><a href="<?php echo base_url() ?>WinXtreme/home"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo"></a></div>
                <ul class="menu">
                    <li>
                        <a href="<?php echo base_url() ?>WinXtreme/home">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>WinXtreme/game">Games <span class="badge badge--sm badge--base text-dark">NEW</span></a>
                    </li>
                    <li>
                        <a href="#0">User Dashboard</a>
                        <ul class="sub-menu">
                           <li>
                                <a href="<?php echo base_url() ?>WinXtreme/dashboard">User info</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>WinXtreme/termsandcondition">Terms & Conditions</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>WinXtremeLogin/login">Logout</a>
                            </li>
                        </ul>
                    </li>

                    <button class="btn-close btn-close-white d-lg-none"></button>
                </ul>
                <div class="header-trigger-wrapper d-flex d-lg-none align-items-center">
                    <div class="header-trigger me-4">
                        <span></span>
                    </div>
                    <a href="<?php echo base_url() ?>WinXtremeLogin/login" class="cmn--btn active btn--md d-none d-sm-block">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- inner hero section start -->
<section class="inner-banner bg_img" style="background: url('assets/images/inner-banner/bg2.jpg') top;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-xl-6 text-center">
        <h2 class="title text-white">Change Password</h2>
        <ul class="breadcrumbs d-flex flex-wrap align-items-center justify-content-center">
          <li><a href="<?php echo base_url() ?>WinXtreme/home">Home</a></li>
          <li>Change Password</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- inner hero section end -->


        <!-- Dashboard Section Starts Here -->
        <div class="dashboard-section padding-top padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="dashboard-sidebar">
                            <div class="close-dashboard d-lg-none">
                                <i class="las la-times"></i>
                            </div>
                            <div class="dashboard-user">
                                <div class="user-thumb">
                                    <img src="<?php echo base_url() ?>assets/images/top/item1.png" alt="dashboard">
                                </div>
                                <div class="user-content">
                                    <span>Welcome</span>
                                    <h5 class="name">Munna Ahmed</h5>
                                    <ul class="user-option">
                                        <li>
                                            <a href="#0">
                                                <i class="las la-bell"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="las la-pen"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="las la-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="user-dashboard-tab">
                                <li>
                                   <a href="<?php echo base_url() ?>WinXtreme/dashboard" class="active">Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>WinXtreme/depositlog">Deposit History</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>WinXtreme/withdrawlogs">Withdraw History</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>WinXtreme/transactions">Transaction History</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>WinXtreme/profile">Account Settings</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>WinXtreme/changepassword">Security Settings</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>WinXtremeLogin/login">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="user-toggler-wrapper d-flex align-items-center d-lg-none">
                            <h4 class="title m-0">User Dashboard</h4>
                            <div class="user-toggler">
                                <i class="las la-sliders-h"></i>
                            </div>
                        </div>
                        <div class="custom--card section-bg">
                            <div class="card--body section-bg p-sm-5 p-3">
                                <div class="reset-header mb-5 text-center">
                                    <div class="icon"><i class="las la-lock"></i></div>
                                    <h3 class="mt-3">Reset Password</h3>
                                    <p>Enter your current password and new password</p>
                                </div>
                                <form autocomplete="off">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password">Current Password</label>
                                        <input id="password" type="password" class="form-control form--control" name="current_password" required="" autocomplete="off">
                                    </div>
        
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input id="password" type="password" class="form-control form--control" name="password" required="" autocomplete="off">
                                    </div>
        
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="confirm_password">Confirm Password</label>
                                        <input id="password_confirmation" type="password" class="form-control form--control" name="password_confirmation" required="" autocomplete="off">
                                    </div>
        
                                    <div class="form-group mt-4">
                                        <button type="submit" class="cmn--btn active w-100">Change Password</button>
                                    </div>
                                </form>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Section Ends Here -->


    <!-- Footer Section Starts Here -->
<footer class="footer-section bg_img" style="background: url(assets/images/footer/bg.jpg) center;">
    <div class="footer-top">
        <div class="container">
            <div class="footer-wrapper d-flex flex-wrap align-items-center justify-content-md-between justify-content-center">
                <div class="logo mb-3 mb-md-0"><a href="<?php echo base_url() ?>WinXtreme/home"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo"></a></div>
                <ul class="footer-links d-flex flex-wrap justify-content-center">
                    <li><a href="<?php echo base_url() ?>WinXtreme/game">Games</a></li>
                    <li><a href="<?php echo base_url() ?>WinXtreme/termsandcondition">Terms & Conditions</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">

        </div>
    </div>
    <div class="shapes">
        <img src="<?php echo base_url() ?>assets/images/footer/shape.png" alt="footer" class="shape1">
    </div>
</footer>
<!-- Footer Section Ends Here -->
    

<!-- jQuery library -->
<script src="<?php echo base_url() ?>assets/js/lib/jquery-3.6.0.min.js"></script>
<!-- bootstrap 5 js -->
<script src="<?php echo base_url() ?>assets/js/lib/bootstrap.min.js"></script>

<!-- Pluglin Link -->
<script src="<?php echo base_url() ?>assets/js/lib/slick.min.js"></script>

<!-- main js -->
<script src="<?php echo base_url() ?>assets/js/main.js"></script>  
</body>

</html>