<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
Confirm_Login(); ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Css/Styles.css">
  <title>Popular status</title>
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
          <h1><i class="fas fa-comments" style="color:#27aae1;"></i> Popular Status</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->
    <!-- Main Area Start -->
    <section class="container py-2 mb-4">
      <div class="row" style="min-height:30px;">
        <div class="col-lg-12" style="min-height:400px;">
          <?php
           echo ErrorMessage();
           echo SuccessMessage();
           ?>
          <h2>Popular Posts</h2>
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Id </th>
                <th>Date&Time</th>
                <th>Title</th>
                <th>Author</th>
                <th>Banner</th>
                <th>Action</th>
                <th>Details</th>
              </tr>
            </thead>
          <?php
          global $ConnectingDB;
          $sql = "SELECT * FROM posts WHERE popularstatus='ON' AND publishstatus='ON' ORDER BY id desc";
          $Execute =$ConnectingDB->query($sql);
          while ($DataRows=$Execute->fetch()) {
            $PostId = $DataRows["id"];
            $DateTime = $DataRows["datetime"];
            $PostTitle = $DataRows["title"];
            $PostAuthor= $DataRows["author"];
            $PostThumbnail = $DataRows["thumbnail"];
            $DateTime = strftime('%d-%m-%Y',$DateTime);
          ?>
          <tbody>
            <tr>
              <td><?php echo htmlentities($PostId); ?></td>
              <td><?php echo htmlentities($DateTime); ?></td>
              <td><?php echo htmlentities($PostTitle); ?></td>
              <td><?php echo htmlentities($PostAuthor); ?></td>
              <td> <img src="Uploads/<?php echo $PostThumbnail ; ?>" width="100px;" height="50px">  </td>
              <td> <a href="Unpopularpost.php?id=<?php echo $PostId;?>" class="btn btn-danger">Unpopular</a>  </td>
              <td style="min-width:150px;"> <a class="btn btn-primary"href="FullPostNew.php?id=<?php echo $PostId; ?>" target="_blank">Live Preview</a> </td>
            </tr>
          </tbody>
          <?php } ?>
          </table>
          <h2>Unpopular Posts</h2>
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Id </th>
                <th>Date&Time</th>
                <th>Title</th>
                <th>Author</th>
                <th>Banner</th>
                <th>Action</th>
                <th>Details</th>
              </tr>
            </thead>
            <?php
          global $ConnectingDB;
          $sql = "SELECT * FROM posts WHERE popularstatus='OFF' AND publishstatus='ON' ORDER BY id desc";
          $Execute =$ConnectingDB->query($sql);
          while ($DataRows=$Execute->fetch()) {
            $PostId = $DataRows["id"];
            $DateTime = $DataRows["datetime"];
            $PostTitle = $DataRows["title"];
            $PostAuthor= $DataRows["author"];
            $PostThumbnail = $DataRows["thumbnail"];
          ?>
          <tbody>
            <tr>
              <td><?php echo htmlentities($PostId); ?></td>
              <td><?php echo htmlentities($DateTime); ?></td>
              <td><?php echo htmlentities($PostTitle); ?></td>
              <td><?php echo htmlentities($PostAuthor); ?></td>
              <td> <img src="Uploads/<?php echo $PostThumbnail ; ?>" width="100px;" height="50px">  </td>
              <td> <a href="Popularpost.php?id=<?php echo $PostId;?>" class="btn btn-success">Popular</a>  </td>
              <td style="min-width:150px;"> <a class="btn btn-primary"href="FullPostNew.php?id=<?php echo $PostId; ?>" target="_blank">Live Preview</a> </td>
            </tr>
          </tbody>
          <?php } ?>
          </table>
        </div>
      </div>
    </section>
   <!--  Main Area End -->
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body>
</html>
