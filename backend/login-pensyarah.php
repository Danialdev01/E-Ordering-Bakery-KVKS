<?php
    session_start();
    require_once('../config/config.php');
    require_once('../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){
        
        //@ LOGIN PENSYARAH
        if(isset($_POST['login'])){

            if(isset($_POST['pensyarah-login-key'])){
                $envContent = parse_ini_string(file_get_contents('../config/.key'));
                $pensyarah_login_key = $envContent['PENSYARAH_LOGIN_KEY'];

                if($_POST['pensyarah-login-key'] == $pensyarah_login_key){

                    // kalau user tak pilih select menu
                    if($_POST['id_pensyarah'] != 0){
        
                        // set user variables 
                        $id_pensyarah = $_POST['id_pensyarah'];
                        $login_status = "LoggedInPensyarah";
        
                        // set session
                        $_SESSION['id_pensyarah_session'] = $id_pensyarah;
                        $_SESSION['login_status_session'] = $login_status;
        
                        // set cookie value dan encrypt
                        $eOrderingCookieValue = "id_pensyarah=$id_pensyarah&login_status=$login_status";
                        $eOrderingCookieValue = openssl_encrypt($eOrderingCookieValue, 'AES-256-CBC', $secret_key, 0, 'iv_for_encryption');
        
                        // set cookie
                        setcookie("eOrderingCookie", $eOrderingCookieValue, time() + (86400 * 30), "/");
        
                        // redirect
                        $_SESSION['prompt'] = "Berjaya Log Masuk";
                        header("location:../pensyarah");
        
                    }
                    else{
                        $_SESSION['prompt'] = "Sila Pilih Nama Pensyarah";
                        header("location:../");
                    }
                }
                else{
                    $_SESSION['prompt'] = "Sila Isi Login Key Pensyarah yang betul";
                    header("location:../");
                }

            }
            else{
                $_SESSION['prompt'] = "Sila Isi Login Key Pensyarah";
                header("location:../");
            }

        }
        else{
            $_SESSION['prompt'] = "Salah Request";
            header("location:../");
        }
    }
    else{
        $_SESSION['prompt'] = "Invalid Token";
        header("location:../");
    }



?>