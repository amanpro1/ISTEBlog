<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if (isset($_SESSION['UsserId'])){
    $_SESSION["SuccessMessage"] = "You are already logged in !!";
}
  $UserEmail = $_POST["email"];
  $pasword = $_POST["password"];
  $salt = "isteblog";
  $Password = sha1($pasword.$salt);
  if (empty($UserEmail)||empty($Password)) {
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
  }else {
    // code for checking username and password from Database
    $Found_Account=Login_AttemptUser($UserEmail,$Password);
    if ($Found_Account) {
      $_SESSION["UsserId"]=$Found_Account["id"];
      $_SESSION["UsserName"]=$Found_Account["usern"];
      $_SESSION["UsserImage"]=$Found_Account["imageuser"];
      $_SESSION["UsserEmail"]=$Found_Account["email"];
      $_SESSION["SuccessMessage"]= "Welcome ".$_SESSION["UsserName"]."!";
      if(isset($_COOKIE['TrackingURL'])){
      $Track = $_COOKIE["TrackingURL"];
      $value = array('return' => 'success', 'URL' => $Track);
      header('Content-Type: application/json');
      echo json_encode($value);
      exit;
      }
    }else {
      $_SESSION["ErrorMessage"]="Incorrect Username/Password";
    }
  }


?>
