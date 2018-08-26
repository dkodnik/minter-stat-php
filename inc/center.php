<?php
if(!$shadow)
print "<div id=display>";
print date("Y-m-d H:i:s");
if(!$shadow)
{
print "</div>";
print "<script>
setInterval(mode, 1000);
</script>";
}
?>