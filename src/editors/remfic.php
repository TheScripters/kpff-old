<?php
include("includes/db.php");
include("includes/slashes.php");
$rem = $_REQUEST['rem'];
$result1 = mysql_query("SELECT author, authorEmail, ficTitle, chapter FROM kpff_fics WHERE fanFicId = '$rem'",$connect);
while($row = mysql_fetch_array($result1))
  {
    $author = $row['author'];
    $authorEmail = $row['authorEmail'];
    $ficTitle = $row['ficTitle'];
    $chapter = $row['chapter'];
  }
$result = mysql_query("DELETE FROM kpff_fics WHERE fanFicId = '$rem' LIMIT 1",$connect);
mail(strip_gpc_slashes("$author <$authorEmail>"),"Fanfiction Story Removed From KPFanFiction.com",strip_gpc_slashes("Dear $author,\n\nWe regret to inform you that \"$ficTitle - $chapter\" has been removed from KPFanFiction.com. There are many possible reasons why this may have happened. We encourage you to email editors@kpfanfiction.com to find out exactly why it was removed.\n\nThank you.\nKPFanFiction Editors"),"KPFF Editors <editors@kpfanfiction.com>");
mail("KPFF Editors <editors@kpfanfiction.com>","Fic Removed By Editor",strip_gpc_slashes("Dear editors,\n\nAn editor has removed \"$ficTitle - $chapter\" from KPFanFiction.com. The author has been notified thus.\n\nKPFanFiction Team"),"KPFanFiction.com <webmaaster@kpfanfiction.com>");
header("Location: index.php?mode=ficedit");
?>
