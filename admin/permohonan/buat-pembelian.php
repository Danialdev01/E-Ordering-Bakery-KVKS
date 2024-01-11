<?php $title = "Lihat Permohonan"; $location_index = "../.."; include('../../components/head.php')?>

<body>
    <?php ini_set('session.cache_limiter','public');session_cache_limiter(false);?>
    <?php $location_index = "../.."; include('../../components/header-admin.php')?>
    <div class="main-container p-5 pt-10">
        <center>
            <div class="permohonan max-w-4xl px-10">
                <?php 
                    if(isset($_POST['permohonan'])){
                        $id_permohonan_pembelian = $_POST['permohonan'];
                    }
                    else{
                        ?>
                        <script>
                            window.location.href = "./";
                        </script>
                        <?php
                        $_SESSION['prompt'] = "Sila Pilih Permohonan";
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
                                //FIXME harga bahan tak update kalau lepas update harga bahan
                                $i = 0;
                                foreach ($bahan_list as $bahanId => $bahan) {
                                    $i++;
                                    echo "<tr class='border-b dark:border-neutral-500'>
                                                <td class='whitespace-nowrap px-6 py-4 font-medium'>{$i}</td>
                                                <td class='whitespace-nowrap px-6 py-4 font-medium'>
                                                    {$bahan['nama_bahan']}<a
                                                        href='../bahan/kemaskini-bahan.php?id_bahan={$bahanId}'
                                                        class='transititext-primary text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600'
                                                        data-te-toggle='tooltip'
                                                        title='Tukar Nilai Harga'
                                                        > (RM {$bahan['harga_bahan']})
                                                    </a>
                                                    <p class='text-sm text-gray-500'>{$bahan['kuantiti']} {$bahan['catatan']}</p>
                                                </td>
                                                <td class='whitespace-nowrap px-6 py-4 font-medium'> 
                                                    RM {$bahan['harga_pembelian_bahan_permohonan']} 
                                                </td>
                                            </tr>";
                                }

                                ?>


                                    <tr class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4 font-bold">Harga Anggaran</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-bold">RM <?php echo $harga_pembelian_permohonan?></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <form action="../backend/pembelian.php" method="post">

                                <input type="hidden" name="token" value="<?php echo $token?>">
                                
                                <input type="hidden" name="harga_anggaran_pembelian" value="<?php echo $harga_pembelian_permohonan?>">
                                <input type="hidden" name="id_permohonan" value="<?php foreach($id_permohonan_pembelian as $id_permohonan){echo $id_permohonan . ",";}?>">

                                <div class="button-container w-full pt-3">
                                    <button
                                        type="submit"
                                        name="tambah"
                                        class="mt-2 w-full inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                                        Gabung Permohonan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </center>
    </div>
    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>