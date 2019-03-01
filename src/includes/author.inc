<?php
include("includes/slashes.php");
error_reporting(E_ALL ^ E_NOTICE);
if(isset ($_GET['view'])) // view biography and fic list for one author
 {
  $authorSel2 = $_GET['view']; // used for SELECT SQL queries (slashes included)
  $authorSel = strip_gpc_slashes($authorSel2); // used for displaying purposes (no slahes)
  $result3 = mysql_query("SELECT COUNT(*) as 'count' FROM kpff_authors WHERE AuthorName = '$authorSel2'",$connect);
  while($myrow3 = mysql_fetch_array($result3))
   {
    if($myrow3['count'] == 0) // author has not created a bio yet
     $authorBioExist = 0;
    else // author has created a bio
     $authorBioExist = 1;
   }
  if ($authorBioExist == 1) // display author's bio
   {
    echo "<h2>$authorSel's Biography</h2>";
    $result4 = mysql_query("SELECT * FROM kpff_authors WHERE AuthorName = '$authorSel2'",$connect);
    while($myrow4 = mysql_fetch_array($result4))
     {
      echo "<ul>";
      echo "<li><b>Name: </b>";
      echo $myrow4['AuthorName'];
      echo "</li>";
      echo "<li><b>E-mail Address: </b><a href=\"mailto:";
      echo $myrow4['AuthorEmail'];
      echo "\">";
      echo $myrow4['AuthorEmail'];
      echo "</a></li>";
      echo "<li><b>Age: </b>";
      echo $myrow4['Age'];
      echo "</li>";
      echo "<li><b>Interests: </b>";
      echo $myrow4['Interests'];
      echo "</li>";
      echo "<li><b>About Me: </b><br>";
      echo nl2br($myrow4['AboutAuthor']);
      echo "</li>";
      echo "</ul>";
      if ($userNameSession == $authorSel)
       echo "<a href=\"authors.php?mode=Update\">Update</a>";
     }
   }  
  echo "<h2>Stories by $authorSel</h2>";
  echo "<br>Fics written/submitted by $authorSel are listed below.<br><ul>";
  $result2 = mysql_query("SELECT * FROM kpff_fics WHERE author = '$authorSel2' AND valid = 'True'",$connect);
  while($myrow2 = mysql_fetch_array($result2))
   {
    echo "<li><a href=\"fics.php?fic=";
    echo $myrow2['fanFicId'];
    echo "\">";
    echo $myrow2['ficTitle'];
    echo " - ";
    echo $myrow2['chapter'];
    echo "</a></li>";
   }
  echo "<h2><a href=\"authors.php\">View all authors</a></h2>"; 
 }
