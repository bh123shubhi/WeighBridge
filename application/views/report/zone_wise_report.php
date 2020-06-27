<!-- Page header --> 
    
    <!-- /page header --> 
    
    <!-- Content area -->
    <div class="content"> 
      
      <!-- Main Form -->
      <div class="card">
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
          <h5 class="mb-3">Zone Wise Report</h5>
          <form class="" name="zone_wise_report_form" action="<?php echo site_url('report') . $url; ?>" method="post" _lpchecked="1">
            <div class="row">
			<div class="col-md-3">
                <div class="form-group">
                  <label>Zone</label>
                   <select data-placeholder="Select Zone" class="form-control select-search" name="zone" data-fouc >
                    <option></option>
                    <option value="All">All</option>
                    <?php
                    if(count($zonearr)>0){
                    foreach($zonearr as $key=>$value){?>
                        <option value="<?php echo $value['id'];?>"><?php echo $value['zone'];?></option>
                  <?php  }}
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Start Date<span style="color:red">*</span></label>
                  <input type="text" class="form-control pickadate-accessibility" placeholder="Start Date" name="startdate" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>End Date<span style="color:red">*</span></label>
                  <input type="text" class="form-control pickadate-accessibility" placeholder="End Date" name="enddate" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary btn-lg legitRipple mt-2"><i class="icon-statistics mr-1"></i>View Report</button>
                </div>
              </div>
            </div>
            
          </form>
        </div>
      </div>
      <!-- /Main Form --> 
      
      <!-- Main Table -->
      <div class="card">
        <div class="card-header justify-contect-center text-center">
          <h5 class="card-title">Zone Wise Report of Vehicles Coming at SLF From</h5>
			<h6 class="card-title"><?php echo $startdate;?> To <?php echo $enddate;?></h6>
          <div class="header-elements">  </div>
        </div>
        <table class="table table-bordered table-hover datatable-button-html5-basic" style="width: 100%;">
          <thead>
            <tr class="text-center table-active">
              <th>Sr. No.</th>
              <th>Registration No.</th>
			        <th>Slip No.</th>
              <th>Fleet Oprator Name</th>
              <th>Zone</th>
			        <th>In Weight</th>
			        <th>Out Weight</th>
              <th>Tare Weight</th>
			        <th>Net Garbage</th>
              <th>SLF Entry Time</th>
              <th>SLF Exit Time</th>
            </tr>
          </thead>
          <tbody>
          <?php
          if(count($res)>0){
            foreach($res as $key=>$value){
            ?>
            <tr class="text-center">
          <td><?php echo $key+1;?></td>
          <td><?php echo $value['vehicle_no'];?></td>
          <td><?php echo $value['slipno'];?></td>
          <td><?php echo $value['fleetoperator'];?></td>
          <td><?php echo $value['zone_coming_from'];?></td>
          <td><?php echo $value['inweight'];?></td>
          <td><?php echo $value['outweight'];?></td>
          <td><?php echo $value['tareweight'];?></td>
          <td><?php echo $value['net_garbage'];?></td>
          <td><?php echo $value['entrytime'];?></td>
          <td><?php echo $value['exittime'];?></td>
          </tr>
          <?php
          }
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
