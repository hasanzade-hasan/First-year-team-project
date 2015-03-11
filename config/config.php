<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
extract($_POST);
extract($_GET);
$admin_id 			= "sanoadmin";						
$admin_pw			= "sano123!@#";
$data_url			= "/";
?>
