<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["UserId"]=null;
$_SESSION["UserName"]=null;
$_SESSION["AdminName"]=null;
$_SESSION["UsserId"]=null;
$_SESSION["UsserName"]=null;
$_SESSION["UsserImage"]=null;
$_SESSION["UsserEmail"]=null;
session_destroy();
echo $_COOKIE['TrackingURL'];
?>