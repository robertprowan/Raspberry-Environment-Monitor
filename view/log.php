<h2>Event Log</h2>
<a href="../log/rem.log" download>Download log file</a>
<p>Last 10 events:</p>
<textarea rows="10" cols="100">
<?php echo trim(implode("", array_slice(file("/var/www/rem/htdocs/log/rem.log"), -10))); ?>
</textarea>
