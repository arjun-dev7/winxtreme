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
                                <a href="<?php echo base_url() ?>WinXtreme/destroy">Logout</a>
                            </li>
                        </ul>
                    </li>
                    

                    <button class="btn-close btn-close-white d-lg-none"></button>
                </ul>

            </div>
        </div>
    </div>
</div>

    <!-- Banner Section Starts Here -->
    <section class="banner-section bg_img overflow-hidden" style="background:url(assets/images/banner/bg.png) center">
        <div class="container">
            <div class="banner-wrapper d-flex flex-wrap align-items-center">
                <div class="banner-content">
                    <h1 class="banner-content__title">Play <span class="text--base">WinXtreme</span> & Win Money Unlimited</h1>
                    <p class="banner-content__subtitle">PLAY GAME AND EARN MONEY IN ONLINE. THE ULTIMATE ONLINE GAMING PLATFORM.</p>
                    <div class="button-wrapper">
                        <a href="<?php echo base_url() ?>WinXtreme/game" class="cmn--btn active btn--lg"><i class="las la-play"></i> Play Now</a>
                    </div>
                    <img src="<?php echo base_url() ?>assets/images/banner/card.png" alt="" class="shape1">
                </div>
                <div class="banner-thumb">
                    <img src="<?php echo base_url() ?>assets/images/banner/thumb.png" alt="banner">
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section Ends Here -->


    <!-- About Section Starts Here -->
    <section class="about-section padding-top padding-bottom overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-header">
                            <h2 class="section-header__title">About WinXtreme</h2>
                            <p>A casino is a facility for certain types of gambling. Casinos are often built near or combined with hotels, resorts, restaurants, retail shopping, cruise ships, and other tourist attractions. Some casinos are also known for hosting live entertainment, such as stand-up comedy, concerts, and sports.</p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="aobut-thumb section-thumb">
                        <img src="<?php echo base_url() ?>assets/images/about/thumb.png" alt="about" class="ms-lg-5">
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="<?php echo base_url() ?>assets/images/about/shape.png" alt="about" class="shape shape1">
        </div>
    </section>
    <!-- About Section Ends Here -->


    <!-- Game Section Starts Here -->
    <section class="game-section padding-top padding-bottom bg_img" style="background: url(assets/images/game/bg3.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="section-header text-center">
                        <h2 class="section-header__title">Top Awesome Games</h2>
                        <p>A casino is a facility for certain types of gambling. Casinos are often built combined with hotels, resorts,.</p>
                    </div>
                </div>
            </div>
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


    <!-- Why Choose Us Section Starts Here -->
    <section class="why-section padding-top padding-bottom overflow-hidden">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div class="col-lg-5 col-xl-4">
                    <div class="section-header mb-4">
                        <h2 class="section-header__title">Why Play WinXtreme</h2>
                        <p>A casino is a facility for certain types of gambling. Casinos are often built combined with hotels, resorts,</p>
                    </div>
                    <p>Debitis ad dolor sint consequatur hic, facere est doloribustemp oribus in laborum similique saepe bland itiis odio nulla repellat dicta reprehenderit. Obcaecati, sed perferendis? Quam cum debitis odit recusandae dolor earum.</p>
                </div>
                <div class="col-lg-7 col-xl-7">
                    <div class="row gy-4 gy-md-5 gy-lg-4 gy-xl-5">
                        <div class="col-lg-6 col-sm-6">
                            <div class="why-item">
                                <div class="why-item__thumb">
                                    <i class="las la-shield-alt"></i>
                                </div>
                                <div class="why-item__content">
                                    <h4 class="title">Secure Games</h4>
                                    <p>Games available in most casinos are commonly called casino games. In a casino game. you will found options.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="why-item">
                                <div class="why-item__thumb">
                                    <i class="las la-dice-six"></i>
                                </div>
                                <div class="why-item__content">
                                    <h4 class="title">Awesome Game State</h4>
                                    <p>Games available in most casinos are commonly called casino games. In a casino game. you will found options.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="why-item">
                                <div class="why-item__thumb">
                                    <i class="las la-trophy"></i>
                                </div>
                                <div class="why-item__content">
                                    <h4 class="title">Higher Wining Chance</h4>
                                    <p>Games available in most casinos are commonly called casino games. In a casino game. you will found options.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="why-item">
                                <div class="why-item__thumb">
                                    <i class="las la-coins"></i>
                                </div>
                                <div class="why-item__content">
                                    <h4 class="title">Invest Win And Earn</h4>
                                    <p>Games available in most casinos are commonly called casino games. In a casino game. you will found options.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="<?php echo base_url() ?>assets/images/why/shape.png" alt="why" class="shape shape1">
        </div>
    </section>
    <!-- Why Choose Us Section Ends Here -->


    <!-- How Section Starts Here -->
    <section class="how-section padding-top padding-bottom bg_img" style="background: url(assets/images/how/bg2.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-header text-center">
                        <h2 class="section-header__title">How to Play Game</h2>
                        <p>A casino is a facility for certain types of gambling. Casinos are often built combined with hotels, resorts.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="how-item">
                        <div class="how-item__thumb">
                            <i class="las la-user-plus"></i>
                            <div class="badge badge--lg badge--round radius-50">01</div>
                        </div>
                        <div class="how-item__content">
                            <h4 class="title">Sign Up First & Login</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="how-item">
                        <div class="how-item__thumb">
                            <i class="las la-id-card"></i>
                            <div class="badge badge--lg badge--round radius-50">02</div>
                        </div>
                        <div class="how-item__content">
                            <h4 class="title">Complete you Profile</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="how-item">
                        <div class="how-item__thumb">
                            <i class="las la-dice"></i>
                            <div class="badge badge--lg badge--round radius-50">03</div>
                        </div>
                        <div class="how-item__content">
                            <h4 class="title">Choose a Game & Play</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How Section Ends Here -->


    <!-- Faq Section Starts Here -->
    <section class="faq-section padding-top padding-bottom overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-6">
                    <div class="section-header text-center">
                        <h2 class="section-header__title">Frequently Asked Questions</h2>
                        <p>A casino is a facility for certain types of gambling. Casinos are often built combined with hotels, resorts.</p>
                    </div>
                </div>
            </div>
            <div class="faq-wrapper row justify-content-between">
                <div class="col-lg-6">
                    <div class="faq-item">
                        <div class="faq-item__title">
                            <h5 class="title">01. How do I create Casine Account ?</h5>
                        </div>
                        <div class="faq-item__content">
                            <p>Autem ut suscipit, quibusdam officia, perferendis odio neque eius similique quae ipsum dolor voluptas sequi recusandae dolorem assumenda asperiores deleniti numquam iste fugit eligendi voluptates aliquam voluptate. Quas, magni excepturi ab, dolore explicabo  .</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-item__title">
                            <h5 class="title">01. How do I create Casine Account ?</h5>
                        </div>
                        <div class="faq-item__content">
                            <p>Autem ut suscipit, quibusdam officia, perferendis odio neque eius similique quae ipsum dolor voluptas sequi recusandae dolorem assumenda asperiores deleniti numquam iste fugit eligendi voluptates aliquam voluptate. Quas, magni excepturi ab, dolore explicabo  .</p>
                        </div>
                    </div>
                    
                    <div class="faq-item mb-2 mb-lg-0">
                        <div class="faq-item__title">
                            <h5 class="title">01. How do I create Casine Account ?</h5>
                        </div>
                        <div class="faq-item__content">
                            <p>Autem ut suscipit, quibusdam officia, perferendis odio neque eius similique quae ipsum dolor voluptas sequi recusandae dolorem assumenda asperiores deleniti numquam iste fugit eligendi voluptates aliquam voluptate. Quas, magni excepturi ab, dolore explicabo  .</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-item">
                        <div class="faq-item__title">
                            <h5 class="title">01. How do I create Casine Account ?</h5>
                        </div>
                        <div class="faq-item__content">
                            <p>Autem ut suscipit, quibusdam officia, perferendis odio neque eius similique quae ipsum dolor voluptas sequi recusandae dolorem assumenda asperiores deleniti numquam iste fugit eligendi voluptates aliquam voluptate. Quas, magni excepturi ab, dolore explicabo  .</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-item__title">
                            <h5 class="title">01. How do I create Casine Account ?</h5>
                        </div>
                        <div class="faq-item__content">
                            <p>Autem ut suscipit, quibusdam officia, perferendis odio neque eius similique quae ipsum dolor voluptas sequi recusandae dolorem assumenda asperiores deleniti numquam iste fugit eligendi voluptates aliquam voluptate. Quas, magni excepturi ab, dolore explicabo  .</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-item__title">
                            <h5 class="title">01. How do I create Casine Account ?</h5>
                        </div>
                        <div class="faq-item__content">
                            <p>Autem ut suscipit, quibusdam officia, perferendis odio neque eius similique quae ipsum dolor voluptas sequi recusandae dolorem assumenda asperiores deleniti numquam iste fugit eligendi voluptates aliquam voluptate. Quas, magni excepturi ab, dolore explicabo  .</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="<?php echo base_url() ?>assets/images/faq/shape.png" alt="faq" class="shape shape1">
        </div>
    </section>
    <!-- Faq Section Ends Here -->


    <!-- Top Investor & Winner Section Starts Here -->
    <section class="top-section padding-top padding-bottom bg_img" style="background:url(assets/images/top/bg.png) center">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-12">
                    <h3 class="part-title mb-4">Latest Winner</h3>
                    <div class="top-investor-slider">
                        <div class="investor-item">
                            <div class="investor-item__thumb">
                                <img src="<?php echo base_url() ?>assets/images/top/item1.png" alt="top">
                                <p class="amount">$150</p>
                            </div>
                            <div class="investor-item__content">
                                <h6 class="name">Munna Ahmed</h6>
                            </div>
                        </div>
                        <div class="investor-item">
                            <div class="investor-item__thumb">
                                <img src="<?php echo base_url() ?>assets/images/top/item2.png" alt="top">
                                <p class="amount">$270</p>
                            </div>
                            <div class="investor-item__content">
                                <h6 class="name">Fahad Bin</h6>
                            </div>
                        </div>
                        <div class="investor-item">
                            <div class="investor-item__thumb">
                                <img src="<?php echo base_url() ?>assets/images/top/item3.png" alt="top">
                                <p class="amount">$52000</p>
                            </div>
                            <div class="investor-item__content">
                                <h6 class="name">Rafuj Raiha</h6>
                            </div>
                        </div>
                        
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    <!-- Top Investor & Winner Section Ends Here -->


    


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