<ul class="nav_bar container">
    <?php if(empty($_SESSION)){?>
        <li><a href="./login.php?language=<?php echo isset($_REQUEST['language'])?$_REQUEST['language']:"en"; ?>"><?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>Login<?php } else {?>लॉगिन<?php } ?></a></li>
        <li><a href="./?language=<?php echo isset($_REQUEST['language'])?$_REQUEST['language']:"en"; ?>"><?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>Register<?php } else {?>पंजीकृत करें<?php } ?></a></li>
    <?php }else{ ?>        
        <li><a><?php echo $user['first_name']; ?></a></li>
        <li><a href="./logout.php"><?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>Logout<?php } else {?>लॉगआउट<?php } ?></a></li>
    <?php } ?>
    
    
    <li class="right_items">
        <?php if((!isset($_REQUEST['language']))||$_REQUEST['language'] === "en" || $_REQUEST['language'] === ""){?>Select language<?php } else {?>भाषा चुनें<?php } ?>
        <select name="language" id="choose_lang_dd">
            <option value="" <?php if((!isset($_REQUEST['language']))||$_REQUEST['language']===""){echo 'selected';}else{echo '';} ?>>Select</option>
            <option value="en" <?php if((isset($_REQUEST['language']))&&$_REQUEST['language']==="en"){echo 'selected';}else{echo '';} ?>>English</option>
            <option value="hin" <?php if((isset($_REQUEST['language']))&&$_REQUEST['language']==="hin"){echo 'selected';}else{echo '';} ?>>Hindi</option>
        </select>
    </li>
</ul>