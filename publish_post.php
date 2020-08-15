<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login(); 
?>
<?php 
$_SESSION['ErrorMessage']="Something Went Wrong !!";
if (isset($_SESSION['UserId'])){
    if(!empty($_POST["id"])) {
        $PostId = $_POST["id"];
        $sql = "UPDATE posts SET publishstatus='ON' WHERE id='$PostId'";
        $Execute1 = $ConnectingDB->query($sql);
    }
}
else{
    $_SESSION['ErrorMessage']="Something Went Wrong !!";
}
echo ErrorMessage();

?>