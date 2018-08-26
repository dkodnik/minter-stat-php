<?php

if(!$shadow)
{
print "<div class=container>";
print "<div id=info_panel class=\"well\">";
}

print rand()*10000000;

if(!$shadow)
{
print "
</div>
</div>
<script>
setInterval(mode_info, 3000);
</script>
";
}

?>