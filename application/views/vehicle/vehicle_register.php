<!-- Page header -->
<div class="page-header page-header-light">
      <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
          <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Vehicle Register</h4>
          <a href="" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
        <div class="header-elements d-none">
          <div class="d-flex justify-content-center"> </div>
        </div>
      </div>
      <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
          <div class="breadcrumb"> <a href="<?php echo base_url(); ?>dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <span class="breadcrumb-item active">Vehicle Register</span> </div>
          <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
        
      </div>
    </div>
    <!-- /page header --> 
    
<!-- Content area -->
<div class="content"> 
      
      <!-- Main Table -->
      <div class="card">
        <div class="card-header header-elements-inline">
          <h5 class="card-title">Vehicle Register</h5>
          <div class="header-elements"> </div>
        </div>
        <table class="table datatable-colvis-state" style="width: 100%;">
          <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Registration No.</th>
              <th>Slip No.</th>
              <th>Fleet Oprator/Agency Name</th>
              <th>Zone Coming From</th>
              <th>Entry Type</th>
              <th>Garbage Category</th>
              <th>In Weight</th>
              <th>Out Weight</th>
              <th>In Time</th>
              <th>Out Time</th>
              <th>Operator</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach($result as $key=>$value){
            $postData = base64_encode(json_encode([
              "vehicle_no"=>$value['vehicle_no'],
              "zone"=>$value['zone_coming_from'],
              "garbage"=>$value['garbage_category'],
              "entry_type"=>$value['entry_type'],
              "entry_time"=>$value['in_time'],
              "exit_time"=>$value['out_time'],
              "in_weight"=>$value['in_weight'],
              "out_weight"=>$value['out_weight'],
              "net_weight"=>$value['net_weight'],
              "driver_id"=>$value['driver_id'],
              "model"=>$value['model'],
              "slipno"=>$value['slipno'],           
              "vehicle_img"=>base_url().$value['webcam_imgpath'],
              "src"=>'reg'
            ]
          ));
          ?>
            <tr>
              <td><?php echo $key+1;?></td>
              <td><?php echo $value['vehicle_no'];?></td>
              <td><?php echo $value['slipno'];?></td>
              <td><?php echo $value['fleet_agency_name'];?></td>
              <td><?php echo $value['zone_coming_from'];?></td>
              <td><?php echo $value['entry_type'];?></td>
              <td><?php echo $value['garbage_category'];?></td>
              <td><?php echo $value['in_weight'];?></td>
              <td><?php echo $value['out_weight'];?></td>
              <td><?php echo $value['in_time'];?></td>
              <td><?php echo $value['out_time'];?></td>
              <td><?php echo $value['user_name'];?></td>
              <td class="text-center"><div class="list-icons">
                  <div class="dropdown"> 
                  <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a>
                  <div class="dropdown-menu dropdown-menu-right"> 
                  <a href="<?php echo site_url('vehicle') . '/view_vehicle' .'/'.$value['slipno'].'/'.$value['key_entry_type']; ?>" class="dropdown-item"><i class="icon-eye"></i> View</a> 
                  <a  href="<?php echo base_url()?>vehicle/rendersliporprint/<?php echo $postData;?>" 
                  data- class="dropdown-item"><i class="icon-printer2"></i> Print Slip Again</a> 
                  </div>
                  </div>
                </div></td>
            </tr>

         <?php }
          ?>
            

          </tbody>
        </table>
      </div>
      <!-- /main table --> 
      
      <!-- Dashboard content --> 
      
      <!-- /dashboard content --> 
      
    </div>
    <!-- /content area --> 
    