else if (isset ($_GET['mode'])) // some action will be performed to biography
 {
  $action = $_GET['mode'];
  if ($action == 'Update') // author wants to update their biography
   {
    echo "<script src=\"includes/authorupdate.js\"></script>";
    $author = $userNameSession;
    $author2 = strip_gpc_slashes($author);
    echo "<form name=\"updateForm\" method=\"post\" action=\"authorsupdate.php\" onSubmit=\"return validate_form();\">";
    $result5 = mysql_query("SELECT * FROM kpff_authors WHERE AuthorName = '$author'",$connect);
    while($myrow5 = mysql_fetch_array($result5))
     {
      $AuthorName = strip_gpc_slashes($myrow5['AuthorName']);
      $CurrentAuthorName = strip_gpc_slashes($myrow5['AuthorName']);
      $AuthorEmail = strip_gpc_slashes($myrow5['AuthorEmail']);
      $CurrentAuthorEmail = strip_gpc_slashes($myrow5['AuthorEmail']);
      $Age = strip_gpc_slashes($myrow5['Age']);
      $Interests = strip_gpc_slashes($myrow5['Interests']);
      $AboutAuthor = strip_gpc_slashes($myrow5['AboutAuthor']);
      
      // issue: can't display both ' & ". Can use addslashes but
      // looks weird to user when all the \ appear in text box
      // set so value accepts ' If user has " in any accept textarea
      // string terminates at "

      echo "<table><tr>";
      echo "<td valign=top><a href=\"authors.php?view=$author2\">Return to biography</a></td>";
      echo "</tr></table>";
  
      echo "<table><tr><td valign=top>";
  
      echo "<input type=hidden name=oldName value=\"";
      echo $CurrentAuthorName;
      echo "\">";
      
      echo "<input type=hidden name=oldEmail value=\"";
      echo $CurrentAuthorEmail;
      echo "\">";
      
      echo "<ul>";
 
      echo "<li><b>Name: </b><br>";
      echo "<input type=text name=updateName size=50 value=\"";
      echo $AuthorName;
      echo "\">";
      echo "</li>";
 
      echo "<li><b>E-mail Address: </b><br>";
      echo "<input type=text name=updateEmail size=50 value=\"";
      echo $AuthorEmail;
      echo "\">";
      echo "</li>";
      
      echo "<li><b>Age: </b><br>";
      echo "<input type=text name=updateAge size=50 value=\"";
      echo $Age;
      echo "\">";
      echo "</li>";
      
      echo "<li><b>Interests: </b><br>";
      echo "<input type=text name=updateInterests size=50 value=\"";
      echo $Interests;
      echo "\">";
      echo "</li>";
      
      echo "<li><b>About Me: </b><br>";
      echo "<textarea name=updateAboutMe rows=10 cols=40>";
      echo $AboutAuthor;
      echo "</textarea>";
      echo "</li>";
      
      echo "</ul>";
      
      echo "</td><td valign=top>";
    
      echo "<input type=hidden name=authorName value=\"";
      echo $author;
      echo "\">"; 
      echo "<ul>";
      echo "<li><b>Old Password: </b><br>";
      echo "<input type=password name=oldPassword size=30>";
      echo "</li>";
      echo "<br><br>";
      echo "<li><b>New Password: </b><br>";
      echo "<input type=password name=newPassword1 size=30>";
      echo "</li>";
      echo "<br><br>";
      echo "<li><b>Retype New Password: </b><br>";
      echo "<input type=password name=newPassword2 size=30>";
      echo "</li>";
      echo "</ul>";
	
      echo "<br>";
      echo "</td></tr><tr><th colspan=2><input type=\"submit\" value=\"Submit\"></th></tr></table>";
     }
    echo "</form>";
   }
  /*
  if ($action == 'UpdatePassword')
   {
    echo "<script src=\"includes/authorupdatepass.js\"></script>";
    $author = $_GET['author'];
    $author2 = strip_gpc_slashes($author);
    echo "<form name=\"updatePass\" method=\"post\" action=\"authorsupdatepass.php\" onSubmit=\"return validate_form();\">";
    
    echo "<input type=hidden name=authorName value=\"";
    echo $author;
    echo "\">"; 
    echo "<ul>";
    echo "<li><b>Old Password: </b><br>";
    echo "<input type=password name=oldPassword size=30>";
    echo "</li>";
    echo "<br><br>";
    echo "<li><b>New Password: </b><br>";
    echo "<input type=password name=newPassword1 size=30>";
    echo "</li>";
    echo "<br><br>";
    echo "<li><b>Retype New Password: </b><br>";
    echo "<input type=password name=newPassword2 size=30>";
    echo "</li>";
    echo "</ul>";
    
    echo "<table><tr>";
    echo "<td><a href=\"javascript:history.go(-1)\">Go back</a></td>";
    echo "<td><input type=\"submit\" value=\"Submit\"></td>";
    echo "</tr></table>";
    echo "</form>";
   }
  */
 }
else // view list of authors
 {
  echo "<h2>Choose an author...</h2>";
  $result = mysql_query("SELECT DISTINCT author FROM kpff_fics ORDER BY 'author'",$connect);
  while($myrow = mysql_fetch_array($result))
   {
    $authorName = $myrow['author'];
    echo "<li><a href=\"authors.php?view=$authorName\">";
    echo $myrow['author'];
    echo "</a></li>";
   }
 }
?>
