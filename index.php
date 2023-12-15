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
                        <img src="./src/assets/images/logo-banner.png" alt="logo-banner">

                        <div class="login-form max-w-sm pt-5 p-5">
                            <form action="./system/login-check.php" method="post">
                                <div class="relative mb-6 mt-4 rounded bg-white">
                                    <select style="z-index:-100 !important" name="id_pensyarah" class="rounded-md bg-white" data-te-select-init data-te-select-filter="true" required>
                                        <option value="0">Nama Pensyarah</option>
                                        <?php
                                            require_once("./db/config.php");
                                            $pensyarah_sql = mysqli_query($connect, "SELECT * FROM pensyarah WHERE status_pensyarah = '1' ORDER BY nama_pensyarah ASC");
                                            while($pensyarah = mysqli_fetch_array($pensyarah_sql)){
                                                ?>
                                                <option value="<?php echo $pensyarah['id_pensyarah']?>"><?php echo $pensyarah['nama_pensyarah']?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
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
                </div>
            </div>
        </center>
    </section>


    <?php $location_index = ".";include('./components/footer.php') ?>   
</body>

</html>