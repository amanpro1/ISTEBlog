<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php 
if (isset($_SESSION['UsserId'])){
    if(!empty($_POST["id"])) {
        $AdminId = $_POST["id"];
        $UserId = $_SESSION["UsserId"];
        $sql4 = "SELECT * FROM users WHERE id='$UserId'";
        $stmt = $ConnectingDB->query($sql4);
        $DataRows = $stmt->fetch();
        $Follows = $DataRows["follows"];
        $Follows1 = $Follows;
        $Follows2 ="";
        $Follows = substr("$Follows", 0, -1);
        $str_arr = preg_split ("/\,/", $Follows);
        $i=0;
        foreach($str_arr as $value){
            if($value == $AdminId){
                $i++;
            }else{
                $Follows2 = $value.",";
            }
        }
        if($i == 0){
            $Follows1 = $Follows1."".$AdminId.",";
            $sql = "UPDATE users SET follows='$Follows1' WHERE id='$UserId'";
            $Execute1 = $ConnectingDB->query($sql);
            $sql3 = "UPDATE admins SET followers = followers+1 WHERE id='$AdminId'";
            $Execute2 = $ConnectingDB->query($sql3);
        }else{
            $sql = "UPDATE users SET follows='$Follows2' WHERE id='$UserId'";
            $Execute1 = $ConnectingDB->query($sql);
            $sql3 = "UPDATE admins SET followers = followers-1 WHERE id='$AdminId'";
            $Execute2 = $ConnectingDB->query($sql3);
        }
        echo $i;
}
}
else{
    Redirect_to("LoginUser.php");
}


?>