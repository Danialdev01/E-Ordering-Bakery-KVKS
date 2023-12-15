<?php
    require_once('../db/config.php');
    session_start();
    session_destroy();
    mysqli_close($connect);
    setcookie('login_status_cookie', 2, time() - 3600 , "/");
    setcookie('id_pensyarah_cookie', 2, time() - 3600 , "/");
    setcookie('id_admin_cookie', 2, time() - 3600 , "/");
    header("location:../");

?>