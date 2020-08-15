<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $SearchQueryParameter = $_GET['id']; 
if(empty($SearchQueryParameter)){
    echo "Bad Request !! Close Overlay Window";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="Css/style6.css">
    <title>Profile Card</title>
    <script>
        function follow_increase(adminid){
    $.ajax({
	url: "inc_follow.php",
	data:'id='+adminid,
	type: "POST",
	beforeSend: function(){

	},
	success: function(data){
    
    var value = document.getElementById("followers").innerHTML;
    if(data == 0){
        $("#followtext").html('Following');
        var finalvalue = parseInt(value) + 1;
    }else{
        $("#followtext").html('Follow');
        var finalvalue = parseInt(value) - 1;
    }
    $("#followers").html(finalvalue);


	}
	});
}

        
    </script>
</head>
<body>
<?php
      global $ConnectingDB;
      $sql = "SELECT * FROM admins WHERE id='$SearchQueryParameter'";
      $Execute =$ConnectingDB->query($sql);
        $DataRows=$Execute->fetch();
        $AdminId = $DataRows["id"];
        $AdminUsername = $DataRows["username"];
        $AdminName= $DataRows["aname"];
        $AdminImage = $DataRows["aimage"];
        $AdminAbout = $DataRows["abio"];
        $AdminFacebook = $DataRows["facebook"];
        $AdminTwitter = $DataRows["twitter"];
        $AdminInstagram = $DataRows["instagram"];
        $AdminLinkedin = $DataRows["linkedin"];
        $AdminFollowers = $DataRows["followers"];

        $sql = "SELECT COUNT(*) FROM posts WHERE author='$AdminUsername'";
        $stmt = $ConnectingDB->query($sql);
        $TotalRows= $stmt->fetch();
        $TotalPosts=array_shift($TotalRows);
        $TextFollow = "Follow";
        if(Confirm_Login_User() === true){
        $UserId = $_SESSION["UsserId"];
        $sql4 = "SELECT * FROM users WHERE id='$UserId'";
        $stmt = $ConnectingDB->query($sql4);
        $DataRows = $stmt->fetch();
        $Follows = $DataRows["follows"];
        $Follows = substr("$Follows", 0, -1);
        $str_arr = preg_split ("/\,/", $Follows);
        foreach($str_arr as $value){
            if($value == $AdminId){
                $TextFollow = "Following";
            }
        }
        }
      ?>
    <div class="modal">
        <img src="userimages/<?php echo $AdminImage; ?>" alt="">
        <div class="close"></div>
    </div>
    
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="hamburger-menu">
                    <div class="center"></div>
                </div>
                <a href="#" class="mail">
                    <i class="far fa-envelope"></i>
                </a>
                <div class="main">
                    <div style="background: url('userimages/<?php echo $AdminImage; ?>') no-repeat center / cover;" class="image">
                        <div class="hover">
                            <i class="fas fa-camera fa-2x"></i>
                        </div>
                    </div>
                    <h3 class="name"><?php echo $AdminName; ?></h3>
                    <h3 class="sub-name"><?php echo "@".$AdminUsername; ?></h3>
                </div>
            </div>

            <div class="content">
                <div class="left">
                    <div class="about-container">
                        <h3 class="title">About</h3>
                        <p class="text"><?php echo $AdminAbout; ?></p>
                    </div>
                    <div class="icons-container">
                        <a href="<?php echo $AdminFacebook; ?>" target="_blank" class="icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="<?php echo $AdminInstagram; ?>" target="_blank" class="icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="<?php echo $AdminLinkedin; ?>" target="_blank" class="icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="<?php echo $AdminTwitter; ?>" target="_blank" class="icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                    <div class="buttons-wrap">
                        <div class="follow-wrap">
                            <?php if(Confirm_Login_User() === true){ ?>
                            <a id="followtext" onclick="follow_increase('<?php echo $AdminId; ?>')" class="follow" style="cursor:pointer"><?php echo $TextFollow; ?></a>
                            <?php }else{ ?>
                                <a href="LoginUser.php" class="follow"><?php echo $TextFollow; ?></a>
                            <?php } ?>
                        </div>
                        <div class="share-wrap">
                            <a href="#" class="share">Share</a>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div>
                        <h3 class="number"><?php echo $TotalPosts; ?></h3>
                        <h3 class="number-title">Posts</h3>
                    </div>
                    <!-- <div>
                        <h3 class="number">2.4K</h3>
                        <h3 class="number-title">Following</h3>
                    </div> -->
                    <div>
                        <h3 id="followers" class="number"><?php echo $AdminFollowers; ?></h3>
                        <h3 class="number-title">Followers</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>