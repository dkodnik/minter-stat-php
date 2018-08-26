<style>
#info_panel
{
    margin:60px 0 10px 0 ;
}
footer {
	    text-align:center;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
}
<?php
print "
.navbar-brand b
{
color: ".$color[minter].";
}
.navbar-brand a:hover
{
    text-decoration:underline !important;
}
#navbar .active a
{
    background:$color[minter];
/*    text-decoration:underline;*/
}
.tbl_validators .total_stake
,.tbl_validators .created_at_block
,.tbl_validators .commission
,.tbl_validators .delegators
{
    text-align:right;
}
.tbl_validators th
{

}
.tbl_validators th.sel
{
    color:".$color[minter].";
}
.tbl_validators th.cursor
{
    cursor:pointer;
}
.tbl_validators td a
{
    color:$color[minter];
    font-weight:bold;
}
.tbl_netstat .ip
{
    text-align:center;
}
";
?>



</style>