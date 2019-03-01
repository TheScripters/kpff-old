<?php
include("includes/db.php");
$Post = $_REQUEST['Post'];
$Message = mysql_real_escape_string($_REQUEST['Message']);
$Name = mysql_real_escape_string($_REQUEST['Name']);
$PostEdit = mysql_query("UPDATE kpff_message SET Name = '$Name', Message = '$Message' WHERE MsgId = '$Post'",$connect);
header("Location: index.php?mode=msgbrd");
?>
