<?php 
$emailSubject = '"Test Email"';
$emailMessage = '"If you can read this your email settings are configured correctly"';

$result = shell_exec("python sendEmail.py $emailSubject $emailMessage");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?page=1&emailTest=' . $result;
header("Location: http://$host$uri/$extra");

?>