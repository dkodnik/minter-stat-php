<?php
if(!function_exists("script_time"))
{
function script_time($whats="start")
{
        //$debuger = check_debugger(__FUNCTION__);
$GLOBALS[function_exists_mas][__FUNCTION__]++;

        global $script_time,$now_microtime;

if(!isset($now_microtime))
$now_microtime = microtime();
        switch($whats)
        {
                case "start":
                                    //$temp = microtime();
                                    $temp = $now_microtime;
                                    $temp = explode(" ",$temp);
                                    $temp = $temp[1]+$temp[0];
                                    //print $temp."\n";;
                                    $script_time[$whats] = $temp;
                                    $out =  $temp;
                break;
                case "end":
                                    $temp = microtime();
                                    $temp = explode(" ",$temp);
                                    $temp = $temp[1]+$temp[0];
                                    $script_time[$whats] = $temp;
                                    $out  = $temp - $script_time[start];
                break;
        }
//        print "$whats";
//        print_mas($script_time);
        return $out;

}
}
?>
