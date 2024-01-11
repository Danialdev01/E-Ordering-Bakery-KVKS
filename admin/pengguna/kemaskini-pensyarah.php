<?php $title = "Kemaskini Pengguna"; $location_index = "../.."; include('../../components/head.php')?>

<body>
    <?php $location_index = "../.."; include('../../components/header-admin.php')?>
    <script src="../../src/assets/js/tw-elements.umd.min.js"></script>
    <div class="main-container p-5">
        
        <div class="pensyarah-container">
            <center>
                <form action="../backend/pensyarah.php" method="post">
                    <input type="hidden" name="token" value="<?php echo $token?>">
                    <div
                        class="max-w-lg block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <h5
                            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                            Kemaskini Pengguna
                        </h5>
                        <br>
                        <?php
                            $id_pensyarah = $_GET['id_pensyarah'];
                            $pensyarah_sql = $pdo->prepare("SELECT * FROM pensyarah WHERE id_pensyarah = ?");
                            $pensyarah_sql->execute([$id_pensyarah]);
    
                            $pensyarah = $pensyarah_sql->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <input type="hidden" name="id_pensyarah" value="<?php echo $id_pensyarah?>">
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input
                                type="text"
                                name="nama_pensyarah"
                                value="<?php echo $pensyarah['nama_pensyarah']?>"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput1"
                                placeholder="Nama Pensyarah" />
                            <label
                                for="exampleFormControlInput1"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                >Nama Pensyarah
                            </label>
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
        
    </div>
    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>