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
        <h2 class="title text-white">Profile</h2>
        <ul class="breadcrumbs d-flex flex-wrap align-items-center justify-content-center">
          <li><a href="<?php echo base_url() ?>WinXtreme/home">Home</a></li>
          <li>Profile</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- inner hero section end -->

    <!-- Profile Section Starts Here -->
    <section class="profile-section padding-top padding-bottom">
        <div class="container">
            <div class="profile-edit-wrapper">
                <div class="row gy-5">
                    <div class="col-xl-4">
                        <div class="profile__thumb__edit text-center custom--card">
                            <div class="card--body">
                                <div class="thumb">
                                    <img src="<?php echo base_url() ?>assets/images/account/user.png" alt="testimonial">
                                </div>
                                <div class="profile__info">
                                    <h4 class="name">Demo User</h4>
                                    <p class="username">@demouser123</p>
                                    <input type="file" class="form-control d-none " id="update-photo">
                                    <label class="cmn--btn active btn--md mt-3" for="update-photo">Update Profile Picture</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="custom--card card--lg">
                            <div class="card--body">
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input id="fname" type="text" class="form-control form--control style-two " placeholder="testuser">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input id="lname" type="text" class="form-control form--control style-two " placeholder="testuser">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="uname" class="form-label">Username</label>
                                            <input id="text" type="uname" class="form-control form--control style-two " placeholder="testuser">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input id="email" type="email" class="form-control form--control style-two " placeholder="testuser@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" class="form-label">Country</label>
                                            <select name="" id="" class="form-select form--select form--control style-two">
                                                <option value="">India</option>
												<option value="">Bangladesh</option>
                                                <option value="">England</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="number" class="form-label">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text text--base">+91</span>
                                                <input id="number" type="tel" class="form-control form--control style-two " placeholder="ex. +09 3195 1452">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addr" class="form-label">Address</label>
                                            <input id="addr" type="text" class="form-control form--control style-two " placeholder="Uttara">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip" class="form-label">Zip Code</label>
                                            <input id="zip" type="text" class="form-control form--control style-two " placeholder="1230">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <button class="cmn--btn active mt-3">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Section Ends Here -->


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