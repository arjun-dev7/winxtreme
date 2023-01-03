<!--== Start Header Wrapper ==-->
        <header class="header-wrapper">
            <div class="header-area">
                <div class="container">
                    <div class="row align-items-center justify-content-end">
                        <div class="col-xl-2 col-lg-2 col-4">
                            <div class="header-logo">
                                <a href="<?php echo base_url() ?>">
                                    <img class="logo-main" src="<?php echo base_url() ?>assets/images/new/livin_interiors_logo.png" width="150" height="25" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 d-none d-lg-block">
                            <div class="header-navigation">
                                <ul class="main-nav justify-content-end">
                                    <li class="main-nav-item"><a class="main-nav-link" href="<?php echo base_url() ?>">Home</a></li>
                                    <?php 
                                        if($this->session->userdata('user_name') == 'admin'){
                                    ?>
                                    <li class="main-nav-item"><a class="main-nav-link" href="<?php echo base_url() ?>LivinInteriors/Blog">Blog</a></li>

                                    <?php }  for ($a=0; $a < sizeof($menu); $a++) {  ?>
                                        <li class="main-nav-item has-submenu"><a class="main-nav-link"><?= $menu[$a]['category_name'] ?> <i class="icofont-rounded-down"></i> </a>
                                        <ul class="submenu-nav">
                                            <?php  for ($b=0; $b < sizeof($menu[$a]['sub']); $b++) { ?>
                                            <li class="submenu-nav-item"><a class="submenu-nav-link" href="<?php echo base_url() ?>LivinInteriors/category/<?= $menu[$a]['sub'][$b]['main_category_id'] ?>"> 
                                                <?= $menu[$a]['sub'][$b]['name'] ?> 
                                             </a></li>
                                            <?php  }   ?> 
                                        </ul>
                                    </li>
                                    <?php   }  ?> 
                                    <li  class="main-nav-item">
                                        <a class="main-nav-link" href="<?php echo base_url() ?>WinXtreme/destroy"> <i class="text-danger icofont-logout"></i></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-8">
                            <div class="header-action d-flex align-items-center justify-content-end">
                                <button class="mr25 btn-menu-two d-lg-none mr-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                    <i class="icofont-navigation-menu"></i>
                                </button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--== Start Side Menu ==-->
        <aside class="aside-side-menu-wrapper off-canvas-area offcanvas offcanvas-end pt-4" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
            <div class="offcanvas-header" data-bs-dismiss="offcanvas">
                <button type="button" class="btn-close"><i class="icofont-close-circled"></i></button>
            </div>
            <div class="offcanvas-body">
                <div class="header-logo">
                    <a href="<?php echo base_url() ?>">
                        <img class="logo-main" src="<?php echo base_url() ?>assets/images/new/logo.jpeg" width="150" height="25" alt="Logo">
                    </a>
                </div>
                <!-- Start Mobile Menu Wrapper -->
                <div class="res-mobile-menu">
                    <nav id="offcanvasNav" class="offcanvas-menu">
                        <ul>
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <?php 
                                if($this->session->userdata('user_name') == 'admin'){
                            ?>
                            <li><a href="<?php echo base_url() ?>LivinInteriors/Blog">Blog</a></li> 
 
                            <?php }  for ($a=0; $a < sizeof($menu); $a++) {  ?>
                            <li><a href="javascript:void(0)"><?= $menu[$a]['category_name'] ?></a>
                                <ul>
                                    <?php  for ($b=0; $b < sizeof($menu[$a]['sub']); $b++) { ?>
                                    <li><a href="<?php echo base_url() ?>LivinInteriors/category/<?= $menu[$a]['sub'][$b]['main_category_id'] ?>"> <?= $menu[$a]['sub'][$b]['name'] ?> </a></li> 
                                    <?php  }   ?> 
                                </ul>
                            </li>
                            <?php   }  ?> 
                        </ul>
                    </nav>
                </div>
            </div>
        </aside>
        <!--== Start Side Menu ==-->