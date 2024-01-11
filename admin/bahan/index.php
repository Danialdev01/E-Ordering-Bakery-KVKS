<?php $title = "Bahan"; $location_index = "../.."; include('../../components/head.php')?>

<body>
    <?php $location_index = "../.."; include('../../components/header-admin.php')?>
    <div class="main-container p-5">
        <script src="../../src/assets/js/tw-elements.umd.min.js"></script>
        <center>
            <div class="-data-table p-2">
                <div class="mb-3">
                <div class="justify-end relative mb-4 flex w-full flex-wrap items-stretch">
                    <input
                    id="datatable-search-input2"
                    type="search"
                    class="max-w-sm relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="button-addon2" />
                </div>
                </div>
                <div id="datatable2"></div>
            </div>
        </center>
        <div class="tambah">
            <a href="tambah-bahan.php">
            <button style="background-color: black;border-radius:50%;width:40px;height:40px;color:white;font-size:1.3rem;position:relative;bottom:5%;left:90%">+</button>
            </a>
        </div>

        <script>
            const data2 = {
            columns: [
                'No',
                'No Kod',
                'Nama Bahan',
                'Harga Terendah',
                'Harga Tertinggi',
                'Status',
                { label: "Kemaskini", field: "kemaskini", sort: false },
                { label: "Delete", field: "delete", sort: false },
            ],
        rows: [
            <?php 
                
                $bahan_sql = $pdo->prepare("SELECT * FROM bahan WHERE status_bahan = 1");
                $bahan_sql->execute();

                $no = 0;
                while($bahan = $bahan_sql->fetch(PDO::FETCH_ASSOC)){
                    $no++;

                    $id_bahan = $bahan['id_bahan'];
                    $no_kod_bahan = $bahan['no_kod_bahan'];
                    $nama_bahan = $bahan['nama_bahan'];
                    $harga_terendah_bahan = $bahan['harga_terendah_bahan'];
                    $harga_tertinggi_bahan = $bahan['harga_tertinggi_bahan'];
                    $kekerapan = $bahan['kekerapan_kegunaan'];

                    if($kekerapan == 1){
                        $status = "Biasa Digunakan";
                    }
                    else if($kekerapan == 2){
                        $status = "Jarang Digunakan";
                    }
                    else{
                        $status = "Tidak Ditetapkan";
                    }

                    echo "[\"$no\", \"$no_kod_bahan\", \"$nama_bahan\", \"$harga_terendah_bahan\", \"$harga_tertinggi_bahan\", \"$status\", \"<a href='kemaskini-bahan.php?id_bahan=$id_bahan'><button style='background-color:blue;padding:5px;color:white'>Kemaskini</button></a>\", \"<form action='backend/bahan.php' method='post'><input type='hidden' name='id_bahan' value='$id_bahan'><button type='submit' name='delete' style='background-color:red;padding:5px;color:white'>Delete</button></a>\"],";


                }
            ?>
        ],
        };

        const instance2 = new te.Datatable(document.getElementById('datatable2'), data2)

        document.getElementById('datatable-search-input2').addEventListener('input', (e) => {
        instance2.search(e.target.value);
        });
        </script>
    </div>
    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>