<?php $title = "E-Ordering"; $location_index = "."; include('./components/head.php')?>

<style>
    *{
        padding: 0;
        margin: 0;
    }
    .section-1{
        background-image: url('./src/assets/images/background-1.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 95vh;

    }
</style>
<body>
    <?php $location_index = "."; include('./components/header-login.php')?>
    <section class="section-1 ">
        <center>
            <div class="block md:flex">
                <div class="container w-100"></div>
                <div class="container w-100">
                    <center>
                        <img class="hidden md:block mt-5" style="margin-left: -30px;" src="./src/assets/images/logo-banner.png" alt="logo-banner">

                        <div class="login-form max-w-sm pt-2 p-5">
                            <form action="./backend/login-pensyarah.php" method="post">

                                <input type="hidden" name="token" value="<?php echo $token?>">

                                <div class="relative mb-3 mt-4 rounded bg-white">
                                    <select style="z-index:-100 !important" name="id_pensyarah" class="rounded-md bg-white" data-te-select-init data-te-select-filter="true" required>
                                        <option value="0">Nama Pensyarah</option>
                                        <?php
                                            require_once('./config/config.php');
                                            $pensyarah_sql = $pdo->prepare("SELECT * FROM pensyarah WHERE status_pensyarah = '1' ORDER BY nama_pensyarah ASC");
                                            $pensyarah_sql->execute();
                                            while($pensyarah = $pensyarah_sql->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                                <option value="<?php echo $pensyarah['id_pensyarah']?>"><?php echo $pensyarah['nama_pensyarah']?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input
                                        type="text"
                                        name="pensyarah-login-key"
                                        onkeypress="return isNumberKey(event)"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleFormControlInputText"
                                        placeholder="Pensyarah Login Key" />
                                    <label
                                        for="exampleFormControlInputText"
                                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                        >Pensyarah Login Key
                                    </label>
                                </div>

                                <button
                                    type="submit"
                                    name="login"
                                    style="background-color:#ec6ed7"
                                    class="hover:bg-pink-800 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                    Buat Pesanan
                                </button>
                            </form>
                        </div>
                    </center>
                    <a href="./admin-login.php"><u>Admin Login</u></a>
                </div>
            </div>
        </center>
    </section>
    <script src="./src/assets/js/inputNumberValidation.js"></script>


    <?php $location_index = ".";include('./components/footer.php') ?>   
</body>

</html>