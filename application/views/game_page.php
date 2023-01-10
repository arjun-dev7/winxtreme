
<!DOCTYPE html>
<html lang="en">
 
    <?php require('component/head.php') ?>
    <style>
        .game-score{
            box-shadow: -3.828px -3.828px 6px 0px rgb(255 200 39 / 12%), 3px 5px 8px 0px rgb(255 82 1 / 21%);
            text-align: center;
        }
    </style>
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


  <section class="padding-top padding-bottom">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6">
                    <div class="game-details-left">
                        <h1 id="timer">30</h1>
                        <div class="cd-ft"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="game-details-right">
                        <form id="game" novalidate="novalidate">


                                <div class="row mtfont">
                                    <div class="col-6">
                                        <h3 class="mb-4 text-center">Current Balance  <span class="base--color">Rs. <span class="user_balance">100</span></span></h3>
                                    </div>
                                    <div class="col-6">
                                        <h3 class="mb-4 text-center">Game Amount   <span class="base--color">Rs. <span class="game_amount">0</span></span></h3>
                                    </div>
                                </div> 



                            <div class="form-group justify-content-center d-flex flex-wrap justify-content-between">
                                <div class="row">
                                    <div class="col-4 single-select game-side head gmimg active" data-active="rock">
                                        <img src="<?= base_url() ?>assets/images/game/rock.png" alt="game-image">
                                        <p class="game-score"> <span class="rock">0</span>  <span data-key="rock" class="close_btn">x</span>  </p>
                                    </div>
                                    <div class="col-4 single-select game-side tail gmimg" data-active="paper">
                                        <img src="<?= base_url() ?>assets/images/game/paper.png" alt="game-image">
                                        <p class="game-score"><span class="paper">0</span>  <span data-key="paper" class="close_btn">x</span> </p>
                                    </div>
                                    <div class="col-4 single-select game-side tail gmimg" data-active="scissor">
                                        <img src="<?= base_url() ?>assets/images/game/scissor.png" alt="game-image">
                                        <p class="game-score"><span class="scissor">0</span>  <span data-key="scissor" class="close_btn">x</span> </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group mt-sm-5 justify-content-center d-flex flex-wrap justify-content-between">
                                <div class="row">
                                    <!-- <div class="col-1"></div> -->
                                    <div class="col-7 single-select head coin gmimg" data-value="10">
                                        <img src="<?= base_url() ?>assets/images/game/10rps.png" alt="game-image">
                                    </div>
                                    <div class="col-7 single-select tail coin gmimg" data-value="50">
                                        <img src="<?= base_url() ?>assets/images/game/50rps.png" alt="game-image">
                                    </div>
                                    <div class="col-7 single-select tail coin gmimg" data-value="100">
                                        <img src="<?= base_url() ?>assets/images/game/100rps.png" alt="game-image">
                                    </div>
                                    <div class="col-7 single-select head coin gmimg" data-value="500">
                                        <img src="<?= base_url() ?>assets/images/game/500rps.png" alt="game-image">
                                    </div>
                                    <div class="col-7 single-select head coin gmimg" data-value="1000">
                                        <img src="<?= base_url() ?>assets/images/game/1000rps.png" alt="game-image">
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row mt-4">
                                <div class="col-md-6 col-6 text-center"> <span class="mt-3 btn btn-link btn--sm radius-5"> Winner - 1.90x </span> </div>
                                <div class="col-md-6 col-6 text-center"> <span class="mt-3 btn btn-link btn--sm radius-5"> Runner - 0.50x </span> </div>
                            </div>

                            <div class="mt-5 text-center">
                              
                                <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="mt-3 btn btn-link btn--sm radius-5">Game Instruction <i class="las la-info-circle"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Game Section Starts Here -->
    <section class="game-section padding-top padding-bottom bg_img" style="background: url(assets/images/game/bg3.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="section-header text-center">
                        <h2 class="section-header__title">You may Also Like</h2>
                        <p>Id temporibus blanditiis culpa laborum debitis ex et libero corrupti, recusandae ab voluptate? Magni, impedit.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
                    <div class="game-item">
                        <div class="game-inner">
                            <div class="game-item__thumb">
                                <img src="<?= base_url() ?>assets/images/game/item1.png" alt="game">
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
                                <img src="<?= base_url() ?>assets/images/game/item3.png" alt="game">
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
                                <img src="<?= base_url() ?>assets/images/game/item4.png" alt="game">
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


    <div class=" modal custom--modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content section-bg border-0">
                <div class="modal-header modal--header bg--base">
                    <h4 class="modal-title text-dark" id="exampleModalLongTitle">Game Rules</h4>
                </div>
                <div class="modal-body modal--body">
                    <h3 class="title mb-2">Before Game Start: </h3>
                    <p>Officia quod velit eaque tempore assumenda, blanditiis corporis praesentium voluptate provident. Sunt enim obcaecati odio doloremque molestiae aspernatur fuga eveniet molestias autem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ipsam sapiente aut est nostrum, labore quibusdam aliquid repellendus dignissimos consequuntur aspernatur voluptates consectetur aliquam quam nesciunt impedit? Vitae blanditiis vero officiis quidem ipsum esse! Praesentium, laudantium numquam! Corporis sed adipisci, incidunt aut, accusamus sit, nihil tenetur ipsam quaerat optio nisi?</p>
                </div>
                <div class="modal-footer modal--footer">
                    <button type="button" class="btn btn--danger btn--md" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


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
<script src="<?php echo base_url() ?>custom/game_page.js"></script>  
</body>

</html>