<? session_start(); ?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Kim Possible Fanfiction Megasite</title>
<meta name="resource-type" content="document">
<meta name="revisit-after" content="5">
<meta name="classification" content="Entertainment">
<meta name="description" content="Website for fanfiction for the Disney Channel series Kim Possible. Free submission.">
<meta name="keywords" content="Kim Possible, KP, Ron Stoppable, Rufus, Disney, Drakken, Shego">
<meta name="robots" content="ALL">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="copyright" content="© 2005-2006 KPFanfiction.com; coded by TheScripters.com">
<meta name="author" content="TheScripters">
<meta http-equiv="reply-to" content="webmaster@kpfanfiction.com">
<meta http-equiv="Content-Language" content="en-us">
<link rel="meta" href="http://www.kpfanfiction.com/labels.rdf" type="application/rdf+xml" title="ICRA labels" />
<link title="RSS" rel="alternate" type="application/rss+xml" href="http://www.kpfanfiction.com/rss.php">
<link rel="stylesheet" href="includes/kpff.css" type="text/css">
<script language=JavaScript>
function redirect(URL)
 {
  window.location.href=url;
 }
</script>
</head>

<body>
<h1>Kim Possible Fanfiction</h1>
<? $userNameSession=$_SESSION["kpffusername"]; ?>
<table width="100%">
<tr><td align="right">
<?
//if the user is logged in...
if ($userNameSession)
 {
   $sql6 = mysql_query("SELECT Editor FROM kpff_authors WHERE AuthorName = '$userNameSession'",$connect);
   while($row6 = mysql_fetch_array($sql6))
     {
       $is_editor = $row6['Editor'];
     }
  echo "<font size=+1>Welcome, $userNameSession | <a href=\"authors.php?mode=Update\">Update Profile</a> | <a href=\"logout.php\">Logout</font>";
 }
else
 {
  echo "<font size=+1><a href=\"login.php\">Login</a> | <a href=\"index.php?mode=register\">Register</a></font>";
 }
?>
</td></tr>
</table>
<table width="100%">
  <tr>
    <td valign="top" width="110"><h3>Menu:</h3>
      <ul>
      <li><a href="index.php" onmouseover="window.status='';return true">Main</a></li>
      <li><a href="fics.php?fic=atoz" onmouseover="window.status='';return true"><nobr>Fics A-Z</nobr></a></li>
      <?
      if ($userNameSession)
        {
         echo "<li><a href=\"index.php?mode=submit\" onmouseover=\"window.status='';return true\"><nobr>Submit Story</nobr></a></li>";
         echo "<li><nobr><a href=\"index.php?mode=editstory\" onmouseover=\"window.status='';return true\">Edit Story</a> - <font color=\"#FF0000\">Soon!</font></nobr></li>";
        }
      ?>
      <li><a href="authors.php" onmouseover="window.status='';return true"><nobr>Author Profile</nobr></li>
      <li><a href="index.php?mode=latest" onmouseover="window.status='';return true"><nobr>Latest Stories</nobr></a></li>
      <li><a href="index.php?mode=rules" onmouseover="window.status='';return true">Rules and Guidelines</li>
      <li><a href="index.php?mode=links" onmouseover="window.status='';return true">Linkage</a></li>
      <?
      if ($userNameSession)
        {
          if ($is_editor == "Yes")
             {
               echo "<br><br><li><a href=\"editors\">Control Panel</a></li>";
             }
        }
      ?>
      </ul><br><br><br><br>
      <!--Creative Commons License--><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.5/"><img style="vertical-align: bottom" alt="Creative Commons License" border="0" src="http://creativecommons.org/images/public/somerights20.png"/></a><br/>
		<!--/Creative Commons License--><!-- <rdf:RDF xmlns="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
		<Work rdf:about="">
			<license rdf:resource="http://creativecommons.org/licenses/by-nc-nd/2.5/" />
	<dc:description>Website code and design copyright Adam Humpherys (www.thescripters.com).
This license only allows derivative works from the website design. Contact the author for permission for otherwise.</dc:description>
	<dc:type rdf:resource="http://purl.org/dc/dcmitype/Text" />
		</Work>
		<License rdf:about="http://creativecommons.org/licenses/by-nc-nd/2.5/"><permits rdf:resource="http://web.resource.org/cc/Reproduction"/><permits rdf:resource="http://web.resource.org/cc/Distribution"/><requires rdf:resource="http://web.resource.org/cc/Notice"/><requires rdf:resource="http://web.resource.org/cc/Attribution"/><prohibits rdf:resource="http://web.resource.org/cc/CommercialUse"/></License></rdf:RDF> -->
      <br><br><a href="http://www.thescripters.com" target="_blank" title="Coded by TheScripters.com"><img src="ts-coded1-sm.png" border="0" alt="Coded By TheScripters.com"></a>
    </td>
    <td>
