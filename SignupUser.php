<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if(!isset($_SESSION['UsserId'])){
    if(empty($_POST["name"])){
        $_SESSION['ErrorMessage']="Name is Required !!";
    }elseif(empty($_POST["email"])){
        $_SESSION['ErrorMessage']="Email is Required !!";
    }elseif(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$_POST["email"])){
        $_SESSION['ErrorMessage']="Invalid Email Format !!";
    }elseif(empty($_POST["password"])){
        $_SESSION['ErrorMessage']="Enter a Valid Password !!";
    }else{
$name = $_POST["name"];
$email = $_POST["email"];
$UserStatus = CheckUserExists($email);
if($UserStatus === FALSE){
$password = $_POST["password"]; 
$salt = "isteblog";
$password_encrypted = sha1($password.$salt);
$temp = explode(".", $_FILES["userimage"]["name"]);
$SingleImage = round(microtime(true)) . '.' . end($temp);
$TargetSingleImage = "userimages/".$SingleImage;
if(isset($_FILES["userimage"]["name"]) && !empty($_FILES["userimage"]["name"])){
$sql = "INSERT INTO users ( email,usern, password,imageuser) 
VALUES ( :eMail,:postText, :publishStatus,:timewa)";
$stmt = $ConnectingDB->prepare($sql);
$stmt -> bindValue(':eMail',$email);
$stmt -> bindValue(':postText',$name);
$stmt -> bindValue(':publishStatus',$password_encrypted);
$stmt -> bindValue(':timewa',$TargetSingleImage);
$Execute = $stmt -> execute();
} else{
    $sql = "INSERT INTO users ( email,usern, password) 
    VALUES ( :eMail,:postText, :publishStatus)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt -> bindValue(':eMail',$email);
    $stmt -> bindValue(':postText',$name);
    $stmt -> bindValue(':publishStatus',$password_encrypted);
    $Execute = $stmt -> execute();
}
if($Execute == TRUE){
    if(isset($SingleImage)){
    move_uploaded_file($_FILES["userimage"]["tmp_name"],$TargetSingleImage);
    echo "success";
    }
}
else{
	echo "Values did not insert !!";
}
}
else{
    echo "User Already Exists !!";
}
}
}
else{
    $_SESSION["ErrorMessage"] = "User already Logged In.";
    echo "User Already Logged in";
}


?>