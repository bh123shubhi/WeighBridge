$(document).ready(function () {;
    $('.empty_weight').show();
    $('.gross_weight').hide();
   
    $("#exit_vehicle_no").change(function(){
        var vehiclevalue = $(this).val();
        var vehiclenoArr=vehiclevalue.split('-');
        console.log(vehiclenoArr[1]);
        if(vehiclenoArr[3]==2){
            $('.empty_weight').hide();
            $('.gross_weight').show();
        }else{
          $('.empty_weight').show();
            $('.gross_weight').hide();
        }
     
      });
   
});

