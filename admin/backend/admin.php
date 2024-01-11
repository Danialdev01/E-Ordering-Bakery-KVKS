<?php 
    session_start();
    require_once('../../config/config.php');
    require_once('../../config/csrf-token.php');

    if(isset($_POST['token']) && verifyCSRFToken($_POST['token'])){
    
        //@ Tambah Admin
        if(isset($_POST['tambah'])){
            
            if(isset($_POST['nama_admin']) && isset($_POST['password_admin']) && isset($_POST['password_admin_ulangan'])){
    
                // fetch data
                $nama_admin = filter_input(INPUT_POST, 'nama_admin', FILTER_SANITIZE_SPECIAL_CHARS);
    
                // fetch nama pengguna in db
                $check_nama_admin_sql = $pdo->prepare("SELECT * FROM admin WHERE nama_admin = ?");
                $check_nama_admin_sql->execute([$nama_admin]);
                $check_nama_admin = $check_nama_admin_sql->fetch(PDO::FETCH_ASSOC);
                
                // check if pengguna ada dalam database
                if($nama_admin != $check_nama_admin['nama_admin']){
                   
                    // fetch data password
                    $password_admin = filter_input(INPUT_POST, 'password_admin', FILTER_SANITIZE_SPECIAL_CHARS);
                    $password_admin_ulangan = filter_input(INPUT_POST, 'password_admin_ulangan', FILTER_SANITIZE_SPECIAL_CHARS);
    
                    // check if password sama 
                    if($password_admin == $password_admin_ulangan){
    
                        // encrypt password
                        $password_admin = password_hash($password_admin, PASSWORD_DEFAULT);
    
                        // tambah admin
                        $tambah_admin_sql = $pdo->prepare("INSERT INTO admin(id_admin, nama_admin, password_admin, status_admin) VALUES (NULL, ? , ? , 1)");
                        $tambah_admin_sql->execute([
                            $nama_admin,
                            $password_admin
                        ]);
    
                        // redirecct
                        $_SESSION['prompt'] = "Berjaya Tambah Pengguna";
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
    
                    }
                    else{
                        $_SESSION['prompt'] = "Password Tidak Serupa";
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
                else{
                    $_SESSION['prompt'] = "Nama Pengguna Sudah Ada Dalam Database";
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
            }
            else{
                $_SESSION['prompt'] = "Data Tidak Mencukupi";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }

        //@ Kemaskini Admin
        // TODO BUAT 
    
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