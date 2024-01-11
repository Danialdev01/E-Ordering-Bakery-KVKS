<?php $title = "Pengguna"; $location_index = "../.."; include('../../components/head.php')?>

<body>
    <?php $location_index = "../.."; include('../../components/header-admin.php')?>
    <script src="../../src/assets/js/tw-elements.umd.min.js"></script>
    <center>
        <form class="pt-5" method="post" action="../backend/key.php">
            <?php 
                $envContent = parse_ini_string(file_get_contents('../../config/.key'));
                $pensyarah_login_key = $envContent['PENSYARAH_LOGIN_KEY'];
                
                ?>
            <h3>Pensyarah Login Key</h3>
            <div class="flex justify-center forms-container mt-5">
                <input type="hidden" name="token" value="<?php echo $token?>">
                <div style="height: 40px;" class="max-w-sm mt-1 relative mb-3" data-te-input-wrapper-init>
                    <input
                        type="text"
                        name="pensyarah_login_key"
                        value="<?php echo $pensyarah_login_key?>"
                        class="peer block w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        onkeypress="return isNumberKey(event)"
                        placeholder="Pensyarah Login Key" />
                </div>
                <div class="p-1">
                    <button style="width: 100px;height:40px;" type="submit" name="kemaskini" class="inline-block rounded bg-primary pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Kemaskini</button>
                </div>
            </div>
        </form>
    </center>
    <div class="main-container p-5">
        <ul
            class="mb-5 flex list-none flex-col flex-wrap pl-0 md:flex-row"
            id="pills-tab"
            role="tablist"
            data-te-nav-ref>
            <li role="presentation">
                <a
                href="#pills-home"
                class="my-2 block rounded bg-neutral-100 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[te-nav-active]:!bg-primary-100 data-[te-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700 md:mr-4"
                id="pills-home-tab"
                data-te-toggle="pill"
                data-te-target="#pills-home"
                data-te-nav-active
                role="tab"
                aria-controls="pills-home"
                aria-selected="true"
                >Pensyarah</a
                >
            </li>

            <li role="presentation">
                <a
                href="#pills-profile"
                class="my-2 block rounded bg-neutral-100 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[te-nav-active]:!bg-primary-100 data-[te-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700 md:mr-4"
                id="pills-profile-tab"
                data-te-toggle="pill"
                data-te-target="#pills-profile"
                role="tab"
                aria-controls="pills-profile"
                aria-selected="false"
                >Admin</a
                >
            </li>

        </ul>

        <!--content-->
        <div class="mb-6">
            <div
                class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                id="pills-home"
                role="tabpanel"
                aria-labelledby="pills-home-tab"
                data-te-tab-active>

                <!--  Pensyarah -->
                <?php include('./jenis_pengguna/pensyarah.php')?>

            </div>
            <div
                class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                id="pills-profile"
                role="tabpanel"
                aria-labelledby="pills-profile-tab">

                <!-- Admin -->
            </div>
        </div>
        <script src="../../src/assets/js/inputNumberValidation.js"></script>
    </div>
    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>