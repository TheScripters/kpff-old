<?php
include("includes/db.php");
if ($_GET['p'] == "update")
  {
    include("includes/slashes.php");
    $rules = $_REQUEST['RulesUpdate'];
    $rulesForm = mysql_query("UPDATE kpff_config SET Value = '$rules' WHERE Id = 'Rules'",$connect);
    header("Location: index.php?mode=rules");
  }
$result = mysql_query("SELECT Value FROM kpff_config WHERE Id = 'Rules'",$connect);
while($row = mysql_fetch_array($result))
   {
     $rules = $row['Value'];
   }
echo "<form action=\"rules.php?p=update\" name=\"rulesForm\" method=\"post\">
<center><b>Rules/Guidelines:</b><br><textarea cols=\"75\" rows=\"10\" name=\"RulesUpdate\">$rules</textarea><br><input type=\"submit\" value=\"Update\"></form></center>";
?>
