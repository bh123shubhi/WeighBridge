var printandsave;
var getVehicleList;
var sleep;
$(document).ready(function () {;
      $('.empty_weight').show();
      $('.gross_weight').hide();
      $("#exit_vehicle_no").select2({'minimumInputLength':2});
      $("#exit_vehicle_no").change(function(){
         if($(this).val()!='' && $(this).val()!==null){
          var zone_id = $(this). children("option:selected").data('zone');
          var garbage = $(this). children("option:selected").data('garbage');
          var entry_time = $(this). children("option:selected").data('entry-time');
          var slip_no = $(this). children("option:selected").data('slip-no');
          var driverid = $(this). children("option:selected").data('driverid');
          var in_weight = $(this). children("option:selected").data('in-weight');
          var vehicle_img = $(this). children("option:selected").data('vehicle-img');
          var model = $(this). children("option:selected").data('model');
          $("#zone").val(zone_id);
          $("#garbage").val(garbage);
          $("#entry_time").val(entry_time);
          $("#slip_no").val(slip_no);
           $("#driverid").val(driverid);
            $("#in_weight").val(in_weight);
             $("#vehicle_img").val(vehicle_img);
               $("#model").val(model);
       
          var vehiclevalue = $(this).val();
          var vehiclenoArr=vehiclevalue.split('-');
          $("#entry_type").val(vehiclenoArr[3]);
          $("#vehicle_no").val(vehiclenoArr[0]);
          if(vehiclenoArr[3]==2){
              $('.empty_weight').hide();
              $('.gross_weight').show();
          }else{
            $('.empty_weight').show();
              $('.gross_weight').hide();
          }
        }
     
      });
    $.fn.addSelect2Items = function(items, config){
    var that = this;
    that.empty().select2("destroy").trigger("change");
    
    for(var k in items){
        var data = items[k];
        that.append("<option data-zone='"+data.zone+"' data-garbage='"+data.garbage+"' data-entry-time='"+data.in_time+"' data-slip-no='"+data.slip_no+"' data-driverid='"+data.driverid+"' data-in-weight='"+data.in_weight+"' data-vehicle-img='"+data.vehicle_img+"' data-model='"+data.model+"'   value='"+ data.id +"'>"+ data.text +"</option>");
    }
    $(that).val(null).trigger("change");
    that.select2(config ||{minimumInputLength:2});
};
    printandsave = function(){
       if($("#exit_vehicle_no").val()!='' && $("#exit_vehicle_no").val()!==null){
       $.ajax({
          url:baseURL+'/vehicle/save_vehicle_exit',
          data:$('#exit_vehicle').serialize(),
          type:'POST',
          success:function(resp){
            if(typeof resp!=='undefined' && resp!=''){
               var respData = JSON.parse(resp);
               if(respData['status']=='true'){
                 var entry_type = $("#entry").val();
                 entry_type = JSON.parse(entry_type);
                $("#msg").addClass(respData['color']);
                 $("#errormsg").html(respData['msg']);
                   if(typeof respData['result']!=='undefined' && respData['result']!=''){
                    var options =[];
                    options.push({"id":"","text":""});
                    for (var prop in respData['result']) {
                      var key = respData['result'][prop]['vehicle_no']+'-'+respData['result'][prop]['vehicle_type']+'-'+respData['result'][prop]['id']+'-'+((typeof entry_type[respData['result'][prop]['entry_type']]!=='undefined')?(entry_type[respData['result'][prop]['entry_type']]):'');
                      options.push({"id":key,"text":respData['result'][prop]['vehicle_no'],'zone':respData['result'][prop]['zone'],'garbage':respData['result'][prop]['garbage'],'in_time':respData['result'][prop]['entry_time'],'slip_no':respData['result'][prop]['slipno'],'driverid':respData['result'][prop]['driverid'],'in_weight':respData['result'][prop]['in_weight'],'vehicle_img':respData['result'][prop]['vehicle_img'],'model':respData['result'][prop]['model']});
                    }
                    $("#exit_vehicle_no").addSelect2Items(options,{minimumInputLength:2});
                  }       
                 var vehicle_no = $("#vehicle_no").val();
                 if(typeof vehicle_no!=='undefined' && vehicle_no!=''){
                     var postData = {};
                     var zone = $("#zone").val();
                     var garbage = $("#garbage").val();
                     var entry_time = $("#entry_time").val();
                     var entry_type_id = $("#entry_type").val();
                     if(entry_type_id==0){
                      entry_type='General Entry';
                     }else if(entry_type_id==1){
                      entry_type='Other Vehicle';
                     }else if(entry_type_id==2){
                      entry_type='Empty Entry';
                     }else{
                      entry_type='';
                     }
                     var slip_no = $("#slip_no").val();
                     var driverid = $("#driverid").val();
                     var in_weight = $("#in_weight").val();
                     var vehicle_img = $("#vehicle_img").val();
                     var model = $("#model").val();
                     postData['vehicle_no'] = vehicle_no;
                     postData['zone'] = zone;
                     postData['garbage'] = garbage;
                     postData['entry_type'] =entry_type;
                     postData['entry_time'] = entry_time;
                     postData['entry_type'] =entry_type;  
                     postData['slipno'] =slip_no; 
                     postData['driver_id'] =driverid; 
                     postData['in_weight'] =in_weight; 
                     postData['out_weight'] =respData['out_weight'];
                     postData['net_weight'] =in_weight-respData['out_weight']; 
                     postData['exit_time'] =respData['timestamp']; 
                    postData['model'] =model; 
                    postData['vehicle_img'] =baseURL+vehicle_img; 
                    window.location = baseURL+'/vehicle/rendersliporprint/'+btoa(JSON.stringify(postData));
                    
                    //   var originalContents = document.body.innerHTML;
                    //   document.body.innerHTML = $("#printableArea_"+vehicle_no).html();
                    //   window.print();
                    //   document.body.innerHTML = originalContents;
                    //   if(respData['slip_view']!=''){
                    //     $("#print").html(respData['slip_view']);
                    //   }
              
                

                }
              }else{
                   var entry_type = $("#entry").val();
                    entry_type = JSON.parse(entry_type);
                    $("#msg").addClass(respData['color']);
                    $("#errormsg").html(respData['msg']);
                   if(typeof respData['result']!=='undefined' && respData['result']!=''){
                      var options =[];
                      options.push({"id":"","text":""});
                      for (var prop in respData['result']) {
                        var key = respData['result'][prop]['vehicle_no']+'-'+respData['result'][prop]['vehicle_type']+'-'+respData['result'][prop]['id']+'-'+((typeof entry_type[respData['result'][prop]['entry_type']]!=='undefined')?(entry_type[respData['result'][prop]['entry_type']]):'');
                        options.push({"id":key,"text":respData['result'][prop]['vehicle_no'],'zone':respData['result'][prop]['zone'],'garbage':respData['result'][prop]['garbage'],'in_time':respData['result'][prop]['entry_time'],'slip_no':respData['result'][prop]['slipno'],'driverid':respData['result'][prop]['driverid'],'in_weight':respData['result'][prop]['in_weight'],'vehicle_img':respData['result'][prop]['vehicle_img'],'model':respData['result'][prop]['model']});
                      }
                      $("#exit_vehicle_no").addSelect2Items(options,{'minimumInputLength':2});
                    }     
              }
            }
          },
          error:function(){
              
          }
       })
     }
    }
    // sleep time expects milliseconds
 sleep = function  (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}


    getVehicleList = function(){
      var entry_type = $("#entry").val();
                 entry_type = JSON.parse(entry_type);
       $.ajax({
        url:baseURL+'/vehicle/getexitvehiclelist',
        success:function(response){
            var response = JSON.parse(response);
            var options=[];
            options.push({"id":"","text":""});
             $.each(response, function (key, value) {
              var key = value['vehicle_no']+'-'+value['vehicle_type']+'-'+value['id']+'-'+((typeof entry_type[value['entry_type']]!=='undefined')?(entry_type[value['entry_type']]):'');
               options.push({"id":key,"text":value['vehicle_no'],'zone':value['zone'],'garbage':value['garbage'],'in_time':value['entry_time'],'slip_no':value['slipno'],'driverid':value['driverid'],'in_weight':value['in_weight'],'vehicle_img':value['vehicle_img'],'model':value['model']});
             });
             $("#exit_vehicle_no").addSelect2Items(options,{'minimumInputLength':2});
        },
        error:function(){

        }
       })
    }
getVehicleList();

   
});

