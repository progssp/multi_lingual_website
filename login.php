<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login - Multi lingual form</title>
</head>
<body>
<?php include_once(__DIR__.'/navbar.php'); ?>

    <div class="container" style="margin-top:20px;margin-bottom:120px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">
                    <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                    Login
                    <?php }else {?>
                    लॉगिन
                    <?php } ?>
                </h1>
            </div>
        </div>

        <form action="" method="post" id="user_login_frm">
        <input type="hidden" name="ActionToCall" value="user_login" />
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
                        Email
                        <?php }else {?>
                        ईमेल
                        <?php } ?>
                    </label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>
                        <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>
                        Password
                        <?php }else {?>
                        पासवर्ड
                        <?php } ?>
                    </label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-sm">
                <input type="submit" class="btn btn-primary" value="<?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>Login<?php } else {?>लॉगिन<?php } ?>">
            </div>
        </div>
        </form>

        
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