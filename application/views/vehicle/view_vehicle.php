<!-- Page header -->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb"> <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <span class="breadcrumb-item ">MCD Owned Vehicle List</span> <span class="breadcrumb-item active"> Add MCD Owned Vehicle </span> </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
    </div>
</div>
<!-- /page header --> 
<!-- Content area -->
<div class="content"> 

    <!-- Main Form -->
    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            <h6 class="card-title">View Vehicle</h6>
            <div class="header-elements">
                <div class="list-icons"> <a class="list-icons-item" data-action="collapse"></a> <a class="list-icons-item" data-action="reload"></a> </div>
            </div>
        </div>
        <div class="card-body">
            <form class="" action="" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Registration No. <span class="text-danger">*</span></label>
                            <input class="form-control text-uppercase" type="text" name="registration_no" placeholder="Registration No." value="<?php echo isset($result['vehicle_no']) ? $result['vehicle_no'] : ''; ?>" readonly required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Slip No:</label>
                            <input type="text" class="form-control" name="slipno" placeholder="Slip No" value="<?php echo isset($result['slipno']) ? $result['slipno'] : ''; ?>" readonly required>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fleet Operator/Agency Name:</label>
                            <input type="text" class="form-control" name="fleet_agency" placeholder="Fleet Operator/Agency" value="<?php echo isset($result['fleet_agency_name']) ? $result['fleet_agency_name'] : ''; ?>" readonly required>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                            <label>Zone Coming From:</label>
                            <input type="text" class="form-control" name="zone_coming_from" placeholder="Zone Coming From" value="<?php echo isset($result['zone_coming_from']) ? $result['zone_coming_from']: ''; ?>" readonly required>
                     </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                            <label>Entry Type:</label>
                            <input type="text" class="form-control" name="entry_type" placeholder="Entry Type" value="<?php echo isset($result['entry_type']) ? $result['entry_type'] : ''; ?>" readonly required>
                    </div>
                </div>
                   
                <div class="col-md-4">
                    <div class="form-group">
                            <label>Garbage Category</label>
                            <input class="form-control" type="text" name="garbage_category" placeholder="Garbage Category" value="<?php echo isset($result['garbage_category']) ? $result['garbage_category']: ''; ?>" readonly>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                            <label>In Weight:</label>
                            <input type="text" class="form-control" name="in_weight" placeholder="In Weight" value="<?php echo isset($result['in_weight']) ? $result['in_weight'] : ''; ?>" readonly required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <label>Out Weight</label>
                            <input class="form-control" type="text" name="out_weight" placeholder="Out Weight" value="<?php echo isset($result['out_weight']) ? $result['out_weight'] : ''; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <label>In Time</label>
                            <input class="form-control" type="text" name="in_time" placeholder="In Time" value="<?php echo isset($result['in_time']) ? $result['in_time'] : ''; ?>" readonly>
                    </div>
                </div>
                </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                            <label>Out Time:</label>
                            <input type="text" class="form-control" name="out_time" placeholder="Out Time" value="<?php echo isset($result['out_time']) ? $result['out_time'] : ''; ?>" readonly required>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- /Main Form --> 

</div>
<!-- /content area --> 