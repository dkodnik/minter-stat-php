<?php
$ssh = "";
if($api_host!="127.0.0.1")
{
$a = file_get_contents($rsa);
$file = "/tmp/0_ssh.minter";
file_put_contents($file,$a);
chmod($file,0600);
$user = "al";
//$file = $rsa;
$ssh = "ssh $api_host -l $user -i $file ";
}

$exec = $ssh."netstat -nat 2>&1 | grep -v 'LISTEN' | grep 26656 | grep ESTABLISHED";
//print $exec;
exec($exec,$reg);
//print_mas($reg);
$preg = "/[\s]{1,100}/si";
$script = "";
$script .= "var c1 = new Array();\n";
$script .= "var c2 = new Array();\n";
$script .= "var th = new Array();\n";
$cnn = 0;
foreach($reg as $line)
{
    unset($reg);
    $t = preg_replace($preg,"\t",$line);
    $t = explode("\t",$t);
    $t2 = $t[4];
    $t2 = explode(":",$t2);
    $ip = $t2[0];
    $this_api = "http://$ip:8841";
    $url = $this_api."/api/status";
    $a = "";
    $file2 = "cache/$ip.txt";
    $file = $dir."/".$file2;
    $script .= " httpGetAsync('$url', '$ip',parse_res);\n";

    $script .= "c1['$ip'] = '$cnn';\n";
    $script .= "c2['$cnn'] = '$ip';\n";
    $cnn++;


}

$th[nn] = "";
$th[ip] = "";
$th[priv_key] = "";
$th[blk] = "";
$th[time] = "";
$nn = 0;
reset($th);
foreach($th as $k=>$v)
{

    $script .= "th['$nn'] = '$k'\n";
$nn++;
}



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
	print "</tr>\n";

for($i=0;$i<$cnn;$i++)
{
print "<tr class=\"tr tr$i\">";
    reset($th);
    foreach($th as $k=>$v)
    {
    $id = "td_".$k."_$i";
	$val = "";
	switch($k)
	{
	    case "nn":
		$val = $i;
	    break;
	    case "ip":
		$val = "";
	    break;
	    case "priv_key";
		$val = '';
	    break;


	}
	print "<td class=\"td$i $k\" id=$id>$val</td>\n";
    }
print "</tr>\n";
}
print "</table>\n";
print "</div>";

print "<script>
$script

function print_tbl()
{
    var pos = '';
    var len = c2.length;
    var len2 = th.length;
    var x = '';
    var v = '';
    for(var i = 0;i<len;i++)
    {
	for(var j=0;j<len2;j++)
	{
	pos = 'td_'+th[j]+'_'+i;
	switch(th[j])
	{
	    case 'ip':
	    v = c2[i];
	    //console.log('AA:'+c2[i]);
	    x = document.getElementById(pos);
	    x.innerHTML = v;
	    break;
	}
	console.log(pos);
	}
    }
}
print_tbl();


</script>";


//$script = "";
?>