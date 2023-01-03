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
								<h4 class="mb-sm-0 font-size-18">Products</h4>
								<p class="flex-space-1"></p>
								<a class="btn btn-primary" id="addNew">Add Product</a>
							</div>
						</div>
					</div>
					<!-- end page title -->
					<!-- main content start here -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
										<thead>
											<tr>
												<th width="5%">S.No</th>
                                                <th width="10%">Category Name</th>
                                                <th width="10%"> Name</th>
                                                <th width="10%"> Description</th>
                                                <th width="10%"> Key features</th>
                                                <th width="10%">Product Image</th>
                                                <th width="10%">Action</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>

								</div>
							</div>
						</div> <!-- end col -->
					</div>
					<!-- main content ends here -->


					<!-- sample modal content -->
                    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModal">Product Form</h5>
                                </div>
                                <form id="formModal">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <!-- Category  -->
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Category Titles</label>
                                                        <select class="form-control" id="main_category_id" name="main_category_id">
                                                            <option value="">--Select Category title--</option>
                                                        </select>
                                                    <h5 class="invalid-feedback main_category_id"></h5>
                                                </div>

                                                <!-- Product Name -->
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Product Name</label>
                                                    <input class="form-control" type="text" id="product_name" name="product_name" placeholder="Enter the product name..!">
                                                    <h5 class="invalid-feedback product_name"></h5>
                                                </div>

                                                <!-- Product info  -->
                                                <div class="mb-3">
                                                    <label for="example-color-input" class="form-label">Product Discription</label>
                                                    <textarea id="product_info" name="product_info" class="form-control"></textarea>
                                                    <h5 class="invalid-feedback product_info"></h5>
                                                </div>

                                                <!-- Size Name -->
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Key Features</label>
                                                    <textarea id="key_features" name="key_features" class="form-control"></textarea>
                                                    <h5 class="invalid-feedback key_features"></h5>
                                                </div> 

                                                <!-- product image  -->
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Images</label>
                                                    <input type="file" class="form-control" id="product_image" name="product_image" accept=".png,.jpg,.jpeg,.gif" multiple>
                                                    <h5 class="invalid-feedback product_image"></h5>
                                                    <div id="uploaded_image"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" id="formSubmit">Save </button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

					<!-- services image modal content -->
                    <div id="projectImgModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Product image</h5>
                                </div>
                                <form>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="projectImgView" class="text-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

				</div>
			</div>
			<!-- End Page-content -->
		</div>

	</div>


	<!-- ========== Footer Start ========== -->
	<?php require("component/footer.php"); ?>
	<!-- custom banner script js -->
	<script src="<?php echo base_url(); ?>custom/product.js"></script>  
</body>

</html>
