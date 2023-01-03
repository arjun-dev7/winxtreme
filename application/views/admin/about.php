<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>About</title>
	<!-- ========== top navigation Start ========== -->
	<?php require("component/head.php"); ?>
	<!-- color picker css -->
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/%40simonwep/pickr/themes/classic.min.css"/>  -->
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
								<h4 class="mb-sm-0 font-size-18">About</h4>
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

											<div class="col-lg-6">
												<div>
													<div class="mb-3">
														<label for="example-text-input" class="form-label">Mission</label>
														<textarea class="form-control" name="mission" id="mission" rows="4"></textarea>
														<h5 class="invalid-feedback mission"></h5>
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="mt-3 mt-lg-0">
													<div class="mb-3">
														<label for="example-color-input" class="form-label">Vision</label>
														<textarea class="form-control" name="vision" id="vision" rows="4"></textarea>
														<h5 class="invalid-feedback vision"></h5>
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="mt-3 mt-lg-0">
													<div class="mb-3">
														<label for="example-color-input" class="form-label">Value</label>
														<textarea class="form-control" name="value" id="value" rows="4"></textarea>
														<h5 class="invalid-feedback value"></h5>
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

	<!-- custom js -->
	<script src="<?php echo base_url();?>custom/about.js"></script>
</body>

</html>
