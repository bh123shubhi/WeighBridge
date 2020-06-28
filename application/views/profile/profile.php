    <!-- Page header -->
    <div class="page-header page-header-light">
      <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
          <div class="breadcrumb"> <a href="<?php echo base_url(); ?>dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <span class="breadcrumb-item active">Profile</span> </div>
          <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
      </div>
    </div>
    <!-- /page header --> 
     <!-- Content area -->
     <div class="content"> 
      <!-- Main Form -->
      <div class="card">
        <div class="card-header bg-white header-elements-inline">
          <h6 class="card-title">Profile Information</h6>
          <div class="header-elements">
            <div class="list-icons"> <a class="list-icons-item" data-action="collapse"></a> <a class="list-icons-item" data-action="reload"></a> </div>
          </div>
        </div>
        <div class="card-body">
				<div class="container-fluid">
                <?php
                if (isset($this->session->flashdata('temp_data')['color']) || isset($this->session->flashdata('temp_data')['msg']) || !empty(validation_errors())) {
                    $color = $this->session->flashdata('temp_data')['color'];
                    $msg = $this->session->flashdata('temp_data')['msg'];
                    ?>
                    <div class="<?php echo $color; ?>" <?php if (!empty($color) && !empty($msg))  ?>>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>                
                        <?php echo validation_errors(); ?>
                        <?php echo $msg; ?>
                    </div>
                <?php } ?>
            </div>
									<form action="<?php echo site_url() . $url; ?>" method="post" _lpchecked="1" enctype="multipart/form-data">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>First Name</label>
													<input type="text" name="fname"  class="form-control" value="<?php echo isset($userdata['value']['first_name'])?$userdata['value']['first_name']:'';?>" disabled>
												</div>
												<div class="col-md-6">
													<label>Last name</label>
													<input type="text" name="lname" class="form-control" value="<?php echo isset($userdata['value']['last_name'])?$userdata['value']['last_name']:'';?>" disabled>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label>Address line</label>
													<input type="text" name="address"  class="form-control" value="<?php echo isset($userdata['value']['address'])?$userdata['value']['address']:'';?>" disabled>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>State/Province</label>
													<input type="text" name="state"  class="form-control" value="<?php echo isset($userdata['value']['state'])?$userdata['value']['state']:'';?>" disabled>
												</div>
												<div class="col-md-4">
													<label>City</label>
													<input type="text" name="city" class="form-control" value="<?php echo isset($userdata['value']['city'])?$userdata['value']['city']:'';?>" disabled>
												</div>
												<div class="col-md-4">
													<label>ZIP code</label>
													<input type="text"  class="form-control" value="<?php echo isset($userdata['value']['pincode'])?$userdata['value']['pincode']:'';?>" disabled>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Email</label>
													<input type="email"  name="profile_email_id" id="profile_email_id" value="" Placeholder="Enter Email Id" class="form-control" >
												</div>
												<div class="col-md-6">
						                            <label>Phone #</label>
													<input type="text" id="contact_no" name="contact_no" value="<?php echo isset($userdata['value']['contact_no'])?$userdata['value']['contact_no']:'';?>" class="form-control">
													<span class="form-text text-muted"><?php echo isset($userdata['value']['contact_no'])?$userdata['value']['contact_no']:'';?></span>
												</div>
											</div>
										</div>

				                        <div class="form-group">
				                        	<div class="row">
				              						<div class="col-md-12">
													<label>Upload profile image</label>
				                                    <div class="uniform-uploader"><input type="file" name="profile_pic" class="form-input-styled" data-fouc="" size = "20"><span class="filename" style="user-select: none;">No file selected</span><span class="action btn bg-warning legitRipple" style="user-select: none;">Choose File</span></div>
				                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
				                        	</div>
				                        </div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary legitRipple" id="saveprofile">Save changes</button>
				                        </div>
									</form>
								</div>
      </div>
      <!-- /Main Form --> 
      
    </div>
    <!-- /content area --> 
