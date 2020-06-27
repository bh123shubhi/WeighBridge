 <!-- Page header -->
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
      <div class="d-flex">
        <div class="breadcrumb"> <a href="dashboard.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <a href="content_page_header.html" class="breadcrumb-item active">Vehcile Entry</a> </div>
        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
      <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
          <div class="breadcrumb-elements-item dropdown p-0"> <a href="dashboard.html" class="breadcrumb-elements-item " > <i class="icon-backward2 mr-2"></i> Go Back </a> </div>
        </div>
      </div>
    </div>
    <!-- /page header --> 
    
    <!-- Content area -->
    <div class="content"> 
      
      <!-- Main Buttons --> 
       <div class="container-fluid">
          <div id="msg" class="">
            <a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>     
            <spna id="errormsg"></span>
          </div>
             
        </div>
      <!-- /main Buttons --> 
      
      <!-- Dashboard content -->
      
      <div class="row">
        
        <div class="col-xl-12"> 
          
          <!-- Entry Form -->
          <div class="card">
            <div class="card-header header-elements-sm-inline">
              <h6 class="card-title">Vehcile Exit</h6>
            </div>
            <div class="card-body  align-items-sm-center justify-content-sm-between flex-sm-wrap"> 
              <form class="" name="save_vehicle" action="<?php echo site_url('vehicle') . $url; ?>" method="post" id="exit_vehicle">
                <input type="hidden" id="vehicle_no" value="<?php echo $vehicle_no;?>"/>
                <input type="hidden" id="entry" value='<?php echo json_encode($entry)?>'/>
                <input type="hidden" id="entry_type" value=''/>
                <input type="hidden" id="zone" value=''/>
                <input type="hidden" id="garbage" value=''/>
                <input type="hidden" id="entry_time" value=''/>
                <input type="hidden" id="slip_no" value=''/>

         <div class="form-group row">
             <label class="col-form-label col-lg-2">Enter Vehicle No.</label>
             <div class="col-lg-3">
              <select data-placeholder="Enter Vehicle No." name="exit_vehicle_no" id="exit_vehicle_no" class="form-control">
                  
                  </select> 
            </div>
             <div class="col-lg-1">
        
             </div>
             <label class="col-form-label col-lg-2 empty_weight">Tare Weight</label>
             <div class="empty_weight col-lg-2">
                <input class="form-control empty_weight" type="text" name="emptyweight" placeholder="Empty Weight" >
             </div>
             <label class="gross_weight col-form-label col-lg-2">Gross Weight</label>
             <div class="gross_weight col-lg-2">
                <input class="gross_weight form-control " type="text" name="grossweight" placeholder="Gross Weight" >
             </div>
             <div class="col-lg-2">
                 <button type="submit" class="btn btn-warning legitRipple">Get Weight</button>
             </div>
           </div>
    
      <div class="text-right">
          <button type="button" onclick="printandsave()" class="btn btn-primary legitRipple">Save & Print Slip<i class="icon-paperplane ml-2"></i></button>
      </div>
      </div>
          </div>
      </form>
          <!-- /Entry Form --> 
          
        </div>
      </div>
    <!-- Code to handle taking the snapshot and displaying it locally --> 

      <!-- / content --> 
      
    </div>
    <!-- /content area --> 
