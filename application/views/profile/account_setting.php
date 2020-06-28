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
          <h6 class="card-title">Account Settings</h6>
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
						<form action="<?php echo site_url() . $url; ?>" method="post">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" value="<?php echo !empty($userdata['value']['username'])?$userdata['value']['username']:'';?>" readonly="readonly" class="form-control">
												</div>
                                                <div class="col-md-6">
													<label>New password</label>
													<input type="password" placeholder="Enter new password" name="password" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Repeat password</label>
													<input type="password" placeholder="Repeat new password" name="confirm_password" class="form-control">
												</div>
											</div>
										</div>

										

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary legitRipple">Save changes</button>
				                        </div>
			                        </form>
								</div>
      </div>
      <!-- /Main Form --> 
      
    </div>
    <!-- /content area --> 
