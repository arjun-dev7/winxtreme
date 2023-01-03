<div class="modal custom-modal fade bank-details" id="Enquire" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" >
        <div class="modal-content"> 
            <div class="modal-body">
            <div class="bank-inner-details"> 
                <div class="row">
                    <div class="col-lg-6" id="contact-pop-img">
                        <img src="<?php echo base_url() ?>assets/img/join-3.png" class="inquire_img">
                    </div> 
                    <div class="col-lg-6"> 
                        <div class="account-content">
                        <div class="account-box">
                            <div class="login-right">
                                <div class="login-header">
                                <h3>
                                    <span> Ready to transform </span>your career?
                                </h3>
                                </div>
                                <form id="dataform_Form_model">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Full Name</label>
                                        <input id="first-name" type="text" class="form-control" name="name" autofocus="">
                                        <span class="error first_name"></span>
                                    </div>
                                    </div> 
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label">Programme Name </label>
                                    <select class="form-control" id="programme" name="programme_id"> 
                                    <option value="">--  Select programme -- </option>
                                    <?php if(isset($programListData[0])){
                                    for($i=0;$i<sizeof($programListData);$i++){ ?>
                                            <option><?php echo $programListData[$i]['programme_name']; ?></option>
                                    <?php } 
                                    } ?> 
                                    </select>
                                        <span class="error programme"></span>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                        <span class="error email"></span>
                                </div> 
                                <div class="form-group">
                                    <label class="form-control-label">Mobile Number</label>
                                    <input id="mobile_number" type="mobile_number" class="form-control" name="phone_number">
                                    <span class="error mobile_number"></span>
                                </div> 

                                <button class="btn btn-primary login-btn mb-2" type="button" id="submit"> SUBMIT </button>
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="w100 btn bg-secondary me-2 text-white">Close</a>
                                </form>
                            </div>
                        </div> 
                        </div>


                    </div> 
                </div> 
            </div> 
            </div> 
        </div>
    </div>
</div>