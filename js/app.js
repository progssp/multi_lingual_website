var url_to_request = window.location.origin+"/multi_lingual_form/common/commons.php";

if(document.getElementById('user_register_frm') == null){}
else{
    document.getElementById('user_register_frm').addEventListener('submit',function(e){
        e.preventDefault();
        
        $.ajax({
            url:url_to_request,
            type:'POST',
            data        : new FormData(this), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true,
            contentType: false,
            cache: false,
            processData:false,
            success:function(r){
                console.log(r);
                if(r.status == true){
                    $("#user_register_frm #success_msg_alert").html("Successfully registered. "+r.pass+" is your password. Use this password and the email you typed to login. Go to <a href='login.php'>Login</a>");
                    $("#user_register_frm #success_msg_alert").fadeIn();
                    
                }
                else{
                    $("#user_register_frm #error_msg_alert").html("Error. Try again later");
                    $("#user_register_frm #error_msg_alert").fadeIn();
                    setTimeout(function(){
                        $("#user_register_frm #error_msg_alert").fadeOut();
                    },1300);
                }
            },
            error:function(err){ 
                console.error(err);               
                $("#user_register_frm #warning_msg_alert").html("Server internal error.");
                $("#user_register_frm #warning_msg_alert").fadeIn();
                setTimeout(function(){
                    $("#user_register_frm #warning_msg_alert").fadeOut();
                },1300);
            }
        });
    });
}

if(document.getElementById('user_login_frm') == null){}
else{
    document.getElementById('user_login_frm').addEventListener('submit',function(e){
        e.preventDefault();
        
        $.ajax({
            url:url_to_request,
            type:'POST',
            data        : new FormData(this), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true,
            contentType: false,
            cache: false,
            processData:false,
            success:function(r){
                //console.log(r);
                if(r.status == true){
                    $("#user_login_frm #success_msg_alert").html("Successfully logged in.");
                    $("#user_login_frm #success_msg_alert").fadeIn();
                    window.location.href = window.location.origin+"/multi_lingual_form/profile.php"
                    
                }
                else{
                    $("#user_login_frm #error_msg_alert").html(r.msg);
                    $("#user_login_frm #error_msg_alert").fadeIn();
                    setTimeout(function(){
                        $("#user_login_frm #error_msg_alert").fadeOut();
                    },1300);
                }
            },
            error:function(err){ 
                //console.error(err);               
                $("#user_login_frm #warning_msg_alert").html("Server internal error.");
                $("#user_login_frm #warning_msg_alert").fadeIn();
                setTimeout(function(){
                    $("#user_login_frm #warning_msg_alert").fadeOut();
                },1300);
            }
        });
    });
}

if(document.getElementById('user_update_frm') == null){}
else{
    document.getElementById('user_update_frm').addEventListener('submit',function(e){
        e.preventDefault();
        
        $.ajax({
            url:url_to_request,
            type:'POST',
            data        : new FormData(this), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true,
            contentType: false,
            cache: false,
            processData:false,
            success:function(r){
                console.log(r);
                if(r.status == true){
                    $("#user_update_frm #success_msg_alert").html(r.msg);
                    $("#user_update_frm #success_msg_alert").fadeIn();
                    setTimeout(function(){
                        window.location.reload();
                    },1500);
                    
                }
                else{
                    $("#user_update_frm #error_msg_alert").html(r.msg);
                    $("#user_update_frm #error_msg_alert").fadeIn();
                    setTimeout(function(){
                        $("#user_update_frm #error_msg_alert").fadeOut();
                    },1300);
                }
            },
            error:function(err){ 
                console.error(err);               
                $("#user_update_frm #warning_msg_alert").html("Server internal error.");
                $("#user_update_frm #warning_msg_alert").fadeIn();
                setTimeout(function(){
                    $("#user_update_frm #warning_msg_alert").fadeOut();
                },1300);
            }
        });
    });
}










//state_dd onchange event
if(document.getElementById('state_dd') == null){}
else{
    state_dd = document.getElementById('state_dd');


    state_dd.addEventListener('change',function(e){
        $("#loader").modal({
            backdrop:false,
            keyboard:false
        });
        var sel_state = (this.value);
        var data_to_send = {
            ActionToCall : "get_cities",
            state_id : sel_state
        };
        $("#city_dd").empty();
        $("#city_dd").append("<option value=''>Select</option>");
        $.ajax({
            url:url_to_request,
            type:'POST',
            data:data_to_send, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : false,
            success:function(r){
                for(var i=0;i<r.length;i++){
                    $("#city_dd").append("<option value='"+r[i].city_id+"'>"+r[i].city_name+"</option>"); 
                }     
                $("#loader").modal('hide');       
            },
            error:function(err){ 
                console.error(err);
            }
        });
    });
    
}