<?php
session_start();
if(isset($_SESSION['userData']) && !empty($_SESSION['userData'])){
    unset($_SESSION['userData']);
}
header("Location:index.php");
?>
