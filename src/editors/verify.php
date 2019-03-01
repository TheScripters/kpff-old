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
$page = $_REQUEST['p'];
if ($page != "list")
  {
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
  echo "<center><select name=\"validate\"><option name=\"validate\" value=\"false\">Remove<option name=\"validate\" value=\"true\">Activate</select><select name=\"rating\"><option name=\"rating\" value=\"K\">K<option name=\"rating\" value=\"K+\">K+<option name=\"rating\" value=\"T\">T<option name=\"rating\" value=\"M\">M<option name=\"rating\" valie=\"MA\">MA</select><br>";
  echo "<b>Reason for rejection:</b><br><textarea cols=\"45\" rows=\"5\" name=\"reason\"></textarea><br>";
  echo "<input type=\"hidden\" name=\"ficId\" value=\"$ficId\">";
  echo "<input type=\"submit\" value=\"Validate!\">";
  echo "</form>";
  }
if ($page == "list")
 {
   echo "<h2>Inactive Fics</h2>";
   $result1 = mysql_query("SELECT COUNT(*) AS count FROM kpff_fics WHERE valid = 'False'",$connect);
while($myrow1 = mysql_fetch_array($result1))
  {
    echo "<center><b>";
    echo $myrow1['count'];
    echo "</b> fictions in the database need reviewing.</center>";
  }
   echo "<center><br><table border=\"1\"><tr><td align=\"center\"><b>FanFicId</b></td><td align=\"center\"><b>FicTitle</b></td><td align=\"center\"><b>Chapter</b></td><td align=\"center\"><b>Author</b></td><td align=\"center\"><b>AuthorEmail</b></td><td align=\"center\"><b>Date</b></td><td align=\"center\"><b>Action</b></td></tr>";
   $result3 = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'False'",$connect);
   while($myrow3 = mysql_fetch_array($result3))
     {
       echo "<tr><td align=\"center\"><a href=\"verify.php?fic=";
       echo $myrow3['fanFicId'];
       echo "\" target=\"_blank\">";
       echo $myrow3['fanFicId'];
       echo "</a></td><td>";
       echo $myrow3['ficTitle'];
       echo "</td><td>";
       echo $myrow3['chapter'];
       echo "</td><td>";
       echo $myrow3['author'];
       echo "</td><td>";
       echo $myrow3['authorEmail'];
       echo "</td><td>";
       echo $myrow3['datePosted'];
       echo "</td><td><a href=\"#\" onclick=\"window.open('verifywin.php?ficId=";
       echo $myrow3['fanFicId'];
       echo "','','location=no,menubar=no,resizable=no,status=no,toolbar=no,scrollbars=no,width=250,height=125');\">Accept</a>&nbsp;<a href=\"valid.php?ficId=";
       echo $myrow3['fanFicId'];
       echo "&validate=false\">Reject</a></td></tr>";
     }
   echo "</table></center><br><br>";
 }
//Include footer file
include("includes/footer.inc");
?>
