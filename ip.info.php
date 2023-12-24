<?php

$yellow = "\033[01;33m";
$white_green = "\033[01;37m>\033[01;32m";
$reset = "\033[0m";

$file = "ip.info.txt";
@$ip = file_get_contents($file);

if (!file_exists($file)) {
    $json = file_get_contents('http://ip-api.com/json/');
    $data = json_decode($json, true);
    date_default_timezone_set($data['timezone']);
} else {
    $ip = substr($ip, 0, -1);
    $json = file_get_contents('http://ip-api.com/json/'."$ip");
    $data = json_decode($json, true);
    echo "\n";
}

if(!empty($data['status']) && $data['status'] == 'success') {
    
    echo " " . $yellow . "External IP   " . $white_green . "   " . $data['query'];
    echo "\n " . $yellow . "Country code  " . $white_green . "   " . $data['countryCode'];
    echo "\n " . $yellow . "Country       " . $white_green . "   " . $data['country'];
    echo "\n " . $yellow . "Date & Time   " . $white_green . "   " . date("F j, Y, g:i a");
    echo "\n " . $yellow . "Region code   " . $white_green . "   " . $data['region'];
    echo "\n " . $yellow . "Region        " . $white_green . "   " . $data['regionName'];
    echo "\n " . $yellow . "City          " . $white_green . "   " . $data['city'];
    echo "\n " . $yellow . "Zip code      " . $white_green . "   " . $data['zip'];
    echo "\n " . $yellow . "Time zone     " . $white_green . "   " . $data['timezone'];
    echo "\n " . $yellow . "ISP           " . $white_green . "   " . $data['isp'];
    echo "\n " . $yellow . "Organization  " . $white_green . "   " . $data['org'];
    echo "\n " . $yellow . "ASN           " . $white_green . "   " . $data['as'];
    echo "\n " . $yellow . "Latitude      " . $white_green . "   " . $data['lat'];
    echo "\n " . $yellow . "Longtitude    " . $white_green . "   " . $data['lon'];
    echo "\n " . $yellow . "Location      " . $white_green . "   " . $data['lat'] . "," . $data['lon'];
    echo "\n\n$reset";
}

?>
