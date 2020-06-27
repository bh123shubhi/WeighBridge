<!-- Content area -->
<div class="content">

    <!-- Main Buttons -->
    <div class="row">
        <div class="col-lg-6"> <div class="card"><a href="<?php echo base_url(); ?>vehicle/vehicle_entry" class="btn btn-light bg-primary legitRipple p-4"><i class="icon-enter mr-2"></i> Entry Vehicle</a></div> </div>
        <div class="col-lg-6"> <div class="card"><a href="<?php echo base_url(); ?>vehicle/vehicle_exit" class="btn btn-light bg-warning legitRipple p-4"><i class="icon-exit mr-2"></i> Exit Vehicle</a></div></div>
    </div>
    <!-- /main Buttons -->


    <!-- Dashboard content -->

    <div class="row">
        <div class="col-xl-12">

            <!-- Marketing campaigns -->
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Vehicle at SLF</h6>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Registration</th>
                                <th>Slip No.</th>
                                <th>Garbage Type</th>
                                <th>In Weight</th>
                                <th>Tare Weight</th>
                                <th>Net Garbage</th>
                                <th>SLF Entry Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-active table-border-double">
                                <td colspan="7" class="font-weight-bold">Vehicle Currently In</td>
                                <td class="text-right">
                                    <span class="progress-meter" id="today-progress" data-progress="30"></span>
                                </td>
                            </tr>
                            <?php 
          if(count($result)>0){
            foreach($result as $key=>$value){
            ?>
            <tr class="text-center">
          <td><?php echo $key+1;?></td>
          <td>
          <div class="d-flex align-items-center"></div>
          <div><a href="#" class="text-default font-weight-semibold"><?php echo $value['vehicle_no'];?></a></div> 
          </td>
          <td><span class="text-muted"><?php echo $value['slipno'];?></span></td>
          <td><span class="text-success-600"><?php echo $value['garbage'];?></span></td>
          <td><h6 class="font-weight-semibold mb-0"><?php echo $value['inweight'];?></h6></td>
          <td><h6 class="font-weight-semibold mb-0"><?php echo $value['tareweight'];?></h6></td>
          <td><h6 class="font-weight-semibold mb-0"><?php echo $value['net_garbage'];?></h6></td>
          <td><h6 class="font-weight-semibold mb-0"><?php echo $value['entrytime'];?></h6></td>
          </tr>
          <?php
          }
          }
          ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /marketing campaigns -->

        </div>

    </div>
    <!-- /dashboard content -->

</div>
<!-- Content area -->