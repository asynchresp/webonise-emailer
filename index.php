<?php
session_start();
if(isset($_SESSION['userData']) && !empty($_SESSION['userData'])){
    header("Location:emailer.php");
}else{

include_once("database.php");
$login_err = "";
$dbObject = new databaseBaseClass();
if(isset($_POST['email_address']) && !empty($_POST['email_address'])){
    $userData = $dbObject->getUserDetails($_POST);
    if(!empty($userData)){
        $_SESSION['userData'] = $userData;
        header("Location:emailer.php");

    }else{
        $login_err = "Please enter valid email and password";
    }
}
    // If not a POST request, display page below:
    include_once("header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="jc-demo-box">
                    <div class="page-header">
                        <h1><img src="../img/webonise-emailer.png" alt="Webonise Emailer"> </h1>
                        <h2>Login</h2>
                    </div>
                    <?php if(isset($login_err) && $login_err != ""){
                        echo $login_err;
                    } ?>
                    <form enctype="multipart/form-data" method="post" action="index.php" id="frmLogin">


                        <p class="emailVal"><label>Email address :</label><input type="text" name="email_address" id="email_address" /><br/><span class="errorEmail"></span></span></p>
                        <p class="passwordVal"><label>Password :</label><input type="password" name="password" id="password" /><br/><span class="errorPass" accesskey="" ></span></p>

                        <input type="submit" name="submit" value="Login" id="loginUsr">
                    </form>
                    <script type="text/javascript">
                        $( document ).ready( function() {
                            $("#frmLogin").on('submit',function(){
                                console.log("submit clicked");
                                var submitFrm = true;
                                var emailAddress =  $("#email_address").val();
                                var password =  $("#password").val();
//                                var reg = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                                if(emailAddress == ""){
                                    submitFrm = false;
                                    $(".errorEmail").text("Please enter email address");
                                } else{
//                                    if(reg.test(emailAddress)){
                                        $(".errorEmail").text("");
//                                    }else{
//                                        $(".errorEmail").text("Please enter valid email address");
//                                    }
                                }
                                if(password == ""){
                                    submitFrm = false;
                                    $(".errorPass").text("Please enter password");
                                }else{
                                    $(".errorPass").text("");
                                }

                                return submitFrm;

                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <?php
    // If not a POST request, display page below:
    include_once("footer.php");
}
?>
