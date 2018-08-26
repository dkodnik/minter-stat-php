    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

<?php
$v1 = $_SERVER["HTTP_HOST"];
$v = $v1;
$v = explode(".",$v);
$v = $v[0];
$v = "<B>MINTER</B> Stat";
print "<a class=\"navbar-brand\" href=\"./\" title=\"$v1\">";
print $v;
print "</a>";
?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

<?php
//            <li class="active"><a href=.>Menu</a></li>
//if($auth[user] == "al")

//print "asdf";
//print_mas($auth);
//$tbl = "server";


//include ifile("menu_algo","includes");

//
unset($link);

$link[net_info] = "NetInfo";
$link[validators] = "Validators";
$link[netstat] = "Netstat";
//$link[] = "";
foreach($link as $k=>$v)
{
//print $item." ".$k."\n";
    $clas = "";
    if($item == $k)$clas = "active";
print "<li".($clas?" class=\"$clas\"":"")."><a href=\"?item=$k\">$v</a></li>\n";
}

/*

//$tbl = "host";
//include ifile("menu_tbl","includes");
print "<li><a href=\"?item=blk_time\">BlockTime</a></li>";
print "<li><a href=\"?item=pool\">Pools</a></li>";
print "<li><a href=\"?item=pool_online\">Pools Online</a></li>";
print "<li><a href=\"?item=demon\">Daemons</a></li>";
//print "<li><a href=\"?item=phpinfo\">phpinfo</a></li>";
*/

include ifile("menu_stat","includes");
include ifile("menu_manage","includes");
//include ifile("menu_strategy","includes");
include ifile("menu_blk_history","includes");
include ifile("menu_pools","includes");

//if(0)
?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
