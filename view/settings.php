<?php $config = parse_ini_file('app.ini',1); ?>
<h2>Settings</h2>

<?php
if(isset($_GET['success'])) {
	if($_GET['success'] == 1) echo '<p class="good">Settings successfully saved</p>';
}
if(isset($_GET['emailTest'])) {
	if($_GET['emailTest'] == 'Sent') echo '<p class="good">Test email sent successfully! Please check mailbox</p>';
	if($_GET['emailTest'] == 'Failed') echo '<p class="bad">Test email failed! Please check settings</p>';
}
?>

<h3>Email</h3>
<form action="control/save.php" method="POST">

  Alert Recipient: <input type="text" name="smtpTo" value="<?php echo $config['global']['smtpTo']?>"><br>
  SMTP Server: <input type="text" name="smtpServer" value="<?php echo $config['global']['smtpServer']?>"><br>
  SMTP Username: <input type="text" name="smtpUser" value="<?php echo $config['global']['smtpUser']?>"><br>
  SMTP Password: <input type="password" name="smtpPassword" value="<?php echo $config['global']['smtpPassword']?>"><br>
  SMTP Email Address: <input type="text" name="smtpFrom" value="<?php echo $config['global']['smtpFrom']?>"><br>
  <input type="submit" value="Save">
</form>
<form action="control/testEmail.php">
 <input type="submit" value="Test Email"> (save first)
</form>