<?php
print "
<script>
function mode(u='?item=center&shadow',d='display') 
{

    $.ajax({
        url: u,
        success: function(data) 
    {
            $('#'+d).html(data);
        }
    });
};
function mode_info()
{
mode(u='?item=info_panel&shadow',d='info_panel') 
}

function th_redir(item,addons)
{
    var url = '?item='+item+'&'+addons;
    console.log('redir to: '+url);
    location.href = url;
}



function httpGetAsync(theUrl,ip, callback)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText,ip);
    }
    xmlHttp.open(\"GET\", theUrl, true); // true for asynchronous 
    xmlHttp.send(null);
}
function parse_res(txt,ip)
{
if(txt!='')
{
 var pos = '';
 var x = '';
 var r = JSON.parse(txt);
//txt = r['result']['latest_block_height'];
//console.log(r.result.status.validator_info.pub_key.value);
txt = r['result']['tm_status']['validator_info']['pub_key']['value'];
txt = base64ToHex(txt);
txt = 'Mp'+txt;
pos = 'td_priv_key_'+c1[ip];
console.log(ip+' '+pos);
x = document.getElementById(pos);
x.innerHTML = txt;
//console.log('['+ip+'] '+txt);

txt = r['result']['latest_block_height']
pos = 'td_blk_'+c1[ip];
x = document.getElementById(pos);
x.innerHTML = txt;

txt = r['result']['latest_block_time']
txt = txt.substr(0,10)+' '+txt.substr(11,8);
pos = 'td_time_'+c1[ip];
x = document.getElementById(pos);
x.innerHTML = txt;

}
}

function base64ToHex(base64) 
{
    return CryptoJS.enc.Base64.parse(base64).toString()
}



</script>
";

?>