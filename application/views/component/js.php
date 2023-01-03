 <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="<?php echo base_url() ?>assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/fancybox.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/jquery.sticky-sidebar.min.js"></script>
    <!-- Custom Main JS -->
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <script type="text/javascript">
    let timeout;
    var step = 'step1';
    // function myFunction() {
    //   timeout = setTimeout(alertFunc, 3500);
    // }
    alertFunc();

    function alertFunc() {
        if (step == 'step1') {
            $('.steps').removeClass('active');
            $('.step-1').addClass('active');
            $('.step-container-content').hide();
            $('.steps-1').show();
            step = 'step2';
            setTimeout(alertFunc, 3500);
        } else if (step == 'step2') {
            $('.steps').removeClass('active');
            $('.step-2').addClass('active');
            $('.step-container-content').hide();
            $('.steps-2').show();
            step = 'step3';
            // myFunction();
            setTimeout(alertFunc, 3500);
        } else {
            $('.steps').removeClass('active');
            $('.step-3').addClass('active');
            $('.step-container-content').hide();
            $('.steps-3').show();
            step = 'step1';
            // myFunction();
            setTimeout(alertFunc, 3500);
        }
    }
    </script>