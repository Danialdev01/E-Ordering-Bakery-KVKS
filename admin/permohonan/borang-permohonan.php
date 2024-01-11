<?php
require_once('../../config/config.php');

use Dompdf\Dompdf;
use Dompdf\Options;


    if($_GET['id_permohonan'] != ""){

        require __DIR__ . "../../../vendor/autoload.php";
    
        $options = new Options();
        $options->setChroot(__DIR__);
    
        $dompdf = new Dompdf($options);
        $dompdf->setPaper("A4", "Portrate");
    
        $html = file_get_contents("./borang-permohonan-template.html");


        $id_permohonan = $_GET['id_permohonan'];
        $permohonan_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_permohonan = ?");
        $permohonan_sql->execute([$id_permohonan]);
        $permohonan = $permohonan_sql->fetch(PDO::FETCH_ASSOC);

        $pensyarah_sql = $pdo->prepare("SELECT * FROM pensyarah WHERE id_pensyarah = ?");
        $pensyarah_sql->execute([$permohonan['id_pensyarah']]);
        $pensyarah = $pensyarah_sql->fetch(PDO::FETCH_ASSOC);

        $tarikh_permintaan_permohonan =  strtotime($permohonan['tarikh_permintaan_permohonan']);
        $tarikh_permintaan_permohonan = date("d/m/Y", $tarikh_permintaan_permohonan);
        
        $html = str_replace("{{  jenis_permohonan  }}", strtoupper($permohonan['jenis_permohonan']), $html);
        $html = str_replace("{{  nama_pensyarah  }}", strtoupper($pensyarah['nama_pensyarah']), $html);
        $html = str_replace("{{  tarikh_minta  }}", strtoupper($tarikh_permintaan_permohonan), $html);
        $html = str_replace("{{  tarikh_guna  }}", strtoupper($permohonan['tarikh_penggunaan_permohonan']), $html);
        $html = str_replace("{{  masa  }}", strtoupper($permohonan['masa_penggunaan_permohonan']), $html);
        $html = str_replace("{{  kelas  }}", strtoupper($permohonan['nama_kelas_permohonan']), $html);
        $html = str_replace("{{  tajuk  }}", strtoupper($permohonan['nama_tajuk_permohonan']), $html);


        //^ bahan
        // filter data set
        $barang_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_permohonan = ?");
        $barang_sql->execute([$id_permohonan]);
        $barang = $barang_sql->fetch(PDO::FETCH_ASSOC);
        $barangan = $barang['bahan_permohonan'];
        $barangan = rtrim($barangan, ', ');
        $bahanArray = explode(', ', $barangan);
        
        // display all bahan
        $bahan_string = "";
        $i = 0;
        foreach ($bahanArray as $bahanSet) {
            $i++;

            // filter bahan nama and desc
            $bahanItems = explode('/::/', $bahanSet);
            $bahanId = $bahanItems[0];

            // find bahan
            $bahan_sql = $pdo->prepare("SELECT * FROM bahan WHERE id_bahan = $bahanId");
            $bahan_sql->execute();
            $bahan = $bahan_sql->fetch(PDO::FETCH_ASSOC);

            // filter kuantiti and desc catatan
            $bahanNama = $bahan['nama_bahan'];
            $bahanDescs = $bahanItems[1];
            $bahanDesc = explode('/||/', $bahanDescs);
            $bahanKuantiti = $bahanDesc[0];
            $bahanCatatan = $bahanDesc[1];


            // $bahan_string =+ "ha";
            $bahan_string .= "<tr><td>$i</td><td style='text-align:left'>$bahanNama</td><td>$bahanKuantiti</td><td>$bahanCatatan</td>";
        }

        $overflow_td = ""; 
        if($i < 20){
            while($i < 20){
                $i++;
                $overflow_td .= "<tr><td>$i</td><td style='text-align:left;color:white'>|</td><td></td><td></td>";
            }

        }
        $html = str_replace("{{  bahan  }}", $bahan_string, $html);
        $html = str_replace("{{  overflowtd  }}", $overflow_td, $html);
        // ^ ------ bahan
                                                                
        // $html = str_replace("{{  nama_admin  }}", ucfirst(strtolower($nama_admin)), $html);

        $dompdf->loadHtml($html);
        $dompdf->render();
    
        // $dompdf->addInfo("Borang Penyelengaraan", "Penyelengaraan Elektronik");
        $dompdf->stream("borang-permohonan.pdf", ["Attachment" => 0]);
    }
    else{
        header("location:./");
    }


?>