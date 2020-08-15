<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login();
$_SESSION['TrackingURL']=$_SERVER['PHP_SELF']; 
?>
<?php 
  if(((isset($_GET['times']))==true) || ((isset($_GET['id']))==true) ){
  if(isset($_POST['Submit'])){
    
    $PostText  = $_POST["PostHtml"];
    preg_replace("/(=UTF\w+)/", "\=UTF", $PostText);

    date_default_timezone_set("Asia/Kolkata");
    $CurrentTime=time();
    $DateTime=strval($CurrentTime);
    if(isset($_GET['times'])){
        global $ConnectingDB;
      $PostTime = $_GET["times"];
      $sql = "UPDATE posts SET datetime=:dateTimes, post=:postText, publishstatus=:publishStatus WHERE datetime=:timewa";
      $stmt = $ConnectingDB->prepare($sql);
        $stmt -> bindValue(':dateTimes',$CurrentTime);
        $stmt -> bindValue(':postText',$PostText);
        $stmt -> bindValue(':publishStatus','OFF');
        $stmt -> bindValue(':timewa',$PostTime);
        $Execute = $stmt -> execute();
    }
    if(isset($_GET['id'])){
        global $ConnectingDB;
      $PostId = $_GET["id"];
      $sql = "UPDATE posts SET datetime=:dateTimes, post=:postText, publishstatus=:publishStatus WHERE id=:postId";
      $stmt = $ConnectingDB->prepare($sql);
        $stmt -> bindValue(':dateTimes',$CurrentTime);
        $stmt -> bindValue(':postText',$PostText);
        $stmt -> bindValue(':publishStatus','OFF');
        $stmt -> bindValue(':postId',$PostId);
        $Execute = $stmt -> execute();
    }
    

        // var_dump($Execute);
        if($Execute){
            $_SESSION["SuccessMessage"]="Post added Successfully";
            Redirect_to("EditPost.php");
        }else {
            $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
            if(isset($_GET['times'])){
            Redirect_to("EditPost2.php?times=$PostTime");
            }
            if(isset($_GET['times'])){
            Redirect_to("EditPost2.php?id=$PostId");
            }
        }
      }
    }
      else{
        $_SESSION["ErrorMessage"]= "Come With Proper Channel";
        Redirect_to("Dashboard.php");
      }
  
?>
<!DOCTYPE html>
<html>
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Post</title>
    <!-- include the site stylesheet -->
    
    <!-- <link rel="stylesheet" href="Css/fontawesome-free-5.13.0-web/css/all.min.css"> -->
    <link rel="stylesheet" href="Css/bootstrap2.css">
    <link rel="stylesheet" href="Css/Styles.css">
	<link rel="stylesheet" href="style1.css">
	<!-- include the site stylesheet -->
    <link rel="stylesheet" href="Css/responsive1.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
<script>
$(document).ready(function (e) {
    $('#imageupload').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                document.getElementById('foruser').innerHTML="Replace below file name with '#' in editor(Copy the File Name Appeared Before submitting new File)";
                document.getElementById('nameimage').innerHTML=data;
            }
        });
    }));

    $("#submitimage").on("click", function() {
        $("#imageupload").submit();
    });
});

    function livepreview(id){
        var original = $("#originaltext").val();
        
        $.ajax({
            type:'POST',
            url: "Editposting.php",
            data:'text='+original+'&id='+id,
            success:function(data){
                $("#livetext").load(window.location.href + " #livetext" );
            }
        });

        
    }
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
    <div class="fonyawesome bootstrap">
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
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Edit Post</h1>
          </div>
        </div>
      </div>
    </header>
    </div>
    
<!-- Direct new svg icons from icomoon end -->
	<?php
		echo ErrorMessage();
		echo SuccessMessage();
    ?>
