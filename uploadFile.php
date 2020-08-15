<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login();
?>
<?php
if(isset($_SESSION['UserId'])){
    if(empty($_FILES["postimage"]["name"])){
        echo "file not found";
        exit();
    }else{

    $temp = explode(".", $_FILES["postimage"]["name"]);
    $SingleImage = round(microtime(true)) . '.' . end($temp);
    $TargetSingleImage = "Uploads/".$SingleImage;
    move_uploaded_file($_FILES["postimage"]["tmp_name"],$TargetSingleImage);
    echo $SingleImage;
    }
}
else{
	echo "Login Required !!";
}
?>