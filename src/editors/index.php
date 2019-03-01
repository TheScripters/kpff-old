<?php
//Filename: index.php
//Coded by Adam Humpherys
error_reporting(E_ALL ^ E_NOTICE);
$mode = $_REQUEST['mode'];
include("includes/header.inc");
if ($mode == "editmain")
   {
     include("update.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "editidx")
   {
     include("editupd.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "contact")
   {
     include("contact.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "rate")
   {
     include("rate.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "ficedit")
   {
     include("fic_edit.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "pick")
   {
     include("editor_pick.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "mail")
   {
     include("authoremail.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "rss")
   {
     include("rsscfg.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "rules")
   {
     include("rules.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "authors")
   {
     include("authorlist.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "msgbrd")
   {
     include("msg.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "links")
   {
     include("linkadmin.php");
     include("includes/footer.inc");
     exit;
   }
else
 {
  include( "includes/index.inc");
 }
include("includes/footer.inc");
?>
