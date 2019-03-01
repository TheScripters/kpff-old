<?php
include("includes/db.php");
if ($_GET['p'] == "update")
   {
     $rssvalue = $_REQUEST['RSSValue'];
     $RSSUpdate = mysql_query("UPDATE kpff_config SET Value = '$rssvalue' WHERE Id = 'RSSLength'",$connect);
     header("Location: index.php?mode=rss");
   }
$rsscfg = mysql_query("SELECT Value FROM kpff_config WHERE Id = 'RSSLength'",$connect);
while($row = mysql_fetch_array($rsscfg))
  {
    $rss = $row['Value'];
  }
echo "<h2>RSS Configuration</h2><form method=\"post\" name=\"RSSUpdate\" action=\"rsscfg.php?p=update\"><center><font size=\"+1\" color=\"#FF0000\">Enter number of results to be shown in RSS feed:</font><br>";
echo "<input type=\"text\" name=\"RSSValue\" maxlength=\"2\" size=\"2\" value=\"$rss\">";
echo "&nbsp; <input type=\"submit\" value=\"Submit\"></form><br><br>";
echo "<h2>Preview RSS Feed</h2><center><table>";
    $result = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'True' ORDER BY fanFicId DESC LIMIT 0,$rss",$connect);
    while($myrow = mysql_fetch_array($result))
       {
         echo "<tr><td align=\"center\"><a href=\"http://www.kpfanfiction.com/fics.php?fic=";
         echo $myrow['fanFicId'];
         echo "\" target=\"_blank\"><b>";
         echo $myrow['ficTitle'];
         echo "</b></a></td></tr>";
         echo "<tr><td align=\"center\"><i>";
         echo $myrow['datePosted'];
         echo "</i></td></tr>";
         echo "<tr><td align=\"center\">";
         echo $myrow['ficTitle'];
         echo " - ";
         echo $myrow['chapter'];
         echo " -- Rated (";
         echo $myrow['rating'];
         echo ")</td></tr>";
       }
    echo "</table></center>";
?>
