
<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md sidebar-fixed ">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        <span class="font-weight-semibold">Navigation</span>
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content ps ps--active-y">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="sidebar-user-material-body">
                <div class="card-body text-center">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>Assets/images/placeholders/placeholder.jpg" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
                    </a>
                    <h6 class="mb-0 text-white text-shadow-dark">Rajesh Kumar</h6>
                    <span class="font-size-sm text-white text-shadow-dark">Administrator</span>
                </div>

                <div class="sidebar-user-material-footer">
                    <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
                </div>
            </div>

            <div class="collapse" id="user-nav">
                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-user-plus"></i>
                            <span>My profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-cog5"></i>
                            <span>Account settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-switch2"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="#!/dashboard" class="nav-link active">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-truck"></i> <span>Vehicle Entry / Exit</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="<?php echo base_url(); ?>vehicle/vehicle_entry" class="nav-link"><i class="icon-enter"></i>Vehicle Entry </a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>vehicle/vehicle_exit"  class="nav-link"><i class="icon-exit"></i>Vehicle Exit</a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>vehicle/vehicle_register" class="nav-link active"><i class="icon-enter"></i>Vehicle Register</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-stats-dots"></i> <span>Reports</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Reports">

                        <li class="nav-item"><a href="zone_wise_report.html" class="nav-link">Zone Wise Report</a></li>
                        <li class="nav-item"><a href="garbage_wise_report.html" class="nav-link">Garbage Category Wise Report</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Fleet Operator Report</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Agency Wise Report</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Vehicle Wise Report</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a ui-sref="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Master</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Master">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link legitRipple">Vehicle Master</a>
                            <ul class="nav nav-group-sub" style="display: none;">
                                <li class="nav-item"><a href="<?php echo base_url(); ?>master/vehicle/mcd_vehicle_list" class="nav-link legitRipple">MCD Owned Vehicle</a></li>
                                <li class="nav-item"><a href="<?php echo base_url(); ?>master/vehicle/private_vehicle_list" class="nav-link legitRipple">Private Vehicle</a></li>
                                <li class="nav-item"><a href="<?php echo base_url(); ?>master/vehicle/zone_time_list" class="nav-link legitRipple">Zone Time</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>master/zone/zone_list" class="nav-link">Zone</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>master/garbage/garbage_category_list" class="nav-link">Garbage Category</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>master/fleet/fleet_operator_list" class="nav-link">Fleet Operator Master</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>master/agency/agency_name_list" class="nav-link">Agency Master</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>master/operator/operator_list" class="nav-link">Operator Master</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>master/admin/admin_list" class="nav-link">Admin Master</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-cog3"></i> <span>Settings</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Settings">
                        <li class="nav-item"><a href="#" class="nav-link">Email Settings</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">SMS Settings</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">General Settings</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#" class="nav-link">System Settings</a></li>

                    </ul>
                </li>
                <!-- /main -->
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->

