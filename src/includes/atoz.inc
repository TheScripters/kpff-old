<?
include("includes/slashes.php");
if(isset ($_GET['story']))
 {
  
$story = $_GET['story'];
$story3 = strip_gpc_slashes($story);
$story2 = addslashes($story);
echo "<h2>Chapter Listing for $story3</h2>";
echo "<br>";  
$result_chapter = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'True' AND ficTitle = '$story' ORDER BY ficTitle",$connect);

echo "<ul>";
while($myrow_chapter = mysql_fetch_array($result_chapter))
 {
  $ficTitle_atoz = $myrow_chapter['ficTitle'];
  $ficTitle_atoz2 = addslashes($ficTitle_atoz);

  $ficChapter_atoz = $myrow_chapter['chapter'];
  $ficChapter_atoz2 = addslashes($ficChapter_atoz);
   
  $author_atoz = $myrow_chapter['author'];
  $author_atoz2 = addslashes($author_atoz);

  $fanFicNum_atoz = $myrow_chapter['fanFicId'];
  $fanFicRating_atoz = $myrow_chapter['rating'];

  echo "<li><a href=\"fics.php?fic=$fanFicNum_atoz\" onMouseOver=\"window.status='$ficChapter_atoz';return true;\" onMouseOut=\"window.status='';return true;\">$ficChapter_atoz</a> - <b>Rating: $fanFicRating_atoz</b></li><br>";
 }
echo "</ul>";

 }
else
 {

$result_atoz = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'True' UNION SELECT * FROM kpff_azlist ORDER BY ficTitle",$connect);

echo "<h2>Stories A-Z</h2>";
echo "<br>";

$result_atoz2 = mysql_query("SELECT * FROM kpff_azlist ORDER BY 'ficTitle' ASC",$connect);
$notFirst = 0;
echo "<center><font size=+1>";
while($myrow_atoz2 = mysql_fetch_array($result_atoz2))
 {
  $ficTitle_atoz2 = $myrow_atoz2['ficTitle'];
  if ($notFirst == 0)
   {
    echo "| <a href=\"#$ficTitle_atoz2\" onMouseOver=\"window.status='View stories beginning with $ficTitle_atoz2.';return true;\" onMouseOut=\"window.status='';return true;\">$ficTitle_atoz2</a> |";
    $notFirst = 1;
   }
  else
   {
    echo " <a href=\"#$ficTitle_atoz2\" onMouseOver=\"window.status='View stories beginning with $ficTitle_atoz2.';return true;\" onMouseOut=\"window.status='';return true;\">$ficTitle_atoz2</a> |";
   }
 }
echo "</center></font>";
echo "<br>";
//$result_atoz = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'True' ORDER BY 'ficTitle'",$connect);
//$result_atoz = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'True' UNION SELECT * FROM kpff_azlist ORDER BY ficTitle, chapter",$connect);
$result_atoz = mysql_query("SELECT * FROM kpff_fics WHERE valid = 'True' UNION SELECT * FROM kpff_azlist ORDER BY ficTitle",$connect);

echo "<ul>";
while($myrow_atoz = mysql_fetch_array($result_atoz))
 {
  $ficTitle_atoz = $myrow_atoz['ficTitle'];
  $ficTitle_atoz2 = addslashes($ficTitle_atoz);
  
  if ($ficTitle_atoz != $prevficTitle_atoz)
   {
    $ficChapter_atoz = $myrow_atoz['chapter'];
    $ficChapter_atoz2 = addslashes($ficChapter_atoz);
   
    $author_atoz = $myrow_atoz['author'];
    $author_atoz2 = addslashes($author_atoz);
    
    $fanFicNum_atoz = $myrow_atoz['fanFicId'];
    $fanFicRating_atoz = $myrow_atoz['rating'];
    if ($author_atoz == "TheScripters")
     echo "</ul><font size=\"5\"><b><u><a name=\"$ficTitle_atoz\">$ficTitle_atoz</font></a></u></b></font><ul>";
    else
     echo "<li><a href=\"fics.php?fic=atoz&story=$ficTitle_atoz\" onMouseOver=\"window.status='$ficTitle_atoz2';return true;\" onMouseOut=\"window.status='';return true;\">$ficTitle_atoz</a> by <i><a href=\"authors.php?view=$author_atoz\">$author_atoz</a></i></li><br>";
   }
  
  $prevficTitle_atoz = $myrow_atoz['ficTitle'];
  $prevficTitle_atoz2 = addslashes($prevficTitle_atoz);
 }
echo "</ul>";
 
 }
?>
<br>