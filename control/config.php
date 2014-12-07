<?php

$appName = "Raspberry Environment Monitoring";

error_reporting(E_ALL);
ini_set("display_errors", 1);

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

if(isset($alert) == FALSE) $alert = '';

?>