<?php 
                    if(isset($_GET['times']) || isset($_GET['id']) ){
                          if(isset($_GET['times'])){
                            $PostTime = $_GET["times"];
                            $sql1 = "SELECT * FROM posts WHERE datetime='$PostTime'";
                          }
                          if(isset($_GET['id'])){
                            $PostId = $_GET["id"];
                            $sql1 = "SELECT * FROM posts WHERE id='$PostId'";
                          }
                          
                      
                          
                              // Query to insert post in DB When everything is fine
                              global $ConnectingDB;
                              $stmt = $ConnectingDB->query($sql1);
                              // var_dump($Execute);
                                $DataRows = $stmt->fetch();

                                $PostId          = $DataRows["id"];
                                $DateTime        = $DataRows["datetime"];
                                $PostTitle       = $DataRows["title"];
                                $Subtitle        = $DataRows["subtitle"];
                                $PostDescription = $DataRows["post"];
                              
                            }
                            else{
                                $_SESSION["ErrorMessage"]= "Come With Proper Channel";
                                Redirect_to("Dashboard.php");
                            }
                        
                ?>
                <h4 style="margin: 40px 0 10px 0;color:#555;" class="text-center"><u>Live Preview Enabled(If Not Doing Live Preview then submit and edit again)</u></h4>
