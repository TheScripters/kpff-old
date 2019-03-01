<h2>Welcome Editors!</h2>
<?php
include("includes/db.php");
//include("includes/slashes.php");
$getindex = mysql_query("SELECT * FROM kpff_config WHERE Id = 'EditIndex'",$connect);
while($index = mysql_fetch_array($getindex))
  {
    $index1 = nl2br($index['Value']);
  }
echo $index1;
?>
<br><br><br>
<!-- Site Statistics -- DO NOT EDIT -->
<?php
$result = mysql_query("SELECT COUNT(*) AS count FROM kpff_fics WHERE valid = 'False'",$connect);
while($myrow = mysql_fetch_array($result))
  {
    $fic = $myrow['count'];
  }
echo "<center>There are <b>$fic</b> fanfictions that need reviewing before they are publicly viewable on KPFanFiction.com</center>";
?>

<!-- END Site Statistics -->
