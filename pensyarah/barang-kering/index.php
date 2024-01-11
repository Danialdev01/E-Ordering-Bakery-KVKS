<?php $title = "Barang Kering"; $location_index = "../.."; include('../../components/head.php')?>

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
                    <input type="hidden" name="jenis_permohonan" value="kering">

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

                            <!--Catatan Bahan-->
                            <div style="width: 900px;" class="relative mb-6 max-w-lg" data-te-input-wrapper-init>
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

                                <!--Link Bahan-->
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
                                    <button id="addButton" type="button" class="px-2 inline-block rounded bg-primary h-9 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca]"><svg style="width:16px; height:16px; fill:#f6f5f4;"  viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"></path></svg></button>
                                </div>

                            </div>
 
                        </div>

                        <hr>

                        <div id="displayDivContainer" class="font-md pt-5 pb-10"></div>

                        <!-- javascript -->
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