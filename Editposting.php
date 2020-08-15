<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login();
$_SESSION['TrackingURL']=$_SERVER['PHP_SELF']; 
?>
<?php 
  if(isset($_POST['text']) && isset($_POST['id'])){
    
    $PostText  = htmlentities($_POST["text"]);
    date_default_timezone_set("Asia/Kolkata");
    $CurrentTime=time();

        global $ConnectingDB;
      $PostId = $_POST["id"];
      $sql = "UPDATE posts SET datetime=:dateTimes, post=:postText, publishstatus=:publishStatus WHERE id=:postId";
      $stmt = $ConnectingDB->prepare($sql);
        $stmt -> bindValue(':dateTimes',$CurrentTime);
        $stmt -> bindValue(':postText',$PostText);
        $stmt -> bindValue(':publishStatus','OFF');
        $stmt -> bindValue(':postId',$PostId);
        $Execute = $stmt -> execute();
    
    

        // var_dump($Execute);
        if($Execute){
            echo html_entity_decode($PostText);
            exit();
        }else {
            $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
        }
      }
      else{
        $_SESSION["ErrorMessage"]= "Come With Proper Channel";
      }
  
?>