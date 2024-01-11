<?php $title = "Kemaskini Bahan"; $location_index = "../.."; include('../../components/head.php')?>

<body>
    <?php $location_index = "../.."; include('../../components/header-admin.php')?>

    <div class="main-container p-5">
        <button onclick="history.back()">Go Back</button>


        <?php 
            $id_bahan = $_GET['id_bahan'];

            if(is_numeric($id_bahan)){

                $bahan_sql = $pdo->prepare("SELECT * FROM bahan WHERE id_bahan = ?");
                $bahan_sql->execute([$id_bahan]);

                if($bahan = $bahan_sql->fetch(PDO::FETCH_ASSOC)){
                    
                }
                else{
                    echo "tak jumpa";
                }
            }
        ?>
        <center>
            <form action="../backend/bahan.php" method="post">
                <div
                    class="pt-10 max-w-xl block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                        Info Bahan
                    </h5>
                    <br>

                    <!-- Token -->
                    <input type="hidden" name="token" value="<?php echo $token?>">
                    <input type="hidden" name="id_bahan" value="<?php echo $id_bahan?>">                
                    <!-- No Kod Bahan -->
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input
                            type="text"
                            name="no_kod_bahan"
                            value="<?php echo htmlspecialchars($bahan['no_kod_bahan'])?>"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleFormControlInput1"
                            placeholder="Example label" />
                        <label
                            for="exampleFormControlInput1"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                            >No Kod Bahan
                        </label>
                    </div>
    
                    <!-- Nama Bahan -->
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input
                            type="text"
                            name="nama_bahan"
                            value="<?php echo htmlspecialchars($bahan['nama_bahan'])?>"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleFormControlInput1"
                            placeholder="Example label" />
                        <label
                            for="exampleFormControlInput1"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                            >Nama Bahan
                        </label>
                    </div>
    
                    <!-- Harga Tertinggi -->
                    <div class="relative mb-4 flex flex-wrap items-stretch">
                        <span
                        class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                        id="inputGroup-sizing-default"
                        >Harga Tertinggi </span>
                        <span
                            class="flex items-center whitespace-nowrap border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                            id="inputGroup-sizing-default"
                            >RM 
                        </span>
                        <input
                        type="text"
                        name="harga_tertinggi_bahan"
                        value="<?php echo $bahan['harga_tertinggi_bahan'] ?>"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" />
                    </div>
    
                    <!-- Harga Terendah -->
                    <div class="relative mb-4 flex flex-wrap items-stretch">
                        <span
                        class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                        id="inputGroup-sizing-default"
                        >Harga Terendah </span>
                        <span
                            class="flex items-center whitespace-nowrap border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                            id="inputGroup-sizing-default"
                            >RM </span>
                        <input
                        type="text"
                        name="harga_terendah_bahan"
                        value="<?php echo $bahan['harga_terendah_bahan']?>"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" />
                    </div>
    
                    <!-- Kekerapan Kegunaan Bahan -->
                    <div class="mb-4">
                        <select name="kekerapan_kegunaan" data-te-select-init>
                            <option <?php echo $bahan['kekerapan_kegunaan'] == '1' ? 'selected' : '1'; ?> value="1">Kerap</option>
                            <option <?php echo $bahan['kekerapan_kegunaan'] == '2' ? 'selected' : '2'; ?> value="2">Jarang</option>
                        </select>
                        <label data-te-select-label-ref>Kekerapan Kegunaan Bahan</label>
                    </div>
    
                    <button
                        type="submit"
                        name="kemaskini"
                        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        Kemaskini
                    </button>
                </div>
            </form>
        </center>
    </div>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>