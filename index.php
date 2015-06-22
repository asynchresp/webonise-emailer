<?php
session_start();
include_once("database.php");
$imgPath = $userId  = "";
$dbObject = new databaseBaseClass();
if(isset($_SESSION['imgPath']) && $_SESSION['imgPath'] !=""){
    $imgPath = $_SESSION['imgPath'];
    $userId = $_SESSION['userId'];
    unset($_SESSION['imgPath']);
    unset($_SESSION['userId']);
}
if(isset($_SESSION['img_error']) && $_SESSION['img_error'] !=""){

    $img_error = $_SESSION['img_error'];
    $imgPath = "";
    unset($_SESSION['img_error']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = $targ_h = 116;
	$jpeg_quality = 100;

	$src = $_POST['imagePath'];
    $imgExt = getExtention($src);

    $filepath = 'demo_files/thumb/thumb_'.time().'.'.$imgExt;
	$imageResize = resizeThumbnailImage($filepath,$src,$targ_w, $targ_h, $_POST);
    $newCirclePath = cropCircle($imageResize);

      if($newCirclePath){
          $lastImage =  cropBannerCircle($newCirclePath);
      }
    if($lastImage){
        $_POST['profile_img'] = $lastImage;
        $updateUser = $dbObject->updateRecord($_POST);
        if($updateUser){
            header('Location:template.php?user_id='.$_POST['user_id']);
        }else{
            $imgPath = $_POST['imagePath'];
            $userId = $_POST['user_id'];
        }
    }
}

function getExtention($src){
    $imageExtArray = explode("/",$src);
    $filename = $imageExtArray[count($imageExtArray)-1];
    $fileNameArray = explode(".",$filename);
    return $fileNameArray[count($fileNameArray)-1];
}

function cropCircle($imgPath){
    $base = new Imagick($imgPath);
    $mask = new Imagick('img/mask.png');

    $base->compositeImage($mask, Imagick::COMPOSITE_COPYOPACITY, 0, 0);
    $filePath = "demo_files/thumb/circle_".time().".png";
    $writeImage = $base->writeImage($filePath);
    if($writeImage){
        return $filePath;
    }else{
        return false;
    }

}

function cropBannerCircle($imgPath){
    $base = new Imagick('img/employee-pic-bg.png');
    $mask = new Imagick($imgPath);

    $base->compositeImage($mask, Imagick::COMPOSITE_DEFAULT, 243, 101);
    $filePath = "demo_files/banner/banner_".time().".png";
    $writeImage = $base->writeImage($filePath);
    if($writeImage){
        return $filePath;
    }else{
        return false;
    }

}
//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $postData){
    list($imagewidth, $imageheight, $imageType) = getimagesize($image);
    $imageType = image_type_to_mime_type($imageType);


    $dst_r = imagecreatetruecolor($width,$height);
    switch($imageType) {
        case "image/gif":
            $img_r=imagecreatefromgif($image);
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            $img_r=imagecreatefromjpeg($image);
            break;
        case "image/png":
        case "image/x-png":
            $img_r=imagecreatefrompng($image);
            break;
    }
    imagecopyresampled($dst_r,$img_r,0,0,$postData['x'],$postData['y'],$width,$height,$postData['w'],$postData['h']);
    //imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
    switch($imageType) {
        case "image/gif":
            imagegif($dst_r,$thumb_image_name);
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            imagejpeg($dst_r,$thumb_image_name,100);
            break;
        case "image/png":
        case "image/x-png":
            imagepng($dst_r,$thumb_image_name);
            break;
    }
    chmod($thumb_image_name, 0777);
    return $thumb_image_name;
}

// If not a POST request, display page below:
include_once("header.php");

?>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="jc-demo-box">
                    <div class="page-header">
                        <h1><img src="http://emailers.weboapps.com/webonise-emailer/img/webonise-emailer.png" alt="Webonise Emailer"></h1>
                    </div>
                    <?php if(isset($img_error) && $img_error != ""){
                        echo $img_error;
                    }

                    if(isset($imgPath) && $imgPath !="" ){
                    ?>
                                <!-- This is the image we're attaching Jcrop to -->
                                <img src="<?php echo $imgPath; ?>" id="cropbox" style="height: 500px; width: 500px; overflow: scroll;" />

                                <!-- This is the form that our event handler fills -->
                                <form action="index.php" method="post" onsubmit="return checkCoords();">
                                    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">

                                    <input type="hidden" name="imagePath" value="<?php echo $imgPath; ?>">
                                    <input type="hidden" id="x" name="x" />
                                    <input type="hidden" id="y" name="y" />
                                    <input type="hidden" id="w" name="w" />
                                    <input type="hidden" id="h" name="h" />
                                    <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
                                </form>
                        <?php
                            }else{
                        ?>

                                <form enctype="multipart/form-data" method="post" action="crop_upload.php">
                                    <p><label>First name :</label><input type="text" name="first_name" id="first_name" /></p>
                                    <p><label>Last name :</label><input type="text" name="last_name" id="last_name" /></p>
                                    <p><label>Email address :</label><input type="text" name="email_address" id="email_address" /></p>
                                    <p><label>Skype id :</label><input type="text" name="skype_id" id="skype_id" /></p>
                                    <p><label>Profile picture :</label><input type="file" name="user_img" /></p>
                                    <div class="clear"></div>
                                    <p><label>Email content : </label><textarea id="ckeditor" name="email_body" ></textarea></p>
                                    <div class="clear"></div>
                                    <input type="submit" name="submit" value="Add">
                                </form>
                                <script>
                                    $( document ).ready( function() {
                                        $( 'textarea#ckeditor' ).ckeditor();
                                    } );
                                </script>

                        <?php
                            }
                        ?>

                </div>
            </div>
        </div>
    </div>
<?php
include_once("footer.php");
?>
