<?php require_once('Includes/DB.php'); ?>
<?php 
    function Redirect_to($New_Location){
        header("Location:".$New_Location);
        exit;
    }
    function CheckUserNameExistsOrNot($username){
        global $ConnectingDB;
        $sql = "SELECT username FROM admins WHERE username=:userName";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':userName',$username);
        $stmt->execute();
        $Result = $stmt->rowcount();
        if($Result == 1){
            return true;
        } 
        else{
            return false;
        }

    }
    function CheckUserExists($UserEmail){
        global $ConnectingDB;
        $sql = "SELECT email FROM users WHERE email=:eMail";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':eMail',$UserEmail);
        $stmt->execute();
        $Result = $stmt->rowcount();
        if($Result == 1){
            return true;
        }
        else{
            return false;
        }

    }
    function Login_Attempt($UserName,$Password){
        global $ConnectingDB;
        $sql = "SELECT * FROM admins WHERE username=:userName AND password=:passWord LIMIT 1";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':userName',$UserName);
        $stmt->bindValue(':passWord',$Password);
        $stmt->execute();
        $Result = $stmt->rowcount();
        if ($Result==1) {
            return $Found_Account=$stmt->fetch();
        }
        else{
            return null;
        } 

    }
    function Login_AttemptUser($UserEmail,$Password){
        global $ConnectingDB;
        $sql = "SELECT * FROM users WHERE email=:eMail AND password=:passWord LIMIT 1";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':eMail',$UserEmail);
        $stmt->bindValue(':passWord',$Password);
        $stmt->execute();
        $Result = $stmt->rowcount();
        if ($Result==1) {
            return $Found_Account=$stmt->fetch();
        }
        else{
            return null;
        }

    }
    function Confirm_Login(){
        if (isset($_SESSION["UserId"])){
            return true;
        }else{
            $_SESSION["ErrorMessage"]="Login Required !";
            Redirect_to("Login.php");
        }
    }
    function Confirm_Login_User(){
        if (isset($_SESSION["UsserId"])){
            return true;
        }else{
            return null;
        }
    }

    function isclapped($PostId){
      if (isset($_SESSION["UsserId"])){
        global $ConnectingDB;
        $UserId = $_SESSION["UsserId"];
        $sql = "SELECT COUNT(*) FROM postlikes WHERE userid='$UserId' AND postid='$PostId'";
        $stmt = $ConnectingDB->query($sql);
        $TotalRows = $stmt->fetch();
        $TotalClaps = array_shift($TotalRows);
        return $TotalClaps;
    }else{
        return 0;
    }
    }

    function TotalPosts(){
        global $ConnectingDB;
        $sql = "SELECT COUNT(*) FROM posts";
        $stmt = $ConnectingDB->query($sql);
        $TotalRows = $stmt->fetch();
        $TotalPosts = array_shift($TotalRows);
        echo $TotalPosts;
      }
      
      function TotalCategories(){
        global $ConnectingDB;
        $sql = "SELECT COUNT(*) FROM category";
        $stmt = $ConnectingDB->query($sql);
        $TotalRows= $stmt->fetch();
        $TotalCategories=array_shift($TotalRows);
        echo $TotalCategories;
      }
      
      function TotalAdmins(){
      
        global $ConnectingDB;
        $sql = "SELECT COUNT(*) FROM admins";
        $stmt = $ConnectingDB->query($sql);
        $TotalRows= $stmt->fetch();
        $TotalAdmins=array_shift($TotalRows);
        echo $TotalAdmins;
      
      }
      
      function TotalComments(){
        global $ConnectingDB;
        $sql = "SELECT COUNT(*) FROM comments";
        $stmt = $ConnectingDB->query($sql);
        $TotalRows= $stmt->fetch();
        $TotalComments=array_shift($TotalRows);
        echo $TotalComments;
      }
      function ApproveCommentsAccordingtoPost($PostId){
        global $ConnectingDB;
        $sqlApprove = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON'";
        $stmtApprove =$ConnectingDB->query($sqlApprove);
        $RowsTotal = $stmtApprove->fetch();
        $Total = array_shift($RowsTotal);
        return $Total;
      }
      
      function DisApproveCommentsAccordingtoPost($PostId){
        global $ConnectingDB;
        $sqlDisApprove = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='OFF'";
        $stmtDisApprove =$ConnectingDB->query($sqlDisApprove);
        $RowsTotal = $stmtDisApprove->fetch();
        $Total = array_shift($RowsTotal);
        return $Total;
      }
      // 2nd JANUARY,2020
      function DateAndMonth($DateforPopular){
        $FinalDate = strftime("%d",$DateforPopular);
        switch($FinalDate){
          case "1":
            $FinalDate .= "ST";
            break;
          case "2":
            $FinalDate .= "ND";
            break;
          case "3":
            $FinalDate .= "RD";
            break;
          default:
            $FinalDate .= "TH";
        }
        $FinalDate .= " ".strtoupper(strftime("%B",$DateforPopular));
        return $FinalDate;
      } 
      function TwitterShare($PostId,$PostTitle,$AdminName){
        $NewLink = "$PostTitle"." by @"."$AdminName"." "."istenitdgp.com/blog/FullPostNew.php?id=$PostId";
        return "https://twitter.com/intent/tweet?text=".rawurlencode($NewLink);
      }
      function LinkedinShare($PostId){
        $NewLink = "istenitdgp.com/blog/FullPostNew.php?id=$PostId";
        return "http://www.linkedin.com/shareArticle?mini=true&url=".rawurlencode($NewLink)."&title=";
      }
      function FacebookShare($PostId){
        $NewLink = "istenitdgp.com/blog/FullPostNew.php?id=$PostId";
        return "https://www.facebook.com/sharer/sharer.php?u=".rawurlencode($NewLink);
      }

      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    function reading_time($Id) {
      global $ConnectingDB;
      $sql = "SELECT * FROM posts WHERE id ='$Id'";
        $stmt7 = $ConnectingDB->query($sql);
        if($DataRows = $stmt7->fetch()){
      
      $words = str_word_count( strip_tags( $DataRows["post"] ) );
      $minutes = floor( $words / 120 );
      $seconds = floor( ($words % 120) / 2 );
  
      if ( $minutes >= 1 ) {
          $estimated_time = $minutes . ' min read';
      } else {
          $estimated_time = $seconds . ' sec read' ;
      }
  
      return $estimated_time;
    }
  }
  function selfURL() 
{ 
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; 
    $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
    return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; 
} 

function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }
?>