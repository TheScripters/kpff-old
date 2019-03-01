<?php
include("includes/header.inc");
include("includes/db.php");
include("includes/slashes.php");
$authorSel = $_REQUEST['author'];
echo "<h2>Stories by $authorSel</h2>";
echo "<br>Fics written/submitted by $authorSel are listed below.<br><ul>";
$result = mysql_query("SELECT * FROM kpff_fics WHERE author = '$authorSel'",$connect);
while($myrow = mysql_fetch_array($result))
   {
     echo "<li><a href=\"fics.php?fic=";
     echo $myrow['fanFicId'];
     echo "\" target=\"_blank\">";
     echo $myrow['ficTitle'];
     echo " - ";
     echo $myrow['chapter'];
     echo "</a></li>";
   }
include("includes/footer.inc");
?>
