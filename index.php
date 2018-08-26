<?php
include "conf.php";

$shadow = 0;
if(isset($_REQUEST[shadow]))
$shadow = 1;

$item = $_GET[item];
if(!$item)
$item = "center";

$dir = dirname(__FILE__);
if(!$shadow)$inc[] = "header";
if(!$shadow)$inc[] = "css";
if(!$shadow)$inc[] = "js";
if(!$shadow)$inc[] = "navbar";
if(!$shadow)$inc[] = "info_panel";
//$inc[] = "center";
$inc[] = $item;


if(!$shadow)$inc[] = "footer";

foreach($inc as $file)
{
    $include_file = $dir."/inc/".$file.".php";
//print $include_file;
    if(file_exists($include_file))include $include_file;
}
?>
