<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>

<?php 
if (isset($_SESSION['UsserId'])){
    if(!empty($_POST["id"])) {
        $DateTime = time();
        $PostId = $_POST["id"];
        $Comment = $_POST['comment'];
        $UserId = $_SESSION["UsserId"];
        $UserName = $_SESSION["UsserName"];
        $UserEmail = $_SESSION["UsserEmail"];
        $sql4 = "INSERT INTO comments(datetime,name,email,comment,post_id) VALUES(:eTime,:euName,:euMail,:timewa,:ePostid)";
        $stmt = $ConnectingDB->prepare($sql4);
        $stmt -> bindValue(':eTime',$DateTime);
        $stmt -> bindValue(':euName',$UserName);
        $stmt -> bindValue(':euMail',$UserEmail);
        $stmt -> bindValue(':timewa',$Comment);
        $stmt -> bindValue(':ePostid',$PostId);
        $Execute = $stmt -> execute();
    }
} 
else{
    Redirect_to("LoginUser.php");
}

?>