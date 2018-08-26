<?php

if(!$shadow)
{
print "<div class=container>";
print "<div id=info_panel class=\"well\">";
}


$from = $api."status";
$a = file_get_contents($from);
$a = json_decode($a,1);
//print_mas($a);
unset($out);
$out[latest_block_height] = "Last Block";
$out[latest_block_time] = "BlockTime";
$out[voting_power] = "Voting power";
$out[version] = "Version";
$out[time] = "Gen.time";
$out[script_time] = "Generation time";


print "KEY: <b class=key>Mp5cf23d115888382419d80955a5f166b9e71caef5238a30739fefee27c1b3c167</b><br>";

foreach($out as $k=>$v)
{
    $val = "";
    switch($k)
    {
	case "time":
	    $val = date("Y-m-d H:i:s");
	break;
	case "script_time":
	    $val = script_time("end");
	    $val = round($val,4)." s";
	break;
	case "latest_block_time":
	    $val = $a[result][$k];
	    $t = substr($val,0,10);
	    $t .= " ";
	    $t .= substr($val,11,8);
	    $val = $t;
//	    $val = strtotime($val);
//	    $val = date("Y-m-d H:i:s",$val);
	break;
	case "voting_power":
	    $val = $a[result][tm_status][validator_info][$k];
	break;
	default:
	    $val = $a[result][$k];
    }
    print "$v: <b>$val</b><br>";
}
//print rand()*10000000;

if(!$shadow)
{
print "
</div>
</div>
<script>
setInterval(mode_info, 2000);
</script>
";
}

?>