<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>  
	<title>Products</title>
	<!-- ========== top navigation Start ========== -->
	<?php require("component/head.php"); ?>
</head>

<body>
	<div id="layout-wrapper">
		<!-- ========== top navigation Start ========== -->
		<?php require("component/topnavbar.php"); ?>
		<!-- ========== Left Sidebar Start ========== -->
		<?php require("component/sidenavbar.php"); ?>


		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Home Page Banner</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- main content start here -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form id="formModal">
                                    <div class="card-header d-flex align-items-center">
                                        <!-- <h4 class="card-title">Contact us </h4> -->
                                        <p class="flex-space-1"></p>
                                        <a class="btn btn-primary" id="formSubmit">Submit</a>
                                        <!-- <a  id="alert-success" class="btn btn-primary btn-sm waves-effect waves-light">Click me</a> -->
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="row">

                                            <!-- updation ID -->
                                            <input type="text" id="content_id" name="content_id" hidden>
                                            <!-- updation ID -->

                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Title</label>
                                                        <input class="form-control" type="text" id="title" name="title" placeholder="Enter the home page title">
                                                        <h5 class="invalid-feedback title"></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mt-3 mt-lg-0">
                                                    <div class="mb-3">
                                                        <label for="example-color-input" class="form-label">Content</label>
                                                        <input class="form-control" type="text" id="content" name="content" placeholder="Enter the home page content">
                                                        <h5 class="invalid-feedback content"></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mt-3 mt-lg-0">
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Images</label>
                                                        <input type="file" class="form-control" id="image" name="image" accept=".png,.jpg,.jpeg,.gif" multiple>
                                                        <h5 class="invalid-feedback image"></h5>
                                                        <div id="uploaded_image" class="pt-3"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div> <!-- end col -->
                    </div>
                <!-- main content ends here -->

				</div>
			</div>
			<!-- End Page-content -->
		</div>

	</div>


	<!-- ========== Footer Start ========== -->
	<?php require("component/footer.php"); ?>
	<!-- custom banner script js -->
	<script src="<?php echo base_url(); ?>custom/homePageBanner.js"></script>
</body>

</html>
