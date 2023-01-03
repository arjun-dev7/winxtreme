
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
<section class="inner-banner bg_img" style="background: url('<?php echo base_url() ?>assets/images/inner-banner/bg2.jpg') top;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-xl-6 text-center">
        <h2 class="title text-white">User Dashboard</h2>
        <ul class="breadcrumbs d-flex flex-wrap align-items-center justify-content-center">
          <li><a href="<?php echo base_url() ?>WinXtreme/home">Home</a></li>
          <li>Dashboard</li>
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
                                <span class="fs-sm">Welcome</span>
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
                                <a href="<?php echo base_url() ?>WinXtreme/depositlogs">Deposit History</a>
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
                    <div class="row justify-content-center g-4">
                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-10">
                            <div class="dashboard__card">
                                <div class="dashboard__card-content">
                                    <h2 class="price">$3750</h2>
                                    <p class="info">TOTAL BALANCE</p>
                                    <a href="#0" class="view-btn">View All</a>
                                </div>
                                <div class="dashboard__card-icon">
                                    <i class="las la-wallet"></i>
                                </div>
                            </div>
                        </div>
                        
                    <div class="table--responsive--md mt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>transaction ID</th>
                                    <th>transaction Type</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="trx-id" data-label="transaction ID">#481XV93NCKD0</td>
                                    <td class="trx-type" data-label="transaction Type">Withdraw</td>
                                    <td class="date" data-label="Date">12 Mar, 21 at 12:30 AM</td>
                                    <td class="amount" data-label="Amount">$150.50</td>
                                </tr>
                                <tr>
                                    <td class="trx-id" data-label="transaction ID">#V93N481XCKD0</td>
                                    <td class="trx-type" data-label="transaction Type">Deposit</td>
                                    <td class="date" data-label="Date">12 Mar, 21 at 12:30 AM</td>
                                    <td class="amount" data-label="Amount">$500.50</td>
                                </tr>
                                <tr>
                                    <td class="trx-id" data-label="transaction ID">#1XCKD0V93N48</td>
                                    <td class="trx-type" data-label="transaction Type">Deposit</td>
                                    <td class="date" data-label="Date">12 Mar, 21 at 12:30 AM</td>
                                    <td class="amount" data-label="Amount">$350.50</td>
                                </tr>
                                <tr>
                                    <td class="trx-id" data-label="transaction ID">#V981XCKD03N4</td>
                                    <td class="trx-type" data-label="transaction Type">Withdraw</td>
                                    <td class="date" data-label="Date">12 Mar, 21 at 12:30 AM</td>
                                    <td class="amount" data-label="Amount">$250.50</td>
                                </tr>
                                <tr>
                                    <td class="trx-id" data-label="transaction ID">#481XV93NCKD0</td>
                                    <td class="trx-type" data-label="transaction Type">Deposit</td>
                                    <td class="date" data-label="Date">12 Mar, 21 at 12:30 AM</td>
                                    <td class="amount" data-label="Amount">$150.50</td>
                                </tr>
                                <tr>
                                    <td class="trx-id" data-label="transaction ID">#V93N481XCKD0</td>
                                    <td class="trx-type" data-label="transaction Type">Withdraw</td>
                                    <td class="date" data-label="Date">12 Mar, 21 at 12:30 AM</td>
                                    <td class="amount" data-label="Amount">$500.50</td>
                                </tr>
                                <tr>
                                    <td class="trx-id" data-label="transaction ID">#1XCKD0V93N48</td>
                                    <td class="trx-type" data-label="transaction Type">Deposit</td>
                                    <td class="date" data-label="Date">12 Mar, 21 at 12:30 AM</td>
                                    <td class="amount" data-label="Amount">$350.50</td>
                                </tr>
                                <tr>
                                    <td class="trx-id" data-label="transaction ID">#V981XCKD03N4</td>
                                    <td class="trx-type" data-label="transaction Type">Withdraw</td>
                                    <td class="date" data-label="Date">12 Mar, 21 at 12:30 AM</td>
                                    <td class="amount" data-label="Amount">$250.50</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Section Ends Here -->


    <!-- Footer Section Starts Here -->
<footer class="footer-section bg_img" style="background: url(<?php echo base_url() ?>assets/images/footer/bg.jpg) center;">
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