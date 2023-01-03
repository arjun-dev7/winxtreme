
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
                <div class="logo"><a href="<?php echo base_url() ?>WinXtremeLogin/index"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo"></a></div>
                <ul class="menu">
                    <li>
                        <a href="<?php echo base_url() ?>WinXtremeLogin/login">Home</a>
                    </li>



                    
                    <button class="btn-close btn-close-white d-lg-none"></button>
                </ul>
                <div class="header-trigger-wrapper d-flex d-lg-none align-items-center">
                    <div class="header-trigger me-4">
                        <span></span>
                    </div>
                    <a href="<?php echo base_url() ?>WinXtremeLogin/index" class="cmn--btn active btn--md d-none d-sm-block">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- inner hero section start -->
<section class="inner-banner bg_img" style="background: url('<?php echo base_url() ?>assets/images/inner-banner/bg2.jpg') top;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-xl-6 text-center">
        <h2 class="title text-white">Sign In</h2>
        <ul class="breadcrumbs d-flex flex-wrap align-items-center justify-content-center">
          <li><a href="<?php echo base_url() ?>WinXtremeLogin/index">Home</a></li>
          <li>Sign In</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- inner hero section end -->


    <!-- Account Section Starts Here -->
    <section class="account-section overflow-hidden bg_img" style="background:url(assets/images/account/bg.jpg)">
        <div class="container">
            <div class="account__main__wrapper">
                <div class="account__form__wrapper">
                    <div class="logo"><a href="<?php echo base_url() ?>WinXtremeLogin/index"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo"></a></div>
                    <form method="POST" class="account__form form row g-4" action="<?php echo base_url() ?>WinXtremeLogin/loginFunction">
                        <div class="col-12">
                            <div class="form-group">
                                <div for="email" class="input-pre-icon"><i class="las la-user"></i></div>
                                <input id="email" name="email" type="text" class="form--control form-control style--two" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div for="password" class="input-pre-icon"><i class="las la-lock"></i></div>
                                <input id="password" name="password" type="password" class="form--control form-control style--two" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button class="cmn--btn active w-100 btn--round" type="submit">Sign In</button>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between mt-5">
                            <div class="form--check d-flex align-items-center">
                                <input id="check1" type="checkbox" checked>
                                <label for="check1">Remember me</label>
                            </div>
                            <a class="forgot-pass d-block text--base" href="<?php echo base_url() ?>WinXtremeLogin/forgotpassword">Forgot Password ?</a>
                        </div>
                    </form>
                </div>
                <div class="account__content__wrapper">
                    <div class="content text-center text-white">
                        <h3 class="title text--base mb-4">Welcome to Casinio</h3>
                        <p class="">Sign in your Account. Atque, fuga sapiente, doloribus qui enim tempora?</p>
                        <p class="account-switch mt-4">Don't have an Account yet ? <a class="text--base ms-2" href="<?php echo base_url() ?>WinXtremeLogin/index">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Account Section Ends Here -->


    <!-- Footer Section Starts Here -->
<footer class="footer-section bg_img" style="background: url(assets/images/footer/bg.jpg) center;">
    <div class="footer-top">
        <div class="container">
            <div class="footer-wrapper d-flex flex-wrap align-items-center justify-content-md-between justify-content-center">
                <div class="logo mb-3 mb-md-0"><a href="<?php echo base_url() ?>WinXtremeLogin/index"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo"></a></div>
                <ul class="footer-links d-flex flex-wrap justify-content-center">
                    <li><a href="<?php echo base_url() ?>WinXtremeLogin/login">Games</a></li>
                    <li><a href="<?php echo base_url() ?>WinXtremeLogin/login">Terms & Conditions</a></li>

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

<!-- Mirrored from template.viserlab.com/WinXtreme/demo/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Dec 2022 15:08:31 GMT -->
</html>