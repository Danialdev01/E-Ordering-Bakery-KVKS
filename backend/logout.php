<?php
    require_once('../config/config.php');
    session_start();
    session_destroy();
    setcookie('eOrderingCookie', 2, time() - 3600 , "/");
    header("location:../");
    exit();
?>