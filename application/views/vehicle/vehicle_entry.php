<style>
    #my_camera {
        width: 295px;
        height: 235px;
    }
</style>

<!-- Page header -->
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb"> <a href="<?php echo base_url(); ?>dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <a href="<?php echo base_url(); ?>vehicle/vehicle_entry" class="breadcrumb-item active">Vehcile Entry</a> </div>
        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
    <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
            <div class="breadcrumb-elements-item dropdown p-0"> <a href="<?php echo base_url(); ?>dashboard" class="breadcrumb-elements-item " > <i class="icon-backward2 mr-2"></i> Go Back </a> </div>
        </div>
    </div>
</div>
<!-- /page header --> 
<!-- Content area -->
<div class="content"> 

    <!-- Main Buttons --> 

    <!-- /main Buttons --> 

    <!-- Dashboard content -->
 <!-- Main Buttons --> 
       <div class="container-fluid">
             <?php 
             
             if (isset($this->session->flashdata('temp_data')['color']) || isset($this->session->flashdata('temp_data')['msg']) || !empty($msg) || !empty($color) ||!empty(validation_errors())) {

                $color = (isset($this->session->flashdata('temp_data')['color'])?$this->session->flashdata('temp_data')['color']:$color);

                $msg=(isset($this->session->flashdata('temp_data')['msg'])?$this->session->flashdata('temp_data')['msg']:$msg); 
                $error = !empty(validation_errors())?validation_errors():'';?>
                <div class="<?php echo $color; ?>"
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>     <?php echo $msg; ?><?php echo $error; ?>
                    </div>
             <?php } ?>
        </div>
      <!-- /main Buttons --> 
    <div class="row"> 
        <!-- Camera -->
        <div class="col-xl-4">
            <div class="card">

                <div class="card-body justify-content-center text-center">
                    <div id="my_camera" class="m-b-15"></div>
                    <input type="button" class="btn btn-light bg-primary legitRipple mt-3 mb-3" value="Take Snapshot" onClick="take_snapshot()">
                    <div id="results" ></div>
                </div>
            </div>
        </div>
        <!-- Camera -->

        <div class="col-xl-8"> 

            <!-- Entry Form -->
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Vehcile Entry</h6>
                </div>
                <div class="card-body  align-items-sm-center justify-content-sm-between flex-sm-wrap"> 
                <form class="" id="vehicleform" name="save_vehicle" action="<?php echo site_url('vehicle') . $url; ?>" method="post">
                    <input type="hidden" id="main_entry_type" name="main_entry_type"/>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Enter Vehicle No.</label>
                        <div class="col-lg-5">
                            <select data-placeholder="Enter Vehicle No." class="form-control select-minimum" data-fouc autofocus id="vehicleno" name="vehicleno" required="required">
                                <option></option>
                                <?php
                                foreach ($result as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['registration_no'].'-'.$value['type'];?>"><?php echo $value['registration_no'];?></option>
                                    <?php }
                                    ?>
                            </select> 
                            
                            <p id="error-msg" style="padding: 0px 10px 0px;font-weight: 500;"></p>
                        </div>
                        <div class="col-lg-4" id="onload">
                        <select data-placeholder="Entry Type" class="form-control select-search" id="entrytype" data-fouc name="entrytype">
                             <option value=""></option>
                            <?php foreach ($entry as $entryKey => $entrytype):?>
                                <option value="<?php echo $entryKey;?>"><?php echo $entrytype;?></option>
                            <?php endforeach?>
                        </select>
                        </div>
                         <div class="col-lg-4" id="mcd">
                        <select data-placeholder="Entry Type" class="form-control select-search" id="mcdentrytype" data-fouc name="entrytype">
                   
                            <?php foreach ($entry as $entryKey => $entrytype):?>
                                <?php if($entryKey!=1):?>
                                <option value="<?php echo $entryKey;?>"><?php echo $entrytype;?></option>
                                <?php endif ?>
                            <?php endforeach?>
                        </select>
                        </div>
                         <div class="col-lg-4" id="private">
                        <select data-placeholder="Entry Type" class="form-control select-search" id="prientrytype" data-fouc name="entrytype">
                         
                            <?php foreach ($entry as $entryKey => $entrytype):?>
                               <?php if($entryKey!=0):?>
                                <option value="<?php echo $entryKey;?>"><?php echo $entrytype;?></option>
                                  <?php endif ?>
                        
                            <?php endforeach?>
                        </select>
                        </div>


                    </div>
                    <div class="form-group row" id="bzone_div">
                        <label class="col-form-label col-lg-3">Base Zone</label>
                        <div class="col-lg-9"><input class="form-control" type="text" name="bzone" id="bzone" placeholder="Base Zone"></div>
                    </div>
                    <div class="form-group row" id="fleet_div">
                        <label class="col-form-label col-lg-3">Fleet Operator</label>
                        <div class="col-lg-9"><input class="form-control" type="text" name="floperator" id="floperator" placeholder="Enter Fleet Operator"></div>
                    </div>
                    <div class="form-group row" id="agency_div">
                        <label class="col-form-label col-lg-3">Agency</label>
                        <div class="col-lg-9"><input class="form-control" type="text" name="agency" id="agency" placeholder="Enter Agency"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Zone Coming From</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Zone Coming From" class="form-control select-search" data-fouc name="zone_coming_from">
                                <option></option>
                                <?php
                                foreach($zone as $key=>$value){
                                    ?>
                                    <option value="<?php echo $value['id'];?>"><?php echo $value['zone'];?></option>
                             <?php   }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Type of Garbage</label>
                        <div class="col-lg-5">
                        <input type="hidden" class="form-control" name="garbage" id="gabage_hid_id">
                            <select data-placeholder="Type of Garbage" name="garbage_id" class="form-control select-search" data-fouc id="garbage" required>
                                <option></option>
                                <?php
                                foreach($garbage as $key=>$value){
                                    ?>
                                    <option value="<?php echo $value['id'];?>"><?php echo $value['garbage'];?></option>
                             <?php   }
                                ?>
                            </select> 
                        </div>
                        <div class="col-lg-4">
                            <select data-placeholder="Nature of Garbage" class="form-control select-search" data-fouc name="garbage_nature">
                                <option></option>
                                <option value="Bio-Degradable">Bio-Degradable</option>
                                <option value="Non Bio-Degradable">Non Bio-Degradable</option>
                                <option value="Compostable">Compostable</option>
                                <option value="Recyclable">Recyclable</option>
                                <option value="Plastic">Plastic</option>
                                <option value="Bioplastic">Bioplastic</option>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group row" id="referencediv">
                        <label class="col-form-label col-lg-3">Reference</label>
                        <div class="col-lg-9"><input class="form-control" type="text" name="refrence" placeholder="For Silt or Malba"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Driver ID</label>
                        <div class="col-lg-9"><input class="form-control" type="text" name="driveid" placeholder="Driver ID"></div>
                    </div>
                    <div class="form-group row" id="grossweight">
                        <label class="col-form-label col-lg-3">Gross Weight</label>
                        <div class="col-lg-6"><input class="form-control" type="text" placeholder="Gross Weight" name="gross_weight" id="grosswtvalue"></div> <div class="col-lg-3"><input type="button" class="btn btn-light bg-warning legitRipple " value="Get Weight" onClick="take_snapshot()"></div>
                    </div>
                    <div class="form-group row" id="tareweight">
                        <label class="col-form-label col-lg-3">Tare Weight</label>
                        <div class="col-lg-6"><input class="form-control" type="text" name="tareweight" placeholder="Tare Weight"></div> <div class="col-lg-3"><input type="button" class="btn btn-light bg-warning legitRipple " value="Get Weight" onClick="take_snapshot()"></div>
                    </div>
                    <input class="form-control" type="hidden" name="webcam_img_ul" id="webcam_img_ul">
                    <input class="form-control" type="hidden" name="capacity" id="capacity">
                    <input type="hidden" id="over_weight_flag" name="over_weight_flag" value="0"/>
                    <div class="text-right" id="inweightbtn">
                        <button type="submit" id="btn_vehicle_entry" class="btn btn-primary legitRipple">Entry <i class="icon-paperplane ml-2"></i></button>
                    </div>
                    <div class="text-right" id="overweightbtn">
                        <button type="button" class="btn btn-primary legitRipple" id="over_weight">Entry <i class="icon-paperplane ml-2"></i></button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /Entry Form --> 

        </div>
        <!-- <div class="row">
        <div class="col-xl-4">
            <div class="card">

                <div class="card-body justify-content-center text-center">
                <div class="container-fluid">
                <?php if (isset($this->session->flashdata('temp_data')['color']) || isset($this->session->flashdata('temp_data')['msg'])) {$color = $this->session->flashdata('temp_data')['color'];$msg=$this->session->flashdata('temp_data')['msg']; ?>
                    <div class="<?php echo $color; ?>" <?php if (!empty($color) && !empty($msg))  ?>>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>                
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>
                </div>
                </div>
            </div>
        </div>
        </div> -->
    </div>
    <!-- / content --> 

</div>
<!-- /content area --> 
<!-- Code to handle taking the snapshot and displaying it locally --> 
<script language="JavaScript">

    // Configure a few settings and attach camera
   Webcam.set({
       width: 295,
       height: 235,
       image_format: 'jpeg',
       jpeg_quality: 90
   });
   Webcam.attach('#my_camera');

   function take_snapshot() {
       // play sound effect

       // take snapshot and get image data
       Webcam.snap(function (data_uri) {
           // display results in page
           document.getElementById('results').innerHTML =
                   '<img id="imageprev" src="' + data_uri + '"/>';
                   console.log(data_uri);
                   $('#webcam_img_ul').val(data_uri);
       });
   }
</script>
