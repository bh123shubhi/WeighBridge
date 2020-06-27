$(document).ready(function () {
    $("#fleet_div").hide();
    $("#agency_div").hide();
    $('#referencediv').hide(); 
    $("#mcd").hide();
    $("#private").hide();
    $("#onload").show();
    $('#bzone_div').show();
     $("#entrytype").val(null).trigger('change');
    $("#mcdentrytype").val(null).trigger('change');
    $("#prientrytype").val(null).trigger('change');
    $("#vehicleno").val(null).trigger('change');
    $("#main_entry_type").val($("#entrytype").val());
    $('#tareweight').prop('required', false); 
    $('#grossweight').prop('required', true);
    $("#vehicleno").change(function(){
        var vehiclevalue = $(this).val();
        var vehiclenoArr=vehiclevalue.split('-');
        if(vehiclenoArr[1]=='mcd'){
            $("#mcd").show();
            $("#private").hide();
            $("#onload").hide();
            $('#bzone_div').show();
              $("#main_entry_type").val($("#mcdentrytype").val());
        }
        else if(vehiclenoArr[1]=='private'){
             $("#mcd").hide();
             $("#private").show();
            $("#onload").hide();
            $('#bzone_div').hide();
             $("#main_entry_type").val($("#prientrytype").val());
        }else{
              $("#mcd").hide();
             $("#private").hide();
            $("#onload").show();
            $('#bzone_div').show();
            $("#main_entry_type").val($("#entrytype").val());
        }
        if($('select[name=entrytype]').val()==2){
            $('#tareweight').show();
            $('#grossweight').hide();
            $('#tareweight').prop('required', true); 
            $('#grossweight').prop('required', false);
        }else{
            $('#grossweight').show();
            $('#tareweight').hide();
            $('#tareweight').prop('required', false); 
            $('#grossweight').prop('required', true);
        }
    $.ajax({
           type: 'POST',
           url   : baseURL+'vehicle/show_vehicle_detail',
           async: true,
           data: { vehicleno : vehiclenoArr[0] , type:vehiclenoArr[1]},
           success: function (data) {
            //console.log(data);
            var veharr=JSON.parse(data,true);
            var disabled = false;
            if(veharr.status==true && veharr.vehicle_entry_status==true){
                  $("#fleet_div").hide();
                  $("#agency_div").hide();
                  $('#bzone_div').hide();//
                if(vehiclenoArr[1].toLowerCase()=='mcd'){
                   $("#fleet_div").show();
                  $("#agency_div").hide();
                  $('#bzone_div').show();
                  $('#bzone').val(veharr.result.zone);
                  $('#floperator').val(veharr.result.fleetoperator);
                  $('#garbage').val(veharr.result.garbage_id).trigger("change");
                  $('#gabage_hid_id').val(veharr.result.garbage_id);
                  $('#capacity').val(veharr.result.capacity);
                  var garbage=$('#garbage option:selected').text();
                  if(garbage=='Malba'||garbage=='MALBA')  {
                      $('#referencediv').show();
                  }else if(garbage=='Slit'|| garbage=='SLIT'){
                      $('#referencediv').show(); 
                  }
                  else{
                      $('#referencediv').hide();    
                  }
                  $('#bzone').attr('readonly', true);
                  $('#floperator').attr('readonly', true);   
              }else if(vehiclenoArr[1].toLowerCase()=='private'){
                  $("#fleet_div").hide();
                  $("#agency_div").show();
                  $('#agency').val(veharr.result.agencyname);
                  $('#garbage').val(veharr.result.garbage_id).trigger("change");
                  $('#gabage_hid_id').val(veharr.result.garbage_id);
                  $('#capacity').val(veharr.result.capacity);
                  var garbage=$('#garbage option:selected').text();
                  if(garbage=='Malba'||garbage=='MALBA')  {
                      $('#referencediv').show();
                  }else if(garbage=='Slit'|| garbage=='SLIT'){
                      $('#referencediv').show(); 
                  }
                  else{
                      $('#referencediv').hide();    
                  }
                  $('#floperator').attr('readonly', true);
                  $('#agency').attr('readonly', true); 
              }else{
                $("#fleet_div").hide();
                $("#agency_div").hide();
              }
              $("#error-msg").css("color","white");
              $("#error-msg").css("background","#1f981f");
              disabled = false;
              
            }else{

                if(veharr.vehicle_entry_status===false || veharr.status==false){
                   $("#fleet_div").hide();
                  $("#agency_div").hide();
                    $("#error-msg").css("color","white");
                    $("#error-msg").css("background","#FF0000");
                    disabled = true;
                }
            }
            $("#btn_vehicle_entry").prop("disabled",disabled);
            $("#error-msg").html(veharr.msg);
           }

       });
      });
   
      $('#garbage').change(function(){
          var garbage=$('#garbage option:selected').text();
            if(garbage=='Malba'||garbage=='MALBA'){
                $('#referencediv').show();
            }else if(garbage=='Silt'|| garbage=='SILT'){
                $('#referencediv').show();
            }else{
                $('#referencediv').hide();  
            }
      });
      $('#grossweight').show();
      $('#tareweight').hide();
      $("#tareweight").prop('required',false);
      $("#grossweight").prop('required',true);
      $('select[name=entrytype]').change(function(){
        if($(this).val()=='2'){
            $('#tareweight').show();
            $('#grossweight').hide();
            $("#tareweight").prop('required',true);
            $("#grossweight").prop('required',false);
        }else{
            $('#grossweight').show();
            $('#tareweight').hide();
            $("#tareweight").prop('required',false);
            $("#grossweight").prop('required',true);
        }
      });//
       $("#entrytype").on("change",function(){
      $("#main_entry_type").val($(this).val());
    })
    $("#prientrytype").on("change",function(){
      $("#main_entry_type").val($(this).val());
    })
    $("#mcdentrytype").on("change",function(){
      $("#main_entry_type").val($(this).val());
    })
    $('#inweightbtn').show();
    $('#overweightbtn').hide();
    $('#grosswtvalue').on("input",function(){
        var grosswt=$('#grosswtvalue').val();
        var capacity=$('#capacity').val();
        if(parseFloat(grosswt)>parseFloat(capacity)){
            $('#over_weight_flag').val("1");
            $('#overweightbtn').show();
            $('#inweightbtn').hide();
        }else{
            $('#overweightbtn').hide();
            $('#inweightbtn').show();
        }
    });
});

