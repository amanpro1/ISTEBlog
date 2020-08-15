<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login(); ?>
<?php 
    $SearchQueryParameter = $_GET["id"];
    global $ConnectingDB;
    $sql = "SELECT * FROM posts WHERE id= '$SearchQueryParameter'";
    $stmt = $ConnectingDB->query($sql);
    $DataRows = $stmt->fetch();
        $TitleToBeDeleted = $DataRows['title'];
        $CategoryToBeDeleted = $DataRows['category'];
        $ImageToBeDeleted = $DataRows['thumbnail'];
        $PostToBeDeleted = $DataRows['subtitle']; 
        $FeaturedType = $DataRows['main'];
        $TargetQuoteImage = $DataRows['multipurpose'];
        $Image3 = $DataRows['image3'];
        $Image4 = $DataRows['image4'];
        $Image5 = $DataRows['image5'];
        

  if(isset($_POST['Submit'])){
        // Query to delete post in DB When everything is fine
        global $ConnectingDB;
        $sql = "DELETE FROM posts WHERE id='$SearchQueryParameter'";
        $Execute = $ConnectingDB->query($sql);
        if($Execute){
          if($FeaturedType == 'Slider'){
            if(isset($Image3) && !empty($Image3)){
              $Image3 = "Uploads/".$Image3;
              unlink($Image3);
            }
            if(isset($Image4) && !empty($Image4)){
              $Image4 = "Uploads/".$Image4;
              unlink($Image4);
            }
            if(isset($Image5) && !empty($Image5)){
              $Image5 = "Uploads/".$Image5;
              unlink($Image5);
            }
          }
            $Target_Path_to_Delete_Image = "Uploads/$ImageToBeDeleted";
            unlink($Target_Path_to_Delete_Image);
            $_SESSION["SuccessMessage"]="Post Deleted Successfully";
            Redirect_to("Posts.php");
        }else {
            $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
            Redirect_to("Posts.php");
        }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/Styles.css">
    <title>Delete Post</title>
</head>
<body>

    <!-- NAVBAR -->
  <div style="height:10px; background:#27aae1;"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand"> ISTENITDGP.COM</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="MyProfile.php" class="nav-link"> <i class="fas fa-user text-success"></i> My Profile</a>
        </li>
        <li class="nav-item">
          <a href="Dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="Posts.php" class="nav-link">Posts</a>
        </li>
        <li class="nav-item">
          <a href="Categories.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
          <a href="Admins.php" class="nav-link">Manage Admins</a>
        </li>
        <li class="nav-item">
          <a href="Comments.php" class="nav-link">Comments</a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=1" class="nav-link" target="_blank">Live Blog</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="Logout.php" class="nav-link text-danger">
          <i class="fas fa-user-times"></i> Logout</a></li>
      </ul>
      </div>
    </div>
  </nav>
    <div style="height:10px; background:#27aae1;"></div>
    <!-- NAVBAR END -->
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Delete Post</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->
    
    <!-- Main Area -->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
              <?php
                echo ErrorMessage();
                echo SuccessMessage();
              ?>
                <form action="DeletePost.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light mb-3">
                        
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo">Post Title:</span></label>
                                <input disabled class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="<?php echo $TitleToBeDeleted ?>">
                            </div>
                            <div class="form-group">
                                <span class="FieldInfo">Existing Category:</span>
                                <?php echo $CategoryToBeDeleted; ?>
                                <br>
                                
                            </div>
                            <div class="form-group">
                                <span class="FieldInfo">Existing Image:</span>
                                <img class="mb-1" src="Uploads/<?php echo $ImageToBeDeleted; ?>" alt="" style="width:170px; height:70px">
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="Post"> <span class="FieldInfo"> Post Subtitle: </span></label>
                                <textarea disabled class="form-control" id="Post" name="PostSubtitle" rows="8" cols="80"><?php echo $PostToBeDeleted; ?></textarea>
                            </div>
                            <div class="row">
                              <div class="col-lg-6 mb-2">
                                <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
                              </div>
                              <div class="col-lg-6 mb-2">
                                <button type="submit" name="Submit" class="btn btn-danger btn-block">
                                  <i class="fas fa-trash"></i> Delete
                                </button>
                              </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Main Area -->

    <!-- FOOTER -->
    <footer class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col">
          <p class="lead text-center"> Team | ISTENITDGP | <span id="year"></span> &copy; ----All right Reserved.</p>
          <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" href="http://ISTENITDGP.COM/coupons/" target="_blank"> This site is only for Admins ISTENITDGP.COM have all the rights.</a></p>
           </div>
         </div>
      </div>
    </footer>
        <div style="height:10px; background:#27aae1;"></div>
    <!-- FOOTER END-->
    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $('#year').text(new Date().getFullYear());
    </script>
</body>
</html>