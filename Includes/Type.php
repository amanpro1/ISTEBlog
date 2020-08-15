<?php
    if($Main == "SingleImage"){
        $class = '<div class="img-holder">
        <a href="FullPostNew.php?id='.$PostId.'"><img src="Uploads/'.$Thumbnail.'" alt="image"></a></div>';
    }elseif($Main == "Audio"){
        $class = '<div class="text-center music-holder">'.$Multipurpose.'</div>';
    }elseif($Main == "Video"){
        $class = '<div class="video-holder">
        <a href="'.$Multipurpose.'" class="ico-play lightbox fancybox.iframe"></a>
        <img src="Uploads/'.$Thumbnail.'" alt="image description">
    </div>';
    }elseif($Main == "Quote"){
        $class = '<blockquote style="background-image: url(\'Uploads/'.$Thumbnail.'\');">'.$Multipurpose.'</blockquote>';
    }else {
        $class = '<ul class="list-unstyled image-slider">
        <li><img style="min-height:250px; max-height:250px;" src="Uploads/'.$Thumbnail.'" alt="image description"></li>
        <li><img style="min-height:250px; max-height:250px;" src="Uploads/'.$Multipurpose.'" alt="image description"></li>';
        if(!empty($Image3)){
            $class .= '<li><img style="min-height:250px; max-height:250px;" src="Uploads/'.$Image3.'" alt="image description"></li>';
        }
        elseif(!empty($Image4)){
            $class .= '<li><img style="min-height:250px; max-height:250px;" src="Uploads/'.$Image4.'" alt="image description"></li>';
        }
        elseif(!empty($Image5)){
            $class .= '<li><img style="min-height:250px; max-height:250px;" src="Uploads/'.$Image5.'" alt="image description"></li>';
        }
        else{
        }
        $class .= '</ul>';
    
    }
?>