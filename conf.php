<?php


ini_set("default_socket_timeout",1);
$dir = dirname(__FILE__);

$explorer = "https://testnet.explorer.minter.network";

$api_host = "10.163.0.102";
$api = "http://$api_host:8841/api/";
ini_set("error_reporting",2039);
ini_set("display_errors",1);
//display_errors(1);

$rsa = $dir."/conf.ssh";
//print $rsa;die;

include "func.php";
script_time();



$color[minter] = "#d15c22";
//$color[minter] = "#d15c22";
?>