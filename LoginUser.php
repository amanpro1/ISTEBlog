<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
           echo ErrorMessage();
           echo SuccessMessage();
?>
<!DOCTYPE html>

<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Document</title>
    <link rel="stylesheet" href="Css/newlogin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        function login(){
            $.ajax({

                url: 'LoginUser1.php',
                data: $("#loginform").serialize(),
                type: "POST",
                beforeSend: function(){

                },
                success: function(data) {
                    
                    var a= data['return'];
                    var b= data['URL'];
                    if(a=="success"){
                        window.parent.location.href = b;
                    }else{
                        alert("loginfailed");
                        window.location.reload();
                    }
                }
            });
        };
        $(document).ready(function (e) {
    $('#signupform').on('submit',(function(e) {
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
                alert("We are glad to have you. Now Login !!");
                window.location.reload();
            }
        });
    }));

    $("#submitsignup").on("click", function() {
        $("#signupform").submit();
    });
});
</script>


</head> 

<body>

    <!-- LOGIN MODULE -->

    <div class="login">
        <div class="wrap">
            <!-- TOGGLE -->
            <div id="toggle-wrap">
                <div id="toggle-terms">
                    <div id="cross"> <span></span> <span></span>
                    </div>
                </div>

            </div>

            <!-- TERMS -->
            <div class="terms">
                <h2>ISTENITDGP Terms of Service</h2>
                <p class="small">Last modified: January 21, 2020</p>
                <h3> Welcome to ISTE Students' Chapter NIT Durgapur</h3>
                <p>By using our Services, you are agreeing to these terms. Please read them carefully.</p>
                <p> Our Services are very diverse, so sometimes additional terms or product requirements may apply.</p>
                <h3> Using our Services</h3>
                <p> You must follow any policies made available to you within the Services.</p>
                <p>Using our Services does not give you ownership of any intellectual property rights in our Services or
                    the content you access.</p>
                <p>In connection with your use of the Services, we may send you service announcements, administrative
                    messages, and other info.</p>
                <h3> Your iste Account</h3>
                <p> You may need a Account in order to use some of our Services. You may create your own iste Account. </p>
                <p>To protect your iste Account, keep your password confidential. You are responsible for the activity
                    that happens on or through your account.</p>
                <h3> Privacy and Copyright Protection</h3>
                
                <p> iste student's chapter nitdgp privacy policies explain how we treat your personal data and protect your privacy when you use our Services.</p>
                 <p> We respond to notices of alleged copyright infringement and terminate accounts of repeat infringers. </p> 
                 <p> We provide information to help copyright holders manage their intellectual property online. If you think somebody is violating these rules you may email a post regarding that to istenitdurgapur@gmail.com </p> <h3> Modifying and Terminating our Services</h3> 
                 <p> We are constantly changing and improving our Services. We may add or remove functionalities or features, and we may suspend some functions. </p> <p> You can stop using our Services at any time, although we'll be sorry to see you go. istenitdurgapur may also stop providing Services to you.</p>
                 <p> We believe that you own your data and preserving your access to such data is important. If we discontinue a Service, your all data will be securely deleted instantly.</p>
                 <h3> Our Warranties and Disclaimers</h3> 
                 <p> We provide our Services using a commercially reasonable level of skill and care and we hope that you will enjoy using them. </p>

                <p>ONLY BLOGS RELATED TO TECHNICAL ADVANCEMENT WILL BE ACCEPTED</p>
                <p>IN CASE OF ANY DISPUTE , THE DECISION MADE BY ISTE EXECUTIVE BOARD MEMBERS WILL BE FINAL </p>

                <h3> Liability for our Services</h3>

                <p>WHEN PERMITTED BY LAW, istenitdgp WILL NOT BE RESPONSIBLE FOR LOST PROFITS, REVENUES, OR DATA TO THE EXTENT PERMITTED BY LAW, THE TOTAL LIABILITY OF iste'S FOR ANY CLAIMS UNDER THESE TERMS OF SERVICE.</p>
                <p> IN ALL CASES, istenitdgp, AND ITS MANAGEMENT, WILL NOT BE LIABLE FOR ANY LOSS OR DAMAGE THAT IS NOT REASONABLE.</p>

                <h3>About these Terms</h3>
                <p>We may modify these terms or any additional terms that apply to a Service to, for example, reflect changes to the law etc. </p>
                <p> If you do not comply with these terms, and we don't take action right away, this doesn't mean that we are giving up any right to you except these terms. </p>
                 <p>The laws will apply to any disputes arising out due to illegal activities.</p>
                 <p> For information about how to contact istenitdgp, please visit our contact page.</p>

            </div>

            <!-- RECOVERY -->
            <div class="recovery">
                <h2>Password Recovery</h2>
                <p>Enter the <strong>email address</strong> on the account and
                    <strong>click Submit</strong></p>
                <p>We'll email instructions on how to reset your password.</p>
                <form class="recovery-form" action="" method="post"> 
                    <input type="email" class="" id="user_recover" placeholder="Enter Email  Here"> 
                <input type="submit" class="button" value="submit">

                </form>
                <p class="mssg">An email has been sent to you with further instructions.</p>

            </div>

            <!-- SLIDER -->
            <div class="content">
                <!-- LOGO -->
                <div class="logo"> <a href="index.php?page=1"><img
                            src="images/logo2.png" alt=""></a>

                </div> <!-- SLIDESHOW -->
                <div id="slideshow">
                    <div class="one">
                        <h2><span>EVENTS</span></h2>
                        <p>Sign up to attend any of dozens of events nationwide</p>

                    </div>
                    <div class="two">
                        <h2><span>BLOGGING</span></h2>
                        <p>SO MANY BLOGS available written on diverse topics</p>

                    </div>
                    <div class="three">
                        <h2><span>COMMENT</span></h2>
                        <p>Comment your ideas and follow the best writers that share your interests</p>

                    </div>
                    <div class="four">
                        <h2><span>SHARING</span></h2>
                        <p>Share the posts to the community on the various social media or public platforms</p>

                    </div>

                </div>

            </div> <!-- LOGIN FORM -->
            <div class="user">

                 <!-- <div class="actions">
    <a class="help" href="#signup-tab-content">Sign Up</a>
    <a class="faq" href="#login-tab-content">Login</a>

