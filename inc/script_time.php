<?php
$name = basename(__FILE__);
$name = str_replace(".php","",$name);
print "<div class=\"container well $name\">";
print "Page generation time: ";
$val = script_time("end");
$cls = "";
if($val>1)
$cls = "error";
print "<span class=\"$cls\">$val</span>";
print "</div>";
print "<br><br>";
//print "<br>";
?>