<?php
// For instance, you can do something like this:
if(isset($_POST['width'])) {
    $ExpireTime=time()+86400;
    $width = $_POST['width'];
    $_SESSION['ErrorMessage'] = $_POST['width'];
    setcookie("screen_width",$width,$ExpireTime);
    echo "successwidth";
} else {
    echo "failedwidth";
}
?>