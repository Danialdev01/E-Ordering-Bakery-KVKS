<?php
require_once('../../config/config.php');

use Dompdf\Dompdf;
use Dompdf\Options;


    if($_GET['id_pembelian'] != ""){

        require __DIR__ . "../../../vendor/autoload.php";
    
        $options = new Options();
        $options->setChroot(__DIR__);
    
        $dompdf = new Dompdf($options);
        $dompdf->setPaper("A4", "Portrate");
    
        $html = file_get_contents("./borang-pembelian-template.html");

        //^ bahan 
        $id_pembelian = $_GET['id_pembelian'];
        $pembelian_sql = $pdo->prepare("SELECT * FROM pembelian WHERE id_pembelian = ?");
        $pembelian_sql->execute([$id_pembelian]);
        $pembelian = $pembelian_sql->fetch(PDO::FETCH_ASSOC);

        $id_permohonan_pembelian = $pembelian['id_permohonan_pembelian'];
        $id_permohonan_pembelian = rtrim($id_permohonan_pembelian, ', ');
        $id_permohonan_pembelian = explode(',', $id_permohonan_pembelian);

        $harga_pembelian_permohonan = 0;

        $tarikh_guna_string = "";

        foreach ($id_permohonan_pembelian as $id_permohonan) {
            $barang_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_permohonan = ?");
            $barang_sql->execute([$id_permohonan]);
            $barang = $barang_sql->fetch(PDO::FETCH_ASSOC);
            $barangan = $barang['bahan_permohonan'];
            
            $tarikh_guna = $barang['tarikh_penggunaan_permohonan'];
            $tarikh_guna_string .= $tarikh_guna . " , ";

            // filter data set
            $barangan = rtrim($barangan, ', ');
            $bahanArray = explode(', ', $barangan);
            $i = 0;

            // display all bahan
            foreach ($bahanArray as $bahanSet) {
                $i++;

                // filter bahan nama and desc
                $bahanItems = explode('/::/', $bahanSet);
                $bahanId = $bahanItems[0];

                // find bahan
                $bahan_sql = $pdo->prepare("SELECT * FROM bahan WHERE id_bahan = $bahanId");
                $bahan_sql->execute();
                $bahan = $bahan_sql->fetch(PDO::FETCH_ASSOC);

                $harga_bahan = (($bahan['harga_terendah_bahan'] + $bahan['harga_tertinggi_bahan']) / 2) + 0.5;

                // filter kuantiti and desc catatan
                $bahanDescs = $bahanItems[1];
                $bahanDesc = explode('/||/', $bahanDescs);
                $bahanKuantiti = $bahanDesc[0];
                $bahanCatatan = $bahanDesc[1];

                $sum_adjust = 0;
                // check if bahan already exists in the array
                if (!isset($bahan_list[$bahanId])) {
                    $bahan_list[$bahanId] = [
                        'nama_bahan' => $bahan['nama_bahan'],
                        'harga_bahan' => $harga_bahan,
                        'kuantiti' => $bahanKuantiti,
                        'catatan' => $bahanCatatan,
                        'harga_pembelian_bahan_permohonan' => $harga_pembelian_bahan_permohonan = $harga_bahan * $bahanKuantiti,
                    ];
                } 
                else {
                    // if bahan exists, update the quantity and recalculate the total cost
                    $bahan_list[$bahanId]['kuantiti'] += $bahanKuantiti;

                    $bahan_list[$bahanId]['harga_pembelian_bahan_permohonan'] = ($bahan_list[$bahanId]['harga_bahan'] * $bahan_list[$bahanId]['kuantiti']);
                    $sum_adjust =+ (($bahan_list[$bahanId]['kuantiti'] - $bahanKuantiti) * $harga_bahan);

                }

                $harga_pembelian_permohonan += $bahan_list[$bahanId]['harga_pembelian_bahan_permohonan'] - $sum_adjust;
            }
        }

        // display the bahan list in an HTML table
        $bahan_string = "";
        $i = 0;
        foreach ($bahan_list as $bahanId => $bahan) {
            $i++;
            $bahan_string .= "<tr><td><b>$i</b></td><td style='text-align:left'>" . $bahan['nama_bahan'] . "</td><td><b>" . $bahan['kuantiti'] . "</b></td><td>" . $bahan['catatan'] . "</td><td style='text-align:left'><b>RM " . $bahan['harga_pembelian_bahan_permohonan'] . "</b></td></tr>";
        }
        if($i < 30){
            while($i < 30){
                $i++;
                $bahan_string .= "<tr><td><b>$i</b></td><td style='color:white'>|</td><td></td><td></td><td></td></tr>";
            }
        }
        //^ ---- bahan
        $html = str_replace("{{  bahan  }}", $bahan_string, $html);

        $harga_akhir_string = "<tr><td colspan='4' style='text-align:right;border-right:none'><b>Harga Anggaran</b></td><td style='border-left:none;text-align:left'><b>RM " . $harga_pembelian_permohonan . "</b></td></tr>";
        $html = str_replace("{{  harga_akhir  }}", $harga_akhir_string, $html);

        $tarikh_guna_string = rtrim($tarikh_guna_string, ', ');
        $html = str_replace("{{  tarikh_guna  }}", $tarikh_guna_string, $html);


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