<?php $title = "Pensyarah"; $location_index = ".."; include('../components/head.php')?>

<body>
    <?php $location_index = ".."; include('../components/header.php')?>
    <div class="main-container p-5">
        <div class="head-profile-container p-3">
            <div class="header-profile">
                <?php
                    $id_pensyarah = $_SESSION['id_pensyarah_session'];

                    $pensyarah_sql = $pdo->prepare("SELECT * FROM pensyarah WHERE id_pensyarah = ?");
                    $pensyarah_sql->execute([$id_pensyarah]);
                    $pensyarah = $pensyarah_sql->fetch(PDO::FETCH_ASSOC);

                ?>
                <h3 class="text-xl" style="	font-weight: 500;">Nama : <span style="color:#3665B1"><?php echo $pensyarah['nama_pensyarah'] ?></span></h3>
            </div>
            <div class="header-info-container pt-5 sm:flex">
                <div class="header-info p-2 w-full">
                    <div
                        class="text-center block w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <?php 

                            $permohonan_belum_sah_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_pensyarah = ? AND status_permohonan = 1");
                            $permohonan_belum_sah_sql->execute([$id_pensyarah]);

                            $permohonan_belum_sah_bil = 0;
                            while($permohonan_belum_sah = $permohonan_belum_sah_sql->fetch(PDO::FETCH_ASSOC)){
                               $permohonan_belum_sah_bil++; 
                            }

                        ?>
                        <span class="px-10">
                            <h4 class="text-2xl"><?php echo $permohonan_belum_sah_bil?></h4>
                            <p>Permohonan Yang Belum Disahkan</p>
                        </span>
                    </div>
                </div>
                <div class="header-info p-2 w-full">
                    <div
                        class="text-center block w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <?php 

                            $permohonan_telah_sah_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_pensyarah = ? AND status_permohonan = 2");
                            $permohonan_telah_sah_sql->execute([$id_pensyarah]);

                            $permohonan_telah_sah_bil = 0;
                            while($permohonan_telah_sah = $permohonan_telah_sah_sql->fetch(PDO::FETCH_ASSOC)){
                                $permohonan_telah_sah_bil++;
                            }

                        ?>
                        <span class="px-10">
                            <h4 class="text-2xl"><?php echo $permohonan_telah_sah_bil?></h4>
                            <p>Permohonan Yang Telah Disahkan</p>
                        </span>
                    </div>
                </div>
                <div class="header-info p-2 w-full block md:flex">
                    <div
                        class="text-center block w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <?php 

                            $permohonan_pernah_dibuat_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_pensyarah = ?");
                            $permohonan_pernah_dibuat_sql->execute([$id_pensyarah]);

                            $permohonan_pernah_dibuat_bil = 0;
                            while($permohonan_pernah_dibuat = $permohonan_pernah_dibuat_sql->fetch(PDO::FETCH_ASSOC)){
                                $permohonan_pernah_dibuat_bil++;
                            }
                        ?>
                        <span class="px-10">
                            <h4 class="text-2xl"><?php echo $permohonan_pernah_dibuat_bil?></h4>
                            <p>Permohonan Yang Telah Dibuat</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden md:block table-permohonan-belum-sah">
            <center>
                <div style="width: fit-content;" class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <spa><b>Permohonan Belum Sah</b></span>
                    <div class="md:max-w-2xl w-full" data-te-datatable-init>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tajuk</th>
                                    <th>Tarikh Permintaan</th>
                                    <th>Tarikh Penggunaan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $permohonan_belum_sah_table_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_pensyarah = ? AND status_permohonan = 1");
                                    $permohonan_belum_sah_table_sql->execute([$id_pensyarah]);
                                    $permohonan_belum_sah_table_bil = 0;
                                    while($permohonan_belum_sah_table = $permohonan_belum_sah_table_sql->fetch(PDO::FETCH_ASSOC)){
                                        $permohonan_belum_sah_table_bil++;
                                        ?>
                                        <tr>
                                            <td><?php echo $permohonan_belum_sah_table_bil?></td>
                                            <td><?php echo $permohonan_belum_sah_table['nama_tajuk_permohonan'] ?></td>
                                            <td><?php echo $permohonan_belum_sah_table['tarikh_permintaan_permohonan'] ?></td>
                                            <td><?php echo $permohonan_belum_sah_table['tarikh_penggunaan_permohonan'] ?></td>
                                            <td><p class="bg-gray-200 px-1 rounded-sm">Belum Sah</p></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <?php $location_index = "..";include('../components/footer.php') ?>   
</body>
</html>