<?php

$sort = $_GET[order];
$desc = (isset($_GET[desc])?1:0);
//print "desc = $desc";

$from = $api."validators";
$a = file_get_contents($from);
$a = json_decode($a,1);
//print_r($a);
//file_put_contents(__FILE__.".log",print_r($a,1));

$th[num] = "№";
$th[nn] = "";
$th[pub_key] = "Public Key";
$th[candidate_address] = "Wallet";
$th[total_stake] = "Stake";
$th[accumulated_reward] = "Reward";
$th[delegators] = "";
$th[coins] = "";
$th[created_at_block] = "";
$th[commission] = "%";
$th[status] = "";
$th[absent_times] = "";

//$th[listen_addr] = "";
//$th[network] = "";
//$th[version] = "";
//$th[other] = "";
//$th[is_outbound] = "";
$skip_sort = "|candidate_address|";
$skip_sort = "|coins|";

print "<table class=\"table table-striped tbl_$item\">";


foreach($a[result] as $nn=>$v2)
{
    $mas[data][$nn] = $v2;
    $mas[nn][$nn] = $nn;

//    $v = $v2[candidate][pub_key];
//    $mas[pub_key][$v] = $nn;

//    $v = $v2[candidate][candidate_address].".$k";
//    $mas[candidate_address][$v] = $nn;
    //-------------------------------
    $t = $v2[candidate][stakes];

    unset($t2,$coins);
    foreach($t as $k4=>$v4)
    {
	$t2[$v4[owner]]++;
	$coins[$v4[coin]] = $v4[coin];
    }
    $t1 = count($t2)."/".count($t).".$nn";
    $t11 = count($t).".$nn";
//print "t1 = $t1<br>";
    $mas[delegators][$t11] = $nn; ;
    $mas[data2][delegators][$nn] = $t1; ;

    ksort($coins);
    $t1 = implode(",",$coins);
    $mas[data2][coins][$nn] = $t1; ;
    //-------------------------------    

    //$k = "stake";
    reset($th);
    foreach($th as $k3=>$v3)
    {
    //if($k3=="nn")continue;
    if(!isset($v2[$k3]))continue;

    $v = $v2[$k3].".$nn";
//print "dddddddddddd $k3 $nn $v<br>";
    $mas[$k3][$v] = $nn;
    $mas[data2][$k3][$nn] = $v;
    }

    reset($th);
    foreach($th as $k3=>$v3)
    {
    //if($k3=="nn")continue;
    if(!isset($v2[candidate][$k3]))continue;
    $v = $v2[candidate][$k3].".$nn";
    $mas[$k3][$v] = $nn;
    $mas[data2][$k3][$nn] = $v;
    }


}

if(!isset($mas[$sort]))$sort = "nn";

reset($th);
print "<tr>";
foreach($th as $k=>$v)
{
    $val = $v;
    if(!$val)$val = $k;
    $add = "order=$k";
//    if($k==$sort && !$desc)
//    $add .= "&desc";

    $cls = "$k";
    $t = "";
    if($k==$sort)
    {
    $cls .= " sel";
        if($desc)
	{
	$t = "&#8593;";
	}
        else
	{
	$t = "&#8595;";
        $add .= "&desc";
	}
    }
//print "$k ";
    $js = "";
    if(strpos($skip_sort,"|$k|")===false && isset($mas[$k]))
    {
    $js = " onclick=th_redir('$item','$add')";
    $cls .= " cursor";
    }
    print "<th class=\"$cls\" $js>$val ".$t."</th>";
}
print "</tr>";



//print "sort = $sort";
$c = $mas[$sort];
//print_mas($c);
//print_r($c);
if(!$desc)
ksort($c);
else
krsort($c);
//foreach($c as $k=>$v2)
$nn = 0;
foreach($c as $v2)
{
$nn++;
//$nn = $v2;
    $row = $mas[data][$v2];

    print "<tr>";
    reset($th);
    foreach($th as $k=>$v)
    {
	$val  = "";
	switch($k)
	{
	    case "num":
		$val = $nn;
	    break;
	    case "nn":
		$val = $v2;
	    break;
	    

	    default:
//	    case "pub_key":
//	    case "candidate_address":
//	    case "total_stake":
//		$val = $row[candidate][$k];
		$val = $mas[data2][$k][$v2];
		$t = explode(".",strrev($val),2);
		$val = strrev($t[1]);
//	    break;
	}
	switch($k)
	{
	    case "accumulated_reward":
	    case "total_stake":
		$val = pip2dec($val);
		$val = ceil($val);
	    break;
	    case "status":
		if($val==1)$val = "Offline";
		if($val==2)$val = "Online";
	    break;
	    case "pub_key":
		$t = $val;
		$t2 = substr($t,0,6);
		$t2 .= "...";
		$t3 = substr(strrev($t),0,6);
		$t2 .= strrev($t3);
		$val = "<a href=$explorer/validator/".$val." data-toggle=tooltip2  target=explorer title=\"$val \">$t2</a>";
	    break;
	    case "candidate_address":
		$t = $val;
		$t2 = substr($t,0,6);
		$t2 .= "...";
		$t3 = substr(strrev($t),0,6);
		$t2 .= strrev($t3);
		$val = "<a href=$explorer/address/".$val."  data-toggle=tooltip2 target=explorer title=\"$val \">$t2</a>";
	    break;
	}
//    $val = $k;
    print "<td class=$k>$val</td>";
    }
    

    print "</tr>";
}

print "</table>";

?>