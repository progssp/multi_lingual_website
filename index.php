<?php
include_once(__DIR__.'/common/commons.php');
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if((!isset($_REQUEST['language'])) || ((isset($_REQUEST['language'])) && $_REQUEST['language'] === "en")|| ((isset($_REQUEST['language'])) && $_REQUEST['language'] === "")){
        echo "<script>alert('Your form was submitted with English details.')</script>";
    }
    else{
        echo "<script>alert('Your form was submitted with Hindi details.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Multi lingual form</title>
</head>
<body>
    <?php include_once(__DIR__.'/navbar.php'); ?>

    <div class="container" style="margin-top:20px;margin-bottom:120px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                    Register
                    <?php }else {?>
                    प्रपत्र
                    <?php } ?>
                </h1>
            </div>
        </div>

        <form action="" method="post" id="user_register_frm">
        <input type="hidden" name="ActionToCall" value="user_register" />
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <div class="alert alert-success" id="success_msg_alert" style="display:none;"></div>
                    <div class="alert alert-danger" id="error_msg_alert" style="display:none;"></div>
                    <div class="alert alert-warning" id="warning_msg_alert" style="display:none;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>
                        <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Surname
                        <?php }else {?>
                        उपनाम
                        <?php } ?>
                    </label>
                    <input type="text" name="sur_name" class="form-control" required>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                        <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Name
                        <?php }else {?>
                        नाम
                        <?php } ?>
                    </label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Father/Husband Name
                        <?php }else {?>
                        पिता/पति का नाम
                        <?php } ?>
                    </label>
                    <input type="text" name="f_h_name" class="form-control" required>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Adhar No
                        <?php }else {?>
                        आधार नं.
                        <?php } ?>
                    </label>
                    <input type="text" name="adhar_no" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Address (Society/Street/House No)
                        <?php }else {?>
                        पता (सोसायटी/स्ट्रीट/हाउस नं)
                        <?php } ?>
                    </label>
                    <textarea required rows="5" cols="10" style="width:100%;" type="text" name="address" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Village
                        <?php }else {?>
                        गांव
                        <?php } ?>
                    </label>
                    <input type="text" required name="village" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Taluka
                        <?php }else {?>
                        तालुका
                        <?php } ?>
                    </label>
                    <input type="text" required name="taluka" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        State
                        <?php }else {?>
                        राज्य
                        <?php } ?>
                    </label>
                    <select id="state_dd" name="state" class="form-control" required>
                        <option value="">
                            <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                            Select
                            <?php }else {?>
                            चुनें
                            <?php } ?>
                        </option>
                        <?php 
                        $s_list = getStatesList();
                        foreach($s_list as $state){
                            if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                            <option value="<?php echo $state['id']; ?>"><?php echo $state['state']; ?></option>
                        <?php }
                        else{?>
                            <option value="<?php echo $state['id']; ?>"><?php echo $state['state_hindi']; ?></option>
                        <?php }
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        District
                        <?php }else {?>
                        जिला
                        <?php } ?>
                    </label>
                    <select id="city_dd" name="district" class="form-control" required>
                        <option value="">
                            <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                            Select
                            <?php }else {?>
                            चुनें
                            <?php } ?>
                        </option>
                        <?php 
                        $s_list = getDistrictsList();
                        foreach($s_list as $state){
                            if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                            <option value="<?php echo $state['city_id']; ?>"><?php echo $state['city_name']; ?></option>
                        <?php }
                        else{?>
                            <option value="<?php echo $state['city_id']; ?>"><?php echo $state['city_name']; ?></option>
                        <?php }
                        } 
                        ?>
                    </select>
                </div>
            </div>


            
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Country
                        <?php }else {?>
                        देश
                        <?php } ?>
                    </label>
                    <input type="text" required name="country" class="form-control" />
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Pincode
                        <?php }else {?>
                        पिनकोड
                        <?php } ?>
                    </label>                    
                    <input type="text" required name="pincode" class="form-control" />
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Phone No.
                        <?php }else {?>
                        फोन नं.
                        <?php } ?>
                    </label>
                    <input type="text" required name="phone_no" class="form-control" />
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Mob No.
                        <?php }else {?>
                        मोबाइल नं. 
                        <?php } ?>
                    </label>                    
                    <input type="text" required name="mob_no" class="form-control" />
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Whatsapp No.
                        <?php }else {?>
                        व्हाट्सएप नं.
                        <?php } ?>
                    </label>                    
                    <input type="text" required name="whatsapp_no" class="form-control" />
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Telegram No.
                        <?php }else {?>
                        टेलीग्राम नं.
                        <?php } ?>
                    </label>
                    <input type="text" required name="telegram_no" class="form-control" />
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Email
                        <?php }else {?>
                        ईमेल
                        <?php } ?>
                    </label>                    
                    <input type="email" required name="email" class="form-control" />
                </div>
            </div>
            
        </div>


        <div class="row">
            <div class="col-sm">
                <input type="submit" class="btn btn-primary" value="<?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>Submit<?php } else {?>जमा करें<?php } ?>">
            </div>
        </div>
        </form>

        
    </div>

    <!-- Modal -->
    <div class="modal" id="loader" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Loading districts...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="./loader.gif"/>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>

    

    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var choose_lang_dd = document.getElementById('choose_lang_dd');
        choose_lang_dd.addEventListener('change',function(e){
            var value = this.value;
            var urlToBrowse = window.location.origin+''+window.location.pathname+'?language='+value;
            if(value === ""){
                window.location.href = window.location.origin+''+window.location.pathname+'?language=';
            }
            else{
                window.location.href = window.location.origin+''+window.location.pathname+'?language='+value;
            }
            console.log(window.location.origin+''+window.location.pathname);
            //var text = e.options[e.selectedIndex].text;
            
        });
    </script>

    <script src="./js/app.js"></script>
</body>
</html>