<?php
include("includes/db.php");
include("includes/slashes.php");
$p = $_REQUEST['p'];
if ($p == "update")
 {
   $indexUpdate = $_REQUEST['indexUpdate'];
   $updateForm = mysql_query("UPDATE kpff_config SET Value = '$indexUpdate' WHERE Id = 'Index'",$connect);
   mail("KPFF Editors <editors@kpfanfiction.com>",strip_gpc_slashes("Main Index Updated"),strip_gpc_slashes("The main index page has been updated by an editor.\n\nYou can view it here: http://www.kpfanfiction.com.\n\nThank You\nKPFanFiction Team"),"KPFanFiction.com <webmaster@kpfanfiction.com>");
   header("Location: index.php?mode=editmain");
 }
else
 {
$result = mysql_query("SELECT * FROM kpff_config WHERE Id = 'Index'",$connect);
while($myrow = mysql_fetch_array($result))
  {
    $index = $myrow['Value'];
  }
echo "<h2>Update Index Page</h2>";
echo "<center><form action=\"update.php?p=update\" name=\"updateForm\" method=\"post\">";
echo "<textarea cols=\"100\" rows=\"12\" name=\"indexUpdate\">$index</textarea><br><br>";
echo "<input type=\"submit\" value=\"Update!\"></form></center>";
 }
?>
