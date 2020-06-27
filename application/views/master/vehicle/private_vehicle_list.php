<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Private Vehicle</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center"> </div>
        </div>
    </div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb"> <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <span class="breadcrumb-item active">Private Vehicle List</span> </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>

    </div>
</div>
<!-- /page header --> 

<!-- Content area -->
<div class="content"> 

    <!-- Main Table -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Private Vehicle List</h5>
            <div class="header-elements"> <a href="<?php echo site_url('master') . '/vehicle/add_private_vehicle'; ?>" class="btn bg-success-400 legitRipple align-self-right" target="_self"><i class="icon-lifebuoy mr-2"></i>Add Private Vehicle</a> </div>
        </div>
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
        <table class="table datatable-colvis-state" style="width: 100%;">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Registration No.</th>
                    <th>Agency Name</th>
                    <th>Tare Weight</th>
                    <th>Capacity</th>
                    <th>Make & Model</th>
                    <th>Garbage Category</th>
                    <th>Registration Valid Upto</th>
                    <th>Purchase Date</th>
                    <th>Trip Time(In Min.)</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result['value'] as $key => $value) {
                    $btnstatus = $value['status'] == 'TRUE' ? 'In-Active' : 'Active';
                    $status = $value['status'] == 'TRUE' ? 'Active' : 'In-Active';
                    $class = $value['status'] == 'TRUE' ? 'badge badge-success' : 'badge badge-secondary';
                    $by=!empty($value['first_name'])?'By':'';                    
                    ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['registration_no']; ?></td>
                        <td><?php echo $value['agencyname']; ?></td>
                        <td><?php echo $value['tareweight']; ?></td>
                        <td><?php echo $value['capacity']; ?></td>
                        <td><?php echo $value['model']; ?></td>
                        <td><?php echo $value['garbage']; ?></td>
                        <td><?php echo date('d/M/Y', strtotime($value['registration_date'])); ?></td>
                        <td><?php echo date('d/M/Y', strtotime($value['purchase_date'])); ?></td>
                        <td><?php echo $value['triptime']; ?></td>
                        <td><span class="<?php echo $class;?>"><?php echo $status; ?></span></td>
                        <td><?php echo date('d/M/Y', strtotime($value['updated_at'])); ?> <?php echo $by;?> <?php echo $value['first_name'].' '.$value['last_name']; ?></td>
                        <td class="text-center"><div class="list-icons">
                                <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-right"> 
                                        <a href="<?php echo site_url('master') . '/vehicle/view_private_vehicle/view/' . $value['id']; ?>" class="dropdown-item"><i class="icon-eye"></i> View</a> 
                                        <a href="<?php echo site_url('master') . '/vehicle/add_private_vehicle/edit/' . $value['id']; ?>" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                        <a href="<?php echo site_url('master') . '/vehicle/private_vehicle_list/delete/' . $value['id']; ?>" class="dropdown-item"><i class="icon-arrow-down7"></i> <?php echo $btnstatus; ?></a> 
                                    </div>
                                </div>
                            </div></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /main table --> 

    <!-- Dashboard content --> 

    <!-- /dashboard content --> 

</div>
<!-- /content area --> 







