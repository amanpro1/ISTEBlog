<?php 
error_reporting(0);
ini_set('display_errors', 0);
require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $UserLoginStatus=Confirm_Login_User(); 
// $TrackingURI = $_SERVER['PHP_SELF'];
$TrackingURI=selfURL();
// $TrackingURI=selfURL().$_SERVER['PHP_SELF'];
$ExpireTime=time()+86400;
setcookie("TrackingURL",$TrackingURI,$ExpireTime);
?>
<!DOCTYPE html> 
<html>
<head> 
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ISTE – Blog</title>
	<!-- <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/site.webmanifest">
<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff"> -->
<link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
	<!-- include the site stylesheet -->
	<link href='https://fonts.googleapis.com/css?family=Merriweather:300,400,700%7CPoppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/font-awesome.min.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/bootstrap.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/slick.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/animate.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="style.css"> 
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/responsive.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/colors.css">
	<link rel="stylesheet" href="Css/popup.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
		function display_category(){
		document.getElementById('fixinga').style.display = "grid";
		}
		window.onload = function() {
			var width = window.innerWidth;
			$.ajax({

			url: 'window_width.php',
			data: "width="+width,
			type: "POST",
			beforeSend: function(){

			},
			success: function(data) {
			}
			});
		};
		function openNav() {
    document.getElementById("myNav").style.width = "100%";
}
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
};
function logout(){
            $.ajax({

                url: 'LogoutUser.php',
                data: "",
                type: "POST",
                beforeSend: function(){

                },
                success: function(b) {
                        window.location.href = b;
                }
            });
		};
	</script>
</head>
<body class="version-iii">
<div class="popup">
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <iframe src="LoginUser.php" frameborder="0"></iframe>
  </div>
</div></div>

