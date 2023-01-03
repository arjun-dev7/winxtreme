<!DOCTYPE html>
<html class="no-js" lang="en">

<!--== Head Start ==-->
<?php require('component/head.php') ?>
<body> 
    <div class="wrapper"> 
    
        <!--== Header Start ==-->
        <?php require('component/header.php') ?>

        <main class="main-content">
           
       
 
                <div class="container">  
                    <div class="product-banner-item">
                        <div class="product-banner-thumb">
                            <img src="<?= $product['banner'][0]['image'] ?>" width="360" height="370" alt="Image-HasTech">
                        </div>
                        <div class="product-banner-content">
                            <h2 class="product-custom-title"> <?= $product['banner'][0]['name'] ?> </h2>
                        </div>
                    </div>
                 </div>

            <!--== Start Product Area Wrapper ==-->
            <div class="product-area section-space">
                <div class="container">
                    <!--== Start Product Top Bar Area Wrapper ==--> 
                     

                    <!--== End Product Top Bar Area Wrapper ==-->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="column-three">
                            <div class="row">

                                <?php 
                                    for ($a=0; $a < sizeof($product['product']); $a++) { 
                                ?> 

                                     <div class="col-sm-6 col-lg-4 mb-6 all  "> 
                                        <div id="<?= $product['product'][$a]['product_id'] ?>"  class="product-item showpopup" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#QuickViewModal">
                                            <div class="product-item-thumb-wrap">
                                                <a class="product-item-thumb">
                                                    <img src="<?php echo base_url() ?>/<?= $product['product'][$a]['product_image'] ?>" width="268" height="313" alt="Image-HasTech">
                                                </a>  
                                            </div>
                                            <div class="product-item-info">
                                                <h5 class="product-item-title"><p> <?= $product['product'][$a]['product_name'] ?> </p></h5> 
                                            </div>
                                        </div> 
                                    </div>

                                <?php
                                    }
                                ?>
                                

                             

 
                            </div>
                        </div> 

                    </div>
                </div>
            </div> 

        </main>


        <aside class="product-cart-view-modal modal fade" id="QuickViewModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-quick-view-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"><span>×</span></button>
                            <div class="row row-gutter-0">
                                <div class="col-lg-6">
                                    <div class="single-product-slider">
                                        <div class="single-product-thumb">
                                            <div class="popupbox swiper single-product-quick-view-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="thumb-item">
                                                            <img class="product-image" src="<?php echo base_url() ?>assets/images/shop/details/single-product-1.jpg" width="600" height="700" alt="Image-HasTech">
                                                        </div>
                                                    </div> 
                                                </div>
                                                <!-- Add Arrows -->
                                                <div id="next" class="swiper-button-next next_product showpopup"></div>
                                                <div id="prev" class="swiper-button-prev prev_product showpopup"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div id="first-page" class="single-product-content">
                                        <h3 class="single-product-title">  </h3>
                                        <p class="single-product-info">   </p> 
                                        <!-- <button id="gotopage2" class="estimate-btn pr-4 pl-4"> BOOK FREE DESIGN SESSION </button> -->

                                        <hr>

                                        <h4 class="fwb">Key Features</h4>

                                        <p class="key_features"></p>

                                        <hr>

                                        <div class="social-share">
                                            <h4 class="fwb">Related Designs</h4>
                                            <div class="row" id="append-related">  </div>
                                        </div> 
                                    </div>

                                    <div id="second-page" class="single-product-content text-center">
                                            <div class="form-box">
                                                <img class="mb-4" src="<?php echo base_url() ?>assets/images/bg-form.jpg">
                                                <h4 class="fwb mb-3 flex-1">Our designer will call you to help with your interior requirements</h4>
                                                <form>
                                                    <input type="text" name="name" placeholder="Enter your name">
                                                    <input type="text" name="name" placeholder="Enter your email">
                                                    <input type="text" name="name" placeholder="Enter your mobile number">
                                                    <button class="estimate-btn mt-4"> BOOK FREE DESIGN SESSION </button>
                                                </form>
                                            </div>

                                            <button id="gotopage1" class="estimate-btn-2 pr-4 pl-4"> Show Product Info </button>


                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Product Quick View Modal ==-->

        <!--== Footer Start ==-->
       <?php require('component/footer.php') ?>

    </div>
        <!--== Js Start ==-->
       <?php require('component/js.php') ?>
    <script src="<?php echo base_url() ?>custom/category_view.js"></script>
   
</body>

</html>