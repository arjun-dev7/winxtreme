    <!-- meta tags and other links -->
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
        <h2 class="title text-white">Games</h2>
        <ul class="breadcrumbs d-flex flex-wrap align-items-center justify-content-center">
          <li><a href="<?php echo base_url() ?>WinXtreme/home">Home</a></li>
          <li>Games</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- inner hero section end -->

    <!-- Game Section Starts Here -->
    <section class="game-section padding-top padding-bottom bg_img" style="background: url(assets/images/game/bg3.jpg);">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
                    <div class="game-item">
                        <div class="game-inner">
                            <div class="game-item__thumb">
                                <img src="<?php echo base_url() ?>assets/images/game/item2.png" alt="game">
                            </div>
                            <div class="game-item__content">
                                <h4 class="title">Rock Paper Scissor - Blitz</h4>
                                <p class="invest-info">Invest Limit</p>
                                <p class="invest-amount">Starts from ₹10</p>
                                <a href="#0" class="cmn--btn active btn--md radius-0">Play Now</a>
                            </div>
                        </div>
                        <div class="ball"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
                    <div class="game-item">
                        <div class="game-inner">
                            <div class="game-item__thumb">
                                <img src="<?php echo base_url() ?>assets/images/game/item1.png" alt="game">
                            </div>
                            <div class="game-item__content">
                                <h4 class="title">Rock Paper Scissor - Rapid</h4>
                                <p class="invest-info">Invest Limit</p>
                                <p class="invest-amount">Starts from ₹10</p>
                                <a href="#0" class="cmn--btn active btn--md radius-0">Play Now</a>
                            </div>
                        </div>
                        <div class="ball"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
                    <div class="game-item">
                        <div class="game-inner">
                            <div class="game-item__thumb">
                                <img src="<?php echo base_url() ?>assets/images/game/item3.png" alt="game">
                            </div>
                            <div class="game-item__content">
                                <h4 class="title">Rock Paper Scissor - Ultimate</h4>
                                <p class="invest-info">Invest Limit</p>
                                <p class="invest-amount">Starts from ₹100</p>
                                <a href="#0" class="cmn--btn active btn--md radius-0">Play Now</a>
                            
                            </div>
                        </div>
                        <div class="ball"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
                    <div class="game-item">
                        <div class="game-inner">
                            <div class="game-item__thumb">
                                <img src="<?php echo base_url() ?>assets/images/game/item4.png" alt="game">
                            </div>
                            <div class="game-item__content">
                                <h4 class="title">Gullak - Daily Bonaza</h4>
                                <p class="invest-info">Breaks in</p>
                                <p class="invest-amount">countdown**</p>
                                <a href="#0" class="cmn--btn active btn--md radius-0">Enroll Now</a>
                            </div>
                        </div>
                        <div class="ball"></div>
                    </div>
               
                </div>
            </div>

        </div>
    </section>
    <!-- Game Section Ends Here -->


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