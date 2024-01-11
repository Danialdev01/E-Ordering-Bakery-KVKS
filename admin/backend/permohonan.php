<?php
    session_start();
    require_once('../../config/config.php');
    require_once('../../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){

        //@ Sahkan Permohonan
        if(isset($_POST['sahkan'])){

            if(isset($_POST['id_permohonan'])){

                // fetch data
                $id_permohonan = $_POST['id_permohonan'];

                // update status permohonan = 2 (sah)
                $sahkan_permohonan_sql = $pdo->prepare("UPDATE permohonan SET status_permohonan = 2 WHERE id_permohonan = ?");
                $sahkan_permohonan_sql->execute([$id_permohonan]);
                
                // redirect
                $_SESSION['prompt'] = "Berjaya Sahkan Permohonan";
                header("location:../permohonan");
            }
            else{
                $_SESSION['prompt'] = "Data Tidak Mencukupi";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }

        //@ Batalkan Permohonan
        else if(isset($_POST['batalkan'])){
            
            if(isset($_POST['id_permohonan'])){

                // fetch data
                $id_permohonan = $_POST['id_permohonan'];

                // update status permohonan = 0 (batal)
                $batalkan_permohonan_sql = $pdo->prepare("UPDATE permohonan SET status_permohonan = 0 WHERE id_permohonan = ?");
                $batalkan_permohonan_sql->execute([$id_permohonan]);

                // redirect
                $_SESSION['prompt'] = "Berjaya Batalkan Permohonan";
                header("location:../permohonan");               

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