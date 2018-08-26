<?php
function print_mas($txt)
{
    if(is_array($txt))
    $txt = print_r($txt,1);
    print "<div class=\"well\">";
    print "<pre>";
    print $txt;
    print "</pre>";
    print "</div>";
}
?>