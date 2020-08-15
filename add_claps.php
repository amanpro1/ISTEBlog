<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login_User(); 
?>
<?php 
if (isset($_SESSION['UsserId'])){
    if(!empty($_POST["id"])) {
        $PostId = $_POST["id"];
        $clap = 1;
        $UserId = $_SESSION["UsserId"];
        $sql4 = "SELECT COUNT(*) FROM postlikes WHERE postid='$PostId' AND userid='$UserId'";
        $stmt = $ConnectingDB->query($sql4);
        $TotalRows= $stmt->fetch();
        $TotalFields=array_shift($TotalRows);
        if($TotalFields > 0){
            $sql = "UPDATE postlikes SET claps = claps+1 WHERE postid='$PostId' AND userid='$UserId'";
            $Execute1 = $ConnectingDB->query($sql);
            echo "success";
        }else{
            $sql = "INSERT INTO postlikes(postid,userid,claps)";
            $sql .= " VALUES('$PostId','$UserId','$clap')";
            $Execute = $ConnectingDB->query($sql);

            echo 0;
        }
    }
}
else{
    echo "LoginUser.php";
}


?>