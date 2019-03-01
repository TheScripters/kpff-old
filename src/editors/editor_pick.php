<?php
include("includes/db.php");
   echo "<h2>Editor's Pick</h2>";
   echo "<center><font color=\"#FF0000\" size=\"+1\">Click on FicId or enter ID# in the textbox and click \"Pick!\" to add fic as the Editor's Pick.</font><br><br>";
   $getpick = mysql_query("SELECT * FROM kpff_config WHERE Id = 'EditorPick'",$connect);
while($editpick = mysql_fetch_array($getpick))
  {
    $editorspick = $editpick['Value'];
  }
$sql = mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$editorspick'",$connect);
while($myrow1 = mysql_fetch_array($sql))
  {
    $ficTitle = $myrow1['ficTitle'];
    $chapter = $myrow1['chapter'];
    $author = $myrow1['author'];
  }
echo "<b>Current Editor's Pick:</b> <a href=\"fics.php?fic=$editorspick\">$ficTitle ($chapter)</a> <b>Written by</b> <i>$author</i>";
?>
<form action="editorpick.php" method="post" name="ficUpdate"><b>FicID:</b> <input type="text" size="4" maxlength="4" name="update"> &nbsp; <input type="submit" value="Pick!"></form>
<?
   echo "<br><table border=\"1\"><tr><td align=\"center\"><b><font size=\"+2\"><u>FicId</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>FicTitle</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>Chapter</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>Author</u></font></b></td><td align=\"center\"><b><font size=\"+2\"><u>AuthorEmail</u></font></b></td></tr>";
   $result3 = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'True' ORDER BY ficTitle",$connect);
   while($myrow3 = mysql_fetch_array($result3))
     {
       echo "<tr><td align=\"center\"><a href=\"editorpick.php?update=";
       echo $myrow3['fanFicId'];
       echo "\" title=\"Choose as Editor's Pick\">";
       echo $myrow3['fanFicId'];
       echo "</a></td><td>";
       echo $myrow3['ficTitle'];
       echo "</td><td>";
       echo $myrow3['chapter'];
       echo "</td><td>";
       echo $myrow3['author'];
       echo "</td><td>";
       echo $myrow3['authorEmail'];
       echo "</td></tr>";
     }
   echo "</table></center><br><br>";
?>
