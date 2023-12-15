<?php $title = "Barang Basah"; $location_index = "../.."; include('../../components/head.php')?>

<style>
    .select-bahan{
        background-color: aliceblue;
        border-radius: 5px;
        padding: 10px;
    }
</style>
<body>
    <?php $location_index = "../.."; include('../../components/header.php')?>
    <div class="main-container p-5 pt-10">
        <br>
        <center>
            <div class="form max-w-lg">

                <form action="./system/tambah-permohonan.php" method="post" enctype="multipart/form-data">
    
                    <input type="hidden" name="nama_pelapor" value="">

                    <!-- Tarikh Kegunaan-->
                    <div
                        class="relative mb-3"
                        data-te-datepicker-init
                        data-te-inline="true"
                        data-te-disable-past="true"
                        data-te-input-wrapper-init>
                        <input
                            type="text"
                            name="tarikh_penggunaan"
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

                    <div
                        class="relative mb-3"
                        id="timepicker-inline-12"
                        data-te-input-wrapper-init>
                        <input
                            type="text"
                            name="masa_penggunaan"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="form2" />
                        <label
                            for="form2"
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
                            >Nama Kelas
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
                    <br>
                    <!-- barangan tambah -->

                    <div class="bahan-container">

                        <div class="bahan flex">

                            <div class="grid grid-cols-2 gap-4">
                                <!--First name input-->
                                <div class="relative mb-3">
                                    <select name="id_bahan" data-te-select-init data-te-select-filter="true" required>
                                        <?php 
                                            require_once('../../db/config.php');  
                                            $bahan_sql = mysqli_query($connect, "SELECT * FROM bahan");
                                        ?>
                                        <option value="0">Nama Bahan</option>
                                        <?php while($bahan = mysqli_fetch_array($bahan_sql)){
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
                                    type="text"
                                    name="kuantiti_bahan"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="exampleInput124"
                                    required
                                    />
                                    <label
                                    for="exampleInput124"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >Kuantiti Bahan
                                    </label>
                                </div>
    
                            </div>
                            <div class="button pl-3">
                                <button 
                                type="button"
                                class=" px-2 inline-block rounded bg-danger h-9 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                                <svg width="20px" height="20px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    
                                    <defs>

                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Dribbble-Light-Preview" transform="translate(-179.000000, -360.000000)" fill="#ffffff">
                                            <g id="icons" transform="translate(56.000000, 160.000000)">
                                                <path d="M130.35,216 L132.45,216 L132.45,208 L130.35,208 L130.35,216 Z M134.55,216 L136.65,216 L136.65,208 L134.55,208 L134.55,216 Z M128.25,218 L138.75,218 L138.75,206 L128.25,206 L128.25,218 Z M130.35,204 L136.65,204 L136.65,202 L130.35,202 L130.35,204 Z M138.75,204 L138.75,200 L128.25,200 L128.25,204 L123,204 L123,206 L126.15,206 L126.15,220 L140.85,220 L140.85,206 L144,206 L144,204 L138.75,204 Z" id="delete-[#1487]">

                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                    <button class="add-bahan" style="background-color: none;border:1px solid black">Tamba Bahan</button>
                    <br><br>

    
                    <!--Submit button-->
                    <button
                    type="submit"
                    name="submit"
                    class="dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    Lakukan Permohonan
                    </button>
                </form>
            </div>
        </center>
    </div>
    

    <script>
        $(document).ready(function() {
            $(document).on('click', '.add-bahan', function(){
                $('.bahan-container').append(`
                    <select class="select-bahan" name="" id="">
                        <?php 
                            $bahan_sql = mysqli_query($connect, "SELECT * FROM bahan");
                            while($bahan = mysqli_fetch_array($bahan_sql)){
                                ?>
                                <option value="<?php echo $bahan['id_bahan']?>"><?php echo $bahan['nama_bahan']?></option>
                                <?php
                            }
                        ?>
                    </select>
                `)
            })
        })
    </script>

    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>