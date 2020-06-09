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
            <h6 class="card-title">View MCD Owned Vehicle</h6>
            <div class="header-elements">
                <div class="list-icons"> <a class="list-icons-item" data-action="collapse"></a> <a class="list-icons-item" data-action="reload"></a> </div>
            </div>
        </div>
        <div class="card-body">
            <form class="" action="<?php echo site_url('master') . $url; ?>" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Registration No. <span class="text-danger">*</span></label>
                            <input class="form-control text-uppercase" type="text" name="registration_no" placeholder="Enter Registration No." value="<?php echo isset($result['value']['registration_no']) ? $result['value']['registration_no'] : ''; ?>" readonly required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Registration Valid upto:</label>
                            <input type="text" class="form-control pickadate-accessibility" name="registration_date" placeholder="Enter Registration Date&hellip;" value="<?php echo isset($result['value']['registration_date']) ? date('d M,Y', strtotime($result['value']['registration_date'])) : ''; ?>" disabled required>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Purchase Date:</label>
                            <input type="text" class="form-control pickadate-accessibility" name="purchase_date" placeholder="Enter Purchase Date&hellip;" value="<?php echo isset($result['value']['purchase_date']) ? date('d M,Y', strtotime($result['value']['purchase_date'])) : ''; ?>" disabled required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Base Zone: <span class="text-danger">*</span></label>
                            <select data-placeholder="Enter Base Zone" class="form-control select-search" name="zone_id" data-fouc disabled>
                                <option></option>
                                <?php
                                if (isset($result['value']['zone_id'])) {
                                    foreach ($zoneArr['value'] as $zkey => $zval) {
                                        ?>   
                                        <option value="<?php echo $zval['id']; ?>"<?php if ($zval['id'] == $result['value']['zone_id']): ?> selected="selected"<?php endif; ?>><?php echo $zval['zone']; ?></option>
                                        <?php
                                    }
                                }else {
                                    foreach ($zoneArr['value'] as $zkey => $zval) {
                                        ?>
                                        <option value="<?php echo $zval['id']; ?>"><?php echo $zval['zone']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fleet Operator Name: <span class="text-danger">*</span></label>
                            <select data-placeholder="Enter Fleet Operator Name" class="form-control select-search" name="fleet_operator_id" data-fouc disabled>
                                <option></option>
                                <?php
                                if (isset($result['value']['fleet_operator_id'])) {
                                    foreach ($fleetArr['value'] as $fkey => $fval) {
                                        ?>
                                        <option value="<?php echo $fval['id']; ?>"<?php if ($fval['id'] == $result['value']['fleet_operator_id']): ?> selected="selected"<?php endif; ?>><?php echo $fval['fleetoperator']; ?></option>
                                    <?php
                                    }
                                }else {
                                    foreach ($fleetArr['value'] as $fkey => $fval) {
                                        ?>
                                        <option value="<?php echo $fval['id']; ?>"><?php echo $fval['fleetoperator']; ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Make & Model</label>
                            <input class="form-control" type="text" name="model" placeholder="Enter Make & Model" value="<?php echo isset($result['value']['model']) ? $result['value']['model'] : ''; ?>" readonly>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Garbage Category</label>
                            <select data-placeholder="Type of Garbage" class="form-control select-search" name="garbage_id" data-fouc disabled>
                                <option></option>
                                <?php
                                if (isset($result['value']['garbage_id'])) {
                                    foreach ($garbageArr['value'] as $gkey => $gval) {
                                        ?>
                                        <option value="<?php echo $gval['id']; ?>"<?php if ($gval['id'] == $result['value']['garbage_id']): ?> selected="selected"<?php endif; ?>><?php echo $gval['garbage']; ?></option>
                                    <?php
                                    }
                                }else {
                                    foreach ($garbageArr['value'] as $gkey => $gval) {
                                        ?>
                                        <option value="<?php echo $gval['id']; ?>"><?php echo $gval['garbage']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tare Weight</label>
                            <input class="form-control" type="text" name="tareweight" placeholder="Enter Tare Weight" value="<?php echo isset($result['value']['tareweight']) ? $result['value']['tareweight'] : ''; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Capacity</label>
                            <input class="form-control" type="text" name="capacity" placeholder="Enter Capacity Weight" value="<?php echo isset($result['value']['capacity']) ? $result['value']['capacity'] : ''; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>OBU Id(GPS Device)</label>
                            <input class="form-control" type="text" name="obu_id" placeholder="Enter OBU Id" value="<?php echo isset($result['value']['obu_id']) ? $result['value']['obu_id'] : ''; ?>" readonly>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select data-placeholder="Vehicle Status" name="vehicle_status" class="form-control select-search" data-fouc disabled>
                                <option></option>
                                <?php
                                if (isset($result['value']['vehicle_status'])) {
                                    ?>
                                    <option value="Active"<?php if ($result['value']['vehicle_status'] == 'Active'): ?> selected="selected"<?php endif; ?>>Active</option>
                                    <option value="Disabled"<?php if ($result['value']['vehicle_status'] == 'Disabled'): ?> selected="selected"<?php endif; ?>>Disabled</option>
                                    <?php
                                }else {
                                    ?>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
<?php }
?>

                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Main Form --> 

</div>
<!-- /content area --> 