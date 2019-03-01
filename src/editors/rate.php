<?php
include("includes/db.php");
   echo "<h2>Fic Ratings</h2>";
   echo "<center><font color=\"#FF0000\" size=\"+1\">Click on rating or FicId to add/change rating. Clicking on chapter title will open fic in new window.</font>";
   echo "<br><table border=\"1\"><tr><td align=\"center\"><b><font size=\"+2\"><u>FicId</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>FicTitle</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>Chapter</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>Author</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>AuthorEmail</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>Rating</u></font></b></td></tr>";
   $result3 = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'True' ORDER BY ficTitle",$connect);
   while($myrow3 = mysql_fetch_array($result3))
     {
       echo "<tr><td align=\"center\"><a href=\"rating.php?update=";
       echo $myrow3['fanFicId'];
       echo "\" title=\"Change Rating\">";
       echo $myrow3['fanFicId'];
       echo "</a></td><td>";
       echo $myrow3['ficTitle'];
       echo "</td><td><a href=\"http://www.kpfanfiction.com/fics.php?fic=";
       echo $myrow3['fanFicId'];
       echo "\" target=\"_blank\">";
       echo $myrow3['chapter'];
       echo "</a></td><td>";
       echo $myrow3['author'];
       echo "</td><td>";
       echo $myrow3['authorEmail'];
       echo "</td><td align=\"center\"><i><a href=\"rating.php?update=";
       echo $myrow3['fanFicId'];
       echo "&current=";
       echo $myrow3['rating'];
       echo "\" title=\"Change Rating\">";
       echo $myrow3['rating'];
       echo "</a></i></td></tr>";
     }
   echo "</table></center><br><br>";
?>
