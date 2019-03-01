<?php
//Test Login Form v1
//session_start();
if ($_GET['p'] == "login")
  {
    include("includes/db.php");
    include("includes/slashes.php");
    $username = $_REQUEST['userName'];
    $username2 = strip_gpc_slashes($username);
    $userpass = $_REQUEST['userpass'];
    $userpass2 = strip_gpc_slashes($userpass);
    $md5pass = md5($userpass);
    $loginForm = mysql_query("SELECT * FROM kpff_authors WHERE AuthorName = '$username'",$connect);
    while($login = mysql_fetch_array($loginForm))
      {
        $userid = $login['AuthorId'];
        $sqluser = $login['AuthorName'];
        $sqlpwd = $login['Password'];
        $md5sqlpwd = md5($sqlpwd);
      }
    if (($md5pass == $md5sqlpwd || $md5pass == $sqlpwd) && $sqluser == $username2)
      {
        //$sql = mysql_query("SELECT * FROM kpff_config WHERE Id = 'CookieL'",$connect);
        //while($conf = mysql_fetch_array($sql))
        //  {
        //    $cookieLength = $conf['Value'];
        //  }
        //session_register($username);
        //setcookie("kpff", $username, time()+$cookieLength, "/", "kpfanfiction.com");
        //$sid = strip_tags(SID);
        //$_SESSION["kpffusername"]=$username;
		//$_SESSION["kpffuserid"]=$userid;
      	//header("Location: index.php?$sid");
      	header("Location: createsession.php?u=$username2&i=$userid");
      }
    else
      {
       header("Location: login.php?p=err");
      }
  }
if ($_GET['p'] == "err")
  {
    include("includes/header.inc");
    echo "<h2>Login</h2>";
    echo "<center><font size=\"+2\"><b>Username/password incorrect!</b></font>";
    echo "<form action=\"login.php?p=login\" method=\"post\" name=\"loginForm\">";
    echo "<b>Username:</b> <input type=\"text\" name=\"userName\"><br>";
    echo "<b>Password:</b> <input type=\"password\" name=\"userpass\"><br>";
    echo "<input type=\"submit\" value=\"Login!\"></form></center>";
    include("includes/footer.inc");
    exit;
  }
 else
  {
    include("includes/header.inc");
    echo "<h2>Login</h2>";
    echo "<center><form action=\"login.php?p=login\" method=\"post\" name=\"loginForm\">";
    echo "<b>Username:</b> <input type=\"text\" name=\"userName\"><br>";
    echo "<b>Password:</b> <input type=\"password\" name=\"userpass\"><br>";
    echo "<input type=\"submit\" value=\"Login!\"></form></center>";
    include("includes/footer.inc");
    exit;
  }
?>
