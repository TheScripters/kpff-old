<?php
include("includes/db.php");
include("includes/slashes.php");
$Name = $_REQUEST['Name'];
$Message = $_REQUEST['Message'];
$date = date("D\, j M Y G:i:s T");
$Post = mysql_query("INSERT INTO kpff_message (MsgId, Name, Message, Time)
VALUES ('', '$Name', '$Message', '$date')",$connect);
if ($_GET['alert'] == "True")
  {
    mail("KPFF Editors <editors@kpfanfiction.com>", "Message Posted at ECP", strip_gpc_slashes("Dear Editors,\n\nA new message has been posted on the ECP at http://editors.kpfanfiction.com/index.php?mode=msgbrd. You can view and reply at that address.\n\nKPFanFiction.com Team"), "From: KPFanFiction.com <webmaster@kpfanfiction.com>");
  }
header("Location: index.php?mode=msgbrd");
?>
