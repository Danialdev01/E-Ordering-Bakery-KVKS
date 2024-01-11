<?php $title = "Barang Basah"; $location_index = "../.."; include('../../components/head.php')?>

<style>
    .select-bahan{
        background-color: aliceblue;
        border-radius: 5px;
        padding: 10px;
    }
    .bahan-div{
        padding: 10px;
    }
    .remove-button{
        background-color: red;
        color: white;
        padding: 2px;
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 3px;
        margin-left: 10px;
    }
</style>

<body>
    <?php $location_index = "../.."; include('../../components/header.php')?>
    <div class="main-container p-5 pt-15">
        <center>
            <div class="form max-w-lg pt-5">
                
                <form action="../backend/permohonan.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="token" value="<?php echo $token?>">

                    <!-- Id Pensyarah -->
                    <input type="hidden" name="id_pensyarah" value="<?php echo $_SESSION['id_pensyarah_session']?>">

                    <!-- Jenis Permohonan -->
                    <input type="hidden" name="jenis_permohonan" value="basah">

                    <!-- Tarikh Kegunaan-->
                    <div
                        class="relative mb-3"
                        data-te-datepicker-init
                        data-te-inline="true"
                        data-te-disable-past="true"
                        data-te-input-wrapper-init>
                        <input
                            type="text"
                            name="tarikh_penggunaan_permohonan"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            placeholder="Select a date"
                            data-te-datepicker-toggle-ref
                            />
                        <label
                            for="floatingInput"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                            >Tarikh Kegunaan</label
                        >
                    </div>

                    <!-- Masa Kegunaan -->
                    <div class="relative mb-3" 
                        data-te-timepicker-init 
                        data-te-input-wrapper-init
                        data-te-inline="true">
                        <input
                            type="text"
                            name="masa_penggunaan_permohonan"
                            data-te-toggle="timepicker-just-input"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="form1" />
                        <label
                            for="form1"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                            >Masa Kegunaan</label
                        >
                    </div>

                    <!-- Nama Kelas -->
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input
                            name="nama_kelas_permohonan"
                            type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleInput7"
                            placeholder="Name" 
                            required
                            />

                        <label
                            for="exampleInput7"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                            >Nama Modul
                        </label>
                    </div>

                    <!-- Nama Tajuk  -->
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input
                            name="nama_tajuk_permohonan"
                            type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleInput7"
                            placeholder="Name" 
                            required
                            />

                        <label
                            for="exampleInput7"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                            >Nama Tajuk
                        </label>
                    </div>

                    <hr>

                    <!-- Bahan  -->
                    <input id="hiddenInput" type="hidden" name="bahan_details" />

                    <div class="bahan-container pt-5">

                        <div class="bahan">

                            <div class="grid grid-cols-2 gap-4">
                                <!--First name input-->
                                <div class="relative mb-3">
                                    <select name="id_bahan" data-te-select-init data-te-select-filter="true">
                                        <?php 
                                            require_once('../../config/config.php');
                                            $bahan_sql = $pdo->prepare("SELECT * FROM bahan WHERE status_bahan = 1");
                                            $bahan_sql->execute();
                                        ?>
                                        <option value="0">Nama Bahan</option>
                                        <?php while($bahan = $bahan_sql->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <option value="<?php echo $bahan['id_bahan']?>"><?php echo $bahan['nama_bahan']?></option>
                                            <?php
                                        }
                                        ?>
        
                                    </select>
                                </div>
        
                                <!--Kuantiti input-->
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input
                                    type="number"
                                    name="kuantiti_bahan"
                                    onkeypress="return isNumberKey(event)"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="exampleInput124"
                                    />
                                    <label
                                    for="exampleInput124"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >Kuantiti Bahan
                                    </label>
                                </div>
    
                            </div>

                            <div class="relative mb-6 max-w-lg" data-te-input-wrapper-init>
                                <input
                                type="text"
                                name="catatan_bahan"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleInput124"
                                />
                                <label
                                for="exampleInput124"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                >Catatan Bahan
                                </label>
                            </div>
                            
                            <div class="flex">

                                <!--Catatan Bahan-->
                                <div style="width: 900px;" class="relative mb-6" data-te-input-wrapper-init>
                                    <input
                                    type="text"
                                    name="link_bahan"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="exampleInput124"
                                    />
                                    <label
                                    for="exampleInput124"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >Link Bahan
                                    </label>
                                </div>
                                <div class="button pl-3">
                                    <button id="addButton" type="button" class="px-2 inline-block rounded bg-primary h-9 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca]">
                                        <svg style="width:16px; height:16px; fill:#f6f5f4;"  viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
 
                        </div>

                        <hr>

                        <div id="displayDivContainer" class="font-md pt-5 pb-10"></div>


                        <script src="../../src/assets/js/inputNumberValidation.js"></script>
                        <script src="../../src/assets/js/arrayInput.js"></script>
                    </div>

    
                    <!--Submit button-->
                    <button
                    type="submit"
                    name="tambah"
                    class=" dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    Lakukan Permohonan
                    </button>
                </form>
            </div>
        </center>
    </div>

    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>