<?php
//Filename: fics.php
//Coded by Adam Humpherys.
//error_reporting(E_ALL ^ E_NOTICE);
//Set variable
$fic = $_REQUEST['fic'];

//Include header file
include("includes/header.inc");
//Include database configuration
include("includes/db.php");
//More setting of variables and getting of info
if(isset ($_GET['fic']))
 {//If there's a value on 'fic' then do the following
  if ($_GET['fic'] == "$fic")
   {
    if ($fic != "atoz")
     {//Query the database for the story which has a fanFicId which matches the variable set earlier
      $result = mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$fic'",$connect);
      $found = 0; // initially set the fic found variable to 0 for not found
      while($myrow = mysql_fetch_array($result))
       {//set the variables so we don't have to re-query later
        $valid = $myrow['valid'];
        $ficText = $myrow['ficText'];
        $datePosted = $myrow['datePosted'];
        $ficTitle = $myrow['ficTitle'];
        $ficChapter = $myrow['chapter'];
        $author = $myrow['author'];
        $authorEmail = $myrow['authorEmail'];
        $fanFicNum = $myrow['fanFicId'];
        if ($_GET['fic'] == $fanFicNum) // match was found between $fic= and FanFicId
         $found = 1; // the fan fic was found. if not found, result stays 0 and we move on to next record
       }
      //If this variable equals "False" display error message and don't go any further
      if ($valid == "False")
       {
        echo "<center><font size=\"5\" color=\"red\">Story \"$ficTitle - $ficChapter\" not active. Please try again later.</font></center>";
        include("includes/footer.inc");
        exit();
       }
      //The variable said "True" so we use the variables created earlier and create the page.
      if ($found == 1) // the fan fic was found
       {
        echo "<h2>$ficTitle<br><font size=\"-1\">$ficChapter</font></h2><center>";
        echo "<h4><b>By: <a href=\"authors.php?view=$author\">$author</a></b></h4>";
        echo "<h5>Added on: $datePosted</h5></center><br>";
        echo nl2br($ficText);
        echo "<br><br>";
        //Don't include review.php if $fic has value of either "atoz" or "submit"
        if ($fic != "atoz")
         {
          include("review.php");
         }
       }
      else // found == 0 and the fan fic was not found
       {
        include( "includes/fic-error.inc");
       }
     }
    else // fic does == a to z
     {
      include("includes/atoz.inc");
     }
   }
 }
else
 {
  include( "includes/fic-error.inc");
 }
include("includes/footer.inc");
?>
