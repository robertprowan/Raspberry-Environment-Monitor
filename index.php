<?php include("control/config.php"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $appName; ?></title>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<style type="text/css">
	body{font-family: 'Open Sans', sans-serif;}
	.result{display:none;}
	.result td{background-color:white;color:#000000;}
	.good{background-color:#27ae60;color:#ffffff}
	.maybe{background-color:#f39c12;}
	.bad{background-color:#c0392b;}
	#currentPage{background-color:#3498db;}
	.navPage{background-color:#246a99;color:#ffffff}
	a{text-decoration:none;color:#ffffff}
	a:hover{text-decoration:underline;color:#ffffff}
	td{-moz-border-radius:6px;-webkit-border-radius:6px;border-radius:6px;padding:10px;font-weight:bold;color:#246a99}
	div{border-style:solid;-moz-border-radius:6px;-webkit-border-radius:6px;border-radius:6px;padding:10px;font-weight:bold;border-color:#246a99}
	</style>
</head>

<body>
<h1><?php echo $appName; ?></h1>

<?php echo $alert;?>
<?php include("view/nav.php"); ?>
<div>
<?php 
switch($page) {

case 0: 
	include("view/status.php"); 
	break;
case 1: 
	include("view/settings.php"); 
	break;
case 2:
        include("view/log.php");
        break;


}
?>
</div>
</body>
</html>
