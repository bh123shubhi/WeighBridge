$(document).ready(function () {
    $('#admin_submit').attr('disabled','true');
    $('#username_text').css('display','none');
    $("#admin_username").keyup(function(){
        var username=$("#admin_username").val();
        $.ajax({
            type: 'POST',
            url   : baseURL+'check_user_name',
            async: true,
            data: { username : username},
            success: function (data) {
             if(data==1){
                 $('#username_text').css('display','none');
                 $('#admin_submit').attr('disabled','false');
             }else{
                $('#username_text').css('display','block');
                $('#admin_submit').attr('disabled','true');
             }
            }
        });
    });
});