<?php $title = "Lihat Permohonan"; $location_index = "../.."; include('../../components/head.php')?>

<body>
    <?php ini_set('session.cache_limiter','public');session_cache_limiter(false);?>
    <?php $location_index = "../.."; include('../../components/header-admin.php')?>
    <div class="main-container p-5 pt-10">
        <center>
            <div class="permohonan max-w-4xl px-10">
                <?php 
                    if(isset($_GET['id_pembelian'])){
                        $id_pembelian = $_GET['id_pembelian'];
                    }
                    else{
                        ?>
                        <script>
                            window.location.href = "./";
                        </script>
                        <?php
                        $_SESSION['prompt'] = "Sila Pilih Pembelian";
                    }
                ?>
                <div class="permohonan-container block md:flex">
                    <div class="w-full p-2">
                        <div
                            class="block rounded-lg bg-white text-center shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div
                                class="font-bold text-left border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50">
                                Info Pembelian
                            </div>
                            <div class="p-4">
                                <div id="accordionFlushExample">
                                    <?php 
                                        $pembelian_sql = $pdo->prepare("SELECT * FROM pembelian WHERE id_pembelian = ?");
                                        $pembelian_sql->execute([$id_pembelian]);

                                        $pembelian = $pembelian_sql->fetch(PDO::FETCH_ASSOC);

                                        $id_permohonan_pembelian = $pembelian['id_permohonan_pembelian'];

                                        $id_permohonan_pembelian = rtrim($id_permohonan_pembelian, ', ');
                                        $id_permohonan_pembelian = explode(',', $id_permohonan_pembelian);


                                        $i = 0;
                                        foreach($id_permohonan_pembelian as $id_permohonan){
                                            $i++;

                                            $permohonan_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_permohonan = ?");
                                            $permohonan_sql->execute([$id_permohonan]);

                                            $permohonan = $permohonan_sql->fetch(PDO::FETCH_ASSOC);

                                            ?>
                                            <div
                                                class="rounded-none border border-b-0 border-l-0 border-r-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                                                <h2 class="mb-0" id="flush-heading<?php echo $i?>">
                                                <button
                                                    class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                                                    type="button"
                                                    data-te-collapse-init
                                                    data-te-collapse-collapsed
                                                    data-te-target="#flush-collapse<?php echo $i?>"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapse">
                                                    Tajuk Permohonan : <?php echo htmlspecialchars($permohonan['nama_tajuk_permohonan'])?>
                                                    <span
                                                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                    </span>
                                                </button>
                                                </h2>
                                                <div
                                                id="flush-collapse<?php echo $i?>"
                                                class="!visible hidden"
                                                data-te-collapse-item
                                                aria-labelledby="flush-headingThree"
                                                data-te-parent="#accordionFlushExample">
                                                <div class="px-5 py-4 text-left">
                                                    <ul class="text-left">
                                                        <?php
                                                            $id_pensyarah = $permohonan['id_pensyarah'];
                                                            $pensyarah_sql = $pdo->prepare("SELECT nama_pensyarah FROM pensyarah WHERE id_pensyarah = ?");
                                                            $pensyarah_sql->execute([$id_pensyarah]);
                                                            $pensyarah = $pensyarah_sql->fetch(PDO::FETCH_ASSOC);
                                                        ?>
                                                        <li>Pensyarah : <?php echo htmlspecialchars($pensyarah['nama_pensyarah'])?></li>
                                                        <li>Tarikh Penggunaan : <b><?php echo htmlspecialchars($permohonan['tarikh_penggunaan_permohonan'])?></b></li>
                                                        <li>Tarikh Permintaan : <?php echo htmlspecialchars($permohonan['tarikh_permintaan_permohonan'])?></li>
                                                        <li>Masa Penggunaan : <?php echo htmlspecialchars($permohonan['masa_penggunaan_permohonan'])?></li>
                                                        <li>Nama Kelas Permohonan : <?php echo htmlspecialchars($permohonan['nama_kelas_permohonan'])?></li>
                                                    </ul>
                                                </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div
                            class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <h5
                                class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                Bahan Pembelian : 
                            </h5>
                            <hr>
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
                                $harga_pembelian_permohonan = 0;

                                foreach ($id_permohonan_pembelian as $id_permohonan) {
                                    $barang_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_permohonan = ?");
                                    $barang_sql->execute([$id_permohonan]);
                                    $barang = $barang_sql->fetch(PDO::FETCH_ASSOC);
                                    $barangan = $barang['bahan_permohonan'];

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
                                        $bahanLink = $bahanDesc[2];

                                        $sum_adjust = 0;
                                        // check if bahan already exists in the array
                                        if (!isset($bahan_list[$bahanId])) {
                                            $bahan_list[$bahanId] = [
                                                'nama_bahan' => $bahan['nama_bahan'],
                                                'harga_bahan' => $harga_bahan,
                                                'kuantiti' => $bahanKuantiti,
                                                'catatan' => $bahanCatatan,
                                                'link' => $bahanLink,
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
                                $i = 0;
                                foreach ($bahan_list as $bahanId => $bahan) {
                                    $i++;
                                    ?>
                                    <tr class='border-b dark:border-neutral-500'>
                                        <td class='whitespace-nowrap px-6 py-4 font-medium'><?php echo $i?></td>
                                        <td class='whitespace-nowrap px-6 py-4 font-medium'>
                                            <?php echo $bahan['nama_bahan']?><a
                                                href='../bahan/kemaskini-bahan.php?id_bahan={$bahanId}'
                                                class='transititext-primary text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600'
                                                data-te-toggle='tooltip'
                                                title='Tukar Nilai Harga'
                                                > (RM <?php echo $bahan['harga_bahan']?>)
                                            </a>
                                            <p class='text-sm text-gray-500'><?php echo $bahan['kuantiti'] . " " . $bahan['catatan']?></p>
                                        </td>
                                        <td class='flex whitespace-nowrap px-6 py-4 font-medium'> 
                                            <span>RM <?php echo $bahan['harga_pembelian_bahan_permohonan']?></span>
                                            <?php 

                                                if($bahan['link'] != ""){
                                                    ?>
                                                    <span class="px-3">
                                                        <a target="_blank" href="<?php echo $bahan['link']?>">
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
                                }

                                ?>


                                    <tr class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4 font-bold">Harga Anggaran</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-bold">RM <?php echo $harga_pembelian_permohonan?></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="button-action w-full md:flex">

                                <div class="button w-full p-2">
                                    <form action="../backend/pembelian.php" method="post">

                                        <input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian?>">
                                        <input type="hidden" name="token" value="<?php echo $token?>">

                                        <!-- sahkan pembelian (telah beli) -->
                                        <button type="submit" name="sahkan" class="w-full mt-2 inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">Siap Dibeli</button>
                                    </form>
                                </div>
                                <div class="button w-full p-2">
                                    <form action="../backend/pembelian.php" method="post">

                                        <input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian?>">
                                        <input type="hidden" name="token" value="<?php echo $token?>">

                                        <!-- batal pembelian (tak dapat beli) -->
                                        <button type="submit" name="batal" class="w-full mt-2 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">Batal Pembelian</button>
                                    </form>
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