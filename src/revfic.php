<?php
//Filename: revfic.php
//Coded by Adam Humpherys
//error_reporting(E_ALL ^ E_NOTICE);
include("includes/header.inc");
include("includes/db.php");
$fic = $_REQUEST['fic'];
if(isset ($_GET['fic']))
 {
  if ($_GET['fic'] == "$fic")
   {
    $result1 = mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$fic'",$connect);
    while($myrow1 = mysql_fetch_array($result1))
    {echo "<h2>";
    echo $myrow1['ficTitle'];
    echo "<br><font size=\"-1\">";
    echo $myrow1['chapter'];
    echo "</font></h2><center><h4>By: <a href=\"mailto:";
    echo $myrow1['authorEmail'];
    echo "\">";
    echo $myrow1['author'];
    echo "</a></h4></center>";}
    $result = mysql_query("SELECT * FROM kpff_reviews WHERE fanFicId = '$fic' ORDER BY datePosted",$connect);
    echo "<center><table><tr><td>";
    while($myrow = mysql_fetch_array($result))
             {//begin of loop
               //now print the results:
               echo "<br><b>Reviewer: ";
               echo $myrow['userName'];
               echo "</b><br>";
               echo "<b>Email:</b> <a href=\"mailto:";
               echo $myrow['userEmail'];
               echo "\">";
               echo $myrow['userEmail'];
               echo "</a>";
               echo "<br>On: <i>";
               echo $myrow['datePosted'];
               echo "</i>";
               //echo "<table><tr><td valign=\"center\">";
               echo "<br><b>Rating:</b> ";
               if ($myrow['starRating'] == "1 Star")
                { $numStars = 1; $altNumStars = "1 Star"; }
               else if ($myrow['starRating'] == "2 Stars")
                { $numStars = 2; $altNumStars = "2 Stars"; }
               else if ($myrow['starRating'] == "3 Stars")
                { $numStars = 3; $altNumStars = "3 Stars"; }
               else if ($myrow['starRating'] == "4 Stars")
                { $numStars = 4; $altNumStars = "4 Stars"; }
               else
                { $numStars = 5; $altNumStars = "5 Stars"; }
               for ($i = 1; $i <= $numStars; $i++)
                echo "<img src=\"star-smaller1.gif\" alt=\"$altNumStars\" align=\"middle\"> ";
               //echo "</td></tr></table>";
               echo "<hr align=left width=100%>";
               echo nl2br($myrow['review']);
               echo "<br><br><hr width=50% size=3 color=black>";
             }echo "<br><center><a href=\"fics.php?fic=$fic\">Back to story</a></center></td></tr></table>";
    }
  else
   {
    include("includes/rev-error.inc");
   }
  }
else
 {
  include("includes/rev-error.inc");
 }
include("includes/footer.inc");
?>
