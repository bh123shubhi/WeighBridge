$(document).ready(function () {
    $('#operator_submit').attr('disabled',true);
    $('#opusername_text').css('display','none');
    $("#operator_username").keyup(function(){
        var username=$("#operator_username").val();
        $.ajax({
            type: 'POST',
            url   : baseURL+'check_user_name',
            async: true,
            data: { username : username},
            success: function (data) {
             if(data==1){
                 $('#opusername_text').css('display','none');
                 $('#operator_submit').removeAttr('disabled');
             }else{
                $('#opusername_text').css('display','block');
                $('#operator_submit').attr('disabled',true);
             }
            }
        });
    });
});