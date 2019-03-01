<?php
include("includes/db.php");
$Delete = $_REQUEST['delete'];
$Post = $_REQUEST['post'];
if ($Delete == "True")
   {
     $PostDelete = mysql_query("DELETE FROM kpff_message WHERE MsgId = '$Post' LIMIT 1",$connect);
     header("Location: index.php?mode=msgbrd");
   }
 else
   {
     header("Location: index.php?mode=msgbrd");
   }
?>
