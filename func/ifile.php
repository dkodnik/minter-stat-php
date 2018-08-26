<?php
function ifile($name,$item="inc")
{
    global $dir;
    $empty = "$dir/inc/empty.php";

    $file = "$dir/$item/$name.php";

    if(!file_exists($file))
    $file = $empty;
    return $file;
}
?>
