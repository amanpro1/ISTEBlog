<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login();
$_SESSION['TrackingURL']=$_SERVER['PHP_SELF']; ?>
<?php 
  if(isset($_POST['Submit'])){
    if(isset($_POST["PostTitle"]) && isset($_POST['Category']) && isset($_POST["Thumb"])){
    $PostTitle = $_POST["PostTitle"];
    $Category  = $_POST["Category"];
    $FeaturedType = $_POST["Thumb"];
    $PostText  = $_POST["PostDescription"];
    $Admin = $_SESSION['UserName'];
    date_default_timezone_set("Asia/Kolkata");
    $CurrentTime=time();
    $DateTime=strval($CurrentTime);
    $Tags = $_POST["tags"].",";

    $sql = "INSERT INTO posts(datetime,title,category,author,main,tags,thumbnail,subtitle";
    if($FeaturedType == 'SingleImage'){
      if(!isset($_FILES["SingleImage"]["name"])){
        $_SESSION["ErrorMessage"] == "File Must Be Uploaded";
        Redirect_to("AddNewPost.php");
      }
      $temp = explode(".", $_FILES["SingleImage"]["name"]);
      $SingleImage = round(microtime(true)) . '.' . end($temp);
      $TargetSingleImage = "Uploads/".$SingleImage;
      $sql .= ")VALUES('$DateTime','$PostTitle','$Category','$Admin','$FeaturedType','$Tags','$SingleImage','$PostText')";
      move_uploaded_file($_FILES["SingleImage"]["tmp_name"],$TargetSingleImage);
    }elseif($FeaturedType == 'Quote'){
      if(!isset($_FILES["QuoteImage"]["name"]) && !isset($_POST["Quote"])){
        $_SESSION["ErrorMessage"] == "Required Field of Main Attraction Type is empty !!";
        Redirect_to("AddNewPost.php");
      }
      $Quote = $_POST["Quote"];
      $temp = explode(".", $_FILES["QuoteImage"]["name"]);
      $QuoteImage = round(microtime(true)) . '.' . end($temp);
      $TargetQuoteImage = "Uploads/".$QuoteImage;
      $sql .= ",multipurpose) VALUES('$DateTime','$PostTitle','$Category','$Admin','$FeaturedType','$Tags','$QuoteImage','$PostText','$Quote')";
      move_uploaded_file($_FILES["QuoteImage"]["tmp_name"],$TargetQuoteImage);
    }elseif($FeaturedType == 'Slider'){
      if(isset($_FILES["Image1"]["name"]) && !empty($_FILES["Image1"]["name"])){
      $temp = explode(".", $_FILES["Image1"]["name"]);
      $Image1 = round(microtime(true)) . '1.' . end($temp);
      $TargetImage1 = "Uploads/".$Image1;
      }
      if(isset($_FILES["Image2"]["name"]) && !empty($_FILES["Image2"]["name"])){
      $temp = explode(".", $_FILES["Image2"]["name"]);
      $Image2 = round(microtime(true)) . '2.' . end($temp);
      $TargetImage2 = "Uploads/".$Image2;
      }
      if(isset($_FILES["Image3"]["name"]) && !empty($_FILES["Image3"]["name"])){
      $temp = explode(".", $_FILES["Image3"]["name"]);
      $Image3 = round(microtime(true)) . '3.' . end($temp);
      $TargetImage3 = "Uploads/".$Image3;
      }
      if(isset($_FILES["Image4"]["name"]) && !empty($_FILES["Image4"]["name"])){
      $temp = explode(".", $_FILES["Image4"]["name"]);
      $Image4 = round(microtime(true)) . '4.' . end($temp);
      $TargetImage4 = "Uploads/".$Image4;
      }
      if(isset($_FILES["Image5"]["name"]) && !empty($_FILES["Image5"]["name"])){
      $temp = explode(".", $_FILES["Image5"]["name"]);
      $Image5 = round(microtime(true)) . '5.' . end($temp);
      $TargetImage5 = "Uploads/".$Image5;
      }
      if(empty($Image3) && empty($Image4) && empty($Image5)){
        if(!empty($Image1) && !empty($Image2)){
        $sql .= ",multipurpose) VALUES('$DateTime','$PostTitle','$Category','$Admin','$FeaturedType','$Tags','$Image1','$PostText','$Image2')"; 
        move_uploaded_file($_FILES["Image1"]["tmp_name"],$TargetImage1);
        move_uploaded_file($_FILES["Image2"]["tmp_name"],$TargetImage2);
        }else{
          $_SESSION["ErrorMessage"]= "Fill At least Image 1 and Image 2";
          Redirect_to("AddNewPost.php");
        }
      }
      elseif(!empty($Image3) && empty($Image4) && empty($Image5)){
        $sql .= ",multipurpose,image3) VALUES('$DateTime','$PostTitle','$Category','$Admin','$FeaturedType','$Tags','$Image1','$PostText','$Image2','$Image3')";
        move_uploaded_file($_FILES["Image1"]["tmp_name"],$TargetImage1);
        move_uploaded_file($_FILES["Image2"]["tmp_name"],$TargetImage2);
        move_uploaded_file($_FILES["Image3"]["tmp_name"],$TargetImage3);
      }
      elseif(!empty($Image3) && !empty($Image4) && empty($Image5)){
        $sql .= ",multipurpose,image3,image4) VALUES('$DateTime','$PostTitle','$Category','$Admin','$FeaturedType','$Tags','$Image1','$PostText','$Image2','$Image3','$Image4')"; 
        move_uploaded_file($_FILES["Image1"]["tmp_name"],$TargetImage1);
        move_uploaded_file($_FILES["Image2"]["tmp_name"],$TargetImage2);
        move_uploaded_file($_FILES["Image3"]["tmp_name"],$TargetImage3);
        move_uploaded_file($_FILES["Image4"]["tmp_name"],$TargetImage4);
      }elseif(!empty($Image3) && !empty($Image4) && !empty($Image5)) {
        $sql .= ",multipurpose,image3,image4,image5) VALUES('$DateTime','$PostTitle','$Category','$Admin','$FeaturedType','$Tags','$Image1','$PostText','$Image2','$Image3','$Image4','$Image5')";
        move_uploaded_file($_FILES["Image1"]["tmp_name"],$TargetImage1);
        move_uploaded_file($_FILES["Image2"]["tmp_name"],$TargetImage2);
        move_uploaded_file($_FILES["Image3"]["tmp_name"],$TargetImage3);
        move_uploaded_file($_FILES["Image4"]["tmp_name"],$TargetImage4);
        move_uploaded_file($_FILES["Image5"]["tmp_name"],$TargetImage5);
      }else {
        $_SESSION["ErrorMessage"]= "Fill Images in Order";
        Redirect_to("AddNewPost.php");
      }
    }elseif($FeaturedType == 'Video'){
      if(!isset($_POST['VideoEmbed']) && !isset($_FILES["ImageThumbnailVideo"]["name"])){
        $_SESSION["ErrorMessage"] == "Required Fields of Main Attraction Type is empty !!";
        Redirect_to("AddNewPost.php");
      }
      $VideoLink = $_POST['VideoEmbed'];
      $temp = explode(".", $_FILES["ImageThumbnailVideo"]["name"]);
      $ImageThumbnail = round(microtime(true)) . '.' . end($temp);
      $TargetImageThumbnail = "Uploads/".$ImageThumbnail;
      $sql .= ",multipurpose) VALUES('$DateTime','$PostTitle','$Category','$Admin','$FeaturedType','$Tags','$ImageThumbnail','$PostText','$VideoLink')";
      move_uploaded_file($_FILES["ImageThumbnailVideo"]["tmp_name"],$TargetImageThumbnail);
    }elseif($FeaturedType == 'Audio'){
      if(!isset($_POST['AudioEmbed']) && !isset($_FILES["ImageThumbnailAudio"]["name"])){
        $_SESSION["ErrorMessage"] == "Required Fields of Main Attraction Type is empty !!";
        Redirect_to("AddNewPost.php");
      }
      $AudioLink = $_POST['AudioEmbed'];
      $temp = explode(".", $_FILES["ImageThumbnailAudio"]["name"]);
      $ImageThumbnail = round(microtime(true)) . '.' . end($temp);
      $TargetImageThumbnail = "Uploads/".$ImageThumbnail;
      $sql .= ",multipurpose) VALUES('$DateTime','$PostTitle','$Category','$Admin','$FeaturedType','$Tags','$ImageThumbnail','$PostText','$AudioLink')";
      move_uploaded_file($_FILES["ImageThumbnailAudio"]["tmp_name"],$TargetImageThumbnail);
    }elseif(empty($FeaturedType)){
      $_SESSION["ErrorMessage"]= "Choose Option From Featured Content !!";
      Redirect_to("AddNewPost.php");
    }elseif(empty($PostTitle)){
      $_SESSION["ErrorMessage"]= "Title Cant be empty";
      Redirect_to("AddNewPost.php");
    }elseif (strlen($PostTitle)<5) {
      $_SESSION["ErrorMessage"]= "Post Title should be greater than 5 characters";
      Redirect_to("AddNewPost.php");
    }elseif(strlen($PostText)>9999) {
      $_SESSION["ErrorMessage"]= "Post Description should be less than than 10000 characters";
      Redirect_to("AddNewPost.php");
    }else{
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("AddNewPost.php");
    }
    

    
        // Query to insert post in DB When everything is fine
        global $ConnectingDB;
        // echo $sql;
        $Execute = $ConnectingDB->exec($sql);
        // var_dump($Execute);
        if($Execute){
           $a = $ConnectingDB->lastInsertId();
            $_SESSION["SuccessMessage"]="Post with id : " .$ConnectingDB->lastInsertId()." added Successfully";
            Redirect_to("EditPost2.php?id=$a");
        }else {
            $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
            Redirect_to("AddNewPost.php");
        }
    
  }else{
    $_SESSION["ErrorMessage"]= "Category,Featured Type and Post Title cannot be blank !!";
    Redirect_to("AddNewPost.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="Css/bootstrap2.css">
    <link rel="stylesheet" href="./Css/Styles.css">
    <title>Blog | New Post</title>
</head>
<body class="fonyawesome bootstrap">

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
          <a href="Popularposts.php" class="nav-link">Front Posts</a>
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
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Add New Post</h1>
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
                <form name="formid" action="AddNewPost.php" method="post" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light mb-3">
                        
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo">Post Title:</span></label>
                                <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="">
                            </div>
                            <div class="form-group">
                                <label for="CategoryTitle"> <span class="FieldInfo"> Choose Categroy: </span></label>
                                <select class="form-control" id="CategoryTitle"  name="Category">
                                    <?php
                                    //Fetchinng all the categories from category table
                                    global $ConnectingDB;
                                    $sql = "SELECT id,title FROM category";
                                    $stmt = $ConnectingDB->query($sql); 
                                    while ($DataRows = $stmt->fetch()) {
                                    $Id = $DataRows["id"];
                                    $CategoryName = $DataRows["title"];
                                    ?>
                                    <option> <?php echo $CategoryName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="FeaturedType"> <span class="FieldInfo"> Main Attraction Type: </span></label>
                                <select class="form-control" id="FeaturedType"  name="Thumb" onchange="getval()">
                                  <option>Select Featured Content</option>
                                  <option value="SingleImage">Single Image</option>
                                  <option value="Quote">Quote With Background Image</option>
                                  <option value="Slider">Multiple Sliding Images(at least 2)</option>
                                  <option value="Video">Video Embed Link from a Site</option>
                                  <option value="Audio">Audio Embed Link from a Site</option>
                                </select>
                            </div>
                            <script>
                              function getval(){
                                var thumbnail = formid.Thumb[formid.Thumb.selectedIndex].text;
                                switch(thumbnail){
                                  case 'Single Image':
                                    document.getElementById('gg').innerHTML=("<div class='custom-file'><input class='custom-file-input' type='file' name='SingleImage' id='imageSelect' value=''><label for='imageSelect' class='custom-file-label'>Select Image </label></div>");
                                    break;
                                  case 'Quote With Background Image':
                                    document.getElementById('gg').innerHTML=("<label for='quote'><span class='FieldInfo'>Quote:</span></label><input class='form-control' type='text' name='Quote' id='quote' placeholder='Type Quote here' value=''><br><div class='custom-file'><input class='custom-file-input' type='file' name='QuoteImage' id='quoteimage' value=''><label for='quoteimage' class='custom-file-label'>Select Background Image </label></div>");
                                    break;
                                  case 'Multiple Sliding Images(at least 2)':
                                    document.getElementById('gg').innerHTML=("<label for='image1'><span class='FieldInfo'>Image 1 (Will Also be used for Thumbnail):</span></label><div class='custom-file'><input class='custom-file-input' type='file' name='Image1' id='image1' value=''><label for='image1' class='custom-file-label'>Select Image </label></div><label for='image2'><span class='FieldInfo'>Image 2:</span></label><div class='custom-file'><input class='custom-file-input' type='file' name='Image2' id='image2' value=''><label for='image2' class='custom-file-label'>Select Image </label></div><label for='image3'><span class='FieldInfo'>Image 3:</span></label><div class='custom-file'><input class='custom-file-input' type='file' name='Image3' id='image3' value=''><label for='image3' class='custom-file-label'>Select Image </label></div><label for='image4'><span class='FieldInfo'>Image 4:</span></label><div class='custom-file'><input class='custom-file-input' type='file' name='Image4' id='image4' value=''><label for='image4' class='custom-file-label'>Select Image </label></div><label for='image5'><span class='FieldInfo'>Image 5:</span></label><div class='custom-file'><input class='custom-file-input' type='file' name='Image5' id='image5' value=''><label for='image5' class='custom-file-label'>Select Image </label></div>");
                                    break;
                                  case 'Video Embed Link from a Site':
                                    document.getElementById('gg').innerHTML=("<label for='video'><span class='FieldInfo'>Video Embed:</span></label><input class='form-control' type='text' name='VideoEmbed' id='video' placeholder='(Only Mention the cutted link of provided Embed Code)' value=''><label for='imageThumbnail'><span class='FieldInfo'>Thumbnail Image for Popular Section(Compulsory):</span></label><div class='custom-file'><input class='custom-file-input' type='file' name='ImageThumbnailVideo' id='imageThumbnail' value=''><label for='imageThumbnail' class='custom-file-label'>Select Thumbnail </label></div>");
                                    break;
                                  case 'Audio Embed Link from a Site':
                                    document.getElementById('gg').innerHTML=("<label for='audio'><span class='FieldInfo'>Audio Embed:</span></label><input class='form-control' type='text' name='AudioEmbed' id='audio' placeholder='(Mention the whole provided Embed Code)' value=''><label for='imageThumbnail'><span class='FieldInfo'>Thumbnail Image for Popular Section(Compulsory):</span></label><div class='custom-file'><input class='custom-file-input' type='file' name='ImageThumbnailAudio' id='imageThumbnail' value=''><label for='imageThumbnail' class='custom-file-label'>Select Thumbnail </label></div>");
                                    break;
                                  default:
                                  document.getElementById('gg').innerHTML=("");
                                }
                              }
                            </script>
                            <div id="gg" class="form-group"></div>
                            <div class="form-group">
                                <label for="tags"> <span class="FieldInfo"> Enter Tags(seperate different tags with comma): </span></label><br>
                                <input class="form-control" type="text" name="tags" id="tags" placeholder="Enter Tags seperated by comma(,)" value="">
                            </div>
                            <div class="form-group">
                                <label for="Post"> <span class="FieldInfo"> Subtitle: </span></label>
                                <textarea class="form-control" id="Post" name="PostDescription" rows="4" cols="30" placeholder="Enter Subtitle here..."></textarea>
                            </div>
                            <div class="row">
                              <div class="col-lg-6 mb-2">
                                <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
                              </div>
                              <div class="col-lg-6 mb-2">
                                <button type="submit" name="Submit" class="btn btn-success btn-block">
                                  <i class="fas fa-check"></i> Publish
                                </button>
                              </div>
                            </div>
                        </div>
                    </div> 
                 </form>
            </div>
          </div>
          <div class="text-center">
          <div style="margin: 15px; color:#777;"><h4><u>Some styled Symbols useful in writing title and subtitle(copy and paste above)</u></h4></div>
          <script src="clipboard.min.js"></script>
          <script>
            new ClipboardJS('.btn');
          </script>
          <!-- Trigger -->
            <button style="background-color: #555; color:#fff; margin-top: 1em;" class="btn" data-clipboard-text="“">
                Copy starting “
            </button>
            <button style="background-color: #555; color:#fff; margin-top: 1em;" class="btn" data-clipboard-text="”">
                Copy ending ”
            </button>
            <button style="background-color: #555; color:#fff; margin-top: 1em;" class="btn" data-clipboard-text="‘">
                Copy starting ‘
            </button>
            <button style="background-color: #555; color:#fff; margin-top: 1em;" class="btn" data-clipboard-text="’">
                Copy ending ’
            </button>
            <button style="background-color: #555; color:#fff; margin-top: 1em;" class="btn" data-clipboard-text="™">
                Copy ™
            </button>
            </div>
    </section>
    <!-- End Main Area -->

    <!-- FOOTER -->
    <footer class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col">
          <p class="lead text-center">Team | ISTENITDGP | <span id="year"></span> &copy; ----All right Reserved.</p>
          <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" href="http://ISTENITDGP.COM/coupons/" target="_blank"> This site is only for Admins ISTENITDGP.COM have all the rights.</a></p>
           </div>
         </div>
      </div>
    </footer>
        <div style="height:10px; background:#27aae1;"></div>
    <!-- FOOTER END-->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script>
        $('#year').text(new Date().getFullYear());
    </script>
</body>
</html>