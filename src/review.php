<?php
//Filename: review.php
//Coded by Adam Humpheys
    include("includes/db.php");
  // strip_gpc_slashes function created by ferik100@flexis.com.br
  // code found at http://www.php.net/stripslashes
  function strip_gpc_slashes ($input)
   {
    if ( !get_magic_quotes_gpc() || ( !is_string($input) && !is_array($input) ) )
     {
      return $input;
     }
    if ( is_string($input) )
     {
      $output = stripslashes($input);
     }
    else if ( is_array($input) )
     {
      $output = array();
      foreach ($input as $key => $val)
       {
        $new_key = stripslashes($key);
        $new_val = strip_gpc_slashes($val);
        $output[$new_key] = $new_val;
       }
     }
    return $output;
   }
//$date = date('Y-m-d');
$fic = mysql_real_escape_string($_REQUEST['userFic']);
$starLevel = mysql_real_escape_string($_REQUEST['starLevel']);
$userName = mysql_real_escape_string($_REQUEST['userName']);
$userEmail = mysql_real_escape_string($_REQUEST['userEmail']);
$userReview = mysql_real_escape_string($_REQUEST['userReview']);
if(isset ($_GET['p']))
 {
  if ($_GET['p'] == "submit")
   {
    $reviewForm = mysql_query("INSERT INTO kpff_reviews (reviewId, fanFicId, review, starRating, userName, userEmail, datePosted)
    VALUES ('', '$fic', '$userReview', '$starLevel', '$userName', '$userEmail', now())",$connect);
    $result1 = mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$fic'",$connect);
    while($myrow1 = mysql_fetch_array($result1))
    {$authorEmail = $myrow1['authorEmail'];
    $author = $myrow1['author'];
    $ficTitle = $myrow1['ficTitle'];
    $chapter = $myrow1['chapter'];
    $headers = "From: KPFF Editors <editors@kpfanfiction.com>";
    mail("$author <$authorEmail>", strip_gpc_slashes("Review Submitted at KPFanFiction.com"), strip_gpc_slashes("Dear $author,\n\nSomeone has submitted a review on your fanfiction \"$ficTitle - $chapter\".\n\nTo view the review(s) visit: http://www.kpfanfiction.com/revfic.php?fic=$fic.\n\nThank you\nKPFanFiction.com Team"), strip_gpc_slashes($headers));}
    // automatically bring up reviews after submitting
    header( "Location: revfic.php?fic=$fic");
   }
 }
?>
<?
$fic = $_REQUEST['fic'];
$result = mysql_query("SELECT COUNT(*) AS count FROM kpff_reviews WHERE fanFicId = '$fic'",$connect);
while($myrow = mysql_fetch_array($result))
  {
    $count = $myrow['count'];
  }
echo "<br><br><center><font color=\"#FF0000\">This story has <b>$count</b> reviews.</font></center>";
?><br>
<center><font size="4"><b>Submit review on this fic:</b></font>
<script src="includes/reviewfic.js"></script>
<form name="reviewForm" action="review.php?p=submit" method="post" onSubmit="return validate_form();">
  <table>
    <tr><input type="hidden" name="userFic" value="<?echo $_GET['fic'];?>">
      <td align="right"><b>Name:</b></td><td><input type="text" length="35" maxlegnth="35" name="userName"></td>
    </tr>
    <tr>
      <td align="right"><b>Email:</b></td><td><input type="text" length="35" maxlength="35" name="userEmail"> <i>(Optional)</i></td>
    </tr>
    <tr>
      <td align="right"><b>Rating:</b></td><td>
        <select name="starLevel">
        <option name="starLevel" value="1 Star" checked>1 Star
        <option name="starLevel" value="2 Stars">2 Stars
        <option name="starLevel" value="3 Stars">3 Stars
        <option name="starLevel" value="4 Stars">4 Stars
        <option name="starLevel" value="5 Stars">5 Stars
        </select>
      </td>
    </tr>
    <tr>
      <td align="right" valign="top"><b>Comments:</b></td>
      <td><textarea cols="35" rows="10" name="userReview"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" value="Submit"> <input type="button" value="Clear" onClick="clear_form();"></td>
    </tr>
  </table>
</form>
<font size="4"><b><a href="revfic.php?fic=<?echo $_GET['fic'];?>" onMouseOver="window.status='';return true;" onMouseOut="window.status='';return true;">View reviews on this fic</a></b></font>
</center>
