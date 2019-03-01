<?php
include("includes/db.php");
   echo "<h2>Update Fic Information</h2>";
   echo "<center><font color=\"#FF0000\" size=\"+1\">Click on FicId to update fic information.</font>";
   echo "<br><table border=\"1\"><tr><th>FicId</th><th>FicTitle</th><th>Chapter</th><th>Author</th><th>AuthorEmail</th><th>Valid</th><th>Remove</th></tr>";
   $result3 = mysql_query("SELECT * FROM kpff_fics ORDER BY ficTitle",$connect);
   while($myrow3 = mysql_fetch_array($result3))
     {
       echo "<tr><td align=\"center\"><a href=\"ficedit.php?update=";
       echo $myrow3['fanFicId'];
       echo "\" title=\"Update Fic Info\">";
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
       echo $myrow3['valid'];
       echo "</td><td><a href=\"remfic.php?rem=";
       echo $myrow3['fanFicId'];
       echo "\">Delete Fic</a></td></tr>";
     }
   echo "</table></center><br><br>";
?>
