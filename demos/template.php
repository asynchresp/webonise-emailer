<?php
session_start();
include_once("database.php");
/**
 * Created by JetBrains PhpStorm.
 * User: madhavighadge
 * Date: 6/16/15
 * Time: 6:09 PM
 * To change this template use File | Settings | File Templates.
 */
if(isset($_GET['user_id']) && $_GET['user_id'] !="" && $_GET['user_id'] != null){
    $dbObject = new databaseBaseClass();
    $userData = $dbObject->selectRecordById($_GET['user_id']);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Webonise</title>
    <style>
        table{
            width:600px;
            margin:0 auto;

        }
    </style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="600" bgcolor="#84c225" style="font-family:  Arial;border: 1px solid #ccc;">
    <tr style="background:#ffffff; text-align:center">
        <td style="position:relative; text-align:center;">
            <img src="http://image-jcrop.webonise.com:8080/demos/<?php echo $userData['profile_img']; ?>" alt="" />
            <h4 style="font-size:18px; margin-top:14px"><?php echo $userData['first_name'].' '.$userData['last_name']; ?></h4>
        </td>
    </tr>
    <tr style=" background:#ffffff">
        <td style="padding:0 50px 0 50px; background-repeat:no-repeat; color:#666666">
            <p style="margin-top:30px; font-size:14px;line-height: 20px;">
                Hi All,
            </p>
            <?php echo $userData['email_body']; ?>

            <p style="margin-top:30px; font-size:14px;line-height: 20px;">He can be reached at:</p>
            <p style="margin-top:10px; font-size:14px;line-height: 20px;">Email : <a style="color:#84c225; display:inline-block; margin-right:20px; text-decoration:none;" href="mailto:<?php echo $userData['email']; ?>"> <?php echo $userData['email']; ?></a>  Skype : <span style="color:#84c225;"><?php echo $userData['skype_id']; ?></span></p>

        </td>
    </tr>
    <tr style=" background:#ffffff; text-align:center;">
        <td>
            <img src="http://emailers.weboapps.com/WelcomeEmailer/img/footer-bg.jpg" alt="" style=" padding-top:50px;  margin-bottom:20px"/>
        </td>
    </tr>
    <tr>
        <td style="padding:10px 10px 10px 10px; text-align:center;"><img src="http://emailers.weboapps.com/WelcomeEmailer/img/webonise-logo.png" alt="Webonise Lab"/></td>
    </tr>
</table>

</body>
</html>
<?php

}else{
    header('Location:crop.php');
}