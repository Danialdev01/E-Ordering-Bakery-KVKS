<?php
    session_start();
    require_once('../db/config.php');

    if(isset($_POST['login'])){

        // kalau user tak pilih select menu
        if($_POST['id_pensyarah'] != 0){

            // set user variables 
            $_SESSION['id_pensyarah_session'] = $_POST['id_pensyarah'];
            $_SESSION['login_status_session'] = 2;
            setcookie("id_pensyarah_cookie", $_POST['id_pensyarah'], time() + (86400 * 30), "/");
            setcookie("login_status_cookie", "2", time() + (86400 * 30), "/");

            $_SESSION['prompt'] = "Berjaya Log Masuk";
            header("location:../pensyarah");

        }
        else{
            $_SESSION['prompt'] = "Sila Pilih Nama Pensyarah";
            header("location:../");
        }
    }
    else{
        $_SESSION['prompt'] = "Sila Login Dahulu";
        header("location:../");
    }

?>