<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
//http://stackoverflow.com/questions/5695145/how-to-read-and-write-to-an-ini-file-with-php
function write_php_ini($array, $file)
{
    $res = array();
    foreach($array as $key => $val)
    {
        if(is_array($val))
        {
            $res[] = "[$key]";
            foreach($val as $skey => $sval) $res[] = "$skey = ".(is_numeric($sval) ? $sval : ''.$sval.'');
        }
        else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
    }
    safefilerewrite($file, implode("\r\n", $res));
}
function safefilerewrite($fileName, $dataToSave)
{    if ($fp = fopen($fileName, 'w'))
    {
        $startTime = microtime();
        do
        {            $canWrite = flock($fp, LOCK_EX);
           // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
           if(!$canWrite) usleep(round(rand(0, 100)*1000));
        } while ((!$canWrite)and((microtime()-$startTime) < 1000));

        //file was locked so now we can store information
        if ($canWrite)
        {            fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }

}

$array['global'] = $_POST;
write_php_ini($array,'../app.ini');

$host  = $_SERVER['HTTP_HOST'];
//$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php?page=1&success=1';  // change accordingly

header("Location: http://$host$uri/$extra");

?>