<?php $title = "Permohonan"; $location_index = "../.."; include('../../components/head.php')?>

<body>
    <?php $location_index = "../.."; include('../../components/header-admin.php')?>
    <div class="main-container p-5 pt-10">
        <center>
            <script src="../../src/assets/js/tw-elements.umd.min.js"></script>
            <div class="permohonan max-w-4xl px-10">

                <!--navigation-->
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
                        >Baru</a
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
                        >Telah Disahkan</a
                        >
                    </li>

                    <li role="presentation">
                        <a
                        href="#pills-contact"
                        class="my-2 block rounded bg-neutral-100 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[te-nav-active]:!bg-primary-100 data-[te-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700 md:mr-4"
                        id="pills-contact-tab"
                        data-te-toggle="pill"
                        data-te-target="#pills-contact"
                        role="tab"
                        aria-controls="pills-contact"
                        aria-selected="false"
                        >Telah DiBatalkan</a
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

                        <!-- Permohonan Baru -->
                        <?php include('./jenis_permohonan/permohonan-baru.php')?>

                    </div>
                    <div
                        class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                        id="pills-profile"
                        role="tabpanel"
                        aria-labelledby="pills-profile-tab">

                        <!-- Permohonan Telah Disahkan -->
                        <?php include('./jenis_permohonan/permohonan-sah.php')?>
                    </div>
                    <div
                        class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                        id="pills-contact"
                        role="tabpanel"
                        aria-labelledby="pills-contact-tab">
                        
                        <!-- Permohonan Telah Batal -->
                        <?php include('./jenis_permohonan/permohonan-batal.php')?>
                    </div>
                </div>
            </div>
        </center>
    </div>
    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>