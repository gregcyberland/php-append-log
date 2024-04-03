<?php
date_default_timezone_set('Asia/Singapore');

// Create a DateTime object representing the current time
$date = new DateTime();

// Format the DateTime object as per the desired format
$timestamp = $date->format('Y-m-d\TH:i:s.u\Z');

$date = $timestamp;
$customer = "csl-applicatoin";
$user = "okkar.min";
$error = "index.php error on line 46 undefined variable \$address";
$ip = getUserIP();

$log = "Log: [".$customer."] [".$date."] [".$user."] [".$error."] [".$ip."]";
$file = '/var/log/custom/custom.log';
file_put_contents($file, $log . PHP_EOL, FILE_APPEND);

echo $log;

function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}