<!-- Direct new svg icons from icomoon start -->
<svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="icon-instagram" viewBox="0 0 32 32">
<path d="M16 2.881c4.275 0 4.781 0.019 6.462 0.094 1.563 0.069 2.406 0.331 2.969 0.55 0.744 0.288 1.281 0.638 1.837 1.194 0.563 0.563 0.906 1.094 1.2 1.838 0.219 0.563 0.481 1.412 0.55 2.969 0.075 1.688 0.094 2.194 0.094 6.463s-0.019 4.781-0.094 6.463c-0.069 1.563-0.331 2.406-0.55 2.969-0.288 0.744-0.637 1.281-1.194 1.837-0.563 0.563-1.094 0.906-1.837 1.2-0.563 0.219-1.413 0.481-2.969 0.55-1.688 0.075-2.194 0.094-6.463 0.094s-4.781-0.019-6.463-0.094c-1.563-0.069-2.406-0.331-2.969-0.55-0.744-0.288-1.281-0.637-1.838-1.194-0.563-0.563-0.906-1.094-1.2-1.837-0.219-0.563-0.481-1.413-0.55-2.969-0.075-1.688-0.094-2.194-0.094-6.463s0.019-4.781 0.094-6.463c0.069-1.563 0.331-2.406 0.55-2.969 0.288-0.744 0.638-1.281 1.194-1.838 0.563-0.563 1.094-0.906 1.838-1.2 0.563-0.219 1.412-0.481 2.969-0.55 1.681-0.075 2.188-0.094 6.463-0.094zM16 0c-4.344 0-4.887 0.019-6.594 0.094-1.7 0.075-2.869 0.35-3.881 0.744-1.056 0.412-1.95 0.956-2.837 1.85-0.894 0.888-1.438 1.781-1.85 2.831-0.394 1.019-0.669 2.181-0.744 3.881-0.075 1.713-0.094 2.256-0.094 6.6s0.019 4.887 0.094 6.594c0.075 1.7 0.35 2.869 0.744 3.881 0.413 1.056 0.956 1.95 1.85 2.837 0.887 0.887 1.781 1.438 2.831 1.844 1.019 0.394 2.181 0.669 3.881 0.744 1.706 0.075 2.25 0.094 6.594 0.094s4.888-0.019 6.594-0.094c1.7-0.075 2.869-0.35 3.881-0.744 1.050-0.406 1.944-0.956 2.831-1.844s1.438-1.781 1.844-2.831c0.394-1.019 0.669-2.181 0.744-3.881 0.075-1.706 0.094-2.25 0.094-6.594s-0.019-4.887-0.094-6.594c-0.075-1.7-0.35-2.869-0.744-3.881-0.394-1.063-0.938-1.956-1.831-2.844-0.887-0.887-1.781-1.438-2.831-1.844-1.019-0.394-2.181-0.669-3.881-0.744-1.712-0.081-2.256-0.1-6.6-0.1v0z"></path>
<path d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219c0-4.537-3.681-8.219-8.219-8.219zM16 21.331c-2.944 0-5.331-2.387-5.331-5.331s2.387-5.331 5.331-5.331c2.944 0 5.331 2.387 5.331 5.331s-2.387 5.331-5.331 5.331z"></path>
<path d="M26.462 7.456c0 1.060-0.859 1.919-1.919 1.919s-1.919-0.859-1.919-1.919c0-1.060 0.859-1.919 1.919-1.919s1.919 0.859 1.919 1.919z"></path>
</symbol>
<symbol id="icon-user" viewBox="0 0 32 32">
<path d="M18 22.082v-1.649c2.203-1.241 4-4.337 4-7.432 0-4.971 0-9-6-9s-6 4.029-6 9c0 3.096 1.797 6.191 4 7.432v1.649c-6.784 0.555-12 3.888-12 7.918h28c0-4.030-5.216-7.364-12-7.918z"></path>
</symbol>
<symbol id="icon-youtube" viewBox="0 0 32 32">
<path d="M31.681 9.6c0 0-0.313-2.206-1.275-3.175-1.219-1.275-2.581-1.281-3.206-1.356-4.475-0.325-11.194-0.325-11.194-0.325h-0.012c0 0-6.719 0-11.194 0.325-0.625 0.075-1.987 0.081-3.206 1.356-0.963 0.969-1.269 3.175-1.269 3.175s-0.319 2.588-0.319 5.181v2.425c0 2.587 0.319 5.181 0.319 5.181s0.313 2.206 1.269 3.175c1.219 1.275 2.819 1.231 3.531 1.369 2.563 0.244 10.881 0.319 10.881 0.319s6.725-0.012 11.2-0.331c0.625-0.075 1.988-0.081 3.206-1.356 0.962-0.969 1.275-3.175 1.275-3.175s0.319-2.587 0.319-5.181v-2.425c-0.006-2.588-0.325-5.181-0.325-5.181zM12.694 20.15v-8.994l8.644 4.513-8.644 4.481z"></path>
<symbol id="icon-search" viewBox="0 0 32 32">
<path d="M31.008 27.231l-7.58-6.447c-0.784-0.705-1.622-1.029-2.299-0.998 1.789-2.096 2.87-4.815 2.87-7.787 0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12c2.972 0 5.691-1.081 7.787-2.87-0.031 0.677 0.293 1.515 0.998 2.299l6.447 7.58c1.104 1.226 2.907 1.33 4.007 0.23s0.997-2.903-0.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"></path>
</symbol>
<symbol id="icon-github" viewBox="0 0 32 32">
<path d="M16 0.395c-8.836 0-16 7.163-16 16 0 7.069 4.585 13.067 10.942 15.182 0.8 0.148 1.094-0.347 1.094-0.77 0-0.381-0.015-1.642-0.022-2.979-4.452 0.968-5.391-1.888-5.391-1.888-0.728-1.849-1.776-2.341-1.776-2.341-1.452-0.993 0.11-0.973 0.11-0.973 1.606 0.113 2.452 1.649 2.452 1.649 1.427 2.446 3.743 1.739 4.656 1.33 0.143-1.034 0.558-1.74 1.016-2.14-3.554-0.404-7.29-1.777-7.29-7.907 0-1.747 0.625-3.174 1.649-4.295-0.166-0.403-0.714-2.030 0.155-4.234 0 0 1.344-0.43 4.401 1.64 1.276-0.355 2.645-0.532 4.005-0.539 1.359 0.006 2.729 0.184 4.008 0.539 3.054-2.070 4.395-1.64 4.395-1.64 0.871 2.204 0.323 3.831 0.157 4.234 1.026 1.12 1.647 2.548 1.647 4.295 0 6.145-3.743 7.498-7.306 7.895 0.574 0.497 1.085 1.47 1.085 2.963 0 2.141-0.019 3.864-0.019 4.391 0 0.426 0.288 0.925 1.099 0.768 6.354-2.118 10.933-8.113 10.933-15.18 0-8.837-7.164-16-16-16z"></path>
</symbol>
<symbol id="icon-facebook" viewBox="0 0 32 32">
<path d="M19 6h5v-6h-5c-3.86 0-7 3.14-7 7v3h-4v6h4v16h6v-16h5l1-6h-6v-3c0-0.542 0.458-1 1-1z"></path>
</symbol>
<symbol id="icon-linkedin2" viewBox="0 0 32 32">
<path d="M12 12h5.535v2.837h0.079c0.77-1.381 2.655-2.837 5.464-2.837 5.842 0 6.922 3.637 6.922 8.367v9.633h-5.769v-8.54c0-2.037-0.042-4.657-3.001-4.657-3.005 0-3.463 2.218-3.463 4.509v8.688h-5.767v-18z"></path>
<path d="M2 12h6v18h-6v-18z"></path>
<path d="M8 7c0 1.657-1.343 3-3 3s-3-1.343-3-3c0-1.657 1.343-3 3-3s3 1.343 3 3z"></path>
</symbol>
</defs>
</svg>
<!-- Direct new svg icons from icomoon end -->

	<!-- <div class="loader-holder">
		<div class="loader">
			<div class="side"></div>
			<div class="side"></div>
			<div class="side"></div>
			<div class="side"></div>
			<div class="side"></div>
			<div class="side"></div>
			<div class="side"></div>
			<div class="side"></div>
		</div>
	</div> -->
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- header of the page -->
		<header id="header" class="version-iii">
			<div class="container">
				<div class="row top-bar bg-pattern">
					<!-- Policy Nav of the page -->
					<nav class="col-xs-12 col-sm-6 policy-nav">
						<ul>
							<li><span>Questions?</span> <a href="#"><i class="fa fa-phone" aria-hidden="true"></i> +91 95471 42067</a> </li>
							<li><a style="text-transform:lowercase;" href="../contact.html"><i class="fa fa-envelope" aria-hidden="true"></i> istenitdurgapur@gmail.com</a></li>
							<?php
								if($_COOKIE['screen_width'] < 769) {
									if($UserLoginStatus === TRUE){
									$arr = explode(' ',trim($_SESSION['UsserName']));
							?>
							<li><a onclick="logout()" style="cursor:pointer;"><img style="border-radius: 50%;margin-right: 8px;" width="24px" height="24px" src="<?php echo $_SESSION['UsserImage']; ?>">Logout <?php echo htmlentities(" ".$arr[0]); ?></a></li>
							<?php } else { ?>
							<li><a href="#" onclick="openNav()"><svg style="margin-right: 8px;" class="icon icon-user"><use xlink:href="#icon-user"></use></svg>Login</a></li>
							<?php } } ?>
							<?php
							echo ErrorMessage();
							echo SuccessMessage();
							?>
						</ul>
					</nav>
					<!-- Policy Nav of the page end -->
					<div class="col-xs-12 col-sm-6 pull-right hidden-xs">
						<!-- Social Network of the page -->
						<ul class="social-networks">
							<li><a href="https://www.facebook.com/istenitd/"><span class="ico-facebook"></span></a></li>
							<li><a href="https://www.instagram.com/istenitdgp/"><svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg></span></a></li>
							<li><a href="https://github.com/Istenitdgp/"><svg class="icon icon-github"><use xlink:href="#icon-github"></use></svg></a></li>
							<li><a href="https://www.linkedin.com/in/iste-nit-durgapur/"><span class="ico-linkedin"></span></a></li>
							<li><a href="https://www.youtube.com/channel/UCA1jrMTZPxVbs_A8hDLXlbQ"><svg class="icon icon-youtube"><use xlink:href="#icon-youtube"></use></svg></a></li>
							<?php if($_COOKIE['screen_width'] >= 769){ 
								if($UserLoginStatus === TRUE){
									$arr = explode(' ',trim($_SESSION['UsserName']));
							?>
							<li><a onclick="logout()" style="cursor:pointer;"><img style="border-radius: 50%;margin-right: 8px;" width="24px" height="24px" src="<?php echo $_SESSION['UsserImage']; ?>">Logout &nbsp; <?php echo htmlentities(" ".$arr[0]); ?></a></li>
							<?php } else { ?>
							<li><a href="#" onclick="openNav()"><svg style="margin-right: 8px;" class="icon icon-user"><use xlink:href="#icon-user"></use></svg>Login</a></li>
							<?php } } ?>
						</ul> 
						<!-- Social Network of the page end -->
					</div>
				</div>
			</div>
			<div class="stick-holder">
				<div class="container">
					<div class="row holder">
						<div class="col-xs-3 col-sm-2 hidden-sm hidden-md hidden-lg">
							<!-- Logo of the page -->
							<div class="logo"><a href="home.html"><img src="images/logo2.png" alt="iste"></a></div>
							<!-- Logo of the page end -->
						</div>
						<div class="col-xs-9 col-sm-12 nav-holder">
							<!-- Nav of the page -->
							<nav id="nav" class="navbar navbar-default">
								<!-- Navbar Header of the page -->
								<div class="navbar-header pull-right">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Navbar Header of the page end -->
								<div onclick="display_category()" id="dropdown1" class="dropdown1">
									<div class="projects">
										<button class="btn pull-right"><span class="icon ico-menu"></span>Category</a></button>
											<ul id="fixinga">
												<?php 
													global $ConnectingDB;
													$sql = "SELECT * FROM category ORDER BY id desc LIMIT 0,10";
													$stmt = $ConnectingDB->query($sql);
													while($DataRows = $stmt->fetch()){
														$Category = $DataRows['title'];
												?>
												<li><a href="index.php?category=<?php echo $Category; ?>"><?php echo $Category; ?></a></li>
													<?php } ?>
												<!-- <li><a href="#">More&nbsp;&nbsp;&nbsp;&rang;&rang;</a></li> -->
											</ul>
									</div>
								</div>
								<!-- Collapse of the page -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav navbar-center">
										<li>
											<a href="http://istenitdgp.com/">Home</a>
											<!-- drop of the page -->
										</li>
										<li>
											<a href="http://istenitdgp.com/about.html">About</a>
										</li>
										<li class="active"><a href="index.php?page=1">Blog</a></li>
										<li class="logo hidden-xs"><a href="#"><img src="images/logo2.png" alt="dot"></a></li>
										<li>
											<a href="#">Pages</a>
											<!-- drop of the page -->
											<div class="drop">
												<ul>
													<li><a href="http://istenitdgp.com/teachers.html">Our Team</a></li>
													<li><a href="http://istenitdgp.com/gallery.html">Gallery</a></li>
												</ul>
											</div>
											<!-- drop of the page end -->
										</li>
										<li><a href="#">Archive</a></li>
										<li><a href="http://istenitdgp.com/contact.html">Contact</a></li>
										<li class="form-wrap">
											<form action="index.php">
												<fieldset>
													<div class="form-group">
														<input type="search" name="Search" class="form-control" placeholder="Type to search here">
														<button name="SearchButton" class="ico-search"></button>
													</div>
												</fieldset>
											</form>
										</li>
									</ul>
								</div>
								<!-- Collapse of the page end -->
							</nav>
							<!-- Nav of the page end -->
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Main of the page -->
		<main id="main" role="main">
			<!-- Block Slider of the page -->
			<section class="blocks-slider container-fluid">
				<div class="row">
					<div class="mask"> 
						<?php 
                            $i = 0;
							global $ConnectingDB;

                            $sql = "SELECT * FROM posts WHERE popularstatus='ON' AND publishstatus='ON' ORDER BY id DESC LIMIT 0,5";
                            $stmt =$ConnectingDB->query($sql);
							while($DataRows = $stmt->fetch()){ 
                                $PostId          = $DataRows["id"]; 
                                $DateTime        = $DataRows["datetime"];
                                $PostTitle       = $DataRows["title"];
								$Thumbnail       = $DataRows["thumbnail"];
								$DateForTimeTag  = strftime("%Y-%m-%d",$DateTime);
								$DateForPopular  = DateAndMonth($DateTime);
						?>
						<!-- Slide of the page -->
						<div class="slide <?php if($i == 2){ echo "active"; } else{ echo "hidden-xs"; } ?>" style="background-image: url( <?php echo "Uploads/".$Thumbnail; ?> );">
							<div class="align-holder">
								<div class="align">
									<h2><a href="FullPostNew.php?id=<?php echo $PostId; ?>"><?php echo $PostTitle; ?></a></h2>
									<time datetime="<?php echo $DateForTimeTag; ?>"><a href="#"><?php echo $DateForPopular."".strftime(",%Y",$DateTime); ?></a></time>
									<a href="FullPostNew.php?id=<?php echo $PostId; ?>" class="read-more">Continue Reading</a>
								</div>
							</div>
						</div>
						<!-- Slide of the page end -->
							<?php 
								$i++;
								} 
								if($i < 5){
									$j = 5-$i;
									$sql = "SELECT * FROM posts WHERE publishstatus='ON' ORDER BY id DESC LIMIT 0,'$j'";
									$stmt =$ConnectingDB->query($sql);
									while($DataRows = $stmt->fetch()){ 
									$PostId          = $DataRows["id"]; 
									$DateTime        = $DataRows["datetime"];
									$PostTitle       = $DataRows["title"];
									$Thumbnail       = $DataRows["thumbnail"];
									$DateForTimeTag  = strftime("%Y-%m-%d",$DateTime);
									$DateForPopular  = DateAndMonth($DateTime);
								
							?>
							<div class="slide <?php if($i == 2){ echo "active"; } else{ echo "hidden-xs"; } ?>" style="background-image: url( <?php echo "Uploads/".$Thumbnail; ?> );">
							<div class="align-holder">
								<div class="align">
									<h2><a href="FullPostNew.php?id=<?php echo $PostId; ?>"><?php echo $PostTitle; ?></a></h2>
									<time datetime="<?php echo $DateForTimeTag; ?>"><a href="#"><?php echo $DateForPopular."".strftime(",%Y",$DateTime); ?></a></time>
									<a href="FullPostNew.php?id=<?php echo $PostId; ?>" class="read-more">Continue Reading</a>
								</div>
							</div>
						</div>
						<?php 
								$i++;  }
								}
						?>
					</div>
				</div>
			</section>
			<!-- Block Slider of the page end -->
			<div class="container">
				<div class="row">
					<!-- Content of the page -->
					<div id="content" class="col-xs-12">
						<!-- Masonry Blocks of the page -->
						<section id="masonry-container" class="masonry-blocks">
							<div class="masonry-holder">
								<!-- Block of the page -->
								<?php 
									if(isset($_GET["SearchButton"])){
										$Search = $_GET["Search"];
										$sql = "SELECT * FROM posts WHERE (publishstatus='ON') AND (datetime LIKE :search
										OR title LIKE :search
										OR category LIKE :search
										OR author LIKE :search
										OR tags LIKE :search
										OR subtitle LIKE :search
										OR post LIKE :search )";
										$stmt = $ConnectingDB->prepare($sql);
										$stmt->bindValue(':search','%'.$Search.'%');
										$stmt->execute();
									}elseif (isset($_GET["page"])) {
										$Page = $_GET["page"];
										if($Page==0||$Page<1){
										$ShowPostFrom=0;
									  	}else{
										$ShowPostFrom=($Page*9)-9;
									  	}
										$sql ="SELECT * FROM posts WHERE publishstatus='ON' ORDER BY id desc LIMIT $ShowPostFrom,9";
										$stmt=$ConnectingDB->query($sql);
									}elseif (isset($_GET["category"])) {
										$Category = $_GET["category"];
										$sql = "SELECT * FROM posts WHERE category='$Category' AND publishstatus='ON' ORDER BY id desc";
										$stmt=$ConnectingDB->query($sql);
									}else{
										$sql  = "SELECT * FROM posts WHERE publishstatus='ON' ORDER BY id desc LIMIT 0,9";
										$stmt =$ConnectingDB->query($sql);
									}
								   $i = 1;
                                   while ($DataRows = $stmt->fetch()) {
                                    $PostId          = $DataRows["id"];
                                    $DateTime        = $DataRows["datetime"];
                                    $PostTitle       = $DataRows["title"];
                                    $Category        = $DataRows["category"];
                                    $Admin           = $DataRows["author"];
									$Main            = $DataRows["main"];
									$Thumbnail		 = $DataRows["thumbnail"];
									$Multipurpose	 = $DataRows["multipurpose"];
									$Image3			 = $DataRows["image3"];
									$Image4			 = $DataRows["image4"];
									$Image5			 = $DataRows["image5"];
									$PostDescription = $DataRows["post"];
									$PostDescription = strip_tags(html_entity_decode($PostDescription));

                                ?>
                                <?php
									$TotalComments = ApproveCommentsAccordingtoPost($PostId);

                                ?>
								<?php require("Includes/Type.php"); 
									$DateForTimeTag  = strftime("%Y-%m-%d",$DateTime);
									$DatePosted  = DateAndMonth($DateTime);
								?>
								<article class="block wow fadeInUp" data-wow-delay="0.6s">
									<div class="block-holder">
										<?php echo $class; ?>
										<time datetime="<?php echo $DateForTimeTag; ?>"><a href="FullPostNew.php?id=<?php echo $PostId; ?>"><?php echo $DatePosted; ?> - <?php echo $Category; ?></a></time>
										<h2><a href="FullPostNew.php?id=<?php echo $PostId; ?>"><?php echo $PostTitle; ?></a></h2>
										<div class="info">
											<strong class="count comment-count"><span class="icon ico-comment"></span><a href="#"><?php echo $TotalComments." comments"; ?></a></strong>
											<strong class="count share-count"><span class="icon ico-share"></span><a href="FullPostNew.php?id=<?php echo $PostId; ?>"> Share</a></strong>
										</div>
										<div class="descr">
											<p><?php if (strlen($PostDescription)>100) { $PostDescription = substr($PostDescription,0,97)."...";} echo htmlentities($PostDescription); ?></p>
											<a href="FullPostNew.php?id=<?php echo $PostId; ?>" class="<?php if(($i%2) == 0){ echo "link-more"; } else{ echo "read-more"; } ?>">Read more</a>
										</div>
									</div>
								</article>
								<?php $i++; } ?>
								<!-- Block of the page end -->
							</div>
						</section>
						<!-- Masonry Blocks of the page end -->
						<!-- Navigation of the page -->
						<nav role="navigation" class="navigation pagination">
							<div class="nav-links text-center">
							<?php if( isset($Page) ) {
                				if ( $Page>1 ) {?>
									<a href="index.php?page=<?php  echo $Page-1; ?>" class="prev page-numbers">Prev page.</a>
								<?php } }?>
								<?php
								$sql           = "SELECT COUNT(*) FROM posts";
								$stmt          = $ConnectingDB->query($sql);
								$RowPagination = $stmt->fetch();
								$TotalPosts    = array_shift($RowPagination);
								$PostPagination=$TotalPosts/9;
								$PostPagination=ceil($PostPagination);
								for ($i=1; $i <=$PostPagination ; $i++) {
									if( isset($Page) ){
									  if ($i == $Page) {  ?>
								<span class="page-numbers current"><?php  echo $i; ?></span>
								<?php
								}else {
								?>
								<a href="index.php?page=<?php  echo $i; ?>" class="page-numbers"><?php  echo $i; ?></a>
								<?php  }
								  } } ?>
								<?php if ( isset($Page) && !empty($Page) ) {
            						if ($Page+1 <= $PostPagination) {?>
								<a href="index.php?page=<?php  echo $Page+1; ?>" class="next page-numbers">NEXT page.</a>
								<?php } }?>
							</div>
						</nav>
						<!-- Navigation of the page end -->
					</div>
				</div>
			</div>
			<div class="container">
			<p class="text-center" style="padding:1em;margin: 3em;background:#2a2d34;color:#fff"> Wanna write your own blog here? Don't Wait Just send your blog on <b>istenitdurgapur@gmail.com</b><br> in any format(docx,pdf or even a link from any online blog writing websites would suffice) with your basic personal details. </p>
			</div>
				<!-- Instagram Slider of the page start -->
				<div class="container-fluid">
					<div style="margin-bottom: -44px;" class="row">
						<div class="elfsight-app-41c1067a-e6bc-4859-bccc-d849e8fd4aa4"></div>
					</div>
				</div>
				<!-- Instagram Slider of the page end -->
		</main>
		<!-- Main of the page end -->
		
		<!-- Aside of the page -->
		<aside style="z-index: 9999999;" class="aside version-ii container">
			<div class="row">
				<div class="col-xs-12 holder">
					<div class="col">
						<div class="footerlogo">
						<div class="logo"><a href="http://istenitdgp.com/"><img src="images/logo2.png" alt="dot"></a></div>
						<div class="logo"><a href="https://nitdgp.ac.in"><img src="images/nitdgp_logo_white.png" alt="dot"></a></div>
						</div>
						<p>The Indian Society for Technical Education is the leading National Professional non-profit making Society for the Technical Education System operating in association with All India Council for Technical Education.</p>
					</div>
					<!-- Footer Nav of the page -->
					<nav class="col footer-nav">
						<h3>Important Links</h3>
						<ul>
							<li><a href="http://istenitdgp.com/about.html">About us</a></li>
							<li><a href="https://nitdgp.ac.in">NIT Durgapur</a></li>
							<li><a href="https://nitdgp.ac.in/clubs">NITDGP Clubs&amp;Societies</a></li>
							<li><a href="http://istenitdgp.com">Sitemap</a></li>
							<li><a href="http://istenitdgp.com/contact.html">Support</a></li>
						</ul>
					</nav>
					<!-- Footer Nav of the page end -->
					<!-- Widget Holder of the page -->
					<div class="col widget-holder">
						<h3>Popular Posts</h3>
						<div class="widget recent-posts-widget">
							<ol>
								<?php
									global $ConnectingDB;
									$sql = "SELECT * FROM posts WHERE popularstatus='ON' ORDER BY id DESC LIMIT 0,2";
									$stmt =$ConnectingDB->query($sql);
									while($DataRows = $stmt->fetch()){ 
										$PostId			 = $DataRows["id"];
										$DateTime        = $DataRows["datetime"];
										$PostTitle       = $DataRows["title"];
										$DateForTimeTag  = strftime("%Y-%m-%d",$DateTime);
										$DateForPopular  = DateAndMonth($DateTime);
								?>
								<li>
									<h4><a href="FullPostNew.php?id=<?php echo $PostId; ?>"><?php echo $PostTitle; ?></a></h4>
									<span class="post-tag">
										<time datetime="<?php echo $DateForTimeTag; ?>"><a href="#"><?php echo $DateForPopular; ?></a></time>
									</span>
								</li>
									<?php } ?>
							</ol>
						</div>
					</div>
					<!-- Widget Holder of the page end -->
					<div class="col">
							<h3>Subscribe to Newsletter</h3>
							<p>For Latest Updates about popular blogs which may interest you.</p>
							<!-- subscribe form of the page -->
							<form action="#" class="subscribe-form">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Enter your email here">
									<button type="button" class="ico-send"></button>
								</div>
							</form>
							<!-- subscribe form of the page end -->
						</div>
				</div>
			</div>
		</aside>
		<!-- Footer of the page -->
		<footer id="footer" class="container version-ii">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<p>&copy; <span id="year"></span> Copyright <span id="year"></span>, <a href="home.html">ISTE</a>. All Rights Reserved</p>
				</div>
				<div class="col-xs-12 col-sm-6">
					<!-- Social Network of the page -->
					<ul class="social-networks">
						<li><a href="https://www.facebook.com/istenitd/"><span class="ico-facebook"></span></a></li>
						<li><a href="https://www.instagram.com/istenitdgp/"><svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg></span></a></li>
						<li><a href="https://github.com/Istenitdgp/"><svg class="icon icon-github"><use xlink:href="#icon-github"></use></svg></a></li>
						<li><a href="https://www.linkedin.com/in/iste-nit-durgapur/"><span class="ico-linkedin"></span></a></li>
						<li><a href="https://www.youtube.com/channel/UCA1jrMTZPxVbs_A8hDLXlbQ"><svg class="icon icon-youtube"><use xlink:href="#icon-youtube"></use></svg></a></li>
					</ul>
					<!-- Social Network of the page end -->
				</div>
			</div>
		</footer>
		<!-- Back Top of the page -->
		<span id="back-top" class="fa fa-angle-up"></span>
	</div>
	<!-- include jQuery -->
	<script src="js/jquery.js"></script>
	<!-- include jQuery -->
    <script src="js/plugins.js"></script>
    <!-- include jQuery -->
	<script src="js/jquery.main.js"></script>
	<script src="https://apps.elfsight.com/p/platform.js" defer></script>
	<script>
		$('#year').text(new Date().getFullYear());
	</script>
</body>
</html>