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
echo "<h2>Latest Stories</h2><center><table>";
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
         echo $myrow['chapter'];
         echo " -- Rated (";
         echo $myrow['rating'];
         echo ")<br><hr width=\"60%\" size=\"2\" color=\"black\"></td></tr>";
       }
    echo "</table></center>";
?>
