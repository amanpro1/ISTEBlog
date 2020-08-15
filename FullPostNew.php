<?php 
error_reporting(0);
ini_set('display_errors', 0);
require_once("Includes/DB.php");
require_once("Includes/Functions.php"); 
require_once("Includes/Sessions.php");
// if(isset($_SESSION['screen_width'])){
// 	$widthscreen = $_SESSION['screen_width'];
// } else if(isset($_REQUEST['width'])) {
//     $_SESSION['screen_width'] = $_REQUEST['width'];
//     header('Location: ' . $_SERVER['PHP_SELF']);
// } else {
//     echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width;</script>';
// }
 $SearchQueryParameter = $_GET['id']; 
$UserLoginStatus=Confirm_Login_User(); 
// $TrackingURI = $_SERVER['PHP_SELF'];
$TrackingURI=selfURL();
// $TrackingURI=selfURL().$_SERVER['PHP_SELF'];
$ExpireTime=time()+86400;
setcookie("TrackingURL",$TrackingURI,$ExpireTime);
global $ConnectingDB;
$PostIdByURL = $_GET['id'];
$sql10  = "SELECT * FROM posts WHERE id= '$PostIdByURL'";
		$stmt10 =$ConnectingDB->query($sql10);
		$Result10 = $stmt10->rowcount();
		if($Result10 !=1 ){
			$_SESSION['ErrorMessage']="Bad Request !";
			Redirect_to("index.php?page=1");
		}
		$DataRows10 = $stmt10->fetch();
		$PostTitle       = $DataRows10["title"];
		$PostId = $DataRows10["id"];
		$PostImage = $DataRows10["thumbnail"];
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	<!-- set the encoding of your site -->
	
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $PostTitle; ?></title>
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
	<meta property="og:url" content="http://blog.istenitdgp.com/FullPostNew.php?id=<?php echo $PostId; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $PostTitle; ?>" />
	<meta property="og:description" content="Blog ISTE Nit Durgapur,<?php echo $PostTitle; ?>" />
	<meta property="og:image" content="http://blog.istenitdgp.com/Uploads/<?php echo $PostImage; ?>" />
	<!-- include the site stylesheet -->
	<link href='https://fonts.googleapis.com/css?family=Merriweather:300,400,700%7CPoppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/font-awesome1.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/bootstrap1.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/slick2.css">
	<!-- include the site stylesheet -->
    <link rel="stylesheet" href="Css/colors2.css">
	<link rel="stylesheet" href="Css/style2.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/animate.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/responsive2.css">
	<!-- include the site stylesheet -->
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="style1.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/responsive1.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="Css/popup.css">
	<style>
		.xq {
    transition: transform 0.3s cubic-bezier(0.25, 0, 0.6, 1.4) 1s;
	}
	.xp {
    left: 4px;
	}
	.xr:hover {
    transform: translateX(-35px);
	}
	.xs:focus {
    fill: rgba(0, 0, 0, 0.9);
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
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
		function openWriter(writerid) {
    document.getElementById(writerid).style.width = "100%";
};
function closeWriter(writerid) {
    document.getElementById(writerid).style.width = "0%";
};
		function display_category(){
		document.getElementById('fixinga').style.display = "grid";
		};
	function add_likes(postid) {
		var likes = parseInt($('#countclaps').val());

	likes = likes+1;
	var likesstring = likes;
	$('#countclaps').prop('value',likesstring);
	$.ajax({
	url: "add_claps.php",
	data:'id='+postid,
	type: "POST",
	beforeSend: function(){
		
	},
	success: function(data){ 
	if(data == 0){
	$("#refreshlikes").load(window.location.href + " #refreshlikes" );
	}
	
	}
	});
};



	function add_comments(postid) {
	var comment = $('#newcomment').val();
	if(comment == ""){
	}
	else{
	$.ajax({
	url: "add_comment.php",
	data:'id='+postid+'&comment='+comment,
	type: "POST",
	beforeSend: function(){

	},
	success: function(data){

	$("#comments").load(window.location.href + " #comments" );
	}
	});
	}
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
	<script>
		function settingimage(ele){
			var h=ele.naturalHeight;
			var w=ele.naturalWidth;
			var r = (h * 100)/w;
			ele.parentElement.style.paddingBottom = r+"%";
		}
    </script>
</head>
<body style="margin:0;">
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
	<div class="styling bootstrap fonts">
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
	<div id="wrapper" style="overflow: visible;">
		
		<div class="w1">
			
			<header id="header" class="version-ii">
			
                <div style="overflow: hidden;margin:0;" class="row top-bar bg-pattern">
                <div class="container">
					
					<nav class="col-xs-12 col-sm-6 policy-nav">
						<ul>
							<li><span style="color:#ccc;">Questions?</span> <a href="#"><i class="fa fa-phone" aria-hidden="true"></i> +91 95471 42067</a> </li>
									<li><a style="text-transform:lowercase;" href="http://istenitdgp.com//contact.html"><i class="fa fa-envelope" aria-hidden="true"></i> istenitdurgapur@gmail.com</a></li>
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
					
					<div class="col-xs-12 col-sm-6 pull-right hidden-xs">
						
						<ul class="social-networks">
							<li><a href="https://www.facebook.com/istenitd/"><span class="fa fa-facebook"></span></a></li>
							<li><a href="https://www.instagram.com/istenitdgp/"><svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg></span></a></li>
							<li><a href="https://github.com/Istenitdgp/"><svg class="icon icon-github"><use xlink:href="#icon-github"></use></svg></a></li>
							<li><a href="https://www.linkedin.com/in/iste-nit-durgapur/"><span class="fa fa-linkedin"></span></a></li>
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
						
					</div>
				</div>
            </div>
			    <div class="stick-holder" style="background-color: #f7f7f7">
				    <div class="container">
					<div class="row holder" style="padding: 9px 0 7px 0;">
						<div class="col-xs-3 col-sm-2 hidden-sm hidden-md hidden-lg">
							
							<div class="logo"><a href="home.html"><img src="images/logo2.png" alt="iste"></a></div>
							
						</div>
						<div class="col-xs-9 col-sm-12 nav-holder">
							
							<nav id="nav" class="navbar navbar-default">
								
								<div class="navbar-header pull-right">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								
								<div onclick="display_category()" id="dropdown1" class="dropdown1">
									<div class="projects">
										<button class="btn pull-right"><span class="icon2 fa fa-bars"></span>Category</a></button>
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
								
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav navbar-center">
										<li>
											<a href="http://istenitdgp.com/index.html">Home</a>
											
										</li>
										<li>
											<a href="http://istenitdgp.com/about.html">About</a>
										</li>
										<li class="active"><a href="index.php?page=1">Blog</a></li>
										<li class="logo hidden-xs"><a href="#"><img src="images/logo2.png" alt="dot"></a></li>
										<li>
											<a href="#">Pages</a>
											
											<div class="drop">
												<ul>
													<li><a href="http://istenitdgp.com/teachers.html">Our Team</a></li>
													<li><a href="http://istenitdgp.com/gallery.html">Gallery</a></li>
												</ul>
											</div>
											
										</li>
										<li><a href="#">Archive</a></li>
										<li><a href="http://istenitdgp.com/contact.html">Contact</a></li>
										<li class="form-wrap">
											<form action="index.php">
												<fieldset>
													<div class="form-group">
														<input type="search" name="Search" class="form-control" placeholder="Type to search here">
														<button name="SearchButton"><svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg></button>
													</div>
												</fieldset>
											</form>
										</li>
									</ul>
								</div>
								
							</nav>
							
						</div>
					</div>
				</div>
			    </div>
		    </header>
			
		</div>
	</div>
	</div>
	<?php
		global $ConnectingDB;
		$PostIdByURL = $_GET['id'];
		if(!isset($PostIdByURL)){
			$_SESSION["ErrorMessage"] = "Bad Request!!";
			Redirect_to('index.php?page=1');
		}
		$sql  = "SELECT * FROM posts WHERE id= '$PostIdByURL'";
		$stmt =$ConnectingDB->query($sql);
		$Result = $stmt->rowcount();
		if($Result!=1){
			$_SESSION['ErrorMessage']="Bad Request !";
			Redirect_to("index.php?page=1");
		}
		$DataRows = $stmt->fetch();
		$PostId          = $DataRows["id"];
		$DateTime        = $DataRows["datetime"];
		$PostTitle       = $DataRows["title"];
		$Admin           = $DataRows["author"];
		$Tags            = $DataRows["tags"];
		$PostSubtitle	 = $DataRows["subtitle"];
		$PostT			 = $DataRows["post"];
		$PopularStatus	 = $DataRows["publishstatus"];
		if($PopularStatus == 'ON'){

		$Tags = substr("$Tags", 0, -1);
		$str_arr = preg_split ("/\,/", $Tags);
		$ReadingTime = reading_time($PostId);

		$sql1  = "SELECT * FROM admins WHERE username= '$Admin'";
		$stmt1 =$ConnectingDB->query($sql1);
		$DataRows1 = $stmt1->fetch();
		$AdminId = $DataRows1["id"];
		$AdminName = $DataRows1["aname"];
		$AdminMain = $DataRows1["aheadline"];
		$AdminImage	= $DataRows1["aimage"];
		$AdminBio  = $DataRows1["abio"];
		
	?>
	<div class="popup">
	<div id="<?php echo $AdminId; ?>" class="overlay">
	<a href="javascript:void(0)" class="closebtn" onclick="closeWriter(<?php echo $AdminId; ?>)">&times;</a>
	<div class="overlay-content">
	<iframe src="profile1.php?id=<?php echo $AdminId; ?>" frameborder="0"></iframe>
	</div>
	</div></div>
	<!-- Main of the page -->
			<div class="medium">
			<main class="mains a b c" role="main">
				<article>
				<section class="fg fh fi fj fk">
				<div class="n p">
					
					<div class="z ab ac ae af fl ah ai">
					<div><div id="db5f" class="fm fn ct bj fo b fp fq fr fs ft fu fv fw fx fy fz"><h1 class="fo b fp ga fr gb ft gc fv gd fx ge ct"><?php echo htmlentities($PostTitle); ?></h1></div></div>
					<h2 id="be30" class="gf fn bn bj bi ek gg gh gr gi gj gs gk gl gt gm gn gu go gp gv gq"><?php if(!empty($PostSubtitle)){ echo $PostSubtitle; } ?></h2><div class="gw"><div class="n gx gy gz ha"><div class="o n"><div><a style="cursor:pointer;" onclick="openWriter(<?php echo $AdminId; ?>)"><img alt="<?php echo $AdminName; ?>" class="r dm hb hc" src="userimages/<?php echo $AdminImage; ?>" width="48" height="48"></a></div>
					<div class="hd ai r"><div class="n"><div style="flex:1"><span class="bi b bj bk bl bm r ct q"><div class="he n o hf"><span class="bi ek cb bk bv hg bu hh hi hj ct"><a class="cg ch at au av aw ax ay az ba hk bd be ck cl" onclick="openWriter(<?php echo $AdminId ?>)" style="cursor:pointer;"><?php echo $AdminName; ?></a></span>
					<!-- <div class="hl r bh h"><button class="hm cu ar as hn bb bc ho ba df bi b bj hp el bm dg dh di bx dj bd">Follow</button></div> -->
					<?php
						$DatePost  = strftime("%B %d,%Y",$DateTime);
					?>
					</div></span></div></div><span class="bi b bj bk bl bm r bn bo"><span class="bi ek cb bk bv hg bu hh hi hj bn"><div><a class="cg ch at au av aw ax ay az ba hk bd be ck cl" rel="noopener" href="#"></a> <?php echo $DatePost; ?><!-- --> · <!-- --><?php echo $ReadingTime; ?> <!-- --> </div></span></span></div></div><div class="n hq hr hs ht hu hv hw hx y"><div class="n o"><div class="hy r bh"><a href="<?php echo htmlentities(TwitterShare($PostId,$PostTitle,$AdminName)) ?>" class="cg ch at au av aw ax ay az ba ci cj bd be ck cl" target="_blank" rel="noopener nofollow"><svg width="29" height="29" class="q"><path d="M22.05 7.54a4.47 4.47 0 0 0-3.3-1.46 4.53 4.53 0 0 0-4.53 4.53c0 .35.04.7.08 1.05A12.9 12.9 0 0 1 5 6.89a5.1 5.1 0 0 0-.65 2.26c.03 1.6.83 2.99 2.02 3.79a4.3 4.3 0 0 1-2.02-.57v.08a4.55 4.55 0 0 0 3.63 4.44c-.4.08-.8.13-1.21.16l-.81-.08a4.54 4.54 0 0 0 4.2 3.15 9.56 9.56 0 0 1-5.66 1.94l-1.05-.08c2 1.27 4.38 2.02 6.94 2.02 8.3 0 12.86-6.9 12.84-12.85.02-.24 0-.43 0-.65a8.68 8.68 0 0 0 2.26-2.34c-.82.38-1.7.62-2.6.72a4.37 4.37 0 0 0 1.95-2.51c-.84.53-1.81.9-2.83 1.13z"></path></svg></a></div><div class="hy r bh"><a href="http://www.linkedin.com/shareArticle?url=http%3A%2F%2Fblog.istenitdgp.com%2FFullPostNew.php%3Fid%3D<?php echo $PostId; ?>&title=<?php echo $PostTitle; ?>" class="cg ch at au av aw ax ay az ba ci cj bd be ck cl" target="_blank" rel="noopener nofollow"><svg width="29" height="29" viewBox="0 0 29 29" fill="none" class="q"><path d="M5 6.36C5 5.61 5.63 5 6.4 5h16.2c.77 0 1.4.61 1.4 1.36v16.28c0 .75-.63 1.36-1.4 1.36H6.4c-.77 0-1.4-.6-1.4-1.36V6.36z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.76 20.9v-8.57H7.89v8.58h2.87zm-1.44-9.75c1 0 1.63-.65 1.63-1.48-.02-.84-.62-1.48-1.6-1.48-.99 0-1.63.64-1.63 1.48 0 .83.62 1.48 1.59 1.48h.01zM12.35 20.9h2.87v-4.79c0-.25.02-.5.1-.7.2-.5.67-1.04 1.46-1.04 1.04 0 1.46.8 1.46 1.95v4.59h2.87v-4.92c0-2.64-1.42-3.87-3.3-3.87-1.55 0-2.23.86-2.61 1.45h.02v-1.24h-2.87c.04.8 0 8.58 0 8.58z" fill="#fff"></path></svg></a></div><div class="hy r bh"><a href="http://www.facebook.com/sharer.php?u=http://blog.istenitdgp.com%2FFullPostNew.php%3Fid%3D<?php echo $PostId; ?>" class="cg ch at au av aw ax ay az ba ci cj bd be ck cl" target="_blank" rel="noopener nofollow"><svg width="29" height="29" class="q"><path d="M23.2 5H5.8a.8.8 0 0 0-.8.8V23.2c0 .44.35.8.8.8h9.3v-7.13h-2.38V13.9h2.38v-2.38c0-2.45 1.55-3.66 3.74-3.66 1.05 0 1.95.08 2.2.11v2.57h-1.5c-1.2 0-1.48.57-1.48 1.4v1.96h2.97l-.6 2.97h-2.37l.05 7.12h5.1a.8.8 0 0 0 .79-.8V5.8a.8.8 0 0 0-.8-.79"></path></svg></a></div></div></div></div></div></div>
				</div>
				<?php echo html_entity_decode($PostT,ENT_HTML5,'UTF-8') ?>
				</section>
				</article>
					
				<div>
					<div class="pl ic n me p">
						<div class="n p"><div class="z ab ac ae af fl ah ai"><div class="n pm"></div><div class="n o pm"></div><div class="pn r"><ul class="ay az">
						<?php foreach($str_arr as $value){  ?>
						<li class="bx dx hz po"><a href="index.php?Search=<?php echo $value; ?>&SearchButton=" class="pp pq dj bn r pr ps a b el"><?php echo ucwords($value);  ?></a></li>
						<?php }  ?>
						</ul></div>
						<div class="pt n gx y">
						<div id="refreshlikes" class="n pu">
						<?php 
							$sql9 = "SELECT COUNT(*) FROM postlikes WHERE postid='$PostId'";
							$stmt = $ConnectingDB->query($sql9);
							$TotalRows= $stmt->fetch();
							$TotalOtherUsersLiked=array_shift($TotalRows)-1;
							$sql3 = "SELECT * FROM postlikes WHERE postid='$PostId'";
							$stmt4 = $ConnectingDB->query($sql3);
							$TotalLikes = 0;

							while($DataRows = $stmt4->fetch()){
							 $TotalLikes += $DataRows['claps'];
							}
							if($TotalLikes > 0){}
							else{
								$TotalLikes = 0;
							}
							if(Confirm_Login_User() && (isclapped($PostId) == 0))  {
						?>
						
						<div class="pv r"><div class="n o"><div class="r cd pw px py pz qa"><div class="">
						<div class="c qb dm n o qc cd qd qe qf qg qh qi qj qk ql qm qn qo qp qq">
						<button id="clapping" onclick="add_likes(<?php echo $PostId; ?>);" class="ay ou ov ow ox oy qr pa o jh dm n p qs u ix s t ai q pb pc qt">
							<svg width="33" height="33" viewBox="0 0 33 33"><path d="M28.86 17.34l-3.64-6.4c-.3-.43-.71-.73-1.16-.8a1.12 1.12 0 0 0-.9.21c-.62.5-.73 1.18-.32 2.06l1.22 2.6 1.4 2.45c2.23 4.09 1.51 8-2.15 11.66a9.6 9.6 0 0 1-.8.71 6.53 6.53 0 0 0 4.3-2.1c3.82-3.82 3.57-7.87 2.05-10.39zm-6.25 11.08c3.35-3.35 4-6.78 1.98-10.47L21.2 12c-.3-.43-.71-.72-1.16-.8a1.12 1.12 0 0 0-.9.22c-.62.49-.74 1.18-.32 2.06l1.72 3.63a.5.5 0 0 1-.81.57l-8.91-8.9a1.33 1.33 0 0 0-1.89 1.88l5.3 5.3a.5.5 0 0 1-.71.7l-5.3-5.3-1.49-1.49c-.5-.5-1.38-.5-1.88 0a1.34 1.34 0 0 0 0 1.89l1.49 1.5 5.3 5.28a.5.5 0 0 1-.36.86.5.5 0 0 1-.36-.15l-5.29-5.29a1.34 1.34 0 0 0-1.88 0 1.34 1.34 0 0 0 0 1.89l2.23 2.23L9.3 21.4a.5.5 0 0 1-.36.85.5.5 0 0 1-.35-.14l-3.32-3.33a1.33 1.33 0 0 0-1.89 0 1.32 1.32 0 0 0-.39.95c0 .35.14.69.4.94l6.39 6.4c3.53 3.53 8.86 5.3 12.82 1.35zM12.73 9.26l5.68 5.68-.49-1.04c-.52-1.1-.43-2.13.22-2.89l-3.3-3.3a1.34 1.34 0 0 0-1.88 0 1.33 1.33 0 0 0-.4.94c0 .22.07.42.17.61zm14.79 19.18a7.46 7.46 0 0 1-6.41 2.31 7.92 7.92 0 0 1-3.67.9c-3.05 0-6.12-1.63-8.36-3.88l-6.4-6.4A2.31 2.31 0 0 1 2 19.72a2.33 2.33 0 0 1 1.92-2.3l-.87-.87a2.34 2.34 0 0 1 0-3.3 2.33 2.33 0 0 1 1.24-.64l-.14-.14a2.34 2.34 0 0 1 0-3.3 2.39 2.39 0 0 1 3.3 0l.14.14a2.33 2.33 0 0 1 3.95-1.24l.09.09c.09-.42.29-.83.62-1.16a2.34 2.34 0 0 1 3.3 0l3.38 3.39a2.17 2.17 0 0 1 1.27-.17c.54.08 1.03.35 1.45.76.1-.55.41-1.03.9-1.42a2.12 2.12 0 0 1 1.67-.4 2.8 2.8 0 0 1 1.85 1.25l3.65 6.43c1.7 2.83 2.03 7.37-2.2 11.6zM13.22.48l-1.92.89 2.37 2.83-.45-3.72zm8.48.88L19.78.5l-.44 3.7 2.36-2.84zM16.5 3.3L15.48 0h2.04L16.5 3.3z" fill-rule="evenodd"></path>
							</svg></button></div></div></div><div class="r pd pe pf pg ph pi pj"><div class="cd qu pk"><h4 class="bi ek cb bk ct">
						<button class="cg ch at au av aw ax ay az ba ci cj bd be ck cl"><input type="button" style="margin:inherit;padding:inherit;font-size:16px;border:none;background:none;color:rgba(0,0,0,0.84);" disabled id="countclaps" value="<?php echo htmlentities($TotalLikes); ?>"> claps</button></h4></div></div></div></div><div class="r qv qw qx qy qz"></div></div>
						<?php } elseif(Confirm_Login_User() && (isclapped($PostId) > 0)){ ?>
							
							<div class="pv r"><div class="n o"><div class="r cd pw px py pz qa"><div class=""><div class="c xn dm n o qc cd qd qe qq"><button id="clapping" onclick="add_likes(<?php echo $PostId; ?>);" class="ay ou ov ow ox oy qr xo ue o jh dm n p qs u ix s t ai q pb pc qt"><svg width="33" height="33"><g fill-rule="evenodd"><path d="M29.58 17.1l-3.85-6.78c-.37-.54-.88-.9-1.44-.99a1.5 1.5 0 0 0-1.16.28c-.42.33-.65.74-.7 1.2v.01l3.63 6.37c2.46 4.5 1.67 8.8-2.33 12.8-.27.27-.54.5-.81.73a7.55 7.55 0 0 0 4.45-2.26c4.16-4.17 3.87-8.6 2.21-11.36zm-4.83.82l-3.58-6.3c-.3-.44-.73-.74-1.19-.81a1.1 1.1 0 0 0-.89.2c-.64.51-.75 1.2-.33 2.1l1.83 3.86a.6.6 0 0 1-.2.75.6.6 0 0 1-.77-.07l-9.44-9.44c-.51-.5-1.4-.5-1.9 0a1.33 1.33 0 0 0-.4.95c0 .36.14.7.4.95l5.6 5.61a.6.6 0 1 1-.84.85l-5.6-5.6-.01-.01-1.58-1.59a1.35 1.35 0 0 0-1.9 0 1.35 1.35 0 0 0 0 1.9l1.58 1.59 5.6 5.6a.6.6 0 0 1-.84.86L4.68 13.7c-.51-.51-1.4-.51-1.9 0a1.33 1.33 0 0 0-.4.95c0 .36.14.7.4.95l2.36 2.36 3.52 3.52a.6.6 0 0 1-.84.85l-3.53-3.52a1.34 1.34 0 0 0-.95-.4 1.34 1.34 0 0 0-.95 2.3l6.78 6.78c3.72 3.71 9.33 5.6 13.5 1.43 3.52-3.52 4.2-7.13 2.08-11.01zM11.82 7.72c.06-.32.21-.63.46-.89a1.74 1.74 0 0 1 2.4 0l3.23 3.24a2.87 2.87 0 0 0-.76 2.99l-5.33-5.33zM13.29.48l-1.92.88 2.37 2.84zM21.72 1.36L19.79.5l-.44 3.7zM16.5 3.3L15.48 0h2.04z"></path></g></svg></button><button class="g by ox bo xp bz ay s xq xr xs xt multi-vote-undo-revealed"><svg width="29" height="29"><path d="M20.13 8.11l-5.61 5.61-5.6-5.61-.81.8 5.61 5.61-5.61 5.61.8.8 5.61-5.6 5.61 5.6.8-.8-5.6-5.6 5.6-5.62" fill-rule="evenodd"></path></svg></button></div></div></div><div class="r pd pe pf pg ph pi pj"><div class="cd qu pk"><h4 class="bi ek cb bk ct"><button class="cg ch at au av aw ax ay az ba ci cj bd be ck cl"><input type="button" style="margin:inherit;padding:inherit;font-size:16px;border:none;background:none;color:rgba(0,0,0,0.84);" disabled id="countclaps" value="<?php echo htmlentities($TotalLikes); ?>"> claps</button><div class="r g"><button class="cg ch at au av aw ax ay az ba ci cj bd be ck cl"><h4 class="bi ek el bk bn">Applause from you and <?php echo $TotalOtherUsersLiked;?> others</h4></button></div></h4></div></div></div></div><div class="r qv qw qx qy qz"></div></div>
							<?php } else{ ?>
								
								<div class="pv r"><div class="n o"><div class="r cd pw px py pz qa"><div class="">
								<div class="c qb dm n o qc cd qd qe qf qg qh qi qj qk ql qm qn qo qp qq">
						<button id="clapping" onclick="openNav();" class="ay ou ov ow ox oy qr pa o jh dm n p qs u ix s t ai q pb pc qt">
							<svg width="33" height="33" viewBox="0 0 33 33"><path d="M28.86 17.34l-3.64-6.4c-.3-.43-.71-.73-1.16-.8a1.12 1.12 0 0 0-.9.21c-.62.5-.73 1.18-.32 2.06l1.22 2.6 1.4 2.45c2.23 4.09 1.51 8-2.15 11.66a9.6 9.6 0 0 1-.8.71 6.53 6.53 0 0 0 4.3-2.1c3.82-3.82 3.57-7.87 2.05-10.39zm-6.25 11.08c3.35-3.35 4-6.78 1.98-10.47L21.2 12c-.3-.43-.71-.72-1.16-.8a1.12 1.12 0 0 0-.9.22c-.62.49-.74 1.18-.32 2.06l1.72 3.63a.5.5 0 0 1-.81.57l-8.91-8.9a1.33 1.33 0 0 0-1.89 1.88l5.3 5.3a.5.5 0 0 1-.71.7l-5.3-5.3-1.49-1.49c-.5-.5-1.38-.5-1.88 0a1.34 1.34 0 0 0 0 1.89l1.49 1.5 5.3 5.28a.5.5 0 0 1-.36.86.5.5 0 0 1-.36-.15l-5.29-5.29a1.34 1.34 0 0 0-1.88 0 1.34 1.34 0 0 0 0 1.89l2.23 2.23L9.3 21.4a.5.5 0 0 1-.36.85.5.5 0 0 1-.35-.14l-3.32-3.33a1.33 1.33 0 0 0-1.89 0 1.32 1.32 0 0 0-.39.95c0 .35.14.69.4.94l6.39 6.4c3.53 3.53 8.86 5.3 12.82 1.35zM12.73 9.26l5.68 5.68-.49-1.04c-.52-1.1-.43-2.13.22-2.89l-3.3-3.3a1.34 1.34 0 0 0-1.88 0 1.33 1.33 0 0 0-.4.94c0 .22.07.42.17.61zm14.79 19.18a7.46 7.46 0 0 1-6.41 2.31 7.92 7.92 0 0 1-3.67.9c-3.05 0-6.12-1.63-8.36-3.88l-6.4-6.4A2.31 2.31 0 0 1 2 19.72a2.33 2.33 0 0 1 1.92-2.3l-.87-.87a2.34 2.34 0 0 1 0-3.3 2.33 2.33 0 0 1 1.24-.64l-.14-.14a2.34 2.34 0 0 1 0-3.3 2.39 2.39 0 0 1 3.3 0l.14.14a2.33 2.33 0 0 1 3.95-1.24l.09.09c.09-.42.29-.83.62-1.16a2.34 2.34 0 0 1 3.3 0l3.38 3.39a2.17 2.17 0 0 1 1.27-.17c.54.08 1.03.35 1.45.76.1-.55.41-1.03.9-1.42a2.12 2.12 0 0 1 1.67-.4 2.8 2.8 0 0 1 1.85 1.25l3.65 6.43c1.7 2.83 2.03 7.37-2.2 11.6zM13.22.48l-1.92.89 2.37 2.83-.45-3.72zm8.48.88L19.78.5l-.44 3.7 2.36-2.84zM16.5 3.3L15.48 0h2.04L16.5 3.3z" fill-rule="evenodd"></path>
							</svg></button></div></div></div><div class="r pd pe pf pg ph pi pj"><div class="cd qu pk"><h4 class="bi ek cb bk ct">
								<button style="font-size:16px;" class="cg ch at au av aw ax ay az ba ci cj bd be ck cl"><?php echo htmlentities($TotalLikes); ?> claps</button>
								</h4></div></div></div></div><div class="r qv qw qx qy qz"></div></div>
							<?php } ?>
							
						<div class="n o"><div class="hy r bh"><a href="<?php echo htmlentities(TwitterShare($PostId,$PostTitle,$AdminName)) ?>" class="cg ch at au av aw ax ay az ba ci cj bd be ck cl" target="_blank" rel="noopener nofollow"><svg width="29" height="29" class="q"><path d="M22.05 7.54a4.47 4.47 0 0 0-3.3-1.46 4.53 4.53 0 0 0-4.53 4.53c0 .35.04.7.08 1.05A12.9 12.9 0 0 1 5 6.89a5.1 5.1 0 0 0-.65 2.26c.03 1.6.83 2.99 2.02 3.79a4.3 4.3 0 0 1-2.02-.57v.08a4.55 4.55 0 0 0 3.63 4.44c-.4.08-.8.13-1.21.16l-.81-.08a4.54 4.54 0 0 0 4.2 3.15 9.56 9.56 0 0 1-5.66 1.94l-1.05-.08c2 1.27 4.38 2.02 6.94 2.02 8.3 0 12.86-6.9 12.84-12.85.02-.24 0-.43 0-.65a8.68 8.68 0 0 0 2.26-2.34c-.82.38-1.7.62-2.6.72a4.37 4.37 0 0 0 1.95-2.51c-.84.53-1.81.9-2.83 1.13z"></path></svg></a></div><div class="hy r bh"><a href="http://www.linkedin.com/shareArticle?url=http%3A%2F%2Fblog.istenitdgp.com%2FFullPostNew.php%3Fid%3D<?php echo $PostId; ?>&title=<?php echo $PostTitle; ?>" class="cg ch at au av aw ax ay az ba ci cj bd be ck cl" target="_blank" rel="noopener nofollow"><svg width="29" height="29" viewBox="0 0 29 29" fill="none" class="q"><path d="M5 6.36C5 5.61 5.63 5 6.4 5h16.2c.77 0 1.4.61 1.4 1.36v16.28c0 .75-.63 1.36-1.4 1.36H6.4c-.77 0-1.4-.6-1.4-1.36V6.36z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.76 20.9v-8.57H7.89v8.58h2.87zm-1.44-9.75c1 0 1.63-.65 1.63-1.48-.02-.84-.62-1.48-1.6-1.48-.99 0-1.63.64-1.63 1.48 0 .83.62 1.48 1.59 1.48h.01zM12.35 20.9h2.87v-4.79c0-.25.02-.5.1-.7.2-.5.67-1.04 1.46-1.04 1.04 0 1.46.8 1.46 1.95v4.59h2.87v-4.92c0-2.64-1.42-3.87-3.3-3.87-1.55 0-2.23.86-2.61 1.45h.02v-1.24h-2.87c.04.8 0 8.58 0 8.58z" fill="#fff"></path></svg></a></div><div class="hy r bh"><a href="http://www.facebook.com/sharer.php?u=http://blog.istenitdgp.com%2FFullPostNew.php%3Fid%3D<?php echo $PostId; ?>" class="cg ch at au av aw ax ay az ba ci cj bd be ck cl" target="_blank" rel="noopener nofollow"><svg width="29" height="29" class="q"><path d="M23.2 5H5.8a.8.8 0 0 0-.8.8V23.2c0 .44.35.8.8.8h9.3v-7.13h-2.38V13.9h2.38v-2.38c0-2.45 1.55-3.66 3.74-3.66 1.05 0 1.95.08 2.2.11v2.57h-1.5c-1.2 0-1.48.57-1.48 1.4v1.96h2.97l-.6 2.97h-2.37l.05 7.12h5.1a.8.8 0 0 0 .79-.8V5.8a.8.8 0 0 0-.8-.79"></path></svg></a></div></div></div><div class="rb rc rd pn r re y"><div class="r aq"><div class="rf rg r cd"><span class="r rh al ri"><div class="r s rj rk"><a onclick="openWriter(<?php echo $AdminId ?>)" style="cursor:pointer;"><img alt="<?php echo $AdminName; ?>" class="r dm ed rl" src="userimages/<?php echo $AdminImage; ?>" width="80" height="80"></a></div><span class="r"><div class="rm r rn"><p class="bi ek el bk bn en ro">Written by</p></div><div class="rm rp n rn"><div class="ai n o gx"><h2 class="bi ka rq rr ct"><a class="cg ch at au av aw ax ay az ba ci cj bd be ck cl" onclick="openWriter(<?php echo $AdminId ?>)" style="cursor:pointer;"><?php echo htmlentities($AdminName); ?></a></h2><div class="r g">
						<!-- <button class="cs cu ar as hn bb bc ho ba df bi b bj bk bl bm dg dh di bx dj bd">Follow</button> -->
						</div></div></div></span></span><div class="rm rs r rn aq"><div class="rt r"><h4 class="bi ek mh ru bn"><?php echo htmlentities($AdminMain." ".$AdminBio); ?></h4></div><div class="ap rv aq">
						<!-- <button class="cs cu ar as hn bb bc ho ba df bi b bj bk bl bm dg dh di bx dj bd">Follow</button> -->
						<?php
							global $ConnectingDB;
							$sql  = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON'";
							$stmt =$ConnectingDB->query($sql);
							$RowsTotal = $stmt->fetch();
							$TotalComments = array_shift($RowsTotal);
							
						?>
						</div></div></div></div></div><div class="rx rc r ry rz y"><a href="#comments" class="cg ch at au av aw ax ay az ba ci cj bd be ck cl" rel="noopener"><span class="kz sa ox"><div class="sb sc df r lq aq">
						<?php if($TotalComments != 0){  ?>
						<span class="ar">See responses (<?php echo htmlentities($TotalComments); ?>)</span>
						<?php } else{  ?>
							<span class="ar">Write the first response</span>
						<?php  }  ?>
					
					
					</div></span></a></div></div></div>
					</div>
				</div>
			</main>
			</div>
	<!-- Main of the page end -->

	<div style="margin-top:64px;" class="styling bootstrap fonts">
		<style scoped>
			#wrapper{
				font-family: "Merriweather", Georgia, "Times New Roman", Times, serif;
				font-size: 14px;
				line-height: 2.2857142857;
				color: #999;
				background-color: #f7f7f7;
			}
		</style>
    	<div id="wrapper">
        <div class="w1">
		<main style="overflow:hidden;" id="main" role="main">
			<article>
					<div id="addcomment" style="margin-top: 64px;" class="container">
					<div class="row">
							<div id="comments">
							<section class="section comments wow fadeInUp" data-wow-delay="0.6s">
								<?php
								global $ConnectingDB;
								$sql  = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON'";
								$stmt =$ConnectingDB->query($sql);
								$RowsTotal = $stmt->fetch();
								$TotalComments = array_shift($RowsTotal);
								
							?>
								<header class="header">
									<h2>Comments on this post</h2>
									<p><?php echo htmlentities($TotalComments); ?> comments</p>
								</header>
								
								

								<div class="commentlist">
									
									<!-- <div class="commentlist-item version-ii">
										<div id="comment-2" class="comment even thread-even depth-1">
											<div class="avatar-holder round">
												<img class="avatar avatar-48 photo avatar-default" src="http://placehold.it/55x55" alt="image description">
											</div>
											<div class="commentlist-holder">
												<p class="meta">
													<strong class="name"><a href="#">John Doe</a></strong>
													<a href="#"><time datetime="2011-01-12">2 hours ago</time></a>
												</p>
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam erat volutpat. <br>eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
												<p><a onclick="return addComment.moveForm(&quot;comment-2&quot;, &quot;1&quot;, &quot;respond&quot;, &quot;1&quot;)" href="https://flow-attachments.s3.amazonaws.com/?p=1&amp;replytocom=1#respond" class="comment-reply-link">REPLY</a></p>
											</div>
										</div> -->
										<?php
										global $ConnectingDB;
										$sql  = "SELECT * FROM comments
										WHERE post_id='$SearchQueryParameter' AND status='ON'";
										$stmt =$ConnectingDB->query($sql);
										while ($DataRows = $stmt->fetch()) {
											$CommentDate   = $DataRows['datetime'];
											$CommenterName = $DataRows['name'];
											$CommenterEmail = $DataRows['email'];
											$CommentContent= $DataRows['comment'];
											$CommentAgo = time_elapsed_string("@".$CommentDate);
											$DateForTimeTag = strftime("%Y-%m-%d",$CommentDate);


										$sql5 = "SELECT * FROM users
										WHERE email='$CommenterEmail'";
										$stmt5 =$ConnectingDB->query($sql5);
										$DataRows5 = $stmt5->fetch();
										$CommenterImage = $DataRows5['imageuser'];
										$CommenterId = $DataRows5['id'];
										if(!empty($CommenterImage)){
											$CommenterImage = $CommenterImage;
										}
										else{
											$CommenterImage = "userimages/avatar.png";
										}

										?>
										
									
									<div class="commentlist-item version-ii">
										<div id="comment-4" class="comment even thread-even depth-1">
											<div class="avatar-holder round">
												<img class="avatar avatar-48 photo avatar-default" src="<?php echo $CommenterImage; ?>" alt="<?php echo htmlentities($CommenterName); ?>">
											</div>
											<div class="commentlist-holder">
												<p class="meta">
													<strong class="name"><a href="#"><?php echo htmlentities($CommenterName); ?></a></strong>
													<a href="#"><time datetime="<?php echo $DateForTimeTag; ?>"><?php echo htmlentities($CommentAgo); ?></time></a>
												</p>
												<p><?php echo htmlentities($CommentContent); ?></p>
												<p><a href="#"></a></p>
											</div>
										</div>
									</div>
									<?php } 
										if(isset($_SESSION['UsserId']) && !empty($_SESSION['UsserId'])){
									?>
									<div class="commentlist-item version-ii">
										<div id="comment-4" class="comment even thread-even depth-1">
											<div class="avatar-holder round">
												<img class="avatar avatar-48 photo avatar-default" src="<?php echo htmlentities($_SESSION['UsserImage']); ?>" alt="<?php echo $_SESSION['UsserName']; ?>">
											</div>
											<div class="commentlist-holder">
												<p class="meta">
													<strong class="name"><a href="#"><?php echo htmlentities($_SESSION['UsserName']); ?></a></strong>
													<a href="#"><time datetime="<?php echo $DateForTimeTag; ?>"></time></a>
												</p>
												<p><input style="border:none;width:90%;height:64px;padding: 0px 10px;font-size:16px;" type="text" id="newcomment" placeholder="Write Your Thoughts Here ..." value=""></input></p>
												<p><button style="cursor:pointer;background:none;border:none;margin:0;padding:0;" onclick="add_comments(<?php echo htmlentities($PostId); ?>)" class="comment-reply-link">Comment</button></p>
											</div>
										</div>
									</div>
										<?php }else{ ?>
											<div class="commentlist-item version-ii">
										<div id="comment-4" class="comment even thread-even depth-1">
											<div class="avatar-holder round">
												<img class="avatar avatar-48 photo avatar-default" src="userimages/avatar.png" alt="login to comment">
											</div>
											<div class="commentlist-holder">
												<p><input disabled style="border:none;width:90%;height:64px;padding: 0px 10px;font-size:16px;" type="text" id="newcomment" placeholder="Login to comment ..." value=""></input></p>
												<p><a onclick="openNav()" href="#" style="cursor:pointer;" onclick="" class="comment-reply-link">Comment</a></p>
											</div>
										</div>
									</div>
										<?php } ?>
										
								</div>
							</section>
							</div>


							
							<!-- <section class="comment-respond version-ii wow fadeInUp" data-wow-delay="0.6s">
								<header class="header">
									<h3 class="comment-reply-title" id="reply-title">Leave a comment</h3>
									<p>it’s easy to post a comment</p>
								</header>
								<form class="comment-form" id="commentform" method="post" action="http://twitter.staging.com/wp-comments-post.php">
									<div class="wrap three-inline">
										<div class="comment-form-author">
											<input type="text" placeholder="Your name" aria-required="true" size="30" name="author" id="author">
										</div>
										<div class="comment-form-email">
											<input type="text" placeholder="Email address" aria-required="true" size="30" name="email" id="email">
										</div>
										<div class="comment-form-url">
											<input type="text" placeholder="Website" size="30" name="url" id="url">
										</div>
									</div>
									<div class="comment-form-comment">
										<textarea placeholder="your comment here" aria-required="true" cols="72" rows="3" name="comment" id="comment"></textarea>
									</div>
									<p class="form-allowed-tags hidden">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a
							 href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; 
							&lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del 
							datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; 
							&lt;strong&gt; </code></p>
									<div class="form-submit">
										<input type="submit" value="Leave a comment" id="submit" name="submit">
										<input type="hidden" id="comment_post_ID" value="1" name="comment_post_ID">
										<input type="hidden" value="0" id="comment_parent" name="comment_parent">
									</div>
								</form>
							</section> -->

							<section class="recent-posts wow fadeInUp" data-wow-delay="0.6s">
								<header class="header">
									<h2>Recent post</h2>
									<p>you may love this post</p>
								</header>
								
								<ul>
									<?php 
										$i = 0;
										global $ConnectingDB;
										$sql = "SELECT * FROM posts WHERE publishstatus='ON' ORDER BY id DESC LIMIT 0,4";
										$stmt =$ConnectingDB->query($sql);
										while($DataRows = $stmt->fetch()){ 
											$PostId          = $DataRows["id"];
											$DateTime        = $DataRows["datetime"];
											$PostTitle       = $DataRows["title"];
											$Thumbnail       = $DataRows["thumbnail"];
											$DateForTimeTag = strftime("%Y-%m-%Y",$DateTime);
											$DateForPopular  = DateAndMonth($DateTime);
									?>
									<li>
										<div class="holder">
											<div class="img-holder"><img src="Uploads/<?php echo $Thumbnail; ?>" alt="image description"></div>
											<h3><a href="FullPostNew.php?id=<?php echo $PostId; ?>"><?php echo htmlentities($PostTitle); ?></a></h3>
											<time datetime="<?php echo $DateForTimeTag ?>"><a href="#"><?php echo htmlentities($DateForPopular); ?>, <?php echo htmlentities(strftime("%Y",$DateTime)); ?></a></time>
										</div>
									</li>
									<?php $i++;  } ?>
								</ul>
							</section>
					
					</div>
				</div>
			</article>
		</main>

		<?php } else{ ?>
			<div style="margin-top:64px;" class="styling bootstrap fonts">
		<style scoped>
			#wrapper{
				font-family: "Merriweather", Georgia, "Times New Roman", Times, serif;
				font-size: 14px;
				line-height: 2.2857142857;
				color: #999;
				background-color: #f7f7f7;
			}
		</style>
    	<div id="wrapper">
        <div class="w1">
		<?php } ?>
	
			<aside style="background-color: #f7f7f7;" class="socials container-fluid wow fadeInUp" data-wow-delay="0.6s">
				<div class="row">
					<a href="https://www.facebook.com/istenitd/" class="facebook">
						<span><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg></span>
						<span class="txt">Facebook</span>
					</a>
					<a href="https://www.instagram.com/istenitdgp/" class="twitter">
						<span><svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg></span>
						<span class="txt">instagram</span>
					</a>
					<a href="https://github.com/Istenitdgp/" class="google">
						<span><svg class="icon icon-github"><use xlink:href="#icon-github"></use></svg></span>
						<span class="txt">github</span>
					</a>
					<a href="https://www.linkedin.com/in/iste-nit-durgapur/" class="linkedin">
						<span><svg class="icon icon-linkedin2"><use xlink:href="#icon-linkedin2"></use></svg></span>
						<span class="txt">linkedin</span>
					</a>
					<a href="https://www.youtube.com/channel/UCA1jrMTZPxVbs_A8hDLXlbQ" class="pinterest">
						<span><svg class="icon icon-youtube"><use xlink:href="#icon-youtube"></use></svg></span>
						<span class="txt">youtube</span>
					</a>
				</div>
			</aside>
			
			
			<aside class="aside version-ii container">
			    <div class="row">
				<div class="col-xs-12 holder">
					<div class="col">
						<div class="footerlogo">
						<div class="logo"><a href="http://istenitdgp.com/"><img src="images/logo2.png" alt="dot"></a></div>
						<div class="logo"><a href="http://istenitdgp.com/"><img src="images/nitdgp_logo_white.png" alt="dot"></a></div>
						</div>
						<p>The Indian Society for Technical Education is the leading National Professional non-profit making Society for the Technical Education System operating in association with All India Council for Technical Education.</p>
					</div>
					
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
					
					<div class="col">
							<h3>Subscribe to Newsletter</h3>
							<p>For Latest Updates about popular blogs which may interest you.</p>
							
							<form action="#" class="subscribe-form">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Enter your email here">
									<button type="button"><svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg></button>
								</div>
							</form>
							
						</div>
				</div>
			    </div>
		    </aside>
			
			<footer id="footer" class="container version-ii">
			    <div class="row">
				<div class="col-xs-12 col-sm-6">
					<p>&copy; <span id="year"></span> Copyright <span id="year"></span>, <a href="home.html">ISTE</a>. All Rights Reserved</p>
				</div>
				<div class="col-xs-12 col-sm-6">
					
					<ul class="social-networks">
						<li><a href="https://www.facebook.com/istenitd/"><span><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg></span></a></li>
						<li><a href="https://www.instagram.com/istenitdgp/"><svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg></span></a></li>
						<li><a href="https://github.com/Istenitdgp/"><svg class="icon icon-github"><use xlink:href="#icon-github"></use></svg></a></li>
						<li><a href="https://www.linkedin.com/in/iste-nit-durgapur/"><span><svg class="icon icon-linkedin2"><use xlink:href="#icon-linkedin2"></use></svg></span></a></li>
						<li><a href="https://www.youtube.com/channel/UCA1jrMTZPxVbs_A8hDLXlbQ"><svg class="icon icon-youtube"><use xlink:href="#icon-youtube"></use></svg></a></li>
					</ul>
					
				</div>
			    </div>
		    </footer>
			
            <span id="back-top" class="fa fa-angle-up"></span>
            </div>
		</div>
	</div>
	<!-- include jQuery -->
	<script src="js/jquery.js"></script>
	<!-- include jQuery -->
    <script src="js/plugins.js"></script>
    <!-- include jQuery -->
    <script src="js/jquery.main.js"></script>
	<script>
		$('#year').text(new Date().getFullYear());
	</script>
</body>
</html>