<?php
$p = $_REQUEST['p'];
if ($p == "submit")
   {
     include("includes/slashes.php");
     $userName = $_REQUEST['userName'];
     $userEmail = $_REQUEST['userEmail'];
     $comment = strip_gpc_slashes($_REQUEST['comment']);
     mail("TheScripters.com <contact@thescripters.com>","Contact Made By KPFanFiction.com","Contact has been attempted by $userName ($userEmail) at KPFanFiction.com and has left the following message:\n\n$comment\n\nThank You,\nKPFanFiction by TheScripters","From: KPFanFiction.com Rep <$userEmail>");
     mail("$userName <$userEmail>","Contact Successful","Dear $userName,\n\nWe have received your message. You may expect someone to respond within 24 hours. Maybe sooner depending on urgency and type of request.\n\nWe wish you well until then.\nTheScripters.com","From: TheScripters.com <contact@thescripters.com>");
     header("Location: index.php?mode=contact");
   }
  else
   {
echo "<h2>Contact TheScripters</h2>";
echo "<center><table><tr><td align=\"center\">Adam:</td><td align=\"center\">Wayne:</td></tr><tr><td align=\"center\"><!-- Yahoo! Presence --><a href=\"http://edit.yahoo.com/config/send_webmesg?.target=ah15wm&.src=pg\"><img border=0 src=\"http://opi.yahoo.com/online?u=ah15wm&m=g&t=2\"></a></td><td align=\"center\"><!-- Yahoo! Presence --><a href=\"http://edit.yahoo.com/config/send_webmesg?.target=dmb1981&.src=pg\"><img border=0 src=\"http://opi.yahoo.com/online?u=dmb1981&m=g&t=2\"></a></td></tr></table><br>";
echo "<form action=\"contact.php?p=submit\" method=\"post\">";
echo "<b>Name:</b> <input type=\"text\" name=\"userName\"> &nbsp; <b>Email:</b> <input type=\"text\" name=\"userEmail\"><br><br>";
echo "<b>Question/Comment:</b><br><textarea cols=\"50\" rows=\"7\" name=\"comment\"></textarea><br>";
echo "<input type=\"submit\" value=\"Make Contact!\"></form></center>";
   }
?>
