<?php
include("includes/db.php");
$result = mysql_query("SELECT Value FROM kpff_config WHERE Id = 'Rules'",$connect);
while($row = mysql_fetch_array($result))
   {
     $rules = nl2br($row['Value']);
   }
echo "<h2>Rules/Guidelines</h2><br><br>";
echo $rules;
?>
