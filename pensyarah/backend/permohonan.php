<?php
    session_start();
    require_once('../../config/config.php');
    require_once('../../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){
    
        //@ Tambah Permohonan
        if(isset($_POST['tambah'])){
    
            if(
                // check input
                isset($_POST['id_pensyarah']) && 
                isset($_POST['tarikh_penggunaan_permohonan']) &&
                isset($_POST['masa_penggunaan_permohonan']) && 
                isset($_POST['nama_kelas_permohonan']) && 
                isset($_POST['nama_tajuk_permohonan']) && 
                isset($_POST['bahan_details']) &&
                isset($_POST['jenis_permohonan'])
            ){
                
                // tambah permohonan
                $tambah_barang_basah = $pdo->prepare("INSERT INTO permohonan(id_permohonan, id_pensyarah, tarikh_permintaan_permohonan, tarikh_penggunaan_permohonan, masa_penggunaan_permohonan, nama_kelas_permohonan, nama_tajuk_permohonan, bahan_permohonan, tarikh_pembelian_permohonan, jenis_permohonan, status_permohonan) VALUES (NULL , ? , ? , ? , ? , ? , ? , ? , NULL , ? , 1)");
                $tambah_barang_basah->execute([
                    $_POST['id_pensyarah'],
                    date("Y/m/d"),
                    $_POST['tarikh_penggunaan_permohonan'],
                    $_POST['masa_penggunaan_permohonan'],
                    $_POST['nama_kelas_permohonan'],
                    $_POST['nama_tajuk_permohonan'],
                    $_POST['bahan_details'],
                    $_POST['jenis_permohonan']
                ]);
    
                // redirect
                $_SESSION['prompt'] = "Berjaya Tambah Permohonan";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                
            }
            else{
                $_SESSION['prompt'] = "Data Tidak Lengkap";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }

        //@ Delete Permohonan
        else if(isset($_POST['delete'])){

            if(isset($_POST['id_permohonan'])){

                // fetch data
                $id_permohonan = $_POST['id_permohonan'];

                // delete permohonan
                $delete_permohonan_sql = $pdo->prepare("DELETE FROM permohonan WHERE id_permohonan = ?");
                $delete_permohonan_sql->execute([$id_permohonan]);

                // redirect
                $_SESSION['prompt'] = "Berjaya Delete Permohonan";
                header("location:../../pensyarah/pembelian-pengguna");
            }
            else{
                $_SESSION['prompt'] = "Data Tidak Mencukupi";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    
        else{
            $_SESSION['prompt'] = "Salah Request";
            header("location:../../");
    
        }
    }
    else{
        $_SESSION['prompt'] = "Invalid Token";
        header("location:../../");
    }


?>