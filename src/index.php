<?php
//Filename: index.php
//Coded by Adam Humpherys
error_reporting(E_ALL ^ E_NOTICE);
$mode = $_REQUEST['mode'];
include("includes/db.php");
include("includes/header.inc");
if(isset ($_GET['mode']))
 {
  if ($_GET['mode'] == "submit")
   {
    include("includes/dbsubmit.inc");
   }
  if ($_GET['mode'] == "register")
   {
     include("includes/register.inc");
   }
  if ($_GET['mode'] == "rules")
   {
     include("rules.php");
   }
  if ($_GET['mode'] == "latest")
   {
     include("latest.php");
   }
  if ($_GET['mode'] == "links")
   {
     include("links.php");
   }
  if ($_GET['mode'] == "editstory")
   {
     include("editstory.php");
   }
 }
else
 {
  include( "includes/index.inc");
 }
include("includes/footer.inc");
?>
