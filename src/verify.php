<?php
//Filename: verify.php
//Coded by: Adam Humpherys -- www.thescripters.com
//First call database configuration
include("includes/db.php");
//Include header file
include("includes/header.inc");
//Set any variables
$ficId = $_REQUEST['fic'];
$result1 = mysql_query("SELECT valid FROM kpff_fics WHERE fanFicId = '$ficId'",$connect);
while($row = mysql_fetch_array($result1))
  {
    $valid = $row['valid'];
    if ($valid == "True")
      {
        echo "<center><font size=\"5\" color=\"#FF0000\">Fic already active!<br><a href=\"fics.php?fic=$ficId\">Click Here</a> to view</font></center>";
        include("includes/footer.inc");
        exit;
      }
  }
//Call selected fanfiction
$result = mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$ficId'",$connect);
//Page creation for the fic
while($myrow = mysql_fetch_array($result))
  {
    echo "<h2>";
    echo $myrow['ficTitle'];
    echo "<br><font size=\"-1\">";
    echo $myrow['chapter'];
    echo "</font></h2><center><h4><b>By: <a href=\"mailto:";
    echo $myrow['authorEmail'];
    echo "\">";
    echo $myrow['author'];
    echo "</a></b></h4></center><br>";
    echo nl2br($myrow['ficText']);
    echo "<br>";
  }
  //Form at the bottom to verify/remove
  echo "<form action=\"valid.php\" name=\"verifyForm\" method=\"post\">";
  echo "<center><input type=\"password\" name=\"password\"><select name=\"validate\"><option name=\"validate\" value=\"false\">Remove<option name=\"validate\" value=\"true\">Activate</select><select name=\"rating\"><option name=\"rating\" value=\"K\">K<option name=\"rating\" value=\"K+\">K+<option name=\"rating\" value=\"T\">T<option name=\"rating\" value=\"M\">M<option name=\"rating\" value=\"MA\">MA</select><br>";
  echo "<b>Reason for rejection:</b><br><textarea cols=\"45\" rows=\"5\" name=\"reason\"></textarea><br>";
  echo "<input type=\"hidden\" name=\"ficId\" value=\"$ficId\">";
  echo "<input type=\"submit\" value=\"Validate!\">";
  echo "</form>";
//Include footer file
include("includes/footer.inc");
?>
