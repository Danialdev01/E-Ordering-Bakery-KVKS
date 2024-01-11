<?php
    session_start();
    require_once('../../config/config.php');
    require_once('../../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){

        //@ Batal Pensyarah 
        if(isset($_POST['batal'])){

            if(isset($_POST['id_pensyarah'])){

                $id_pensyarah = $_POST['id_pensyarah'];

                $batal_pensyarah_sql = $pdo->prepare("UPDATE pensyarah SET status_pensyarah = 0 WHERE id_pensyara = ?");
                $batal_pensyarah_sql->execute([$id_pensyarah]);

                $_SESSION['prompt'] = "Berjaya Batalkan Pensyarah";
                header("location:../pengguna");
            }
            else{
                $_SESSION['prompt'] = "Sila Isi Id Pensyarah";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        } 

        else if(isset($_POST['kemaskini'])){

            if(
                isset($_POST['id_pensyarah']) &&
                isset($_POST['nama_pensyarah'])
            ){

                $id_pensyarah = $_POST['id_pensyarah'];
                $nama_pensyarah = $_POST['nama_pensyarah'];
                $kemaskini_pensyarah_sql = $pdo->prepare("UPDATE pensyarah SET nama_pensyarah = ? WHERE id_pensyarah = ?");
                $kemaskini_pensyarah_sql->execute([$nama_pensyarah, $id_pensyarah]);

                // redirect
                $_SESSION['prompt'] = "Berjaya Kemaskini Pensyarah";
                header("location:../pengguna");
            }
            else{
                $_SESSION['prompt'] = "Sila Isi data Pensyarah";
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