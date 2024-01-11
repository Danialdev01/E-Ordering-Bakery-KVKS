<?php
    session_start();
    require_once('../../config/config.php');
    require_once('../../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){

        //@ Kemaskini key
        if(isset($_POST['kemaskini'])){

            // check data
            if(isset($_POST['pensyarah_login_key'])){

                // fetch data
                $new_key = $_POST['pensyarah_login_key'];

                $envContent = file_get_contents('../../config/.key');
    
                $new_key_content = "PENSYARAH_LOGIN_KEY=" . $new_key;

                // Find and replace the variable you want to edit
                $updatedEnvContent = preg_replace('/(PENSYARAH_LOGIN_KEY=).*/', $new_key_content, $envContent);
    
                // Write the updated content back to the .env file
                file_put_contents('../../config/.key', $updatedEnvContent);

                // redirect 
                $_SESSION['prompt'] = "Berjaya Kemaskini Pensyarah Login Key";
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }
            else{
                $_SESSION['prompt'] = "Data Tidak Lengkap";
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