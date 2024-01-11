<?php 
    session_start();
    require_once('../config/config.php');
    require_once('../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){

        if(isset($_POST['login'])){
    
            //@ LOGIN ADMIN
            if(isset($_POST['nama_admin']) && isset($_POST['password_admin'])){
    
                // get data
                $nama_admin = filter_input(INPUT_POST, 'nama_admin', FILTER_SANITIZE_SPECIAL_CHARS);
                $password_admin = filter_input(INPUT_POST, 'password_admin', FILTER_SANITIZE_SPECIAL_CHARS);
    
                // cari admin
                $admin_sql = $pdo->prepare("SELECT * FROM admin WHERE nama_admin = ?");
                $admin_sql->execute([$nama_admin]);
                $admin = $admin_sql->fetch(PDO::FETCH_ASSOC);
                $nama_adminDB = $admin['nama_admin'];
    
                // check kalau ada ke tak
                if($nama_admin == $nama_adminDB){
    
                    $check_password = password_verify($password_admin, $admin['password_admin']);
    
                    if($check_password == 1){
    
                        $id_admin = $admin['id_admin'];
                        $login_status = "LoggedInAdmin";
    
                        $_SESSION['id_admin_session'] = $id_admin;
                        $_SESSION['login_status_session'] = $login_status;
    
                        // set cookie value dan encrypt
                        $eOrderingCookieValue = "id_admin=$id_admin&login_status=$login_status";
                        $eOrderingCookieValue = openssl_encrypt($eOrderingCookieValue, 'AES-256-CBC', $secret_key, 0, 'iv_for_encryption');
    
                        // set cookie
                        setcookie("eOrderingCookie", $eOrderingCookieValue, time() + (86400 * 30), "/");
    
                        // redirect
                        $_SESSION['prompt'] = "Berjaya Log Masuk";
                        header("location:../admin");
    
                    }
                    else{
                        $_SESSION['prompt'] = "Password Salah";
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
    
                }
                else{
                    $_SESSION['prompt'] = "Pengguna Tidak Dijumpai";
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
    
            }
            else{
                $_SESSION['prompt'] = "Data Tidak Mencukupi";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
        else{
            $_SESSION['prompt'] = "Salah Request";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    else{
        $_SESSION['prompt'] = "Invalid Token";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>