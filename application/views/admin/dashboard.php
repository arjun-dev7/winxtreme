<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Dashboard</title>
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
								<h4 class="mb-sm-0 font-size-18">Dashboard</h4>
							</div>
						</div>
					</div>
					<!-- end page title -->

					<!-- main content start here -->
					
					<!-- main content ends here -->

				</div>
			</div>
			<!-- End Page-content -->
		</div>

	</div>


	<!-- ========== Footer Start ========== -->
	<?php require("component/footer.php"); ?>
</body>

</html>
