<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
echo ErrorMessage();
echo SuccessMessage();
?>
<?php
$_SESSION["UserId"]=null;
$_SESSION["UserName"]=null;
$_SESSION["AdminName"]=null;
$_SESSION["UsserId"]=null;
$_SESSION["UsserName"]=null;
$_SESSION["UsserImage"]=null;
$_SESSION["UsserEmail"]=null;
session_destroy();
Redirect_to("Login.php");
?>
