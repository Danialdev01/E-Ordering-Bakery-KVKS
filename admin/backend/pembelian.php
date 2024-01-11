<?php
    session_start();
    require_once('../../config/config.php');
    require_once('../../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){

        //@ Tambah Pembelian
        if(isset($_POST['tambah'])){

            if(isset($_POST['id_permohonan'])){

                if(isset($_POST['harga_anggaran_pembelian'])){

                    // fetch data
                    $permohonan_pembelian = $_POST['id_permohonan'];
    
                    // tambah pembelian baru
                    $tambah_pembelian_sql = $pdo->prepare("INSERT INTO pembelian(id_pembelian, tarikh_cipta_pembelian, id_permohonan_pembelian, tarikh_pelaksanaan_pembelian, harga_anggaran_pembelian, harga_pembelian, status_pembelian) VALUES (NULL , ? , ? , NULL , ? , NULL , 1)");
                    $tambah_pembelian_sql->execute([
                        date("Y/m/d"),
                        $_POST['id_permohonan'],
                        $_POST['harga_anggaran_pembelian']
                    ]);

                    // filter data id_permohonan
                    $permohonan_pembelian = rtrim($permohonan_pembelian, ', ');
                    $permohonan_pembelianArray = explode(',', $permohonan_pembelian);

                    foreach($permohonan_pembelianArray as $permohonan){
                        
                        // update status permohonan = 3 (sedang diproses)
                        $update_status_permohonan_sql = $pdo->prepare("UPDATE permohonan SET status_permohonan = '3' WHERE id_permohonan = ?");
                        $update_status_permohonan_sql->execute([$permohonan]);

                    }

                    // redirect
                    $_SESSION['prompt'] = "Berjaya Tambah Pembelian";
                    header("location:../permohonan");

                }
                else{
                    $_SESSION['prompt'] = "Data Tidak Mencukupi";
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
                
            }
            else{
                $_SESSION['prompt'] = "Sila Pilih Permohonan";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }

        //@ Delete
        else if(isset($_POST['batal'])){

            if(isset($_POST['id_pembelian'])){

                // fetch data
                $id_pembelian = $_POST['id_pembelian'];

                // cari info pembelian
                $pembelian_sql = $pdo->prepare("SELECT * FROM pembelian WHERE id_pembelian = ?");
                $pembelian_sql->execute([$id_pembelian]);
                $pembelian = $pembelian_sql->fetch(PDO::FETCH_ASSOC);

                // filter id_permohonan_pembelian
                $permohonan_pembelian = rtrim($pembelian['id_permohonan_pembelian'], ', ');
                $permohonan_pembelianArray = explode(',', $permohonan_pembelian);
                
                // update status semua permohonan pembelian
                foreach($permohonan_pembelianArray as $permohonan){
                    
                    // update status permohonan = 0 (batal)
                    $batal_pembelian_permohonan_sql = $pdo->prepare("UPDATE permohonan SET status_permohonan = '0' WHERE id_permohonan = ?");
                    $batal_pembelian_permohonan_sql->execute([$permohonan]);

                }

                // UPDATE status pembelian = 0 (batal)
                $batal_pembelian_sql = $pdo->prepare("UPDATE pembelian SET status_pembelian = 0 WHERE id_pembelian = ?");
                $batal_pembelian_sql->execute([$id_pembelian]);

                // redirect
                $_SESSION['prompt'] = "Berjaya Batalkan Pembelian";
                header("location:../pembelian");
            }
        }

        else if(isset($_POST['sahkan'])){

            if(isset($_POST['id_pembelian'])){

                $id_pembelian = $_POST['id_pembelian'];

                // UPDATE status pembelian = 2 (sah)
                $sahkan_pembelian_sql = $pdo->prepare("UPDATE pembelian SET status_pembelian = 2 WHERE id_pembelian = ?");
                $sahkan_pembelian_sql->execute([$id_pembelian]);

                $_SESSION['prompt'] = "Berjaya Sahkan Pembelian";
                header("location:../pembelian");

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