
  <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/layout.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/components.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/colors.min.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script src="<?php echo base_url(); ?>global_assets/js/main/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/main/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/loaders/blockui.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/ui/ripple.min.js"></script>
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script> -->
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/ui/moment/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/pickers/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/ui/perfect_scrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/webcam.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/selects/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/pickers/pickadate/picker.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/extra_sweetalert.js"></script>
        <script src="<?php echo base_url(); ?>/app/vehicle/entryvehicle.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/layout_fixed_sidebar_custom.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/form_select2.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/picker_date.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/datatables_extension_buttons_html5.js"></script>

        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/datatables_advanced.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/validation/validate.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/datatables_extension_colvis.js"></script>

      <div class="card">
<div class="row">
  
  <div class="col-md-6 p-2"><a href="<?php echo  base_url().$back_url; ?>" class="btn btn-success" style="float:right">Back</a></div>

  <div class="col-md-6 p-2"><button  class="btn btn-success" onclick="print_slip()">print</button></div>
 </div>
</div>
  <div id="printableArea_<?php echo str_replace(" ","_",$result['vehicle_no']);?>">
      <input type="hidden" id="vehicle_no" value="<?php echo $result['vehicle_no'];?>"/>
      <div class="card pl-5 pr-5" >
        <div class="card-header bg-white" style="border: 2px solid rgba(0,0,0,.125);">
          <div class="row">
            <div class="col-md-2"><img src="global_assets/images/north-dmc-logo.png" style="width: 85px;height: 100px;" alt="Logo"/></div>
            <div class="col-md-10 text-center">
              <h2 class="card-title">NORTH DELHI MUNICIPAL CORPORATION</h2>
        <h5 class="card-title text-default mt-2" style="display: inline-block; padding: 1px 8px;">WEIGHMENT SLIP</h5>
        <h4 class="card-title">SANITARY LAND FILL SITE - BHALSWA, DELHI</h4>
            </div>
          </div>
        </div>
      <div class="card-body  pl-3 p-0" style="border: 2px solid rgba(0,0,0,.125);">
        <div class="row">
          <div class="col-md-4 p-2"><label class="m-0">Slip No.:</label><input class="text-uppercase font-weight-bold ml-4" type="text" id="slip_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" name="registration" value="<?php echo $result['slip_no']; ?>" style="border: 0px;"></div>
          <div class="col-md-4 p-2"><label class="m-0">Date:</label><input class="text-uppercase font-weight-bold ml-4" type="text" id="registration_date_<?php echo str_replace(" ","_",$value['vehicle_no']);?>" name="registration" value="1<?php echo date('d/m/Y h:i:s',strtotime($result['registration_date'])); ?>" style="border: 0px;"></div>
           <div class="col-md-4 p-2"><label class="m-0">Entry Type:</label><input class="text-uppercase font-weight-bold ml-4" id="entry_type+<?php echo str_replace(" ","_",$result['vehicle_no']);?>" type="text" name="registration" value="<?php echo $result['entry_type']; ?>" style="border: 0px;"></div>
        </div>
      </div>
        <div class="card-body" style="border: 2px solid rgba(0,0,0,.125);">
          <form class="" action="#">
            <div class="row">
              <div class="col-md-4">
                <label class="m-0">Vehicle No.:</label><input class="text-uppercase ml-4 font-weight-bold" type="text" id="vehicle_no_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" name="registration" value="<?php echo $result['vehicle_no']; ?>" style="border: 0px;">
              </div>
              <div class="col-md-4">
                 <label class="m-0">Vehicle:</label><input class="text-uppercase ml-4 font-weight-bold" type="text" name="registration" id="vehicle_type_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" value="TRUCK" style="border: 0px;">
              </div>
              <div class="col-md-4">
                <img src="global_assets/images/help_gr_cl_delhi.png" style="position: absolute; width:220px; margin-left: 50px;" />
              </div>
            </div>
            <div class="row pt-3 pb-3">
              <div class="col-md-4">
                 <label class="m-0">Name of Driver:</label><input class="text-uppercase ml-4 font-weight-bold" type="text" id="name_of_driver_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" name="registration" value="" style="border: 0px;">
              </div>
              <div class="col-md-4">
                <label class="m-0">Zone:</label><input class="text-uppercase ml-4 font-weight-bold" type="text" id="zone_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" name="registration" value="<?php echo $result['zone']; ?> " style="border: 0px;">
              </div>
              <div class="col-md-4">
                
              </div>
            </div>
            <div class="row ">
              <div class="col-md-4">
                <label class="m-0">In Wt. (KGS):</label><input class="text-uppercase ml-4 font-weight-bold" id="in_weight_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" type="text" name="registration" value="15160" style="border: 0px;">
              </div>
              <div class="col-md-4">
                 <label class="m-0">Type of Garbage:</label><input class="text-uppercase ml-4 font-weight-bold" id="type_of_garbage_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" type="text" name="registration" value="<?php echo $result['garbage']; ?>" style="border: 0px;">
              </div>
              <div class="col-md-4">
                
              </div>
            </div>
            <div class="row pt-3 pb-3">
               <div class="col-md-4">
                <label class="m-0">Out Wt. (KGS):</label><input class="text-uppercase ml-4 font-weight-bold" id="out_weight_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" type="text" name="registration" value="6715" style="border: 0px;">
              </div>
              <div class="col-md-4">
                <label class="m-0">In Time:</label><input class="text-uppercase ml-4 font-weight-bold" type="text" id="in_time_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" name="registration" value="<?php echo $result['entry_time']; ?>" style="border: 0px;">
              </div>
              <div class="col-md-4">
                
              </div>
            </div>
           <div class="row">
               <div class="col-md-4">
                <label class="m-0">Net Wt. (KGS):</label><input class="text-uppercase ml-4 font-weight-bold" id="net_weight_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" type="text" name="registration" value="8445" style="border: 0px;">
              </div>
              <div class="col-md-4">
                 <label class="m-0">Out Time:</label><input class="text-uppercase ml-4 font-weight-bold" id="out_time_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" type="text" name="registration" value="16/06/2020 12:55:10" style="border: 0px;">
              </div>
              <div class="col-md-4">
                
              </div>
            </div>
       <div class="row pt-3">
               <div class="col-md-4">
               <input class="text-uppercase ml-4 font-weight-bold" type="text" name="registration" value="WT. DIFF. EXCEEDED LIMIT" id="diff_weight_<?php echo str_replace(" ","_",$result['vehicle_no']);?>" style="border: 0px;">
              </div>
              <div class="col-md-4">
                 
              </div>
              <div class="col-md-4">
                <label class="font-weight-bold">(Operator Sign.)</label>
              </div>
            </div>
          </form>
        </div>
      </div>
</div>

 
<script>
  var print_slip;
  $(document).ready(function(){
       print_slip = function(){
         var vehicle_no = $("#vehicle_no").val();
                 if(typeof vehicle_no!=='undefined' && vehicle_no!=''){
                   var originalContents = document.body.innerHTML;
                    document.body.innerHTML = $("#printableArea_"+vehicle_no.replace(/ /g,"_")).html();
                    window.print();
                    document.body.innerHTML = originalContents;
   }
                 }
   
  })
  
    
                
</script>