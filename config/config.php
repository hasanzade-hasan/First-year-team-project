<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
ini_set("display_errors", 1);
extract($_POST);
extract($_GET);
$admin_id 			= "sanoadmin";						
$admin_pw			= "sano123!@#";
$data_url			= "/";
?>
