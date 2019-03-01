<h2>Welcome!</h2>
<!-- BEGIN Index Message -- DO NOT EDIT-->
<?php
include("includes/db.php");
include("includes/slashes.php");
$getindex = mysql_query("SELECT * FROM kpff_config WHERE Id = 'Index'",$connect);
while($index = mysql_fetch_array($getindex))
  {
    $index1 = nl2br($index['Value']);
  }
echo $index1;
echo "<br><br>\n";
?>
<!-- END Index Message -->
<!-- BEGIN Editor's Pick -->
<?
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
echo "<center><b>Editor's Pick of the Day:</b> <a href=\"fics.php?fic=$editorspick\">$ficTitle ($chapter)</a> <b>Written by</b> <i>$author</i></center>\n";
?>
<!-- END Editor's Pick -->

<br><br>
<!-- BEGIN Site Statistics -- DO NOT EDIT -->
<?php
$result = mysql_query("SELECT COUNT(*) AS count FROM kpff_fics WHERE valid = 'True'",$connect);
while($myrow = mysql_fetch_array($result))
  {
    $fic = $myrow['count'];
  }
echo "<center>There are <b>$fic</b> fanfictions available for viewing on KPFanFiction.com</center>\n";
?>
<!-- END Site Statistics -->