</div> -->



                <div class="form-wrap">
                    <!-- TABS -->
                    <div class="tabs">

                        <h3 class="login-tab"><a class="log-in active" href="#login-tab-content"><span>Login<span></a>
                        </h3>
                        <h3 class="signup-tab"><a class="sign-up" href="#signup-tab-content"><span>Sign Up</span></a>
                        </h3>
                    </div> <!-- TABS CONTENT -->

                    <div class="tabs-content">

                        <!-- TABS CONTENT LOGIN -->

                        <div id="login-tab-content" class="active">
                        
                            <form id="loginform" class="login-form" action="LoginUser1.php" method="post"> 
                                    <input type="email" class="input" id="user_login" name="email"  placeholder="Email"> 
                                    <input type="password" name="password" class="input" id="user_pass" placeholder="Password" > 
                                    <!-- <input name="remember" type="checkbox" value="Remember_me" class="checkbox" checked id="remember_me">  -->
                                    <!-- <label for="remember_me">Remember me</label>  -->
                                    <input onclick="login()" id="submitlogin" name="submit" type="submit" class="button" value="Login">

                            </form>
                            <div class="help-action">
                                <p><i class="fa fa-arrow-left" aria-hidden="true"></i><a class="forgot" href="#">Forgot
                                        your password?</a></p>

                            </div>
                        </div> <!-- TABS CONTENT SIGNUP -->

                        <div id="signup-tab-content">
                            <form id="signupform" class="signup-form" action="SignupUser.php" method="post" enctype="multipart/form-data">   
                                    <input type="email" name="email" class="input"
                                    id="user_email"  placeholder="Email"> 
                                    <input type="text" name="name" class="input" id="user_name"  placeholder="Name" > 
                                    <input name="password" type="password" class="input" id="user_pass" placeholder="Password" > 
                                    <label for="user_image">Profile Pic (*Optional)</label>
                                    <input style="" name="userimage" type="file" class="input" id="user_image" placeholder="">
                                    <input name="submit" id="submitsignup" type="submit" class="button" value="Sign Up">

                            </form> 

                            <div class="help-action">
                                <p>By signing up, you agree to our</p>
                                <p><i class="fa fa-arrow-left" aria-hidden="true"></i><a class="agree" href="#">Terms of
                                        service</a></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/newlogin.js"></script>

</body>

</html>