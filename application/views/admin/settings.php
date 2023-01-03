<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Settings</title>
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
								<h4 class="mb-sm-0 font-size-18">Settings</h4>
							</div>
						</div>
					</div>
					<!-- end page title -->

					<!-- main content start here -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<form id="settingsForm">
									<div class="card-header d-flex align-items-center">
										<h4 class="card-title">Customize Admin Panel </h4>
										<p class="flex-space-1"></p>
										<a class="btn btn-primary" id="submitSettingsForm">Submit</a>
										<!-- <a  id="alert-success" class="btn btn-primary btn-sm waves-effect waves-light">Click me</a> -->
									</div>
									<div class="card-body p-4">
										<div class="row">
											<div class="col-lg-6">
												<div>
													<div class="mb-3">
														<label for="example-text-input" class="form-label">Project Name</label>
														<input class="form-control" type="text" id="projectName" name="projectName" placeholder="Enter project name">
														<h5 class="invalid-feedback projectName"></h5>
													</div>
													<div class="mb-3">
														<label for="example-color-input" class="form-label">Color picker</label>
														<!-- <div class="classic-colorpicker" id="colorCode" name="colorCode"></div> -->
														<input class="form-control" type="text" id="colorCode" name="colorCode" placeholder="Enter color code">
														<h5 class="invalid-feedback colorCode"></h5>
													</div>
													<h5 class="font-size-14 mb-3"> Page Access </h5>
													<div class="row">
													<div class="col-lg-6">
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_dashboard" name="settings_dashboard">
															<label class="form-check-label" for="settings_dashboard">
																Dashboard
															</label>
														</div>
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_about" name="settings_about">
															<label class="form-check-label" for="settings_about">
																About us
															</label>
														</div>
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_contact" name="settings_contact">
															<label class="form-check-label" for="settings_contact">
																Contact us
															</label>
														</div>
														<!-- Brands//JW -->
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_brands" name="settings_brands">
															<label class="form-check-label" for="settings_brands">
																Brands
															</label>
														</div>
														<!-- Brands -->
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_project" name="settings_project">
															<label class="form-check-label" for="settings_project">
																Products
															</label>
														</div>
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_solution" name="settings_solution">
															<label class="form-check-label" for="settings_solution">
																Solutions
															</label>
														</div>
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_category" name="settings_category">
															<label class="form-check-label" for="settings_category">
																Categories
															</label>
														</div>
														<!-- <div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_services" name="settings_services">
															<label class="form-check-label" for="settings_services">
																Services
															</label>
														</div> -->
														<!-- <div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_product" name="settings_product">
															<label class="form-check-label" for="settings_product">
																Product
															</label>
														</div> -->
													</div>
													<div class="col-lg-6">
														<!-- <div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_gallery" name="settings_gallery">
															<label class="form-check-label" for="settings_gallery">
																Gallery
															</label>
														</div>
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_subGallery" name="settings_subGallery">
															<label class="form-check-label" for="settings_subGallery">
																Sub Gallery
															</label>
														</div> -->
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_banner" name="settings_banner">
															<label class="form-check-label" for="settings_banner">
																Banner
															</label>
														</div>
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_client" name="settings_client">
															<label class="form-check-label" for="settings_client">
																Clients
															</label>
														</div>
														<div class="form-check mb-3">
															<input class="form-check-input" type="checkbox" id="settings_testimonial" name="settings_testimonial">
															<label class="form-check-label" for="settings_testimonial">
																Testimonial
															</label>
														</div>
													</div>
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="mt-3 mt-lg-0">
													<div class="mb-3">
														<label for="example-text-input" class="form-label">Logo</label>
														<input class="form-control" type="file" id="projectLogo" name="projectLogo">
														<h5 class="invalid-feedback projectLogo"></h5>
														<img src="" id="user_uploaded_image" alt="Logo" width="100px" style="padding-top: 15px; display:none;">
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
	<!-- color picker js -->
	<!-- <script src="<?php echo base_url();?>assets/libs/%40simonwep/pickr/pickr.min.js"></script> -->
	<!-- <script src="<?php echo base_url();?>assets/libs/%40simonwep/pickr/pickr.es5.min.js"></script> -->
	<!-- init js -->
	<!-- <script src="<?php echo base_url();?>assets/js/pages/form-advanced.init.js"></script> -->
	<!-- custom js -->
	<!-- <script src="<?php echo base_url();?>custom/settings.js"></script> -->
</body>

</html>
