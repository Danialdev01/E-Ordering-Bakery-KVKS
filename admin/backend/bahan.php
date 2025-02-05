<?php
    session_start();
    require_once('../../config/config.php');
    require_once('../../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){

        //@ Kemaskini Bahan
        if(isset($_POST['kemaskini'])){

            // check data
            if(
                isset($_POST['id_bahan']) && 
                isset($_POST['no_kod_bahan']) &&
                isset($_POST['nama_bahan']) && 
                isset($_POST['kekerapan_kegunaan']) &&
                isset($_POST['harga_tertinggi_bahan']) &&
                isset($_POST['harga_terendah_bahan'])
            ){
                // kemaskini bahan
                $kemaskini_bahan_sql = $pdo->prepare("UPDATE bahan SET no_kod_bahan = ? , nama_bahan = ? , kekerapan_kegunaan = ? , harga_terendah_bahan = ? , harga_tertinggi_bahan = ? WHERE id_bahan = ?");
                $kemaskini_bahan_sql->execute([
                    $_POST['no_kod_bahan'],
                    $_POST['nama_bahan'],
                    $_POST['kekerapan_kegunaan'],
                    $_POST['harga_terendah_bahan'],
                    $_POST['harga_tertinggi_bahan'],
                    $_POST['id_bahan']
                ]);

                // redirect 
                $_SESSION['prompt'] = "Berjaya Kemaskini Bahan";
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }
            else{
                $_SESSION['prompt'] = "Data Tidak Lengkap";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }

        //@ Tambahan Bahan
        else if(isset($_POST['tambah'])){

            // check data
            if(
                isset($_POST['no_kod_bahan']) &&
                isset($_POST['nama_bahan']) && 
                isset($_POST['harga_tertinggi_bahan']) &&
                isset($_POST['harga_terendah_bahan'])
            ){
                // tambah bahan
                $tambah_bahan_sql = $pdo->prepare("INSERT INTO bahan(id_bahan, no_kod_bahan, nama_bahan, kekerapan_kegunaan, harga_terendah_bahan, harga_tertinggi_bahan, status_bahan) VALUES (NULL, ? , ? , ? , ? , ? , 1)");
                $tambah_bahan_sql->execute([
                    $_POST['no_kod_bahan'],
                    $_POST['nama_bahan'],
                    $_POST['kekerapan_kegunaan'],
                    $_POST['harga_terendah_bahan'],
                    $_POST['harga_tertinggi_bahan'],
                ]);

                // redirect 
                $_SESSION['prompt'] = "Berjaya Tambah Bahan";
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