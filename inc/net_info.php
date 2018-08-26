<?php

$from = $api."net_info";
$a = file_get_contents($from);
$a = json_decode($a,1);
$th[nn] = "№";
$th[id] = "";
$th[listen_addr] = "";
$th[network] = "";
$th[version] = "";
$th[other] = "";
$th[is_outbound] = "";

print "<div class=container>";
print "<table class=\"table table-striped tbl_$item\">";

reset($th);
print "<tr>";
foreach($th as $k=>$v)
{
    $val = $v;
    if(!$val)$val = $k;
    print "<th class=$k>$val</th>";
}
print "</tr>";

$nn = 0;
foreach($a[result][peers] as $v2)
{
    $nn++;
    print "<tr>";
//    foreach($v2[node_info] as )
    reset($th);
    foreach($th as $k=>$vk)
    {
	switch($k)
	{
	    case "nn":
		$val = $nn;
	    break;
	    case "id":
	    case "listen_addr":
	    case "network":
	    case "version":
	    case "is_outbound";
		$val = $v2[node_info][$k];
	    break;
	    case "other":
		$val = $v2[node_info][$k];
		$val = implode("<br>",$val);
	    break;
	}
	switch($k)
	{
	    case "listen_addr":
	    $t = explode(":",$val);
	    $ip = $t[0];
		$url = "http://$ip:3000";
		$t = "<a href=$url>$val</a>";
		$val = $t;
	    break;
	}
	print "<td class=\"$k\">$val</td>";
    }
    print "</tr>";
}
print "</table>";
print "</div>";
?>