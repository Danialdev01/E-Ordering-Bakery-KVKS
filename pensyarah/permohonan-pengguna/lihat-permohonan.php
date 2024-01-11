<?php $title = "Lihat Permohonan"; $location_index = "../.."; include('../../components/head.php')?>

<body>
    <?php $location_index = "../.."; include('../../components/header.php')?>
    <div class="main-container p-5 pt-10">
        <center>
            <div class="permohonan max-w-4xl md:px-10">
                <?php 
                    $id_permohonan = $_GET['id_permohonan'];

                    $permohonan_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_permohonan = ?");
                    $permohonan_sql->execute([$id_permohonan]);
                    $permohonan = $permohonan_sql->fetch(PDO::FETCH_ASSOC);
                    
                ?>
                <div class="permohonan-container block md:flex">
                    <div class="w-full p-2">
                        <div
                            class="block rounded-lg bg-white text-center shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div
                                class="font-bold text-left border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50">
                                Info Permohonan
                            </div>
                            <div class="p-4">
                                <p class="text-left mb-2 text-base text-neutral-600 dark:text-neutral-200">
                                    Tajuk Permohonan : <?php echo htmlspecialchars($permohonan['nama_tajuk_permohonan'])?>
                                </p>
                                <hr>
                                <p class="text-left mt-2 mb-2 text-base text-neutral-600 dark:text-neutral-200">
                                    Nama Pensyarah : 
                                    <?php 
                                        $id_pensyarah = $permohonan['id_pensyarah'];
    
                                        $pensyarah_sql = $pdo->prepare("SELECT * FROM pensyarah WHERE id_pensyarah = ?");
                                        $pensyarah_sql->execute([$id_pensyarah]);
                                        $pensyarah = $pensyarah_sql->fetch(PDO::FETCH_ASSOC);
    
                                        echo htmlspecialchars($pensyarah['nama_pensyarah']);
                                    ?>
                                </p>
                                <hr>
                                <p class="text-left mt-2 mb-2 text-base text-neutral-600 dark:text-neutral-200">
                                    Tarikh Permohonan : 
                                    <?php
                                        $tarikh_permintaan_permohonan = strtotime($permohonan['tarikh_permintaan_permohonan']);
                                        echo htmlspecialchars(date("d/m/Y", $tarikh_permintaan_permohonan));
                                    ?> 
                                </p>
                                <hr>
                                <p class="text-left mt-2 mb-2 text-base text-neutral-600 dark:text-neutral-200">
                                    Tarikh Penggunaan :
                                    <b>
                                    <?php 
                                        echo htmlspecialchars($permohonan['tarikh_penggunaan_permohonan']);
                                    ?>
                                    </b>
                                </p>
                                <hr>
                                <p class="text-left mt-2 mb-2 text-base text-neutral-600 dark:text-neutral-200">
                                    Masa Penggunaan : <b><?php echo htmlspecialchars($permohonan['masa_penggunaan_permohonan']) ?></b>
                                </p>
                                <hr>
                                <p class="text-left mt-2 mb-2 text-base text-neutral-600 dark:text-neutral-200">
                                    Nama Kelas : <?php echo htmlspecialchars($permohonan['nama_kelas_permohonan']) ?>
                                </p>
                                <hr>
                                <?php 
                                    if($permohonan['status_permohonan'] == 0){
                                        $jenis_permohonan = "Batal";
                                        $color = "red";
                                    }
                                    else if($permohonan['status_permohonan'] == 1){
                                        $jenis_permohonan = "Baru";
                                        $color = "gray";
                                    }
                                    else if($permohonan['status_permohonan'] == 2){
                                        $jenis_permohonan = "Sedang Diproses";
                                        $color = "yellow";
                                    }
                                    // else if($permohonan['status_permohonan'] == 3){
                                    //     $jenis_permohonan = "Sedang Dibeli";
                                    //     $color = "yellow";
                                    // }
                                    else if($permohonan['status_permohonan'] == 3){
                                        $jenis_permohonan = "Berjaya Dibeli";
                                        $color = "green";
                                    }else{
                                        $jenis_permohonan = "Tidak Tentu";
                                    } 
                                ?>
                                <p class="text-left mt-2 mb-2 text-base text-neutral-600 dark:text-neutral-200">
                                    Status Permohonan : <span class="<?php echo "bg-" . $color . "-200 " . "text-" . $color . "-500"?> p-0.5 rounded-sm"><?php echo htmlspecialchars($jenis_permohonan) ?></span>
                                </p>
                                <hr>
                            <br>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div class="block rounded-lg bg-white text-center shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div
                                class="font-bold text-left border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50">
                                Senarai Barangan
                            </div>
                            <div class="p-4">
                                <ul class="w-96 text-left">
                                    
                                </ul>
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="overflow-hidden">
                                                <table class="min-w-full text-left text-sm font-light">
                                                    <thead class="border-b font-medium dark:border-neutral-500">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-2">Bil</th>
                                                            <th scope="col" class="px-6 py-2">Nama</th>
                                                            <th scope="col" class="px-6 py-2">Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            // get data
                                                            $barang_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_permohonan = ?");
                                                            $barang_sql->execute([$id_permohonan]);
                                                            $barang = $barang_sql->fetch(PDO::FETCH_ASSOC);
                                                            $barangan = $barang['bahan_permohonan'];

                                                            // filter data set
                                                            $barangan = rtrim($barangan, ', ');
                                                            $bahanArray = explode(', ', $barangan);
                                                            $i = 0;
                                                            $harga_pembelian_permohonan = 0;
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
                                                                $bahanLink = $bahanDesc[2];
                                                                ?>
                                                                <tr class="border-b dark:border-neutral-500">
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $i?></td>
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                        <?php echo $bahan['nama_bahan'] ?><a
                                                                            class="transititext-primary text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                                                                            > 
                                                                        </a>(RM <?php echo $harga_bahan?>)
                                                                        <p class="text-sm text-gray-500"><?php echo htmlspecialchars($bahanKuantiti) . " " . htmlspecialchars($bahanCatatan)?></p>
                                                                    </td>
                                                                    <td class="flex whitespace-nowrap px-6 py-4 font-medium"> 
                                                                        <span>RM <?php echo $harga_pembelian_bahan_permohonan = $harga_bahan * $bahanKuantiti?></span>

                                                                        <?php 

                                                                            if($bahanLink != ""){
                                                                                ?>
                                                                                <span class="px-3">
                                                                                    <a target="_blank" href="<?php echo $bahanLink?>">
                                                                                        <svg style="width:16px; height:16px; fill:#241f31;"  viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"></path>
                                                                                        </svg>
                                                                                    </a>
                                                                                </span>
                                                                                <?php
                                                                            }

                                                                        ?>
                                                                        
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $harga_pembelian_permohonan += $harga_pembelian_bahan_permohonan;
                                                            }

                                                        ?>
                                                        <tr class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                                                            <td class="whitespace-nowrap px-6 py-4"></td>
                                                            <td class="whitespace-nowrap px-6 py-4 font-bold">Harga Anggaran</td>
                                                            <td class="whitespace-nowrap px-6 py-4 font-bold">RM <?php echo $harga_pembelian_permohonan?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <br>
                                                <div class="flex">
                                                    <div class="p-1 w-full">
                                                        <a href="./borang-permohonan.php?id_permohonan=<?php echo $id_permohonan ?>" style="margin-top:28px !important">
                                                            <button style="padding-bottom: 6px;" class="w-full flex justify-center text-center h-9 inline-block rounded bg-info px-3 pl-4 pt-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"><center><svg style="width:16px; height:16px; fill:#f6f5f4;"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"></path></svg></center></button>
                                                        </a>
                                                    </div>
                                                    <?php
                                                        if($permohonan['status_permohonan'] == 1){
                                                            ?>
                                                            <div class="p-1 w-full">
                                                                <form action="../../admin/backend/permohonan.php" method="post">
                                                                    <input type="hidden" name="token" value="<?php echo $token?>">
                                                                    <input type="hidden" name="id_permohonan" value="<?php echo $id_permohonan?>">
                                                                    <button type="submit" name="delete" style="padding-bottom: 6px;" class="w-full flex justify-center text-center h-9 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">Delete Permohonan</button>
                                                                </form>
                                                            </div>
                                                            <?php

                                                        }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </center>
    </div>
    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>