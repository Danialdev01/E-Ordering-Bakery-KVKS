<?php $title = "Admin Login E-Ordering"; $location_index = "."; include('./components/head.php')?>

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
            <div class="container w-100  pt-10">
                <center>

                    <div class="login-form max-w-sm pt-5 p-5">
                        <form action="./backend/login-admin.php" method="post">

                            <input type="hidden" name="token" value="<?php echo $token?>">
                            <!-- Nama  -->
                            <div class="relative mb-3" data-te-input-wrapper-init>
                                <input
                                    type="text"
                                    name="nama_admin"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="exampleFormControlInputText"
                                    placeholder="Example label" />
                                <label
                                    for="exampleFormControlInputText"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >Nama Pengguna
                                </label>
                            </div>

                            <!-- Password  -->
                            <div class="relative mb-3" data-te-input-wrapper-init>
                                <input
                                    type="password"
                                    name="password_admin"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="exampleFormControlInputText"
                                    placeholder="Example label" />
                                <label
                                    for="exampleFormControlInputText"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >Password Pengguna
                                </label>
                            </div>

                            <button
                                type="submit"
                                name="login"
                                style="background-color:#ec6ed7"
                                class="hover:bg-pink-800 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Log Masuk
                            </button>
                        </form>
                    </div>
                </center>
                <a href="./"><u>Pensyarah Login</u></a>
            </div>
        </center>
    </section>


    <?php $location_index = ".";include('./components/footer.php') ?>   
</body>

</html>