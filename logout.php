<?php
session_start();
session_destroy();
header('location:/multi_lingual_form/login.php');
?>