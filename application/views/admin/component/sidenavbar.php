
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu">Menu</li>

            <!-- Settings menu -->
            
            <?php if($this->session->userdata('user_type_admin') == "true" && $this->session->userdata('user_type_settings') == "true") { ?>
            
            <li id="menu_settings">
                <a href="<?php echo base_url();?>admin/Controlbase/Settings">
                    <i data-feather="home"></i>
                    <span data-key="t-dashboard">Settings</span>
                </a>
            </li>
            <?php } ?>

            <!-- dashboard menu -->
            <li id="menu_dashboard">
                <a href="<?php echo base_url();?>admin/Controlbase/Dashboard">
                    <i data-feather="home"></i>
                    <span data-key="t-dashboard">Dashboard</span>
                </a>
            </li>
            <!-- dashboard menu -->

       
            <!-- contact menu -->

            <!-- category menu -->
            <li id="menu_project">
                <a href="<?php echo base_url();?>admin/Controlbase/mainCategory">
                    <i data-feather="archive"></i>
                    <span data-key="t-dashboard">Main Category</span>
                </a>
            </li>
              <li id="menu_project">
                <a href="<?php echo base_url();?>admin/Controlbase/category">
                    <i data-feather="archive"></i>
                    <span data-key="t-dashboard">Sub Category</span>
                </a>
            </li>
            <!-- category menu -->
            
            <!-- Product menu -->
            <li id="menu_project">
                <a href="<?php echo base_url();?>admin/Controlbase/Product">
                    <i data-feather="box"></i>
                    <span data-key="t-dashboard">Products</span>
                </a>
            </li>
            <!-- Product menu -->

            <!-- Footer menu -->
            <li id="menu_footer">
                <a href="<?php echo base_url();?>admin/Controlbase/Blog">
                    <i data-feather="info"></i>
                    <span data-key="t-dashboard">Blog</span>
                </a>
            </li>
            <!-- Footer menu -->

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->