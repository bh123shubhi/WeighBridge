<!-- Page header -->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb"> <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <span class="breadcrumb-item ">Operator List</span> <span class="breadcrumb-item active"> Add Operator </span> </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
    </div>
</div>
<!-- /page header --> 
<?php
$heading=isset($result['value']['id'])?'Edit Admin':'Add Admin';
?>
<!-- Content area -->
<div class="content"> 

    <!-- Main Form -->
    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            <h6 class="card-title"><?php echo $heading; ?></h6>
            <div class="header-elements">
                <div class="list-icons"> <a class="list-icons-item" data-action="collapse"></a> <a class="list-icons-item" data-action="reload"></a> </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <?php if (isset($this->session->flashdata('temp_data')['color']) || isset($this->session->flashdata('temp_data')['msg']) || !empty(validation_errors())) {$color = $this->session->flashdata('temp_data')['color'];$msg=$this->session->flashdata('temp_data')['msg']; ?>
                    <div class="<?php echo $color; ?>" <?php if (!empty($color) && !empty($msg))  ?>>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>                
                        <?php echo validation_errors(); ?>
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>
                </div>
                <form class="" name="save_admin" action="<?php echo site_url('master') . $url; ?>" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="fname" placeholder="Enter First Name" value="<?php echo isset($result['value']['fname']) ? $result['value']['fname'] : ''; ?>" required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" value="<?php echo isset($result['value']['lname']) ? $result['value']['lname'] : ''; ?>" required>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Landfill Site ID</label>
                            <input class="form-control" type="text" name="lfsid" placeholder="Enter Landfill Site ID" value="<?php echo isset($result['value']['lfsid']) ? $result['value']['lfsid'] : ''; ?>" required>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Telephone No. / Mobile No.</label>
                            <input class="form-control" type="text" name="mob" placeholder="Enter Contact No." value="<?php echo isset($result['value']['mob']) ? $result['value']['mob'] : ''; ?>" required>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Valid Till</label>
                            <input type="text" class="form-control pickadate-accessibility" placeholder="Enter Registration Date&hellip;" name="validity" value="<?php echo isset($result['value']['validity']) ? date('d M,Y',strtotime($result['value']['validity'])) : ''; ?>" required>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" placeholder="Enter Addreess"  value="<?php echo isset($result['value']['address']) ? $result['value']['address'] : ''; ?>" required>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="state" placeholder="Enter State" value="<?php echo isset($result['value']['state']) ? $result['value']['state'] : ''; ?>" required>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city" placeholder="Enter City" value="<?php echo isset($result['value']['city']) ? $result['value']['city'] : ''; ?>" required>
                        </div>

                    </div>	
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Pin Code</label>
                            <input class="form-control" type="text" name="pin" placeholder="Enter Pin Code"  value="<?php echo isset($result['value']['pin']) ? $result['value']['pin'] : ''; ?>" required>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" id="admin_username" placeholder="Enter Unique Username" value="<?php echo isset($result['value']['username']) ? $result['value']['username'] : ''; ?>" required>
                            <p id="username_text" style="color:red">UserName Already Exists</p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="pass" placeholder="Enter Password"  value="<?php echo isset($result['value']['pass']) ? $result['value']['pass'] : ''; ?>" required>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="cpass" placeholder="Confirm Password" value="<?php echo isset($result['value']['cpass']) ? $result['value']['cpass'] : ''; ?>" required>
                        </div>

                    </div>	
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary legitRipple" id="admin_submit">Submit <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Main Form --> 

</div>
<!-- /content area --> 


