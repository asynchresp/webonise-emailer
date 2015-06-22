<?php
session_start();
include_once("database.php");
$upload_dir = "demo_files"; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
$max_file = "3";
$large_image_name = "original_".time();     // New name of the large image (append the timestamp to the filename)
$large_image_location = $upload_path.$large_image_name;
$allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
$allowed_image_ext = array_unique($allowed_image_types); // do not change this
$image_ext = "";	// initialise variable, do not change this.
$dbObject = new databaseBaseClass();
foreach ($allowed_image_ext as $mime_type => $ext) {
    $image_ext.= strtoupper($ext)." ";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Only process if the file is a JPG, PNG or GIF and below the allowed limit
    if((!empty($_FILES["user_img"])) && ($_FILES['user_img']['error'] == 0)) {

        $userfile_name = $_FILES['user_img']['name'];
        $userfile_tmp = $_FILES['user_img']['tmp_name'];
        $userfile_size = $_FILES['user_img']['size'];
        $userfile_type = $_FILES['user_img']['type'];
        $filename = basename($_FILES['user_img']['name']);
        $file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
        foreach ($allowed_image_types as $mime_type => $ext) {
            if($file_ext==$ext && $userfile_type==$mime_type){
                $error = "";
                break;
            }else{
                $error = "Only <strong>".$image_ext."</strong> images accepted for upload<br />";
            }
        }

    }else{
        $error= "Select an image for upload";
    }

    if (strlen($error)==0){

        if (isset($_FILES['user_img']['name'])){
            //this file could now has an unknown file extension (we hope it's one of the ones set above!)
            $large_image_location = $large_image_location.".".$file_ext;
            //put the file ext in the session so we know what file to look for once its uploaded
            $_SESSION['user_file_ext']=".".$file_ext;

            if(move_uploaded_file($userfile_tmp, $large_image_location)){
                chmod($large_image_location, 0777);
                $_SESSION['imgPath'] = $large_image_location;
                $_POST['profile_img'] = $large_image_name.".".$file_ext;
                $user_id = $dbObject->insertRecord($_POST);
                $_SESSION['userId'] = $user_id;
            }else{
                $_SESSION['img_error'] = "Unable to move uploaded file to destination";
            }

        }

    }else{
        $_SESSION['img_error'] = $error;
    }

}
header('Location:emailer.php');
?>