<div class="medium">
<main class="mains a b c" role="main">
				<article>
                
				<section class="fg fh fi fj fk">
				<div class="n p">
					<div class="z ab ac ae af fl ah ai"><div><div id="db5f" class="fm fn ct bj fo b fp fq fr fs ft fu fv fw fx fy fz"><h1 class="fo b fp ga fr gb ft gc fv gd fx ge ct"><?php echo htmlentities($PostTitle); ?></h1></div></div><h2 id="be30" class="gf fn bn bj bi ek gg gh gr gi gj gs gk gl gt gm gn gu go gp gv gq"><?php if(!empty($Subtitle)){ echo $Subtitle; } ?></h2></div>
                </div>
                <div id="livetext">
                <?php echo html_entity_decode($PostDescription); ?>
                </div>
                </section>
				</article>
            </main>
                        </div>


    
    <!-- Main of the page -->
			<main style="margin-top:5rem;" class="medium mains a b c" role="main">
                <style scoped>
                    *, *:before, *:after {
                        box-sizing: inherit;
                    }
				</style>
				<article>
				<section class="fg fh fi fj fk">
				<div class="n p">
					<div class="z ab ac ae af fl ah ai">
                    <h3 class="text-center" style="padding:18px;margin:1rem 0rem;background:#f4f4f4;color:#333">Key Point to Write Post in this Editor : Just replace '...' to original text and '#' to generated image name</h3>
                  <p class="text-center" style="font-weight:700;margin: 1em;">** To get started go to section below the editor and click on new section green button and paste that item in text editor then replace ... with copied text from green button of normal paragraph or heading or anything which you want to include ** </p>
                  
                <form spellcheck="false" action="EditPost2.php?id=<?php echo $PostId; ?>" method="post">
                <div>
                  
                  <textarea id="originaltext" onchange="livepreview(<?php echo $PostId; ?>)" style="margin: 1em; font-size:18px;" name="PostHtml" rows="30" cols="70" placeholder="Enter Post here... 
                  eg.(1) <div class='n p'><div class='z ab ac ae af fl ah ai'> <p class='ji ju ct bj jk b gg jl jv gi jm jw jn jo gt jp jq gu jr js gv jt fg' data-selectable-paragraph=''> text goes here </p> </div></div> 
                  eg.(2) <div class='n p'><div class='z ab ac ae af fl ah ai'> <h1 class='jy jz ct bj bi ka fp kb fr kc kd ke kf kg kh ki kj' data-selectable-paragraph=''> text goes here </h1> </div></div>"><?php if(!empty($PostDescription)){ echo $PostDescription; } ?></textarea>
              </div>
                <div style="margin: 1em;" class="text-center">
                  <button style="cursor:pointer;background-color:#333; color:#fff;margin: 1em;" type="submit" name="Submit">
                     Save Post in Drafts
                  </button>
                </div>
            </form>
					</div>
				</div>
				
				</section>
				</article>
            </main>
    <h3 style="margin: 40px 0 10px 0;color:#555;" class="text-center"><u>Use of below predefined classes is compulsory in editing - Click on green Button to Copy</u></h3>
    <p style="margin: 40px 0 10px 0;color:#555;" class="text-center">Attention - Read Every Instruction attentively before using these.</p>
    <div class="text-center" style="display:grid;grid-template-columns:repeat(3,1fr);grid-gap:1em;margin:15px;">
    <script src="clipboard.min.js"></script>
    <script>
        new ClipboardJS('.btn');
    </script>
    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Some styled Symbols useful in writing title and subtitle(copy and paste above)</u></h4></div>
    
    <!-- Trigger -->
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="“">
        Copy starting “
    </button>

    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="”">
        Copy ending ”
    </button>

    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="‘">
        Copy starting ‘
    </button>

    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="’">
        Copy ending ’
    </button>

    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="™">
        Copy ™
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="—">
        Copy dash —
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Paragraphs</u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<p class='ji ju ct bj jk b gg jl jv gi jm jw jn jo gt jp jq gu jr js gv jt fg' data-selectable-paragraph=''>...</p>">
        Normal paragraph
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<p class='ji ju ct bj jk b gg kk jv gi kl jw jn km gt jp kn gu jr ko gv jt fg' data-selectable-paragraph=''>...</p>">
        paragraph after big heading
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<p class='ji ju ct bj jk b gg kk jv gi kl jw jn km gt jp kn gu jr ko gv jt fg' data-selectable-paragraph=''>...</p>">
        paragraph after small heading
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<p class='ji ju ct bj jk b gg kkd jv gi kke jw jn kkf gt jp kkg gu jr kkh gv jt fg' data-selectable-paragraph=''>...</p>">
        paragraph after centered Blockquote
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<p class='ji ju ct bj jk b gg kkd jv gi kke jw jn kkf gt jp kkg gu jr kkh gv jt jjs fg' data-selectable-paragraph=''><span class='r jjt jju jjv njw tjx tjy tjz tka tkb cd'>...</span>...</p>">
        paragraph after Centred quote First Letter Capital(Write Capital letter before ending span and rest before ending p)
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<p class='ji ju ct bj jk b gg jl jv gi jm jw jn jo gt jp jq gu jr js gv jt jjs fg' data-selectable-paragraph=''><span class='r jjt jju jjv njw tjx tjy tjz tka tkb cd'>...</span>...</p>">
        paragraph with First Letter Capital(Write Capital letter before ending span and rest before ending p)
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<p class='ji ju ct bj jk b gg jl jv gi jm jw jn jo gt jp jq gu jr js gv jt fg' data-selectable-paragraph=''>...</p>">
        Inside this any embed should be done of twitter,facebook,instagram etc.
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h6><u>Can be used within Paragraphs</u></h6></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<strong class='jk kp'>...</strong>">
        Bold Text
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<em class='jx'>...</em>">
        Italic Text
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<u>...</u>">
        Underlined Text
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<mark class='uc ud ox'>...</mark>">
        Highlighting Text With light Green
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Starting New Section</u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<div class='n p'><div class='z ab ac ae af fl ah ai'>...</div></div>">
        new section
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Links Can Be used within everything(Avoid using in Big Headings)- Replace # with Link</u></h4><p style="margin: 3px; color:#333;">Caution-Outer Links <u>containing Question Marks</u> Should be entered at last in place of #. Because if links like this included earlier will hinder live reload</p></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<a href='#' class='cg dj kr ks kt ku' target='_blank' rel='noopener nofollow'>...</a>">
        For attaching links to the text(Write part of text within this)
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<a href='#' class='kv ar dj' target='_blank' rel='noopener'>...</a>">
        For attaching green links to the text(Write part of text within this - Text will turn green - Use this within paragraphs only)
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Big Heading</u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<h1 class='jy jz ct bj bi ka fp kb fr kc kd ke kf kg kh ki kj' data-selectable-paragraph=''>...</h1>">
        Big Normal Heading
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Small Heading</u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<h2 class='mu jz ct bj bi ka mv mw mx my mz na nb nc nd ne nf' data-selectable-paragraph=''>...</h2>">
        Small Normal Heading
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<h2 class='mu jz ct bj bi ka mv kkd mx kke mz kkf nb kkg nd kkh nf' data-selectable-paragraph=''>...</h2>">
        Small Heading after centred blockquote
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Unordered Lists</u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<ul><li class='ji ju ct bj jk b gg jl jv gi jm jw jn jo gt jp jq gu jr js gv jt nj nk nl' data-selectable-paragraph=''>...</li>  </ul>">
        First point of Unordered list
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<li class='ji ju ct bj jk b gg nm jv gi nn jw jn no gt jp np gu jr nq gv jt nj nk nl' data-selectable-paragraph=''>...</li>">
        More Points of Unordered list(Paste me before ending ul in the space just after li )
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Ordered Lists</u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<ol><li class='ji ju ct bj jk b gg jl jv gi jm jw jn jo gt jp jq gu jr js gv jt nnj nk nl' data-selectable-paragraph=''>...</li>  </ol>">
        First point of Ordered list
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<li class='ji ju ct bj jk b gg nm jv gi nn jw jn no gt jp np gu jr nq gv jt nnj nk nl' data-selectable-paragraph=''>...</li>">
        More Points of Ordered list(Paste me before ending ol in the space just after li )
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Side Quote </u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<blockquote class='jjn jjo jjp'><p class='ji ju ct bj jk b gg jl jv gi jm jw jn jo gt jp jq gu jr js gv jt fg' data-selectable-paragraph=''>...</p></blockquote>">
        Side Quote -(You can use styled inverted commas from above)
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Centred Blockquotes (They affect above and below text use instructions)</u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<blockquote class='kw'><p class='lg ky bn bj fo b lh lb lc ld le lf jt' data-selectable-paragraph=''>...</p></blockquote>">
        Centred Quote after paragraph-(You can use styled inverted commas from above)
    </button>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<blockquote class='kw'><p class='lg ky bn bj fo b lh jjw jjx jjy jjz kka jt' data-selectable-paragraph=''>...</p></blockquote>">
        Centred Quote after Big or Small Heading-(You can use styled inverted commas from above)
    </button>
    </div>

    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Add Multiple Images/gif (Replace '...' to image/gif caption - You can use link or bold from above)</u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<figure class='im in io ip iq ic ez fa paragraph-image'><div class='it iu cd iv ai'><div class='ez fa lt'><div class='ja r cd jb'><div  class='jd r'><img src='Uploads/#' class='sa ua s t u ixx ai jh' role='presentation' onload='settingimage(this);'></div></div></div></div>
    <figcaption class='lp lq fb ez fa lr ls bi ek cb bk bn' data-selectable-paragraph=''>...</figcaption></figure>">
        Add an Image(Replace '#' to image name with extension)
    </button>
    <form id="imageupload" action="uploadFile.php" method="post" enctype="multipart/form-data">
    <div>
        <input name="postimage" type="file" id="customFile">
        <label style="margin:2rem 0 1rem 0;background:#777" for="customFile">Choose file</label>
        <input style="margin:1rem 0 0.5rem 0;" class="btn btn-primary" name="submit" id="submitimage" type="submit" value="Upload Image/GIF">
    </div>
    </form>
    <div id="foruser">After Uploading the file name that should be used in editor will appear just below</div>
    <div id="nameimage"></div>
    </div>
    
    <div style="background:#f4f4f4">
    <div style="margin: 15px; color:#6BA0F0;"><h4><u>Add Videos From Youtube(Paste Only link Written in embed code which will be starting with 'https://..') </u></h4></div>
    <button style="background-color: #CCFFCC; color:#000; margin-top: 1em;" class="btn" data-clipboard-text="<figure class='im in io ip iq ic'><div class='ja r cd'><div class='jd r' style='padding-bottom: 56.206088992974244%;'>
        <iframe src='#' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
        </div></div></figure>">
        Add a Video(Replace '#' to Youtube embed link)
    </button>
    </div>
    </div>
    </div>
    
    
    <p class="text-center" style="padding:2em;margin: 5em;background:#414141;color:#fff">( Write Post On Medium.com and <u>share the draft link</u> )</p>
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
    <!-- Main of the page end -->
    <!-- include jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/jquery.js"></script>
	<!-- include jQuery -->
    <script src="js/plugins.js"></script>
    <!-- include jQuery -->
    <script src="js/jquery.main.js"></script>
</body>
</html>